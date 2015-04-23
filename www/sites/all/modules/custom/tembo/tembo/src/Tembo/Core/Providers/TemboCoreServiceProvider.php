<?php
/**
 * Created by PhpStorm.
 * User: kalutheo
 * Date: 08/07/2014
 * Time: 09:32
 */

namespace Tembo\Core\Providers;


use Pimple\Container;
use Symfony\Component\EventDispatcher\EventDispatcher;

class TemboCoreServiceProvider extends BaseServiceProvider{


    /**
     * @param Container $app
     */
    public function register(Container $app)
    {

        parent::register($app);

        /**
         * ==== Register Symfony Global Dispatcher ===========
         *
         *  Dispatcher might be used by other modules in order to implement observer Pattern ( Pub/Sub )
         */
        $dispatcher = new EventDispatcher();
        $this->app["tembo.dispatcher"] = $dispatcher;
        return;
    }
}