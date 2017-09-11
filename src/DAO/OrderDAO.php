<?php

namespace StepStone\DAO;

use StepStone\Domain\Order;

class OrderDAO extends DAO
{
    /**
     * Return a list of 10 random cakes.
     *
     * @return array A list of cakes.
     */
    public function findAll() {

        //die('hello');
        $sql = "SELECT filling_flavour.id_filling_flavour as id,cakes.name as cake_name,filling.name as filling_name,flavour.name as flavour_name 
        FROM cakes 
        left join cakes_filling 
        on cakes_filling.id_cake=cakes.id_cake 

        left join filling_flavour 
        on filling_flavour.id_filling=cakes_filling.id_filling 

        left join filling on filling.id_filling=filling_flavour.id_filling 

        left join flavour on flavour.id_flavour=filling_flavour.id_flavour 

        ORDER BY RAND() limit 0,10";

        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array 
        $cakes = array();
        foreach ($result as $row) {
            $cakeId = $row['id'];
            $cakes[$cakeId] = $row;
        }
        return $cakes;
    }

    /**
     * Returns a list of 10 random cakes matching the supplied id.
     *
     * @param integer $id The article id.
     *
     * @return \StepStone\Domain\Order or stop if no matching cake is found
     */
    public function find($id) {

        $sql = "SELECT filling_flavour.id_filling_flavour as id,cakes.name as cake_name,filling.name as filling_name,flavour.name as flavour_name FROM cakes left join cakes_filling on cakes_filling.id_cake=cakes.id_cake 

        left join filling_flavour 
        on filling_flavour.id_filling=cakes_filling.id_filling 

        left join filling on filling.id_filling=filling_flavour.id_filling 

        left join flavour on flavour.id_flavour=filling_flavour.id_flavour 

        WHERE cakes.id_cake=$id
        ORDER BY RAND() limit 0,10";
        
        $result = $this->getDb()->fetchAll($sql);

        if ($result){
            $cakes = array();

            foreach ($result as $row) {
                $cakeId = $row['id'];
                $cakes[$cakeId] = $row;
            }
            return $cakes;
        }
        else
        {
            die("No cake matching id " . $id); 
        }
           
    }

    /**
     * Returns an order matching the supplied id.
     *
     * @param integer $id The order id.
     *
     * @return \StepStone\Domain\Order or stop if no matching cake is found
     */
    public function findOrder($id) {

        $sql = "SELECT id_order,cakes.name as cake_name,filling.name as filling_name,flavour.name as flavour_name,client_name FROM orders  
            left join cakes_filling
            on cakes_filling.id_cakes_filling=orders.id_cakes_filling

            left join filling_flavour
            on filling_flavour.id_filling_flavour=orders.id_filling_flavour

            left join cakes
            on cakes.id_cake=cakes_filling.id_cake

            left join filling on filling.id_filling=filling_flavour.id_filling 

            left join flavour on flavour.id_flavour=filling_flavour.id_flavour

            WHERE id_order=$id";

        
            $order = $this->getDb()->fetchAll($sql);

            
        if ($order){
           
            return (object)$order[0];
        }
        else
        {
            die("No order matching id " . $id); 
        }
           
    }

    /**
     * Saves an order into the database.
     *
     * @param \StepStone\Domain\Order $cake The order to save
     */
     public function save(Order $cake) {
        
        $id_cakes_filling=$cake->getIdCakesFilling();
        

        // Request to verify the matching between cake and filling
        $sql = "SELECT id_filling_flavour 
        FROM cakes_filling 
        left join filling_flavour 
        on filling_flavour.id_filling=cakes_filling.id_filling 
        WHERE id_cakes_filling=$id_cakes_filling
        ";
        
            $result = $this->getDb()->fetchAll($sql);
            
            $tab=array();

            foreach($result as $row)
            {
                $tab[]=$row['id_filling_flavour'];
            }
            

            if (!in_array($cake->getIdFillingFlavour(), $tab)) 
            {
                    echo "No matching with filling flavour";
                    die();
            }
           
            
        //If the matching is correct, build an array with data to save
        $cakeData = array(
            'id_cakes_filling' => $cake->getIdCakesFilling(),
            'id_filling_flavour' => $cake->getIdFillingFlavour(),
            'client_name'=>$cake->getClientName()
            );

       /* var_dump($cakeData);
        die();*/

        if ($cake->getIdOrder()) {
            // The order has already been saved : update it
            $this->getDb()->update('orders', $cakeData, array('id_order' => $cake->getIdOrder()));
        } else {

            // The order has never been saved : insert it
            $this->getDb()->insert('orders', $cakeData);
            // Get the id of the newly created order and set it on the entity.
            
            $id = $this->getDb()->lastInsertId();
            $cake->setIdOrder($id);
        }
    }

   
}
