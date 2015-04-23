<?php
/**
 * Created by PhpStorm.
 * User: moe
 * Date: 14/08/2014
 * Time: 15:30
 */

namespace Tembo\Services\Model;


use Tembo\Services\StatusCode;

abstract class BaseService
{
    protected function _generateResponse($response, $status = StatusCode::OK, $success = TRUE)
    {
        return array(
            "success" => $success,
            "status" => $status,
            "data" => $response
        );
    }
} 