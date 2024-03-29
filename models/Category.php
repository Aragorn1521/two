<?php

Class Category 
{
    public static function getCategoriesList()
    {
        $db = Db::getConnection();
        
        $categoryList = [];
        
        $result = $db->query('SELECT id,name FROM category ORDER BY sort_order	ASC');
        
        $categoryList = $result->fetchAll();
        return $categoryList;
    }
    public static function getCategoriesListAdmin()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT id,name,sort_order,status FROM category ORDER BY sort_order ASC');
        $categoryList = $result->fetchAll();
        return $categoryList;
    }
       public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }
    }
     public static function createCategory($name,$sortOrder,$status)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO category '
                . '(name,sort_order,status)'
                . ' VALUES (:name,:sort_order,:status)';
        $result = $db->prepare($sql);
         $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        
        return $result->execute();
    }
    
     public static function deleteCategoryById($id){
        $db = Db::getConnection();
        
        $result = $db->prepare('DELETE FROM category WHERE id = :id');
        $result->bindParam(':id', $id,PDO::PARAM_INT);
        return $result->execute();
     }
    
     public static function updateCategory($id,$name,$sortOrder,$status){
       
        $db = Db::getConnection();
        $sql = "UPDATE category 
            SET 
                name = :name,
                sort_order = :sort_order,
                status = :status
                WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
       
        
            return $result->execute();
     }
     
         public static function getCategoryById($id)
    {
        $id = intval($id);
        
        if ($id) {
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * FROM category WHERE id ='.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
             
            return $result->fetch();
             
        }
    }
     
}