<?php

/**
 * Alter Forms Class
 * --------------------------------------
 *
 * This Hook allows to map a Class to an existing Form
 *
 * @param  $blocks
 *   Blocks List
 */
function hook_forms_class_alter(&$forms) {
    $forms["form-id"]["#class"] = "MyNamespace\MyCustomForm";
}