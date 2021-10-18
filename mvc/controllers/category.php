<?php
    session_start();
    class category extends Controller{

        public $categoryModel;

        function __construct(){
            $this->categoryModel = $this->model('CategoryModel');
        }

        
        function create(){
            if ( isset($_SESSION['permision']) && $_SESSION['permision'] ==1)
            {
                return $this->view('admin/master',
                    [
                        "Page"=>'category/create',
                    ]
                );
            }
            else
            {
                header('Location: http://localhost/mvc_php/auth/login');
            }
            

        }   

        function store(){
            if(isset($_POST["btnCreateCategory"])){

                //get data
                $name_category = $_POST['name_category'];

                //insert database

                $result = $this->categoryModel->insertNewCategory($name_category);

                return $this->view('admin/master',
                    [
                        "Page"=>'category/create',
                        'result'=>$result
                    ]
                );
            }
        }

        function listcategory(){
            if ( isset($_SESSION['permision']) && $_SESSION['permision'] ==1)
            {
                return $this->view('admin/master',
                    [
                        "Page"=>'category/list',
                        "listCategory"=>$this->categoryModel->getAll()
                    ]
                );
            }
            else
            {
                header('Location: http://localhost/mvc_php/auth/login');
            }
        }

        function edit($id){
            if ( isset($_SESSION['permision']) && $_SESSION['permision'] ==1)
            {
                return $this->view('admin/master',
                    [
                        "Page"=>'category/edit',
                        "dataCategory"=>$this->categoryModel->getCategoryById($id)
                    ]
                );
            }
            else
            {
                header('Location: http://localhost/mvc_php/auth/login');
            }
        }

        function updatecategory($id){
            if ( isset($_SESSION['permision']) && $_SESSION['permision'] ==1)
            {
                if(isset($_POST["btnUpdadteCategory"])){

                    //get data
                    $name_category = $_POST['name_category'];
                    
                    
                    // //insert database
    
                    $result = $this->categoryModel->updateCategoryById($id,$name_category);
    
                    return $this->view('admin/master',
                        [
                            "Page"=>'category/edit',
                            'result'=>$result,
                            "dataCategory"=>$this->categoryModel->getCategoryById($id)
                        ]
                    );
                }
            }
            else
            {
                header('Location: http://localhost/mvc_php/auth/login');
            }
        }

        function delete($id){
            if ( isset($_SESSION['permision']) && $_SESSION['permision'] ==1)
            {
                $resullt = $this->categoryModel->deleteCategory($id);

                return $this->view('admin/master',
                    [
                        "Page" =>'category/list',
                        'result'=>$resullt,
                        "listCategory"=>$this->categoryModel->getAll()
                    ]
                );
            }
            else
            {
                header('Location: http://localhost/mvc_php/auth/login');
            }
        }
        
    }
?>