<?php

namespace Tembo\Core\Config;
/**
 * Created by JetBrains PhpStorm.
 * User: kalutheo
 * Date: 20/05/13
 * Time: 09:01
 * To change this template use File | Settings | File Templates.
 */

class Conf{


    public static $tokens = array();
    private static $conf;


    public static function addTokens($tokens){
        $tokens = (array) $tokens;
        static::$tokens = array_merge(static::$tokens, $tokens);
    }

    /**
     * @return Config
     */
    public static function make(){

        if(!isset(static::$conf)){
            static::$conf = new Config();
        }
        return static::$conf;
    }

    /**
     * @param $id
     * @param $path
     * @param $file
     * @return mixed|null
     */
    public static function load($id, $path, $file){
        $data = ConfigFactory::load($path, $file);
        Conf::set($id, $data);
        return $data;
    }



    /**
     * @param $id
     * @param $data
     */
    public static function set($id, $data){
        $replace = static::$tokens;
        $subject = $data;
        $data = str_replace(array_keys($replace), array_values($replace), $subject);
        static::make()->set($id, $data);
    }

    /**
     * @param $id
     * @param bool $parse
     * @return mixed
     */
    public static function get($id){
        $data =  static::make()->get($id);
        return $data;
    }




}