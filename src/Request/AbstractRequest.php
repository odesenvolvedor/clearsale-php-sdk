<?php

/*
 * Clearsale is a Brazilian fraud risk management company operating in the 
 * physical and virtual world, with solutions for e-commerce, credit, 
 * collection and sales recovery.
 * 
 * This package is designed for integration with the ClearSale API
 * 
 * The MIT License
 *
 * Copyright 2019 odesenvolvedor.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace ClearSale\Request;

use ClearSale\Auth\Auth;
use ClearSale\Environment\Environment;
use ClearSale\Request\ClearSaleRequestException;

use Illuminate\Support\Facades\Log;

/**
 * Class AbstractSaleRequest
 *
 * @package ClearSale\Request
 */
abstract class AbstractRequest
{
       
    protected $environment;
    
    protected $auth;
    
    private $responseHeader;
            
    /**
     * AbstractSaleRequest constructor.
     *
     * @param Environment $environment
     */
    public function __construct(Environment $environment, Auth $auth = null)
    {
        $this->environment = $environment;
        
        $this->auth        = $auth;
    }

    /**
     * @param $param
     *
     * @return mixed
     */
    public abstract function send($param);

    /**
     * @param             $method
     * @param  string     $url
     * @param  mixed|null $content
     * @param  Array|[]   $headers
     *
     * @return mixed
     *
     * @throws \ClearSale\Request\ClearSaleRequestException
     * @throws \RuntimeException
     */
    protected function sendRequest($method, $url, \JsonSerializable $content = null, $headers = [])
    {
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);

        switch ($method) {
            case 'GET':
                break;
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, true);
                break;
            default:
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        }

        if ($content !== null) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($content));

            $headers[] = 'Content-Type: application/json';
        } else {
            $headers[] = 'Accept: application/json';
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_HEADERFUNCTION, [$this, "handleHeaderLine"]);
        
        $response   = curl_exec($curl);        
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if (curl_errno($curl)) {
            throw new ClearSaleRequestException('Curl error: ' . curl_error($curl), 400);
        }

        curl_close($curl);

        return $this->readResponse($statusCode, $response);
    }

    /**
     * @param type $curl
     * @param type $headerLine
     * 
     * @return int
     */
    
    public function handleHeaderLine( $curl, $headerLine ) 
    {
        $explode = explode( ':', $headerLine );
        if ( isset( $explode[1] ) )
            $this->responseHeader[trim($explode[0])] = trim($explode[1]) ;
        return strlen($headerLine);
    }    
    
    /**
     * @param $statusCode
     * @param $responseBody
     *
     * @return mixed
     *
     * @throws ClearSaleRequestException
     */
    protected function readResponse($statusCode, $responseBody)
    {
        $unserialized = null;
       
        switch ($statusCode) {
            case 200:
            case 201:
                $unserialized = $this->unserialize($responseBody);
                break;
            case 400:
            case 401:
                $exception = null;
                $responseBody = str_replace('[0]', 'order', $responseBody);
                $response  = json_decode($responseBody);
                if (!empty($response)) {
                    $errors = [];
                    foreach ($response->ModelState as $k => $error) {
                        $errors[$k] = $error;
                    }
                    $ClearSaleError = new ClearSaleError($errors, $statusCode);
                    $exception = new ClearSaleRequestException('Request Error', $statusCode, $exception);
                    $exception->setClearSaleError($ClearSaleError);
                } else {
                    $ClearSaleError = new ClearSaleError(['error' => $responseBody], $statusCode);
                    $exception = new ClearSaleRequestException('Request Error', $statusCode, $exception);
                    $exception->setClearSaleError($ClearSaleError);
                }
                
                $exception->setClearSaleResponseHeader($this->responseHeader);
                throw $exception;
            case 404:                
                $exception = new ClearSaleRequestException('Resource not found', 404, null);
                $exception->setClearSaleResponseHeader($this->responseHeader);
                throw $exception;
            default:
                $exception = new ClearSaleRequestException('Unknown status', $statusCode);
                $exception->setClearSaleResponseHeader($this->responseHeader);
                throw $exception;
        }

        return $unserialized;
    }

    /**
     * @param $json
     *
     * @return mixed
     */
    protected abstract function unserialize($json);
    
    protected function getHeaders()
    {
        $token = $this->auth->authenticate($this->environment);
        return [ 'Authorization: Bearer ' . $token->getToken() ];
    }
}
