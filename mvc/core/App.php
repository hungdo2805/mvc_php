<?php 
    class App
    {   
        protected $controller = "home";
        protected $action = "home";
        protected $params = [];
        
        function __construct(){
            $arr =  $this->UrlProcess();

            //print_r($arr);

            //XU LI CONTROLLER
            if(isset($arr[0])){
                
                if(file_exists("./mvc/controllers/".$arr[0].".php")){
                    
                    $this->controller = $arr[0];
                    unset($arr[0]);

                }
            }
            require_once("./mvc/controllers/".$this->controller.".php");

            $this->controller = new $this->controller;

            //XU LI FUNCTION
            if(isset($arr[1]))
            {
                if(method_exists( $this->controller , $arr[1])){
                    $this->action = $arr[1];               
                }
                unset($arr[1]);
            }

            //Xu li params
            $this->params = $arr?array_values($arr):[];

            // echo $this->controller;
            // echo $this->action;
            // print_r($this->params);

            call_user_func_array([$this->controller,$this->action],$this->params);

        }

        function UrlProcess(){
            if( isset($_GET['url']) )
            {
                return explode("/",filter_var( trim($_GET['url'], "/" ))) ;
            }
        }
    }
    
?>