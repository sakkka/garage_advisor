<?php
/**
 * Created by PhpStorm.
 * User: moe
 * Date: 18/08/2014
 * Time: 10:25
 */

namespace Tembo\Core\Data\Views;


class ViewsHelper
{

    /**
     * @param $viewName
     * @param null $filters
     * @param null $items_per_page
     * @param null $arguments
     * @param null $display
     * @return array
     */
    public static  function execute( $viewName,
                                     $filters = NULL,
                                     $items_per_page = NULL,
                                     $arguments = NULL,
                                     $display = NULL)
    {
        $view = views_get_view( $viewName );
        if(isset($display)) $view->set_display($display);
        if(isset($filters)) $view->set_exposed_input($filters);
        if(isset($arguments)) $view->set_arguments($arguments);
        if(isset($items_per_page)) $view->set_items_per_page($items_per_page);
        if(isset($_GET['page'])) $view->current_page = $_GET['page'];
        $view->execute();
        return $view;
    }

    /**
     * @param $page
     */
    public static function updateCurrentPage( $page )
    {
        $_GET['page'] = $page;
    }
}