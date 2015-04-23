<?php
/**
 * Created by PhpStorm.
 * User: kalutheo
 * Date: 29/11/13
 * Time: 18:08
 */

namespace Tembo\Views;


class ViewStylePlugin extends \views_plugin_style {

    public $name;
    public $original_style_plugin;
    public $current_display;
    public $view;
    public $result;

    function __construct($name, $view)
    {
        $this->name = $name;
        $this->view = $view;
    }


        protected function _preprocess_view_data($result){

                global $user;

                $data =      array(
                "result" => $result,
                "logged_user" => $user,
                "is_front_page" => drupal_is_front_page(),
                "current_page" => (empty($this->view->current_page)) ? 0 : $this->view->current_page ,
                "view_name" => $this->name,
                "pager" => theme("pager"),
                "view" => $this->view,
                "original_style_plugin" =>  $this->original_style_plugin,
                "current_display" => $this->current_display,
                "total" => $this->view->total_rows,
                "exposed_raw_input" => $this->view->exposed_raw_input,
                "is_first_page" => (!isset($_GET["page"]))
            );
            return $data;
        }

        public function render(){
            $data  = $this->_preprocess_view_data( $this->view->result);
            return tembo_render($this->name, $data);
        }

        public function even_empty(){
            return "not found";
        }

        public function tokenize_value($value, $row_index) {
            return $value;
        }

        public function destroy(){

        }

        public function uses_fields(){

        }

        function pre_render($result) {
            parent::pre_render($result);
        }
} 