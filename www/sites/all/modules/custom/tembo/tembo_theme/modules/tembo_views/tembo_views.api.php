<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Alter View Custom Template Suggestion
 * --------------------------------------
 *
 * The tembo_views module provides a default hook name for customizing View Rendering via tembo_render
 * The default key value is : view_name-display_id ( ex : my_home_view-block_1)
 *
 * This hook allows other modules to override template
 * @param  $view
 *   The View object.
 */
function hook_views_custom_template_alter(&$view) {


    switch($view->name){
        case "my_home_view":

            //myCustomTemplateForHome must be defined in a HOOK_theme in your templates or modules
            $view->template = "myCustomTemplateForHome";
            break;

        case "articles_view":

            //myCustomTemplateForArticles must be defined in a HOOK_theme in your templates or modules
            $view->template = "myCustomTemplateForArticles";
            break;

    }



}