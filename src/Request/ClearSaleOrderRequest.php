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

use ClearSale\Order;
use ClearSale\Auth\Auth;
use ClearSale\Environment\Environment;

/**
 * Class ClearSaleOrderRequest
 *
 * @package ClearSale\Request
 */
class ClearSaleOrderRequest extends AbstractRequest
{            
    /**
     * ClearSaleOrderRequest constructor.
     *
     * @param Environment $environment
     * @param Auth        $auth
     */
    public function __construct(Environment $environment, Auth $auth)
    {
        parent::__construct($environment, $auth);
    }

    /**
     * @param $order
     *
     * @return mixed
     * @throws \ClearSale\Request\ClearSaleRequestException
     * @throws \RuntimeException
     */
    public function send($order)
    {
        $headers = $this->getHeaders();
        $url = $this->environment->getEndpoint() . 'v1/orders/';

        return $this->sendRequest('POST', $url, $order, $headers);
    }

    /**
     * @param string $orderCode
     * @return array
     */
    public function statusCheck($orderCode)
    {
        $headers = $this->getHeaders();
        $url = $this->environment->getEndpoint() . 'v1/orders/' . $orderCode . '/status';        
        return $this->sendRequest('GET', $url, null, $headers);        
    }

    /**
     * @param string $orderCode
     * @param string $orderStatus
     * @return array
     */
    public function statusUpdate($orderCode, $orderStatus)
    {
        $headers = $this->getHeaders();
        $status = new \ClearSale\Status();
        $status->setStatus($orderStatus);
        $url = $this->environment->getEndpoint() . 'v1/orders/' . $orderCode . '/status';        
        return $this->sendRequest('PUT', $url, $status, $headers);                
    }

    /**
     * @param array $orderCodes
     * @param string $message
     * @return array
     */
    public function chargeBack(array $orderCodes, $message)
    {
        $codes = [];
        foreach ($orderCodes as $code) {
            $codes[] = (string) $code;
        }
        $params = [
            'message' => $message,
            'orders' => $codes
        ];        
        $url = $this->environment->getEndpoint() . 'v1/chargeback';        
        return $this->sendRequest('POST', $url, $params, $headers);                        
    }
    
    /**
     * @param $json
     *
     * @return Order
     */
    protected function unserialize($json)
    {
        return Order::fromJson($json);
    }
}
