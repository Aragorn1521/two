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
    
     
}