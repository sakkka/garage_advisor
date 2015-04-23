<?php
/**
 * Created by PhpStorm.
 * User: kalutheo
 * Date: 08/07/2014
 * Time: 12:44
 */

namespace Tembo\Sample\Theme\Composers;


use Tembo\Theme\IComposable;

class TemboSampleComposer implements IComposable{

    public function compose(&$variables)
    {
        $variables["other_stuffs"] = "This is an additional Stuff by Composer";
        return;
    }
}