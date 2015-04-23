<?php
/**
 * Created by PhpStorm.
 * User: moe
 * Date: 14/08/2014
 * Time: 16:51
 */

namespace Tembo\Core\Data\ORM;


class EntityRecord
{
    public static $annotations;
    public static $entity_bundle;
    public static $class = __CLASS__;

    public $wrapper;

    public $label;
    public $id;

    function __construct( $entity, $entity_type = 'node' )
    {
        $this->wrapper = entity_metadata_wrapper($entity_type, $entity);

        // Unified way of getting $node->title, $user->name, ...
        $this->label = $this->wrapper->label();
        // Unified way of getting $node->nid, $user->uid, ...
        $this->id = $this->wrapper->getIdentifier();

        EntityRecord::$entity_bundle = $this->wrapper->getBundle();

        $this->_browseAnnotations();
    }

    private function _browseAnnotations()
    {
        foreach(static::$annotations as $field)
        {
            if(!isset($this->wrapper->{$field->key})) continue;

            $params = array();
            if(isset($field->sanitize))$params["sanitize"] = TRUE;
            if(isset($field->decode))$params["decode"] = TRUE;

            if($field->raw)
            {
                $this->{$field->name} = $this->wrapper->{$field->key}->raw();
                continue;
            }

            $value = $this->wrapper->{$field->key}->value($params);

            if( isset($field->subValue) )
            {
                $this->{$field->name} = ( isset( $value ) )?$this->wrapper->{$field->key}->value->{$field->subValue}($params):$value;
            }
            else
            {
                $this->{$field->name} = $value;
            }
        }
    }

    public function save()
    {
        foreach(static::$annotations as $field)
        {
            if(!isset($this->{$field->name})) continue;
            if(isset($this->{$field->name})) $this->wrapper->{$field->key}->set( $this->{$field->name} );
        }
        $this->wrapper->save();
    }
}