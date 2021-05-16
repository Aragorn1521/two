<?php

Class SiteController
{
    public function actionIndex() {
        
       
        $categories = [];
        $categories = Category::getCategoriesList();
        
        $lastProduct = [];
        $lastProduct = Product::getLatestProducts(6);
        
        $sliderProducts = Product::getRecommendedProducts();

        require_once (ROOT.'/views/site/index.php');
        
        return true;
        
    }
}
?>
