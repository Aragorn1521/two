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
           
           $category = Category::getCategoryById($id);
           
           if(isset($_POST['submit'])){
               
               $name = $_POST['name'];
               $sortOrder = $_POST['sort_order'];
               $status = $_POST['status'];
              
               
             Category::updateCategory($id,$name,$sortOrder,$status); 
                 
                 
             
              
               
                    header("Location: /admin/category");
               }
               
                require_once (ROOT.'/views/admin_category/update.php');
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
          
               Category::deleteCategoryById($id);
               header("Location: /admin/category");
       }
       require_once (ROOT.'/views/admin_category/delete.php');
       return true;
       }
       else return false;
  }
  
}

