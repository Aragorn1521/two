<?php

Class Rouret
{
    private $routes;
    
    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include ($routesPath);
    }
    //Достаем из массива $_SERVER данные,которые ввел пользователь
    
    public function getURI() {
        if(!empty($_SERVER['REQUEST_URI'])) {
        return trim($_SERVER['REQUEST_URI'], '/');
        }
        
    }
    //присваиваем данные из метода getUri() переменной $uri
    public function run() 
    {
        
    $uri = $this->getURI();
    //Проверяем наличие такого запроса в routes.php
    foreach ($this->routes as $uriPattern => $path)
        {
    //Распарсили массив на юрл и метод
        if(preg_match("~$uriPattern~",$uri))
        {
    // Получаем внутренний путь из внешнего согласно правилу
          $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
          
    // Опруделить контроллер,актион, параметры
          $segments = explode ('/', $internalRoute);
          
          $controllerName = array_shift($segments).'Controller';
          $controllerName = ucfirst($controllerName);
          
          $actionName = 'action'.ucfirst(array_shift($segments));
          $parameters = $segments;
         
          
         //Подключение файла класса-контроллера
         
          $controllerFile = ROOT . '/controllers/'.
                  $controllerName . '.php';
          
          if (file_exists($controllerFile)){
              include_once ($controllerFile);
          }
          $controllerObject = new $controllerName;
          $result = call_user_func_array(array($controllerObject,$actionName), $parameters);
          if($result != null){              break;}
          
   }
    }


}
}