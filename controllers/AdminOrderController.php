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
}