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

abstract class Entity
{
    /**
     * @param string|\DateTime $val
     * @return \DateTime|null
     */
    protected function asDateTimeVal($val)
    {
        if (is_null($val)) {
            return null;
        }
        if (is_string($val)) {
            $asDate = strlen($val) == 10;
            $dateTime = \DateTime::createFromFormat('Y-m-d H:i:s', $asDate ? $val . ' 00:00:00' : $val);
            return $dateTime->format('Y-m-d H:i:s.u');
        }
        return $val;
    }

    /**
     * @param string|int $val
     * @return \DateTime|null
     */
    protected function asInteger($val)
    {
        if (is_null($val)) {
            return null;
        }
        if (is_string($val)) {
            return intval($val);
        }
        return $val;
    }

    /**
     * @param string|float $val
     * @return float|null
     */
    protected function asDecimal($val)
    {
        if (is_null($val)) {
            return null;
        }
        if (is_string($val)) {
            return floatval($val);
        }
        return $val;
    }

    /**
     * @param string|int|bool $val
     * @return bool|null
     */
    protected function asBool($val)
    {
        if (is_null($val)) {
            return null;
        }
        if (!is_bool($val)) {
            return boolval($val);
        }
        return $val;
    }

    protected function asString($val)
    {
        if (is_null($val)) {
            return null;
        }
        if (!is_string($val)) {
            return strval($val);
        }
        return $val;
    }
}
