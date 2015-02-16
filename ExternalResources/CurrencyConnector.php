<?php
/**
 * Created by PhpStorm.
 * User: mrAndersen
 * Date: 16.02.2015
 * Time: 17:33
 */

namespace ExternalResources;

class CurrencyConnector extends Connector implements ConnectorInterface {

    /**
     * @return mixed Обрабатываем данные
     */
    public function processData()
    {

        $this->callUrl = 'http://my-currency-api.com';
        $result = $this->doApiCall();

        $normalizedData = new stdClass();

        foreach($result['SomeData'] as $k=>$v){
            $normalizedData->CurrencyRate = $v['coolName1']['CoolName2']->CoolName3->Rate;
            $normalizedData->Day = $result['Date'];
        }

        return $normalizedData;
    }
}