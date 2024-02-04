<?php
class App
{
    protected $controller = '_404';
    protected $method = 'index';

    function __construct()
    {
        $arr = $this->getURL();
        $fileName = "../app/controllers/".ucfirst($arr[0]).".php";
        //checking the controller file
        if(file_exists($fileName)){
            require $fileName;
            $this->controller = $arr[0];
            unset($arr[0]);
        }else{
            require "../app/controllers/".$this->controller.".php";
        }

        $controllerInstance = new $this->controller();
        $method = strtolower($arr[1] ?? $this->method);
        //checking the method in the controller
        if(!empty($arr[1])){
            if(method_exists($controllerInstance, $method)){
                $this->method = $method;
                unset($arr[1]);
            }
        }
        
        $arr = array_values($arr);
        // calling the method
        call_user_func_array([$controllerInstance, $this->method], $arr);

    }

    private function getURL()
    {
        $url = $_GET['url'] ?? 'home';
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $arr = explode("/", $url);
        return $arr;
    }

}