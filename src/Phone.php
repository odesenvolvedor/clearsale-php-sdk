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

class Phone extends Entity implements \JsonSerializable
{
    const UNDEFINED = 0;
    const HOME = 1;
    const WORK = 2;
    const MESSAGES = 3;
    const BILLING = 4;
    const TEMPORARY = 5;
    const MOBILE = 6;

    /**
     * @var int
     */
    private $type;

    /**
     * @var int
     */
    private $ddi;

    /**
     * @var int
     */
    private $ddd;

    /**
     * @var int
     */
    private $number;

    /**
     * @var string
     */
    private $extension;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->asInteger($this->type);
    }

    /**
     * @return int
     */
    public function getDdi()
    {
        return $this->asInteger($this->ddi);
    }

    /**
     * @return int
     */
    public function getDdd()
    {
        return $this->asInteger($this->ddd);
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->asInteger($this->number);
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        if ($type < self::UNDEFINED || $type > self::MOBILE) {
            throw new \InvalidArgumentException('Invalid Phone Type: ' . $type);
        }
        $this->type = $type;
        return $this;
    }
    
    public function setDdi($ddi) {
        $this->ddi = $this->asInteger($ddi);
        return $this;
    }

    public function setDdd($ddd) {
        $this->ddd = $this->asInteger($ddd);
        return $this;
    }

    public function setNumber($number) {
        $this->number = $this->asInteger($number);
        return $this;
    }

    public function setExtension($extension) {
        $this->extension = $this->asString($extension);
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