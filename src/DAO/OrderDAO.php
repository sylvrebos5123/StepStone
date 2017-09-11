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

        //die('coucou');
        $sql = "SELECT filling_flavour.id_filling_flavour as id,cakes.name as cake_name,filling.name as filling_name,flavour.name as flavour_name FROM cakes left join cakes_filling on cakes_filling.id_cake=cakes.id_cake left join filling_flavour on filling_flavour.id_filling=cakes_filling.id_filling left join filling on filling.id_filling=filling_flavour.id_filling left join flavour on flavour.id_flavour=filling_flavour.id_flavour ORDER BY RAND() limit 0,10";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array 
        $cakes = array();
        foreach ($result as $row) {
            $cakeId = $row['id'];
            $cakes[$cakeId] = $row;
        }
        return $cakes;
    }

   
}
