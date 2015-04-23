<?php
/**
 * Created by PhpStorm.
 * User: kalutheo
 * Date: 09/07/2014
 * Time: 15:26
 */

namespace Tembo\Sample\Routing;


use Tembo\Routing\DrupalRequest;
use Tembo\Routing\DrupalResponse;

class SampleController {



    /**
     * @param DrupalRequest $request
     * @return DrupalResponse
     */
    public function indexAction(DrupalRequest $request){
        $vars = $request->getVariables();
        $vars["page"]["content"] = "Looool";
        return new DrupalResponse($vars);
    }


} 