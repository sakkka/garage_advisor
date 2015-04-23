<?php
/**
 * Created by PhpStorm.
 * User: kalutheo
 * Date: 09/07/2014
 * Time: 12:10
 */

namespace Tembo\Forms\Sample;


use Tembo\Forms\FormBase;

class SampleForm extends FormBase{

    /**
     * @param array $form
     * @param array $form_state
     */
    public function buildForm(array &$form, array &$form_state)
    {
        $form['price'] = array(
            '#type' => 'textfield', //you can find a list of available types in the form api
            '#title' => 'What is Your Price?',
            '#size' => 10,
            '#maxlength' => 10,
            '#required' => TRUE, //make this field required
        );
        $form['submit_button'] = array(
            '#type' => 'submit',
            '#value' => t('Click Here!'),
        );

    }


} 