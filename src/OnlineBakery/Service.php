<?php

namespace StepStone\OnlineBakery;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use StepStone\Domain\Order;

class Service {

    /**
     * Return a list of 10 random cakes
     *
     * @param Application $app application
     *
     * @return a JSON response
     */
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

    /**
     * Return a list of 10 random cakes matching the supplied id.
     *
     * @param integer $id cake ID
     * @param Application $app application
     *
     * @return a JSON response
     */
    public function getCakeAction($id, Application $app) {
        //die($id);
        $cakes = $app['dao.order']->find($id);
        
        $responseData = array();
       
        foreach ((object)$cakes as $cake) {
            
            $responseData[] = $cake;
        }
        
        // Create and return a JSON response
        return $app->json($responseData);
    }

    /**
     * Return an order matching the supplied id.
     *
     * @param integer $id order ID
     * @param Application $app application
     *
     * @return a JSON response
     */
    public function getOrderAction($id, Application $app) {
        
        $order = $app['dao.order']->findOrder($id);

        // Create and return a JSON response
        return $app->json($order);
    }

    /**
     * Return an order with information updated.
     *
     * @param integer $id order ID
     * @param Request $request request
     * @param Application $app application
     *
     * @return a JSON response
     */
    public function updateCakeAction($id,Request $request, Application $app){
        // Check parameters
        if (!$id OR $id==0) {
            return $app->json('Missing required parameter: id order', 400);
        }
        // Build and save the cake
        $cake = new Order();

        $cake->setIdOrder($id);
        $cake->setIdCakesFilling($request->request->get('id_cakes_filling'));
        $cake->setIdFillingFlavour($request->request->get('id_filling_flavour'));
        $cake->setClientName($request->request->get('client_name'));
        $app['dao.order']->save($cake);
        $responseData = $this->buildOrderArray($cake);
        return $app->json($responseData, 201);  // 201 = Created

    }


    /**
     * Return an order with information saved.
     *
     * @param Request $request request
     * @param Application $app application
     *
     * @return a JSON response
     */
    public function addCakeAction(Request $request, Application $app) {
        // Check request parameters
        
        if (!$request->request->has('id_cakes_filling')) {
            return $app->json('Missing required parameter: cake filling', 400);
        }
        if (!$request->request->has('id_filling_flavour')) {
            return $app->json('Missing required parameter: filling flavour', 400);
        }

        if (!$request->request->has('client_name')) {
            return $app->json('Missing required parameter: client name', 400);
        }
       
        // Build and save the new cake
        $cake = new Order();
        $cake->setIdCakesFilling($request->request->get('id_cakes_filling'));
        $cake->setIdFillingFlavour($request->request->get('id_filling_flavour'));
        $cake->setClientName($request->request->get('client_name'));
        $app['dao.order']->save($cake);
        $responseData = $this->buildOrderArray($cake);
        return $app->json($responseData, 201);  // 201 = Created
    }


    /**
     * Converts an Order object into an associative array for JSON encoding
     *
     * @param Order $cake Order object
     *
     * @return array Associative array whose fields are the cake properties.
     */
    private function buildOrderArray(Order $cake) {
        $data  = array(
            'id_order' => $cake->getIdOrder(),
            'id_cakes_filling' => $cake->getIdCakesFilling(),
            'id_filling_flavour' => $cake->getIdFillingFlavour(),
            'client_name' => $cake->getClientName()
            );
        return $data;
    }


   
}
