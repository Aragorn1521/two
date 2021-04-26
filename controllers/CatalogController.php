<?php
include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Product.php';

Class CatalogController
{
    public function actionIndex() {
        
       
        $categories = [];
        $categories = Category::getCategoriesList();
        
        $lastProduct = [];
        $lastProduct = Product::getLatestProducts(12);
        
        require_once (ROOT.'/views/catalog/index.php');
        
        return true;
        
    }
    
       public function actionCategory($categoryId) {
        
       
        $categories = [];
        $categories = Category::getCategoriesList();
        
        $CategoryProduct = [];
        $CategoryProduct = Product::getProductsListByCategory($categoryId);
        
        require_once (ROOT.'/views/catalog/category.php');
        
        return true;
        
    }
}
?>
