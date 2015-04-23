<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Alter Twig
 * ------------------------------
 * @param Twig_Environment $application
 *   The Twig object.
 */
function hook_twig_alter(Twig_Environment &$twig) {

    /**
     * ------------------------------------------------------------
     *  Add your Custom filters here
     * ------------------------------------------------------------
     */
    $custom_func = function($timestamp, $format){
        return format_date($timestamp, "custom", $format);
    };
    $filter = new Twig_SimpleFilter("format_date", $custom_func);
    $twig->addFilter("format_date", $filter);


}