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
      public static function getRecommendedProducts()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT * FROM product '
                . 'WHERE is_recommended = "1"');
        $productsList = $result->fetchAll();
        return $productsList;
    }
    
    public static function getProductList()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM product ORDER BY id ASC');
        $productList = $result->fetchAll();
        return $productList;
    }
    
    public static function deleteProductById($id){
        $db = Db::getConnection();
        
        $result = $db->prepare('DELETE FROM product WHERE id = :id');
        $result->bindParam(':id', $id,PDO::PARAM_INT);
        return $result->execute();
        
    }
    public static function createProduct($options)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO product '
                . '(name,code,price,category_id,brand,availability,'
                . 'description,is_new,is_recommended,status)'
                . ' VALUES (:name,:code,:price,:category_id,:brand,:availability,'
                . ':description,:is_new,:is_recommended,:status)';
        $result = $db->prepare($sql);
         $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if($result->execute()){
            return $db->lastInsertId();
        }
        return 0;
    }
    public static function updateProduct($id,$options)
    {
        $db = Db::getConnection();
        $sql = "UPDATE product 
            SET 
                name = :name,
                code = :code,
                price = :price,
                category_id = :category_id,
                brand = :brand,
                availability = :availability,
                description = :description,
                is_new = :is_new,
                is_recommended = :is_recommended,
                status = :status
                WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        
            return $result->execute();
            
            
        
    }
    
    public static function getStatusNew ($status)
    {
        switch ($status) {
            case '1':
                return 'Новинка';
                break;
            case '0':
                return 'Не новинка';
                break;
        }
    }
    
     public static function getStatusSost ($status)
    {
        switch ($status) {
            case '1':
                return 'Есть на складе';
                break;
            case '0':
                return 'Нет на складе';
                break;
        }
    }

}

