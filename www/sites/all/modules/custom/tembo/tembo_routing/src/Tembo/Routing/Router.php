<?php
/**
 * Created by PhpStorm.
 * User: kalutheo
 * Date: 09/07/2014
 * Time: 15:04
 */

namespace Tembo\Routing;


use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class Router {


    protected $routes;
    protected $context;
    protected $matcher;

    /**
     * @var $request DrupalRequest
     */
    protected $request;

    /**
     * @var $response DrupalResponse
     */
    protected $response;


    /**
     * @param $vars
     * @return mixed
     */
    public function init(&$vars){


        $this->request = DrupalRequest::createFromGlobals();
        $this->context = new RequestContext();

        $this->routes = new RouteCollection();

        //Route Alter
        drupal_alter("route", $this->routes);


        $this->matcher = new UrlMatcher($this->routes,   $this->context);


        try {


            $header = drupal_get_http_header();
            $error_status = array(  "403 Forbidden", "404 Not Found");

            //IF DRUPAL SENDS 403 OR 404 Be silent :-)
            if(isset($header["status"]) AND in_array($header["status"], $error_status)){
                return;
            }



            $this->request->setVariables($vars);

            $uri = $this->request->query->get("q");
            $alias = url($uri);

            $this->request->attributes->add($this->matcher->match($alias));
            $this->response = call_user_func($this->request->attributes->get('_controller'), $this->request);

            $responseVar = $this->response->getVariables();
            $vars = (!empty($responseVar)) ? $responseVar : $vars;

            return  $this->response;


        } catch (ResourceNotFoundException $e) {
            $response =  $this->response;
            drupal_alter("route_not_found", $this->request,  $vars);
            return $response;
        }



    }


    /**
     * @param $routesPath
     * @param string $file
     * @return RouteCollection
     */
    public function loadYAML($routesPath, $file = "routing.yml"){
        $f = new FileLocator($routesPath);
        $loader = new YamlFileLoader($f);
        $routes = $loader->load($file);
        return $routes;
    }


    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }


    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }


    /**
     * @return mixed
     */
    public function getRoutes()
    {
        return $this->routes;
    }

} 