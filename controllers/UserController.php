<?php

class UserController
{
    public function actionRegister() 
            {
        $name = '';
        $email = '';
        $password = '';
        
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
        require_once (ROOT.'/views/user/register.php');
        
        return true;
        
    }
}

}