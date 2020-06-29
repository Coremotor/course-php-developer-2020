<?php

function vd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}
//отрабатывает нормально

//$client = new SoapClient('https://www.cbr.ru/DailyInfoWebServ/DailyInfo.asmx?WSDL');
//vd($client->__getFunctions());


//выводит ошибку:Fatal error: Uncaught SoapFault exception:
// [WSDL] SOAP-ERROR: Parsing WSDL:
// Couldn't load from 'https://api.n11.com/ws/CityService.wsdl' :
// failed to load external entity "https://api.n11.com/ws/CityService.wsdl"
// in C:\OpenServer\domains\soap\index.php:15 Stack trace: #0 C:\OpenServer\domains\soap\index.php(15):
// SoapClient->SoapClient() #1 {main} thrown in C:\OpenServer\domains\soap\index.php on line 15

//$client = new SoapClient('https://api.n11.com/ws/CityService.wsdl');
//vd($client->__getFunctions());




