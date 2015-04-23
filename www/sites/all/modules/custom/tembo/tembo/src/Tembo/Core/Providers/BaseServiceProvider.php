<?php
/**
 * Created by PhpStorm.
 * User: kalutheo
 * Date: 08/07/2014
 * Time: 09:33
 */

namespace Tembo\Core\Providers;


use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Tembo\Core\App;
use Tembo\Core\Exception\TemboException;

abstract class BaseServiceProvider implements ServiceProviderInterface{


    /**
     * @var $app App
     */
    protected $app;

    public function register(Container $app){
        $this->app = $app;
    }
}