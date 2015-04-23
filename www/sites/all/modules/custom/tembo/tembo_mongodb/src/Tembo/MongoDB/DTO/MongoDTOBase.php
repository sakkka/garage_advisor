<?php
/**
 * Created by PhpStorm.
 * User: moe
 * Date: 02/04/15
 * Time: 17:30
 */

namespace Tembo\MongoDB\DTO;


class MongoDTOBase
{
    protected function _processData( $data )
    {
        foreach( $data as $key => $value )
        {
            if(isset($data[$key]) && method_exists($this, "set".ucfirst($key))) $this->{"set".ucfirst($key)}($data[$key]);
        }
    }
}