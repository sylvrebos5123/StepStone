<?php

namespace StepStone\OnlineBakery;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use StepStone\Domain\Order;

class Service {

    public function getCakesAction(Application $app) {
        $cakes = $app['dao.order']->findAll();
        // Convert an array of objects ($cakes) into an array of associative arrays ($responseData)
        $responseData = array();
        foreach ((object)$cakes as $cake) {
            
            $responseData[] = $cake;
        }
        // Create and return a JSON response
        return $app->json($responseData);
    }

   
}
