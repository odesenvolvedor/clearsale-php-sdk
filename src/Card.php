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

class Card extends Entity implements \JsonSerializable
{
    const DINERS = 1;
    const MASTERCARD = 2;
    const VISA = 3;
    const OTHERS = 4;
    const AMERICAN_EXPRESS = 5;
    const HIPERCARD = 6;
    const AURA = 7;
    const ELO_CARD = 10;
    const LEADER_CARD = 50;
    const FORTBRASIL = 100;
    const SOROCRED = 101;
    const DEBIT_CARD = 102;
    const MAIS_CARD = 103;
    const CSA_CARD = 105;

    /**
     * @var string
     */
    protected $number;

    /**
     * @var string
     */
    protected $hash;

    /**
     * @var string
     */
    protected $bin;

    /**
     * @var string
     */
    protected $end;

    /**
     * @var int
     */
    protected $type;

    /**
     * @var string
     */
    protected $validityDate;

    /**
     * @var string
     */
    protected $ownerName;

    /**
     * @var string
     */
    protected $document;

    /**
     * @var string
     */
    protected $nsu;

    /**
     * @return int
     */
    public function getType()
    {
        return $this->asInteger($this->type);
    }
    
    public function setNumber($number) {
        $this->number = $number;
        return $this;
    }

    public function setHash($hash) {
        $this->hash = $hash;
        return $this;
    }

    public function setBin($bin) {
        $this->bin = $bin;
        return $this;
    }

    public function setEnd($end) {
        $this->end = $end;
        return $this;
    }

    public function setType($type) {
        $this->type = $this->asInteger($type);
        return $this;
    }

    public function setValidityDate($validityDate) {
        $this->validityDate = $validityDate;
        return $this;
    }

    public function setOwnerName($ownerName) {
        $this->ownerName = $ownerName;
        return $this;
    }

    public function setDocument($document) {
        $this->document = $document;
        return $this;
    }

    public function setNsu($nsu) {
        $this->nsu = $nsu;
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