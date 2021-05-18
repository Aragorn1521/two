<?php

Class AdminCategoryController extends AdminBase
{
    
  public function actionIndex(){
      
      $admin = self::checkAdmin();
      
       if($admin == true){
      $categoryList = Category::getCategoriesListAdmin();
      
      require_once (ROOT.'/views/admin_category/index.php');
      
      return true;
       }
 else {
       return false;    
       }
  }
  
  public function actionUpdate($id)
          {
      
      $admin = self::checkAdmin();
      
       if($admin == true){
           
           $categoryList = Category::getCategoriesListAdmin();
           
           $product = Product::getProductById($id);
           
           if(isset($_POST['submit'])){
               
               $options['name'] = $_POST['name'];
               $options['code'] = $_POST['code'];
               $options['price'] = $_POST['price'];
               $options['category_id'] = $_POST['category_id'];
               $options['brand'] = $_POST['brand'];
               $options['availability'] = $_POST['availability'];
               $options['description'] = $_POST['description'];
               $options['is_new'] = $_POST['is_new'];
               $options['is_recommended'] = $_POST['is_recommended'];
               $options['status'] = $_POST['status'];
               
             if (Product::updateProduct($id, $options)) {
                 
                 
             }
              
               
                    header("Location: /admin/product");
               }
               
                require_once (ROOT.'/views/admin_product/update.php');
           return true;
           }
           else return false;
          
          
  }
       
       
       

  
  
  
  public function actionCreate(){
      
      $admin = self::checkAdmin();
      
       if($admin == true){
           
          
           
           if(isset($_POST['submit'])){
               
               $name = $_POST['name'];
               $sortOrder = $_POST['sort_order'];
               $status = $_POST['status'];
              
               
               $errors = false;
               
              if (!isset($name) || empty($name)) {
               $errors[] = 'Заполните поле';
               }
               
               
           

               
               
               if ($errors == false) {
                   Category::createCategory($name, $sortOrder, $status);
               
                    header("Location: /admin/category");
               }
               
               
           }
           
           require_once (ROOT.'/views/admin_category/create.php');
           return true;
       }
       else return false;
       
  }
  
  public function actionDelete($id)
  {
      $admin = self::checkAdmin();
      
       if($admin == true){
           
           if(isset($_POST['submit'])){
          
               Product::deleteProductById($id);
               header("Location: /admin/product");
       }
       require_once (ROOT.'/views/admin_product/delete.php');
       return true;
       }
       else return false;
  }
  
}

