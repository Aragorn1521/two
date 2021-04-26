<?php

class Product
{

    const SHOW_BY_DEFAULT = 10;
    
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);
        $db = Db::getConnection();
        $productsList = [];

        $result = $db->query('SELECT id, name, price, image, is_new FROM product WHERE status = "1" ORDER BY id DESC LIMIT ' . $count);


$productsList = $result->fetchAll();
        
return $productsList;
    }
    
    
        public static function getProductsListByCategory($categoryId = false)
    {
        if($categoryId)
        {
        $db = Db::getConnection();
        $products = [];

         $result = $db->query("SELECT id, name, price, image, is_new FROM product WHERE status = '1' AND category_id = '$categoryId' ORDER BY id DESC LIMIT ".self::SHOW_BY_DEFAULT);


$products = $result->fetchAll();
        }
return $products;
    }
    
    public static function getProductById($id)
    {
        $id = intval($id);
        
        if ($id) {
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * FROM product WHERE id ='.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
             
            return $result->fetch();
             
        }
    }
}

