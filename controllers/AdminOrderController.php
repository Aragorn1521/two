<?php

class AdminOrderController extends AdminBase
{
    public function actionIndex(){
        
       $admin = self::checkAdmin();
      
       if($admin == true){
          
           $orderList = Order::getOrdersList();
           
           require_once (ROOT.'/views/admin_order/index.php');
           return true; 
       }
 else {
       return false;    
       }
    }
    
    public function actionView($id){
        
       $admin = self::checkAdmin();
      
       if($admin == true){
           
           $order = Order::getOrderById($id);
           
           $productsQuantity = json_decode($order['products'],true);
           $productsIds = array_keys($productsQuantity);
           $products = Product::getProdustsByIds($productsIds);
           require_once (ROOT.'/views/admin_order/view.php');
           return true;
       }
 else {
       return false;    
       }
       
       
       
       
    
    
}

 public function actionDelete($id){
        
       $admin = self::checkAdmin();
      
       if($admin == true){
           
            if(isset($_POST['submit'])){
                Order::DeleteOrerById($id);
                header("Location: /admin/order");
            }
           require_once (ROOT.'/views/admin_order/delete.php');
           
           return true;
       }
 else {
       return false;    
       }
     
}

public function actionUpdate($id){
        
       $admin = self::checkAdmin();
      
       if($admin == true){
           $order = Order::getOrderById($id);
           
            if(isset($_POST['submit'])){
                $userName = $_POST['userName'];
                $userPhone = $_POST['userPhone'];
                $userComment = $_POST['userComment'];
                $date = $_POST['date'];
                $status = $_POST['status'];
              
                
                Order::UpdateOrderById($id, $userName,$userPhone,$userComment,$date,$status);
                 header("Location: /admin/order/view/$id");
                
            }
           require_once (ROOT.'/views/admin_order/update.php');
           
           return true;
       }
 else {
       return false;    
       }
}
}