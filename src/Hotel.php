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

class Hotel extends Entity implements \JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $country;

    /**
     * @var \DateTime
     */
    private $reservationDate;

    /**
     * @var \DateTime
     */
    private $reserveExpirationDate;

    /**
     * @var \DateTime
     */
    private $checkInDate;

    /**
     * @var \DateTime
     */
    private $checkOutDate;

    /**
     * @return \DateTime
     */
    public function getReservationDate()
    {
        return $this->asDateTimeVal($this->reservationDate);
    }

    /**
     * @return \DateTime
     */
    public function getReserveExpirationDate()
    {
        return $this->asDateTimeVal($this->reserveExpirationDate);
    }

    /**
     * @return \DateTime
     */
    public function getCheckInDate()
    {
        return $this->asDateTimeVal($this->checkInDate);
    }

    /**
     * @return \DateTime
     */
    public function getCheckOutDate()
    {
        return $this->asDateTimeVal($this->checkOutDate);
    }
    
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setCity($city) {
        $this->city = $city;
        return $this;
    }

    public function setState($state) {
        $this->state = $state;
        return $this;
    }

    public function setCountry($country) {
        $this->country = $country;
        return $this;
    }

    public function setReservationDate(\DateTime $reservationDate) {
        $this->reservationDate = $reservationDate;
        return $this;
    }

    public function setReserveExpirationDate(\DateTime $reserveExpirationDate) {
        $this->reserveExpirationDate = $reserveExpirationDate;
        return $this;
    }

    public function setCheckInDate(\DateTime $checkInDate) {
        $this->checkInDate = $checkInDate;
        return $this;
    }

    public function setCheckOutDate(\DateTime $checkOutDate) {
        $this->checkOutDate = $checkOutDate;
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