<?php
   
    class CategoryModel extends DB{

        public function getAll(){
            $qr = "SELECT * FROM category";
            return mysqli_query($this->con, $qr);
        }

        public function insertNewCategory($name_category){

            $qr = "INSERT INTO category VALUE(null,'$name_category') ";

            $result = false;

            if(mysqli_query($this->con , $qr))
            {
                $result = true;
            }
            
            return $result;
        }

        
        function getCategoryById($id)
        {
            $qr = "SELECT * FROM category WHERE id = '$id' ";
            return mysqli_query($this->con, $qr);
        }

        function updateCategoryById($id,$name_category)
        {
            $qr = "UPDATE category SET name_category='$name_category' WHERE id=$id";
            
            $result = false;

            if(mysqli_query($this->con , $qr))
            {
                $result = true;
            }
            
            return $result;
        }

        function deleteCategory($id){
            $qr = "DELETE FROM category WHERE id=$id";

            $result = false;

            if(mysqli_query($this->con , $qr))
            {
                $result = true;
            }
            
            return $result;
        }


    }

    
?>