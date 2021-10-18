<?php
    session_start();
    class Auth extends Controller{

        public $sinhVienModel;
        public $userModel;

        function __construct(){
            $this->sinhVienModel = $this->model('SinhVienModel');
            $this->userModel = $this->model('UserModel');
        }

        function listuser(){
            if ( isset($_SESSION['permision']) && $_SESSION['permision'] ==1)
            {

                return $this->view('admin/master',
                    [
                        "Page" =>'auth/list_user',
                        "listUser" =>$this->userModel->getALL()
                    ]
                );
            }
            else
            {
                header('Location: http://localhost/mvc_php/auth/login');
            }

        }
 
        function register(){
            return $this->view('admin/master',
                [
                    "Page"=>'auth/register',
                ]
            );
        }   
        function login(){
            return $this->view('admin/master',
                [
                    "Page"=>'auth/login',
                ]
            );
        }  

        function postRegister(){
            if(isset($_POST["btnRegister"])){

                //get data
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password = password_hash($password, PASSWORD_DEFAULT);
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $permision = $_POST['permision'];

            
                //insert database

                $kq = $this->userModel->insertNewUser($username,$password,$name,$email,$address,$permision);

                return $this->view('admin/master',
                    [
                        "Page"=>'auth/register',
                        'result'=>$kq
                    ]
                );
            }
        }

        function edituser($id){
            if ( isset($_SESSION['permision']) && $_SESSION['permision'] ==1)
            {

                return $this->view('admin/master',
                    [
                        "Page"=>'auth/edit_user',
                        'dataUser'=>$this->userModel->getUserById($id)
                    ]
                );
            }
            else
            {
                header('Location: http://localhost/mvc_php/auth/login');
            }
        }

        function updateUser($id){
            if ( isset($_SESSION['permision']) && $_SESSION['permision'] ==1)
            {
                if(isset($_POST['password'] ))
                {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $permision = $_POST['permision'];

                    $resullt = $this->userModel->updateUserHasPassword($id,$username,$password,$name,$email,$address,$permision);
                    
                    //echo "has password".$resullt;
                    //echo "has password".$id;
                    return $this->view('admin/master',
                        [
                            "Page"=>'auth/edit_user',
                            'result'=>$resullt,
                            'dataUser'=>$this->userModel->getUserById($id)
                        ]
                    );
                }
                else{

                    //echo "no password".$id;
                    $username = $_POST['username'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $permision = $_POST['permision'];

                    $result = $this->userModel->updateUserNoPassword($id,$username,$name,$email,$address,$permision);
                    //echo "no password".$resullt;

                    return $this->view('admin/master',
                        [
                            "Page"=>'auth/edit_user',
                            'result'=>$result,
                            'dataUser'=>$this->userModel->getUserById($id)
                        ]
                    );

                }
            }
            else
            {
                header('Location: http://localhost/mvc_php/auth/login');
            }
        }

        function deleteUser($id){
            if ( isset($_SESSION['permision']) && $_SESSION['permision'] ==1)
            {
                $result = $this->userModel->deleteUser($id);

                return $this->view('admin/master',
                    [
                        "Page" =>'auth/list_user',
                        'result'=>$result,
                        "listUser" =>$this->userModel->getALL()
                    ]
                );
            }
            else
            {
                header('Location: http://localhost/mvc_php/auth/login');
            }
        }

        public function loginPost(){

            $username = $_POST['username'];
            $password = $_POST['password'];

            $result = $this->userModel->checkLogin($username,$password);
            
            if($result){
                if (isset($_SESSION['username']) && $_SESSION['permision'] ==0)
                {
                    header('Location: http://localhost/mvc_php/');
                }
                else if( isset($_SESSION['username']) && $_SESSION['permision'] ==1){
                    header('Location: http://localhost/mvc_php/auth/listuser');
                }
                
            }
            else{
                return $this->view('admin/master',
                    [
                        "Page"=>'auth/login',
                        'result'=>$result
                    ]
                );
            }
            
        }

        function logout(){

            if (isset($_SESSION['username'])){
                unset($_SESSION['username']); // xóa session username
            }
            if (isset($_SESSION['permision'])){
                unset($_SESSION['permision']); // xóa session permision
            }
            header('Location: http://localhost/mvc_php/');
        }

    }
?>