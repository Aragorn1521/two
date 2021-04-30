<?php

class UserController
{
    public function actionRegister() 
            {
        $name = '';
        $email = '';
        $password = '';
        $result = false;
        
           if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
           $errors = false;
           
           if(!User::chekName($name)) {
              $errors[] = 'Имя не должно быть короче 2-х символов';
            }
           
            if(!User::chekEmail($email)){
                $errors[] = 'Неправильный емаил';
            }
           
           
            if(!User::chekPassword($password)){
                $errors[] = 'Пароль не должен быть короче 6-х символов';
               
            }
            
            if(User::chekEmailExists($email)){
                $errors[] = 'Такой емаил уже используется';
               
            }
        
        if ($errors == false ) {
            $result = User::register($name, $email, $password);
        }
            
        }
        require_once (ROOT.'/views/user/register.php');
        
        return true;
        
    }
    public function actionLogin() 
            {
        
        $email = '';
        $password = '';
        
        
           if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            
           $errors = false;
           
            if(!User::chekEmail($email)){
                $errors[] = 'Неправильный емаил';
            }
           
           
            if(!User::chekPassword($password)){
                $errors[] = 'Пароль не должен быть короче 6-х символов';
               
            }
            
            $userId = User::chekUserData($email, $password);
            
            if($userId == false){
                   $errors[] = 'Неправильные данные для входа';
             }
            else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);
                
                // Перенаправляем пользователя в закрытую часть - кабинет 
                header("Location: /cabinet/"); 
            }
        
        
            
        }
        require_once (ROOT.'/views/user/login.php');
        
        return true;
        
    }
}

