<?php

Class SiteController
{
    public function actionIndex() {
        
       
        $categories = [];
        $categories = Category::getCategoriesList();
        
        $lastProduct = [];
        $lastProduct = Product::getLatestProducts(6);
        
        require_once (ROOT.'/views/site/index.php');
        
        return true;
        
    }
}
?>
