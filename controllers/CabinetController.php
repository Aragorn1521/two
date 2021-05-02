<?php

Class CabinetController
{
    public function actionIndex()
    {
        $userId = User::chekLogged();
        
        $user = User::getUserById($userId);
         
        require_once ROOT.'/views/cabinet/index.php';
        return true;
    }
    
    public function actionEdit() {
        $userId = User::chekLogged();
        
        $user = User::getUserById($userId);
       
        $name = $user['name'];
        $password = $user['password'];
        
        $result = false;
        
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $password = $_POST['password'];
            
            $errors = false;
            
            if(!User::chekName($name)){
                $errors[] = 'Имя не должно быть короче 2-х символов';
                
            }
            if(!User::chekPassword($password)){
                $errors[] = 'Пароль не должен быть короче 6-и символов';
                
            }
            
            if($errors == false){
                $result = User::edit($userId,$name,$password);
                
            }
        }
                require_once ROOT.'/views/cabinet/edit.php';
                
                return true;
        
    }
}

