<?php



    class PostModel extends DB{

        public function getAll(){
            $qr = "SELECT * FROM posts";
            return mysqli_query($this->con, $qr);
        }
        

        function checkExistNamePost($namepost){
            $qr = "SELECT id FROM posts WHERE name_post = '$namepost' ";
            $rows = mysqli_query($this->con , $qr);

            $result = false;

            if(mysqli_num_rows($rows) > 0)
            {
                $result = true;
            }

            return $result;
        }

        function insertNewPost($name_post,$slug, $content,$category_id,$tags,$file_name){

            // echo $name_post;
            // echo"</br>";
            // echo $slug;
            // echo"</br>";
            // echo $content;
            // echo"</br>";
            // echo $category_id;
            // echo"</br>";
            // echo $tags;
            // echo"</br>";
            // echo $file_name;
            // echo"</br>";

            $qr = "INSERT INTO posts VALUE(null,'$name_post','$slug','$content',$category_id,'$tags','$file_name') ";
            
            $result = false;

            if(mysqli_query($this->con , $qr))
            {
                $result = true;
            }
            
            return $result;
        }


        function updatePostById($id,$name_post,$slug, $content,$category_id,$tags,$file_name){

            if(strlen($file_name) > 0)
            {
                $qr = "UPDATE posts SET name_post='$name_post',slug='$slug',content='$content',category_id=$category_id, tags='$tags',image='$file_name' WHERE id=$id";
            }
            else {
                $qr = "UPDATE posts SET name_post='$name_post',slug='$slug',content='$content',category_id=$category_id, tags='$tags' WHERE id=$id";
            }
           
            
            $result = false;

            if(mysqli_query($this->con , $qr))
            {
                $result = true;
            }
            
            return $result;
        }


        function getPostById($id)
        {
            $qr = "SELECT * FROM posts WHERE id = '$id' ";
            return mysqli_query($this->con, $qr);
        }

        function deletePost($id){
            $qr = "DELETE FROM posts WHERE id=$id";

            $result = false;

            if(mysqli_query($this->con , $qr))
            {
                $result = true;
            }
            
            return $result;
        }

        function getPostBySlug($slug)
        {
          
            $qr = "SELECT * FROM posts WHERE slug = '$slug'";
            return mysqli_query($this->con, $qr);
        }


        function getPostByTag($tag){
            $qr = "SELECT * FROM posts WHERE name_post  LIKE '%$tag%' ";
            return mysqli_query($this->con, $qr);
        }
    }
?>