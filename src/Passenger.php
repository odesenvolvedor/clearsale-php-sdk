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

class Passenger extends Entity implements \JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $companyMileCard;

    /**
     * @var string
     */
    private $mileCard;

    /**
     * @var int
     */
    private $identificationType;

    /**
     * @var string
     */
    private $identificationNumber;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var \DateTime
     */
    private $birthdate;

    /**
     * @var string
     */
    private $cpf;
    
    /**
     * @return int
     */
    public function getIdentificationType()
    {
        return $this->asInteger($this->identificationType);
    }

    /**
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->asDateTimeVal($this->birthdate);
    }
    
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setCompanyMileCard($companyMileCard) {
        $this->companyMileCard = $companyMileCard;
        return $this;
    }

    public function setMileCard($mileCard) {
        $this->mileCard = $mileCard;
        return $this;
    }

    public function setIdentificationType($identificationType) {
        $this->identificationType = $identificationType;
        return $this;
    }

    public function setIdentificationNumber($identificationNumber) {
        $this->identificationNumber = $identificationNumber;
        return $this;
    }

    public function setGender($gender) {
        $this->gender = $gender;
        return $this;
    }

    public function setBirthdate(\DateTime $birthdate) {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
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