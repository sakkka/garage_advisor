<?php
/**
 * Created by PhpStorm.
 * User: kalutheo
 * Date: 18/07/2014
 * Time: 12:05
 */

namespace Tembo\Forms;


class Form {

    public static function ajaxify(&$form, $options = array()){

        $form['#ajax'] = array(
            'callback' => 'tembo_forms_ajax_callback',
        );

        $form['#ajax']  = array_merge_recursive($form['#ajax'] , $options);
}


} 