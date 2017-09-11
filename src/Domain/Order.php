<?php

namespace backery\Domain;

class Order 
{
    /**
     * Order id.
     *
     * @var integer
     */
    private $id_order;

    /**
     * Cake filling id.
     *
     * @var integer
     */
    private $id_cakes_filling;

    /**
     * Filling flavour id.
     *
     * @var integer
     */
    private $id_filling_flavour;

    /**
     * Order client name.
     *
     * @var string
     */
    private $client_name;

    public function getIdOrder() {
        return $this->id_order;
    }

    public function setIdOrder($id_order) {
        $this->id_order = $id_order;
        return $this;
    }

    public function getIdCakesFilling() {
        return $this->id_cakes_filling;
    }

    public function setIdCakesFilling($id_cakes_filling) {
        $this->id_cakes_filling = $id_cakes_filling;
        return $this;
    }

    public function getIdFillingFlavour() {
        return $this->id_filling_flavour;
    }

    public function setIdFillingFlavour($id_filling_flavour) {
        $this->id_filling_flavour = $id_filling_flavour;
        return $this;
    }
    

    public function getClientName() {
        return $this->client_name;
    }

    public function setClientName($client_name) {
        $this->client_name = $client_name;
        return $this;
    }
}
