<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kalutheo
 * Date: 20/05/13
 * Time: 09:06
 * To change this template use File | Settings | File Templates.
 */

namespace Tembo\Core\Config;


use SugiPHP\Config\Exception;
use SugiPHP\Config\FileLocator;
use SugiPHP\Config\YamlLoader;
use SugiPHP\Config\JsonLoader;
use SugiPHP\Config\NativeLoader;
use Symfony\Component\HttpFoundation\File\MimeType\ExtensionGuesser;

class ConfigFactory {

    public static function load($path, $file){



        $infos = pathinfo($file);
        $locator = new FileLocator(array($path));

        switch($infos["extension"]){


            case "yml":
            case "yaml":
                $loader = new YamlLoader($locator);
                break;
            case "json":
                $loader = new JsonLoader($locator);
                break;
            case "php":
            default:
                $loader = new NativeLoader($locator);
                break;
        }



        $data = $loader->load($file);



        if(!file_exists($path . DS . $file)){
            $path = $path . DS . $file;
            throw new Exception("$path can't be found");
        }

        return $data;
    }
}