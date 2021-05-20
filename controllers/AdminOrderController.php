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
}