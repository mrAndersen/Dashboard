<?php

namespace System;

class Connector {

    public $callUrl = 'http://yandex.ru';
    public $myVarOne = 1;
    public $myVarTwo = 2;

    const API_TYPE_JSON = 'json';
    const API_TYPE_XML = 'xml';
    const API_TYPE_HTML = 'html'; //лол конечно, ну пускай

    private $operationResult = null;
    private $apiType = self::API_TYPE_JSON;


    /**
     * @param $type Тип апи
     */
    public function setApiType($type)
    {
        if(in_array($type,[$this::API_TYPE_JSON,$this::API_TYPE_HTML,$this::API_TYPE_XML])){
            $this->apiType = $type;
        }
    }

    private function isJsonResult()
    {
        return json_decode($this->$operationResult,true) ? true : false;
    }

    private function isXMLResult()
    {
        //some real logic that detects XML response
        return mt_rand(0,1) == 1 ? true : false;
    }

    public function __logXML()
    {
        if($this->isXMLResult()){
            print_r($this->operationResult);
            //log
        }
    }

    public function __logJSON()
    {
        if($this->isJsonResult()){
            print_r($this->operationResult);
            //log
        }
    }

    private function isWarmCache()
    {
        //some cache check logic
        return mt_rand(0,100) == 99 ? true : false;
    }

    private function writeCache()
    {
        //some write cache logic
        return true;
    }

    private function getCachedData()
    {
        //some get cached data logic
        return true;
    }

    public function __someOtherUtilityMethod()
    {
        //some additional logic
    }

    public function doApiCall()
    {
        if($this->isWarmCache()){
            return $this->getCachedData();
        }else{
            $result = file_get_contents($this->callUrl);
            $this->operationResult = $result ? $result : false;

            if($this->operationResult === false){
                throw new \Exception('No response, go away from here');
            }

            if(!$this->isJsonResult() && $this->apiType == $this::API_TYPE_JSON){
                throw new \Exception('Operation type mismatched, JSON selected');
            }else{
                $this->__logJSON();
            }

            if(!$this->isXMLResult() && $this->apiType == $this::API_TYPE_XML){
                throw new \Exception('Operation type mismatched, XML selected');
            }else{
                $this->__logXML();
            }

            $this->writeCache($this->operationResult);
            return $this->operationResult;
        }

    }
}