<?php
/**
 * Created by PhpStorm.
 * User: moe
 * Date: 14/08/2014
 * Time: 09:22
 */

namespace Tembo\Services\Model;


interface ICRUDable
{
    public function create( $data );
    public function retrieve( $id );
    public function update( $id, $data );
    public function delete( $id );
}