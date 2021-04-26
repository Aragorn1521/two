<?php
include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Product.php';

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
