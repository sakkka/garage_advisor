<?php
/**
 * Created by PhpStorm.
 * User: kalutheo
 * Date: 08/07/2014
 * Time: 16:45
 */

namespace Tembo\Blocks;


class BlockBase {



    protected $subject;
    protected $data;

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    function __construct($subject = NULL)
    {
        $this->subject = $subject;
    }


    public function build(){
        $build = array();
        $build["#markup"] = "Heyyy Hello , Halo, Bonjour :-))";
        return $build;
    }


    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }


    public function toArray(){

        return array(
            "subject" => $this->getSubject(),
            "content" => $this->build()
        );
    }

} 