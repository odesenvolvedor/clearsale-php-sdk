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

class Delivery extends Entity
{
    const OTHERS = 0;
    const NORMAL = 1;
    const GUARANTEED = 2;
    const EXPRESS_BRAZIL = 3;
    const EXPRESS_SAO_PAULO = 4;
    const HIGH = 5;
    const ECONOMIC = 6;
    const SCHEDULEID = 7;
    const EXTRA_FAST = 8;
    const VIA_PRINT = 9;
    const VIA_APP = 10;
    const MAIL = 11;
    const MOTOCYCLE_COURIER = 12;
    const WITHDRAWL_AT_TICKET_BOX = 13;
    const WITHDRAWL_AT_PARTINER_STORE = 14;
    const TICKET_CREDIT_CARD = 15;
    const WITHDRAWL_AT_STORE = 16;
    const WITHDRAWL_VIA_LOCKERS = 17;
    const WITHDRAWL_AT_MAIL_AGENCY = 18;
    const GUARANTEED_DELIVERY_SAME_DAY_PURCHASE = 19;
    const GUARANTEED_DELIVERY_AFTER_DAY_PURCHASE = 20;
    const WITHDRAWL_AT_STORE_EXPRESS = 21;
}
