<?php

/**
 * Alter Blocks Class
 * --------------------------------------
 *
 * This Hook allows to map a Class to an existing block
 *
 * @param  $blocks
 *   Blocks List
 */
function hook_blocks_class_alter(&$blocks) {
    $blocks["block-id"]["#class"] = "MyNamespace\MyCustomBlock";
}