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

class Shipping extends Entity implements \JsonSerializable
{
    const PERSON_NATURAL = 1;
    const PERSON_LEGAL = 2;

    /**
     * @var string
     */
    private $clientID;

    /**
     * @var int
     */
    private $type;

    /**
     * @var string
     */
    private $primaryDocument;

    /**
     * @var string
     */
    private $secondaryDocument;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $birthDate;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var Address
     */
    private $address;

    /**
     * @var Phone[]
     */
    private $phones;
    
    /**
     * @var string
     */
    private $deliveryType;

    /**
     * @var string
     */
    private $deliveryTime;

    /**
     * @var float
     */
    private $price;

    /**
     * @var string
     */
    private $pickUpStoreDocument;

    /**
     * @return int
     */
    public function getDeliveryType()
    {
        return $this->deliveryType;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->asDecimal($this->price);
    }

    /**
     * @param string $deliveryType
     */
    public function setDeliveryType($deliveryType)
    {
        if ($deliveryType < Delivery::OTHERS || $deliveryType > Delivery::WITHDRAWL_AT_STORE_EXPRESS) {
            throw new \InvalidArgumentException('Invalid Delivery Type: ' . $deliveryType);
        }
        $this->deliveryType = $this->asString($deliveryType);
        return $this;
    }
    
    public function setDeliveryTime($deliveryTime) {
        $this->deliveryTime = $deliveryTime;
        return $this;
    }

    public function setPrice($price) {
        $this->price = $this->asDecimal($price);
        return $this;
    }

    public function setPickUpStoreDocument($pickUpStoreDocument) {
        $this->pickUpStoreDocument = $pickUpStoreDocument;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->asDateTimeVal($this->birthDate);
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->asInteger($this->type);
    }

    public function getAddress(): Address {
        $this->address = empty($this->address) ? new Address() : $this->address;
        return $this->address;
    }
        
    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $gender = strtoupper($gender);
        if ($gender !== Gender::MALE && $gender !== Gender::FEMALE) {
            throw new \InvalidArgumentException('Invalid gender: ' . $gender);
        }
        $this->gender = $gender;
        return $this;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        if ($type !== self::PERSON_NATURAL && $type !== self::PERSON_LEGAL) {
            throw new \InvalidArgumentException('Invalid Person Type: ' . $type);
        }
        $this->type = $type;
        return $this;
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
     * @param Phone[] $phones
     */
    public function setPhones(array $phones)
    {
        foreach ($phones as $phone) {
            if (!($phone instanceof Phone)) {
                throw new \UnexpectedValueException('Invalid Phone Object');
            }
        }
        $this->phones = $phones;
        return $this;
    }
    
    public function setClientID($clientID) {
        $this->clientID = $this->asString($clientID);
        return $this;
    }

    public function setPrimaryDocument($primaryDocument) {
        $this->primaryDocument = $primaryDocument;
        return $this;
    }

    public function setSecondaryDocument($secondaryDocument) {
        $this->secondaryDocument = $secondaryDocument;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setBirthDate($birthDate) {
        $this->birthDate = $this->asDateTimeVal($birthDate);
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
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