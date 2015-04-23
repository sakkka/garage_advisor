<?php
/**
 * Created by PhpStorm.
 * User: kalutheo
 * Date: 08/07/2014
 * Time: 13:51
 */

namespace Tembo\Theme;


use Tembo\Core\Exception\TemboException;

class Theme {


    /**
     *  Register A new Twig Template
     * -------------------------------------------------------------
     * @param $hook
     * @param $path (template path)
     * @param $hooks
     * @param $option
     * @param null $view_composer_class (#pre_render)
     *
     * @see http://laravel.com/docs/responses#view-composers
     *
     * View composers are callbacks or class methods that are called when a view is rendered.
     * If you have data that you want bound to a given view each time that view is rendered throughout your application, a view composer can organize that code into a single location.
     * Therefore, view composers may function like "view models" or "presenters".
     *
     * @throws \Tembo\Core\Exception\TemboException
     */
    public static function register($hook, $path, &$hooks, $view_composer_class = NULL, $option = array()){

        $app = tembo_app();

        if(!$app->offsetExists("tembo.theme_function")){
            throw new TemboException("No Theme Function have been defined. Please activate a tembo template engine ( such as tembo_twig )");
        }

        $fn = $app["tembo.theme_function"];
        $hooks[$hook] = array(
            'function' => $fn,
            'path' => $path
        );

        $hooks[$hook] = array_merge($hooks[$hook], $option);

        $hooks[$hook]["#pre_render"] = $view_composer_class;
    }


    /**
     * @param $hook
     * @param $path
     * @param $hooks
     * @param null $view_composer_class
     * @param array $option
     */
    public static function registerForm($hook, $path, &$hooks, $view_composer_class = NULL, $option = array()){

        $option = array(
            'render element' => 'form'
        );

        static::register($hook, $path, $hooks, $view_composer_class , $option);
        return;
    }


} 