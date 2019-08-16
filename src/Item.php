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

class Item extends Entity implements \JsonSerializable
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $value;

    /**
     * @var integer
     */
    private $amount;

    /**
     * @var int
     */
    private $categoryID;

    /**
     * @var string
     */
    private $categoryName;

    /**
     * @var bool
     */
    private $isGift;

    /**
     * @var string
     */
    private $sellerName;

    /**
     * @var string
     */
    private $isMarketPlace;

    /**
     * @var string
     */
    private $shippingCompany;
   
    /**
     * @return float
     */
    public function getValue()
    {
        return $this->asDecimal($this->value);
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->asInteger($this->amount);
    }

    /**
     * @return int
     */
    public function getCategoryID()
    {
        return $this->asInteger($this->categoryID);
    }

    /**
     * @return bool
     */
    public function getIsGift()
    {
        return $this->asBool($this->isGift);
    }
    
    public function setCode($code) {
        $this->code = $this->asString($code);
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setValue($value) {
        $this->value = $this->asDecimal($value);
        return $this;
    }

    public function setAmount($amount) {
        $this->amount = $this->asInteger($amount);
        return $this;
    }

    public function setCategoryID($categoryID) {
        $this->categoryID = $this->asInteger($categoryID);
        return $this;
    }

    public function setCategoryName($categoryName) {
        $this->categoryName = $categoryName;
        return $this;
    }

    public function setIsGift($isGift) {
        $this->isGift = $this->asBool($isGift);
        return $this;
    }

    public function setSellerName($sellerName) {
        $this->sellerName = $sellerName;
        return $this;
    }

    public function setIsMarketPlace($isMarketPlace) {
        $this->isMarketPlace = $this->asString($isMarketPlace);
        return $this;
    }

    public function setShippingCompany($shippingCompany) {
        $this->shippingCompany = $shippingCompany;
        return $this;
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