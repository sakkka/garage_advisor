<?php
/**
 * Created by PhpStorm.
 * User: moe
 * Date: 02/04/15
 * Time: 13:43
 */

namespace Tembo\MongoDB\Utils;

use Mongator\Document\Document;
use Mongator\Tests\Group\EmbeddedGroupTest;
use Mongator\Group\EmbeddedGroup;

class MandangoTools
{
    public static function processRecord( Document $record )
    {
        $result                         = array();
        $data                           = $record->getDocumentData();

        foreach( $data["fields"] as $key => $value )
        {
            $result[$key]               = $value;
        }

        if(isset($data["embeddedsMany"]))
        {
            foreach($data["embeddedsMany"] as $key => $document)
            {
                $result[$key]           = $document->getSavedData();
            }
        }

        return $result;
    }

    /*public static function recordToObject( $array, $class )
    {
        foreach( $array as $key => $value )
        {

        }
    }*/

}