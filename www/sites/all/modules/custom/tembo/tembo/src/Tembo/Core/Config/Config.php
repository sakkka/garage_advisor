<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kalutheo
 * Date: 20/05/13
 * Time: 09:16
 * To change this template use File | Settings | File Templates.
 */

namespace Tembo\Core\Config;

use SugiPHP\Config\Config as SugiConf;

class Config extends SugiConf{

    /**
     * Registers a config variable
     *
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        if (strpos($key, ".") === false) {
            $this->registry[$key] = $value;
        } else {
            $segments = explode(".", $key);
            foreach($segments as $seg){
                $value = array(array_pop($segments) => $value);
            }

            $this->registry = array_replace_recursive($this->registry, $value);
        }
    }

}