<?php
/**
 * Created by PhpStorm.
 * User: kalutheo
 * Date: 09/07/2014
 * Time: 15:44
 */

namespace Tembo\Routing;


use Symfony\Component\HttpFoundation\Request;

class DrupalRequest extends Request {

    protected $variables;

    /**
     * @param mixed $variables
     */
    public function setVariables($variables)
    {
        $this->variables = $variables;
    }

    /**
     * @return mixed
     */
    public function getVariables()
    {
        return $this->variables;
    }
} 