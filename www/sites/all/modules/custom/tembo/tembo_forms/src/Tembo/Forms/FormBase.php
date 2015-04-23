<?php
/**
 * Created by PhpStorm.
 * User: kalutheo
 * Date: 09/07/2014
 * Time: 12:20
 */

namespace Tembo\Forms;


class FormBase {


    /**
     * @param array $form
     * @param array $form_state
     */
    public function buildForm(array &$form, array &$form_state) {

    }


    /**
     * @param array $form
     * @param array $form_state
     */
    public function afterBuild(array &$form, array &$form_state) {
        return $form;
    }


    /**
     * @param array $form
     * @param array $form_state
     */
    public function ajaxCallback(array &$form, array &$form_state){

    }

    /**
     * @param array $form
     * @param array $form_state
     */
    public function validateForm(array &$form, array &$form_state) {
        return;
    }

    /**
     * @param array $form
     * @param array $form_state
     */
    public function submitForm(array &$form, array &$form_state) {
        return;
    }
} 