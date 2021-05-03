<?php
Class Cart
{
    public static function addProduct($id)
    {
        $id = intval($id);
        $productInCart = [];
        
        if(isset($_SESSION['products'])){
             $productInCart = $_SESSION['products'];
             
        }
        
        if (array_key_exists($id, $productInCart)){
            $productInCart[$id]++;
            
        }
 else {
     $productInCart[$id] = 1;
 }

 $_SESSION['products'] = $productInCart;
 //echo '<pre>';print_r($_SESSION['products']);die();
    }
    public static function countInems()
    {
        if(isset($_SESSION['products']))
        {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) 
            {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            
            return 0;}
    }

}



