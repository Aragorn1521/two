<?php



Class ProductController 
{
    public function actionView($ProductId) {
        $categories = [];
        $categories = Category::getCategoriesList();
        
        $product = Product::getProductById($ProductId);
        
        require_once (ROOT.'/views/product/view.php');
        return true;
        
    }
}
