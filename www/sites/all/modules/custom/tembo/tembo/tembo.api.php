<?php


/**
 * Application Registration
 * ------------------------------
 *
 * This hook is invoked once the Application Container is Ready
 * Other modules can implement this hook in order to add additional parameters/services in the container
 * Tembo container uses Pimple
 *
 * Dependeny Injection :
 * @see http://pimple.sensiolabs.org/
 *
 * Services Providers :
 * @see http://pimple.sensiolabs.org/ (Extending a Container)
 * @see http://silex.sensiolabs.org/doc/providers.html
 * @see http://laravel.com/docs/ioc#service-providers
 *
 * @param \Tembo\Core\App $application
 *   The Application object.
 */
function hook_app_registered(\Tembo\Core\App $application) {

    // == SOLUTION 1
    //Register your servie in Container here
    $application["myService"] = function(){

    };


    // == SOLUTION 2 ( Best practice)
    //Create a Service Provider Class dedicated to Service registration
    $sp = new MyServiceProvider();
    $sp->register();

}