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

class Currency extends Entity
{
    const XUA = 965;
    const AFN = 971;
    const DZD = 12;
    const ARS = 32;
    const AMD = 51;
    const AWG = 533;
    const AUD = 36;
    const AZN = 944;
    const BSD = 44;
    const BHD = 48;
    const THB = 764;
    const PAB = 590;
    const BBD = 52;
    const BYR = 974;
    const BZD = 84;
    const BMD = 60;
    const VEF = 937;
    const BOB = 68;
    const XBA = 955;
    const XBB = 956;
    const XBD = 958;
    const XBC = 957;
    const BRL = 986;
    const BND = 96;
    const BGN = 975;
    const BIF = 108;
    const CAD = 124;
    const CVE = 132;
    const KYD = 136;
    const XOF = 952;
    const XAF = 950;
    const XPF = 953;
    const CLP = 152;
    const XTS = 963;
    const COP = 170;
    const KMF = 174;
    const CDF = 976;
    const BAM = 977;
    const NIO = 558;
    const CRC = 188;
    const HRK = 191;
    const CUP = 192;
    const CZK = 203;
    const GMD = 270;
    const DKK = 208;
    const MKD = 807;
    const DJF = 262;
    const STD = 678;
    const DOP = 214;
    const VND = 704;
    const XCD = 951;
    const EGP = 818;
    const SVC = 222;
    const ETB = 230;
    const EUR = 978;
    const FKP = 238;
    const FJD = 242;
    const HUF = 348;
    const GHS = 936;
    const GIP = 292;
    const XAU = 959;
    const HTG = 332;
    const PYG = 600;
    const GNF = 324;
    const GYD = 328;
    const HKD = 344;
    const UAH = 980;
    const ISK = 352;
    const INR = 356;
    const IRR = 364;
    const IQD = 368;
    const JMD = 388;
    const JOD = 400;
    const KES = 404;
    const PGK = 598;
    const LAK = 418;
    const KWD = 414;
    const MWK = 454;
    const AOA = 973;
    const MMK = 104;
    const GEL = 981;
    const LVL = 428;
    const LBP = 422;
    const ALL = 8;
    const HNL = 340;
    const SLL = 694;
    const LRD = 430;
    const LYD = 434;
    const SZL = 748;
    const LTL = 440;
    const LSL = 426;
    const MGA = 969;
    const MYR = 458;
    const MUR = 480;
    const MXN = 484;
    const MXV = 979;
    const MDL = 498;
    const MAD = 504;
    const MZN = 943;
    const BOV = 984;
    const NGN = 566;
    const ERN = 232;
    const NAD = 516;
    const NPR = 524;
    const ANG = 532;
    const ILS = 376;
    const RON = 946;
    const TWD = 901;
    const NZD = 554;
    const BTN = 64;
    const KPW = 408;
    const NOK = 578;
    const PEN = 604;
    const MRO = 478;
    const TOP = 776;
    const PKR = 586;
    const XPD = 964;
    const MOP = 446;
    const CUC = 931;
    const UYU = 858;
    const PHP = 608;
    const XPT = 962;
    const GBP = 826;
    const BWP = 72;
    const QAR = 634;
    const GTQ = 320;
    const ZAR = 710;
    const OMR = 512;
    const KHR = 116;
    const MVR = 462;
    const IDR = 360;
    const RUB = 643;
    const RWF = 646;
    const SHP = 654;
    const SAR = 682;
    const XDR = 960;
    const RSD = 941;
    const SCR = 690;
    const XAG = 961;
    const SGD = 702;
    const SBD = 90;
    const KGS = 417;
    const SOS = 706;
    const TJS = 972;
    const SSP = 728;
    const LKR = 144;
    const XSU = 994;
    const SDG = 938;
    const SRD = 968;
    const SEK = 752;
    const CHF = 756;
    const SYP = 760;
    const BDT = 50;
    const WST = 882;
    const TZS = 834;
    const KZT = 398;
    const TTD = 780;
    const MNT = 496;
    const TND = 788;
    const TRY_ = 949;
    const TMT = 934;
    const AED = 784;
    const UGX = 800;
    const COU = 970;
    const CLF = 990;
    const UYI = 940;
    const USD = 840;
    const USN = 997;
    const USS = 998;
    const UZS = 860;
    const VUV = 548;
    const CHE = 947;
    const CHW = 948;
    const KRW = 410;
    const YER = 886;
    const JPY = 392;
    const CNY = 156;
    const ZMK = 894;
    const ZWL = 932;
    const PLN = 985;
}
