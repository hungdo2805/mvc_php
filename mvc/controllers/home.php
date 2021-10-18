<?php
    session_start();
    class Home extends Controller{

        public $sinhVienModel;

        function __construct(){
            $this->sinhVienModel = $this->model('SinhVienModel');
            $this->postModel = $this->model('PostModel');
        }

        function home(){
            
            return $this->view('home',
                [
                    "Page"=>'homepage',                    
                    'dataPosts'=>$this->postModel->getAll(),
                ]
            );
            
        }  
        function register(){
            return $this->view('home',
                [
                    "Page"=>'auth/register',
                ]
            );
        }   
        
    }
?>