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

use ClearSale\ClearSaleInterface;

class Order extends Entity implements ClearSaleSerializable, ClearSaleInterface
{
    const PRODUCT_OTHER = -1;
    const PRODUCT_APPLICATION = 1;
    const PRODUCT_TOTAL = 3;
    const PRODUCT_TOTAL_GUARANTEED = 4;
    const PRODUCT_SCORE = 9;
    const PRODUCT_REAL_TIME_DECISION = 10;
    const PRODUCT_TICKETS = 11;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $sessionID;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $b2bB2c;

    /**
     * @var float
     */
    private $itemValue;

    /**
     * @var float
     */
    private $totalValue;

    /**
     * @var integer
     */
    private $numberOfInstallments;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var bool
     */
    private $isGift;

    /**
     * @var string
     */
    private $giftMessage;

    /**
     * @var string
     */
    private $observation;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var string
     */
    private $origin;

    /**
     * @var string
     */
    private $channelID;

    /**
     * @var string
     */
    private $packageID;
    
    /**
     * @var \DateTime
     */
    private $reservationDate;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $nationality;

    /**
     * @var integer
     */
    private $product;

    /**
     * @var integer
     */
    private $customSla;

    /**
     * @var string
     */
    private $bankAuthentication;

    /**
     * @var OrderList
     */
    private $list;

    /**
     * @var PurchaseInformation
     */
    private $purchaseInformation;

    /**
     * @var SocialNetwork
     */
    private $socialNetwork;

    /**
     * @var Billing
     */
    private $billing;

    /**
     * @var Shipping
     */
    private $shipping;

    /**
     * @var Payment[]
     */
    private $payments = [];

    /**
     * @var Item[]
     */
    private $items = [];

    /**
     * @var Passenger[]
     */
    private $passengers = [];

    /**
     * @var Connection[]
     */
    private $connections = [];

    /**
     * @var Hotel[]
     */
    private $hotels = [];

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
    
    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
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
    public function getItemValue()
    {
        return $this->asDecimal($this->itemValue);
    }

    /**
     * @return float
     */
    public function getTotalValue()
    {
        return $this->asDecimal($this->totalValue);
    }

    /**
     * @return int
     */
    public function getNumberOfInstallments()
    {
        return $this->asInteger($this->numberOfInstallments);
    }

    /**
     * @return bool
     */
    public function getIsGift()
    {
        return $this->asBool($this->isGift);
    }

    /**
     * @return \DateTime
     */
    public function getReservationDate()
    {
        return $this->asDateTimeVal($this->reservationDate);
    }

    /**
     * @return int
     */
    public function getProduct()
    {
        return $this->asInteger($this->product);
    }

    /**
     * @return int
     */
    public function getCustomSla()
    {
        return $this->asInteger($this->customSla);
    }

    /**
     * @return OrderList
     */
    public function getList()
    {
        $this->list = empty($this->list) ? new OrderList() : $this->list;
        return $this->list;
    }

    /**
     * @return PurchaseInformation
     */
    public function getPurchaseInformation()
    {
        $this->purchaseInformation = empty($this->purchaseInformation) ? new PurchaseInformation() : $this->purchaseInformation;
        return $this->purchaseInformation;
    }

    /**
     * @return SocialNetwork
     */
    public function getSocialNetwork()
    {
        return $this->socialNetwork;
    }

    /**
     * @return Billing
     */
    public function getBilling()
    {
        $this->billing = empty($this->billing) ? new Billing() : $this->billing;
        return $this->billing;
    }

    /**
     * @return Shipping
     */
    public function getShipping()
    {
        $this->shipping = empty($this->shipping) ? new Shipping() : $this->shipping;
        return $this->shipping;
    }

    /**
     * @return Payment[]
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * @return Item[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return Passenger[]
     */
    public function getPassengers()
    {
        return $this->passengers;
    }

    /**
     * @return Connection[]
     */
    public function getConnections()
    {
        return $this->connections;
    }

    /**
     * @return Hotel[]
     */
    public function getHotels()
    {
        return $this->hotels;
    }
    
    /**
     * @return string
     */
    public function getPackageID() {
        return $this->packageID;
    }

    /**
     * @return mixed
     */
    public function getOrders()
    {
        return $this->orders;
    }

        /**
     * @param OrderList $list
     */
    public function setList(OrderList $list = null)
    {
        $this->list = $list;
        return $this;
    }

    /**
     * @param PurchaseInformation $purchaseInformation
     */
    public function setPurchaseInformation(PurchaseInformation $purchaseInformation = null)
    {
        $this->purchaseInformation = $purchaseInformation;
        return $this;
    }

    /**
     * @param SocialNetwork $socialNetwork
     */
    public function setSocialNetwork(SocialNetwork $socialNetwork = null)
    {
        $this->socialNetwork = $socialNetwork;
        return $this;
    }

    /**
     * @param Billing $billing
     */
    public function setBilling(Billing $billing = null)
    {
        $this->billing = $billing;
        return $this;
    }

    /**
     * @param Shipping $shipping
     */
    public function setShipping(Shipping $shipping = null)
    {
        $this->shipping = $shipping;
        return $this;
    }

    /**
     * @param Payment[] $payments
     */
    public function setPayments(array $payments = [])
    {
        foreach ($payments as $payment) {
            if (!($payment instanceof Payment)) {
                throw new \UnexpectedValueException('Invalid Payment Object');
            }
        }
        $this->payments = $payments;
        return $this;
    }

    /**
     * @param Item[] $items
     */
    public function setItems(array $items = [])
    {
        foreach ($items as $item) {
            if (!($item instanceof Item)) {
                throw new \UnexpectedValueException('Invalid Item Object');
            }
        }
        $this->items = $items;
        return $this;
    }

    /**
     * @param Passenger[] $passengers
     */
    public function setPassengers(array $passengers = [])
    {
        foreach ($passengers as $passenger) {
            if (!($passenger instanceof Passenger)) {
                throw new \UnexpectedValueException('Invalid Passenger Object');
            }
        }
        $this->passengers = $passengers;
        return $this;
    }

    /**
     * @param Connection[] $connections
     */
    public function setConnections(array $connections = [])
    {
        foreach ($connections as $connection) {
            if (!($connection instanceof Connection)) {
                throw new \UnexpectedValueException('Invalid Connection Object');
            }
        }
        $this->connections = $connections;
        return $this;
    }

    /**
     * @param Hotel[] $hotels
     */
    public function setHotels(array $hotels = [])
    {
        foreach ($hotels as $hotel) {
            if (!($hotel instanceof Hotel)) {
                throw new \UnexpectedValueException('Invalid Hotel Object');
            }
        }
        $this->hotels = $hotels;
        return $this;
    }
    
    public function setCode($code) {
        $this->code = $this->asString($code);
        return $this;
    }

    public function setSessionID($sessionID) {
        $this->sessionID = $sessionID;
        return $this;
    }

    public function setDate($date) {
        $this->date = $this->asDateTimeVal($date);
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setB2bB2c($b2bB2c) {
        $this->b2bB2c = $b2bB2c;
        return $this;
    }

    public function setItemValue($itemValue) {
        $this->itemValue = $this->asDecimal($itemValue);
        return $this;
    }

    public function setTotalValue($totalValue) {
        $this->totalValue = $this->asDecimal($totalValue);
        return $this;
    }

    public function setNumberOfInstallments($numberOfInstallments) {
        $this->numberOfInstallments = $numberOfInstallments;
        return $this;
    }

    public function setIp($ip) {
        $this->ip = $ip;
        return $this;
    }

    public function setIsGift($isGift) {
        $this->isGift = $this->asBool($isGift);
        return $this;
    }

    public function setGiftMessage($giftMessage) {
        $this->giftMessage = $giftMessage;
        return $this;
    }

    public function setObservation($observation) {
        $this->observation = $observation;
        return $this;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    public function setOrigin($origin) {
        $this->origin = $origin;
        return $this;
    }

    public function setChannelID($channelID) {
        $this->channelID = $channelID;
        return $this;
    }

    public function setReservationDate($reservationDate) {
        $this->reservationDate = $this->asDateTimeVal($reservationDate);
        return $this;
    }

    public function setCountry($country) {
        $this->country = $country;
        return $this;
    }

    public function setNationality($nationality) {
        $this->nationality = $nationality;
        return $this;
    }

    public function setProduct($product) {
        $this->product = $product;
        return $this;
    }

    public function setCustomSla($customSla) {
        $this->customSla = $customSla;
        return $this;
    }

    public function setBankAuthentication($bankAuthentication) {
        $this->bankAuthentication = $bankAuthentication;
        return $this;
    }
    
   /**
     * @param $json
     *
     * @return Order
     */
    public static function fromJson($json)
    {
        $object = json_decode($json);
        $order = new Order();
        $order->populate($object);

        foreach ($order as $k => $v) {
            if (empty($v)) {
                unset($order->$k);
            }
        }
        return $order;
    }

    /**
     * @param \stdClass $data
     */
    public function populate(\stdClass $data)
    {
        $dataProps = get_object_vars($data);

        if (!empty($dataProps)) {
            foreach ($dataProps as $k => $v) {
                $this->$k = $v;
            }
        }
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