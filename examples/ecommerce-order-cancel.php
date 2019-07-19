<?php

date_default_timezone_set('America/Sao_Paulo');

require_once __DIR__ . '/../autoload.php';

try {
    $environment = new ClearSale\Environment\Environment(new ClearSale\Environment\Sandbox());
    
    $auth = new \ClearSale\Auth\Login('user', 'password');
    
    $orderRequest = new \ClearSale\Request\ClearSaleOrderRequest($environment, $auth);
    
    $orderCode = 'ORDER_EXAMPLE_2_0_1';
    
    print_r($orderRequest->statusUpdate($orderCode, \ClearSale\Status::CANCELLED_CUSTOMER));
        
} catch (ClearSale\Request\ClearSaleRequestException $exception) {
    print_r($exception);
}