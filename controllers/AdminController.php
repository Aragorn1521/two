<?php

class AdminController extends AdminBase {
    
    public function actionIndex () {
        $admin = self::checkAdmin();
        if($admin == true){
        require_once (ROOT.'/views/admin/index.php');
        return true;
        }
 else {return false;}
        
    }
}
