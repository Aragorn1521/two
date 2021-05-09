<?php

class Product
{

    const SHOW_BY_DEFAULT = 2;
    
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);
        $db = Db::getConnection();
        $productsList = [];

        $result = $db->query('SELECT id, name, price, image, is_new FROM product WHERE status = "1" ORDER BY id DESC LIMIT ' . $count);


$productsList = $result->fetchAll();
        
return $productsList;
    }
    
    
        public static function getProductsListByCategory($categoryId = false,$page = 1)
    {
        if($categoryId)
        {
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $db = Db::getConnection();
        $products = [];

     $result = $db->query("SELECT id, name, price, image, is_new FROM product "
                    . "WHERE status = '1' AND category_id = '$categoryId' "
                    . "ORDER BY id ASC "                
                    . "LIMIT ".self::SHOW_BY_DEFAULT
                    . ' OFFSET '. $offset);


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
     public static function getTotalProductsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM product '
                . 'WHERE status="1" AND category_id ="'.$categoryId.'"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }
    
    public static function getProdustsByIds($idsArray)
    {
        $products = [];
                    $db = Db::getConnection();
            
            $idsString = implode(',', $idsArray);
            $sql = "SELECT * FROM product WHERE status ='1'AND id IN ($idsString)";
            $result = $db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
             
//            $i = 0;
//        while ($row = $result->fetch()) {
//            $products[$i]['id'] = $row['id'];
//            $products[$i]['code'] = $row['code'];
//            $products[$i]['name'] = $row['name'];
//            $products[$i]['price'] = $row['price'];
//            $i++;
//        }
        $products = $result->fetchAll();
        return $products;
             
        
    }

}

