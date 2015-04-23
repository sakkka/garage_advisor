<?php
/**
 * Implement this interface to make render elements composables
 * @see http://laravel.com/docs/responses#view-composers
 */
namespace Tembo\Theme;


interface IComposable {
    public function compose(&$variables);
}