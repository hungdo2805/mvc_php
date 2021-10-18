<?php
    class Ajax extends Controller{

        public $userModel;
        
        function __construct(){
            $this->userModel =  $this->model('UserModel');
            $this->postModel =  $this->model('PostModel');
        }

        public function checkUsername(){   
            $username = $_POST['username'];

            $result = $this->userModel->checkUsername($username);
            
            if($result){
                echo "Username already exists!";
            }
            else{
                echo "";
            }
        }

        public function checkExistNamePost(){   

            $namepost = $_POST['namepost'];

            $result = $this->postModel->checkExistNamePost($namepost);
            
            if($result){
                echo "Name post already exists!";
            }
            else{
                echo "";
            }
        }
    }
?>