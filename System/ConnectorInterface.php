<?php
/**
 * Created by PhpStorm.
 * User: mrAndersen
 * Date: 16.02.2015
 * Time: 17:34
 */

namespace System;

interface ConnectorInterface {

    /**
     * @return mixed Делаем запрос к стороннему ресурсу
     */
    public function doApiCall();

    /**
     * @return mixed Обрабатываем данные
     */
    public function processData();

}