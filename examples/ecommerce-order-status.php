<?php

date_default_timezone_set('America/Sao_Paulo');

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $environment = new ClearSale\Environment\Environment(new ClearSale\Environment\Sandbox());
    
    $auth = new \ClearSale\Auth\Login('c', 'c');
    
    $orderRequest = new \ClearSale\Request\ClearSaleOrderRequest($environment, $auth);
    
    $orderCode = 'ORDER_EXAMPLE_2_0_1';
    
    print_r($orderRequest->statusCheck($orderCode));    
    
} catch (ClearSale\Request\ClearSaleRequestException $exception) {
    $error = $exception->getClearSaleError(); 
    echo $error->getMessage();
}