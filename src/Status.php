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

class Status implements \JsonSerializable
{
    const APPROVAL_AUTOMATIC = 'APA';
    const APPROVAL_MANUAL = 'APM';
    const APPROVAL_POLICIES = 'APP';
    const DENIED_AUTOMATIC = 'RPA';
    const DENIED_POLICIES = 'RPP';
    const DENIED_WITHOUT_SUSPICION = 'RPM';
    const MANUAL_ANALYSIS = 'AMA';
    const NEW_ORDER = 'NVO';
    const SUSPENSION_MANUAL = 'SUS';
    const CANCELLED_CUSTOMER = 'CAN';
    const FRAUD_CONFIRMED = 'FRD';

    const STATUS_NEW = 0;
    const STATUS_APPROVED = 9;
    const STATUS_CANCELLED = 41;
    const STATUS_DENIED = 45;

    const PAYMENT_APPROVED = 'PGA';
    const PAYMENT_DENIED = 'PGR';
    
    private $status;
    
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
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
