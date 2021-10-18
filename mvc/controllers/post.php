<?php
    session_start();
    class post extends Controller{

        public $newsModel;

        function __construct(){
            $this->postModel = $this->model('PostModel');
            $this->categoryModel = $this->model('CategoryModel');
        }
        
        function create_slug($string)
        {
            $search = array(
                '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
                '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
                '#(ì|í|ị|ỉ|ĩ)#',
                '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
                '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
                '#(ỳ|ý|ỵ|ỷ|ỹ)#',
                '#(đ)#',
                '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
                '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
                '#(Ì|Í|Ị|Ỉ|Ĩ)#',
                '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
                '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
                '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
                '#(Đ)#',
                "/[^a-zA-Z0-9\-\_]/",
            );
            $replace = array(
                'a',
                'e',
                'i',
                'o',
                'u',
                'y',
                'd',
                'A',
                'E',
                'I',
                'O',
                'U',
                'Y',
                'D',
                '-',
            );
            $string = preg_replace($search, $replace, $string);
            $string = preg_replace('/(-)+/', '-', $string);
            $string = strtolower($string);
            return $string;
        }
        
        function listposts(){
            if ( isset($_SESSION['permision']) && $_SESSION['permision'] ==1)
            {
                return $this->view('admin/master',
                    [
                        "Page"=>'posts/list',
                        'dataPosts'=>$this->postModel->getAll(),
                        'dataCategory'=>$this->categoryModel->getAll(),
                    ]
                );
            }
            else
            {
                header('Location: http://localhost/mvc_php/auth/login');
            }
        }  

        function create(){
            if ( isset($_SESSION['permision']) && $_SESSION['permision'] ==1)
            {
                return $this->view('admin/master',
                    [
                        "Page"=>'posts/create',
                        'dataCategory'=>$this->categoryModel->getAll(),
                    ]
                );
            }
            else
            {
                header('Location: http://localhost/mvc_php/auth/login');
            }
        }


        function store(){
            
            if(isset($_POST["btnCreatePost"])){
                //get data 

                $name_post = $_POST['name_post'];
                $content = $_POST['content'];
                $tags = $_POST['tags'];
                $category_id = $_POST['category_id'];
                $slug = $this->create_slug($name_post);

            
                //Validate

                $error = array();
                // $errorfile= array();

                if (empty($name_post)){
                    $error['name_post'] = 'Name post cannot be left blank';
                }
                if (empty($content)){
                    $error['content'] = 'Content post cannot be left blank';
                }

                if(isset($_FILES['image'])){
                    
                    $file_name = $_FILES['image']['name'];
                    $file_size =$_FILES['image']['size'];
                    $file_tmp =$_FILES['image']['tmp_name'];
                    $file_type=$_FILES['image']['type'];

                    $extension = substr($file_name,strlen($file_name)-4,strlen($file_name));

                    $allowed_extensions = array(".jpg","jpeg",".png",".gif",".PNG");

                    if(!in_array($extension,$allowed_extensions)){
                        $error['error_file']="Do not accept this image format, please choose JPEG or PNG.";
                    }

                    if($file_size > 2097152){
                        $error['error_size']='File size should be 2 MB';
                    }

                    if(file_exists("public/upload/images/".$file_name)){
                        $error['error_exist']='Image exist';
                    }

                }

                if ($error){
                    return $this->view('admin/master',
                        [
                            "Page"=>'posts/create',
                            'dataCategory'=>$this->categoryModel->getAll(),
                            'errors'=>$error
                        ]
                    );
                    //echo "failse";
                    //var_dump($error);
                }
                else {
                    //echo "add database";

                    $result = $this->postModel->insertNewPost($name_post,$slug, $content,$category_id,$tags,$file_name);

                    if($result){

                        move_uploaded_file($file_tmp,"public/upload/images/".$file_name);

                        return $this->view('admin/master',
                            [
                                "Page"=>'posts/create',
                                'dataCategory'=>$this->categoryModel->getAll(),
                                'result'=>$result,
                            ]
                        );
                    }
                    else {
                        echo "failse";
                    }
                }
            }
        }
        function edit($id)
        {            
            if ( isset($_SESSION['permision']) && $_SESSION['permision'] ==1)
            {
                return $this->view('admin/master',
                    [
                        "Page"=>'posts/edit',
                        'dataCategory'=>$this->categoryModel->getAll(),
                        "dataPost" => $this->postModel->getPostById($id),
                    ]
                );
            }
            else
            {
                header('Location: http://localhost/mvc_php/auth/login');
            }
        }
        function updatepost($id){

            if(isset($_POST["btnUpdatePost"])){
                //get data 

                $name_post = $_POST['name_post'];
                $content = $_POST['content'];
                $tags = $_POST['tags'];
                $category_id = $_POST['category_id'];
                $slug = $this->create_slug($name_post);

            
                //Validate

                $error = array();
                // $errorfile= array();

                if (empty($name_post)){
                    $error['name_post'] = 'Name post cannot be left blank';
                }
                if (empty($content)){
                    $error['content'] = 'Content post cannot be left blank';
                }

                if(isset($_FILES['image'])){
                    
                    $file_name = $_FILES['image']['name'];
                    $file_size =$_FILES['image']['size'];
                    $file_tmp =$_FILES['image']['tmp_name'];
                    $file_type=$_FILES['image']['type'];

                    if(strlen($file_name) > 0){
                        $extension = substr($file_name,strlen($file_name)-4,strlen($file_name));

                        $allowed_extensions = array(".jpg","jpeg",".png",".gif",".PNG");
    
                        if(!in_array($extension,$allowed_extensions)){
                            $error['error_file']="Do not accept this image format, please choose JPEG or PNG.";
                        }
                    }


                    if($file_size > 2097152){
                        $error['error_size']='File size should be 2 MB';
                    }

                    // if(file_exists("public/upload/images/".$file_name)){
                    //     $error['error_exist']='Image exist';
                    // }

                }

                if ($error){
                   
                    return $this->view('admin/master',
                        [
                            "Page"=>'posts/edit',
                            'dataCategory'=>$this->categoryModel->getAll(),
                            "dataPost" => $this->postModel->getPostById($id),
                            'errors'=>$error
                        ]
                    );

                }
                else {
                    //echo "add database";

                    $result = $this->postModel->updatePostById($id,$name_post,$slug, $content,$category_id,$tags,$file_name);

                    $dataRemove =  mysqli_fetch_array($this->postModel->getPostById($id));
                    if($result){

                        if(strlen($file_name) > 0){

                            // $dataRemove =  mysqli_fetch_array($this->postModel->getPostById($id));
                            
                            // if(file_exists("public/upload/images/".$dataRemove['image'])){
                            //     unlink("public/upload/images".$dataRemove['image']);
                            // }
                            // $dataRemove =  mysqli_fetch_array($this->postModel->getPostById($id));
                
                            //unlink("public/upload/images/".$dataRemove['image']);

                            move_uploaded_file($file_tmp,"public/upload/images/".$file_name);
                        }

                        return $this->view('admin/master',
                            [
                                "Page"=>'posts/edit',
                                'dataCategory'=>$this->categoryModel->getAll(),
                                "dataPost" => $this->postModel->getPostById($id),
                                'result'=>$result,
                            ]
                        );
                      
                    }
                    else {
                        echo "failse";
                    }
                }
            }
        }
        function delete($id){
            if ( isset($_SESSION['permision']) && $_SESSION['permision'] ==1)
            {
                //romeve image

                $dataRemove =  mysqli_fetch_array($this->postModel->getPostById($id));
                
                unlink("public/upload/images/".$dataRemove['image']);

                $resullt = $this->postModel->deletePost($id);

                return $this->view('admin/master',
                    [
                        "Page" =>'posts/list',
                        'result'=>$resullt,
                        'dataPosts'=>$this->postModel->getAll(),
                        'dataCategory'=>$this->categoryModel->getAll(),
                    ]
                );
            }
            else
            {
                header('Location: http://localhost/mvc_php/auth/login');
            }
        }

        function details($slug)
        {    
            $slugExplode = explode(".", $slug);       
            
            $slugNeed =  current($slugExplode);//get first element in array
            $idCategory = (int)$slugExplode[1];
            

            return $this->view('home',
                [
                    "Page"=>'details_post',
                    "dataPost" => $this->postModel->getPostBySlug($slugNeed),
                    "dataCategory"=>$this->categoryModel->getCategoryById($idCategory)
                ]
            );

        }

        function tag($tag)
        {    
            //echo $tag;

                return $this->view('home',
                [
                    "Page"=>'post_tag',
                    "tag"=>$tag,
                    "dataPostTags" => $this->postModel->getPostByTag($tag),
                ]
            );

        }

        
    }
?>