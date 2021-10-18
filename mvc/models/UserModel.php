<?php

    class UserModel extends DB{

        public function getALL(){

            $qr = "SELECT * FROM users";
            return mysqli_query($this->con, $qr);
        }

        public function insertNewUser($username,$password,$name,$email,$address,$permision){

            $qr = "INSERT INTO users VALUE(null,'$username','$password','$name','$email','$address',$permision) ";

            $result = false;

            if(mysqli_query($this->con , $qr))
            {
                $result = true;
            }
            
            return json_encode($result);
        }

        function checkUserName($username){
            $qr = "SELECT id FROM users WHERE username = '$username' ";
            $rows = mysqli_query($this->con , $qr);

            $result = false;

            if(mysqli_num_rows($rows) > 0)
            {
                $result = true;
            }

            return $result;
        }

        function getUserById($id)
        {
            $qr = "SELECT * FROM users WHERE id = '$id' ";
            return mysqli_query($this->con, $qr);
        }

        function updateUserHasPassword($id,$username,$password,$name,$email,$address,$permision)
        {
            $qr = "UPDATE users SET username='$username',password='$password',name='$name',email='$email',address='$address',permision=$permision WHERE id=$id";
            
            $result = false;

            if(mysqli_query($this->con , $qr))
            {
                $result = true;
            }
            
            return json_encode($result);
        }
        function updateUserNoPassword($id,$username,$name,$email,$address,$permision)
        {
            $qr = "UPDATE users SET username='$username',name='$name',email='$email',address='$address', permision=$permision WHERE id=$id";
            
            $result = false;

            if(mysqli_query($this->con , $qr))
            {
                $result = true;
            }
            
            return json_encode($result);
        }

        function deleteUser($id){

            $qr = "DELETE FROM users WHERE id=$id";

            $result = false;

            if(mysqli_query($this->con , $qr))
            {
                $result = true;
            }
            
            return json_encode($result);
        }

        function checkLogin($username,$password){
            $qr = "SELECT * FROM users WHERE username = '$username'";

            $rows = mysqli_query($this->con , $qr);

            $result = false;

            if(mysqli_num_rows($rows) > 0)
            {
                
                $dataUser = $rows->fetch_assoc();

                $permision = $dataUser['permision'];
                $name = $dataUser['name'];

                $hashed_password = $dataUser['password'];

                // echo $dataUser['password'];

                // echo $dataUser['email'];

                

                if(password_verify($password, $hashed_password)) {
                    // If the password inputs matched the hashed password in the database
                    // Do something, you know... log them in.
                    $result = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['permision'] = $permision;
                    $_SESSION['name'] = $name;
                } 
            }

           // return $result;
           return $result;
        }
    }
?>