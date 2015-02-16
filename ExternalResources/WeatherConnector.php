<?php
/**
 * Created by PhpStorm.
 * User: mrAndersen
 * Date: 16.02.2015
 * Time: 17:33
 */

namespace ExternalResources;

use System\Connector;
use System\ConnectorInterface;

class WeatherConnector extends Connector implements ConnectorInterface {

    /**
     * @return mixed Обрабатываем данные
     */
    public function processData()
    {
        $this->callUrl = 'http://my-weather-api.com';
        $result = $this->doApiCall();

        $normalizedData = new stdClass();

        foreach($result['SomeData'] as $k=>$v){
            $normalizedData->Degrees = $v['deg'];
            $normalizedData->Day = $result['Date'];
        }

        return $normalizedData;
    }
}