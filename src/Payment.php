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

class Payment extends Entity implements \JsonSerializable
{
    const TYPE_CREDIT_CARD = 1;
    const TYPE_BANK_SLEEP = 2;
    const TYPE_BANK_DEBIT = 3;
    const TYPE_BANK_DEBIT_MONEY = 4;
    const TYPE_BANK_DEBIT_CHECK = 5;
    const TYPE_BANK_TRANSFER = 6;
    const TYPE_SEDEX = 7;
    const TYPE_CHECK = 8;
    const TYPE_MONEY = 9;
    const TYPE_FINANCING = 10;
    const TYPE_INVOICE = 11;
    const TYPE_COUPON = 12;
    const TYPE_MULTICHEQUE = 13;
    const TYPE_OTHER = 14;
    const TYPE_VOUCHER = 16;
    const TYPE_VIRTAL_GIFT_CARD = 1041;
    const TYPE_DEBIT_CARD = 4011;
    const TYPE_ELETRONIC_TRANSFER = 4011;

    /**
     * @var int
     */
    private $sequential;

    /**
     * @var string
     */
    private $date;

    /**
     * @var float
     */
    private $value;

    /**
     * @var integer
     */
    private $type;

    /**
     * @var integer
     */
    private $installments;

    /**
     * @var float
     */
    private $interestRate;

    /**
     * @var float
     */
    private $interestValue;

    /**
     * @var integer
     */
    private $currency;

    /**
     * @var string
     */
    private $voucherOrderOrigin;

    /**
     * @var Address
     */
    private $address;

    /**
     * @var Card
     */
    private $card;

    /**
     * @return int
     */
    public function getSequential()
    {
        return $this->asInteger($this->sequential);
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->asDateTimeVal($this->date);
    }

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
    public function getType()
    {
        return $this->asInteger($this->type);
    }

    /**
     * @return int
     */
    public function getInstallments()
    {
        return $this->asInteger($this->installments);
    }

    /**
     * @return float
     */
    public function getInterestRate()
    {
        return $this->asDecimal($this->interestRate);
    }

    /**
     * @return float
     */
    public function getInterestValue()
    {
        return $this->asDecimal($this->interestValue);
    }

    /**
     * @return int
     */
    public function getCurrency()
    {
        return $this->asInteger($this->currency);
    }

    /**
     * @param Address $address
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @param Card $card
     */
    public function setCard(Card $card)
    {
        $this->card = $card;
        return $this;
    }
    
    public function setSequential($sequential) {
        $this->sequential = $this->asInteger($sequential);
        return $this;
    }

    public function setDate($date) {
        $this->date = $this->asDateTimeVal($date);
        return $this;
    }

    public function setValue($value) {
        $this->value = $this->asDecimal($value);
        return $this;
    }

    public function setType($type) {
        $this->type = $this->asInteger($type);
        return $this;
    }

    public function setInstallments($installments) {
        $this->installments = $this->asInteger($installments);
        return $this;
    }

    public function setInterestRate($interestRate) {
        $this->interestRate = $this->asDecimal($interestRate);
        return $this;
    }

    public function setInterestValue($interestValue) {
        $this->interestValue = $this->asDecimal($interestValue);
        return $this;
    }

    public function setCurrency($currency) {
        $this->currency = $this->asInteger($currency);
        return $this;
    }

    public function setVoucherOrderOrigin($voucherOrderOrigin) {
        $this->voucherOrderOrigin = $voucherOrderOrigin;
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