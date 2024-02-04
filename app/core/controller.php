<?php
/*
* Main controller class
*/
class Controller
{
    public function view($viewFileName, $data = array()){
        extract($data);
        $fileName = "../app/views/".$viewFileName.".view.php";
        if(file_exists($fileName)){
            require $fileName;
        }else{
            require "../app/views/404.view.php";
        }
    }
}