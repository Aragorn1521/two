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
    
     
}