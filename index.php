<?php

use ExternalResources\WeatherConnector;
use ExternalResources\CurrencyConnector;

spl_autoload_extensions(".php");
spl_autoload_register();

$weather = new WeatherConnector();
$weather->setApiType($weather::API_TYPE_XML);
$readable[] = $weather->processData();

$currency = new CurrencyConnector();
$currency->setApiType($currency::API_TYPE_JSON);
$readable[] = $currency->processData();

print_r($readable);

