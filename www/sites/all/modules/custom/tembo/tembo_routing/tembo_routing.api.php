<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Alter Routing
 * ------------------------------
 *
 * This hook is invoked once the Router is initialized
 * It Allows other routing to add Routes (The Symfony Way )
 *
 * Symfony 2 Routing :
 * @see http://symfony.com/doc/current/components/routing/introduction.html
 *

 * @param RouteCollection $application
 *   The RouteCollection object.
 */
function hook_route_alter(RouteCollection &$routes) {

    $routes->add('hello', new Route('/examples/form-example', array(
        '_controller' => '\Tembo\Sample\Routing\SampleController::indexAction'
    )));


}




/**
 * Called when Controller can't be found
 * ------------------------------
 * Very useful if you ant to launch a Conroller based on custom conditions
 * Implements HOOK_route_not_found
 * @param DrupalRequest $request
 * @param $vars
 */
function hook_route_not_found_alter(DrupalRequest &$request, &$vars){
    $menu_item = menu_get_item();

    //Provide Controller for user profile
    if($menu_item["path"] == "user/%"){
        $c = new \Icodrive\User\Routing\UserProfileController();
        $response = $c->indexAction($request);
        $vars = $response->getVariables();
    }

    return;
}
