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

namespace ClearSale\Auth;

class Token
{
    /**
     * @var string
     */
    protected $token;

    /**
     * @var \DateTime
     */
    protected $expirationDate;
//
//    /**
//     * Auth constructor.
//     * @param string $token
//     * @param \DateTime $expirationDate
//     */
//    public function __construct($token, \DateTime $expirationDate)
//    {
//        $this->token = $token;
//        $this->expirationDate = $expirationDate;
//    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return \DateTime
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }
    
   /**
     * @param $json
     *
     * @return Order
     */
    public static function fromJson($json)
    {
        $object = json_decode($json);

        $token = new Token();
        $token->populate($object);

        return $token;
    }

    /**
     * @param \stdClass $data
     */
    public function populate(\stdClass $data)
    {

        $dataProps = get_object_vars($data);

        if (isset($dataProps['Token'])) {
            $this->token = $data->Token;
        }
        
        if (isset($dataProps['ExpirationDate'])) {
            $this->expirationDate = $data->ExpirationDate;
        }        
    }
    
    public function jsonSerialize() {
        $arr = get_object_vars($this);
        foreach ($arr as $k => $v) {
            if (empty($v)) {
                unset ($arr[$k]);
            }
        }
        return $arr;
    }
    
}
