<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moe
 * Date: 02/07/13
 * Time: 12:27
 * To change this template use File | Settings | File Templates.
 */

namespace Tembo\Core\Data\ORM;


use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation
 */
class Field extends Annotation
{
    public $name;
    public $key;
    public $sanitize = TRUE;
    public $decode = FALSE;
    public $subValue;
    public $raw = FALSE;
}