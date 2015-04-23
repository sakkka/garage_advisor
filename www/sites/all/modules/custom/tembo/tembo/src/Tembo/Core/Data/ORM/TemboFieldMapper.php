<?php
/**
 * Created by JetBrains PhpStorm.
 * User: moe
 * Date: 02/07/13
 * Time: 11:04
 * To change this template use File | Settings | File Templates.
 */

namespace Tembo\Core\Data\ORM;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\FileCacheReader;

class TemboFieldMapper
{
    public $cache_dir;
    public $reader;
    public $classes;

    function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $this->cache_dir = drupal_realpath("public://tmp/");
        $this->reader = new FileCacheReader
        (
            new AnnotationReader(),
            $this->cache_dir . "/field_mapper_storage/",
            $debug = true
        );

        $this->classes = array();
    }

    public function addClass( $class )
    {
        $this->classes[] = $class;
        $this->buildAnnotations();
    }

    public function addClasses( $classes )
    {
        $this->classes = array_merge($this->classes, $classes);;
        $this->buildAnnotations();
    }

    public function buildAnnotations()
    {
        $e = class_exists('Tembo\Core\Data\ORM\Field');
        foreach($this->classes as $className)
        {
            $annotations = array();
            $class = new \ReflectionClass($className);

            foreach($class->getProperties() as $property)
            {
                $annotations = array_merge( $annotations, $this->reader->getPropertyAnnotations($property) );
            }
            $className::$annotations = $annotations;
        }
    }
}