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

namespace ClearSale;

class SocialNetwork extends Entity implements \JsonSerializable
{
    const FACEBOOK = 1;
    const TWITTER = 2;
    const LINKEDIN = 3;
    const GOOGLE = 4;
    const OTHERS = 5;

    /**
     * @var int
     */
    private $optInCompreConfie;

    /**
     * @var int
     */
    private $typeSocialNetwork;

    /**
     * @var string
     */
    private $authenticationToken;

    public function setOptInCompreConfie($optInCompreConfie) {
        $this->optInCompreConfie = $optInCompreConfie;
        return $this;
    }

    public function setTypeSocialNetwork($typeSocialNetwork) {
        $this->typeSocialNetwork = $typeSocialNetwork;
        return $this;
    }

    public function setAuthenticationToken($authenticationToken) {
        $this->authenticationToken = $authenticationToken;
        return $this;
    }

    /**
     * @return int
     */
    public function getOptInCompreConfie()
    {
        return $this->asInteger($this->optInCompreConfie);
    }

    /**
     * @return int
     */
    public function getTypeSocialNetwork()
    {
        return $this->asInteger($this->typeSocialNetwork);
    }
    
    public function jsonSerialize() {
        $arr = get_object_vars($this);
        foreach ($arr as $k => $v) {
            if (!is_bool($v) && $v !== 0 && empty($v)) {
                unset ($arr[$k]);
            }
        }
        return $arr;
    }
}