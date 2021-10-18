<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user Page</title>
    <style>
        .form-register{
            margin-top: 20px;
            padding:15px;
            box-shadow: 0px 5px 10px rgb(0 0 0 / 10%);
        }
        .form-control:focus {
            border-color: transparent!important;
            box-shadow: 0px 5px 10px rgb(0 0 0 / 10%)!important;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <?php
                if(isset($data['result']))
                {
                    if($data['result'] == "true")
                    {
                        ?>
                            <div class="alert alert-primary" role="alert">
                                Update  user success
                            </div>
                        <?php
                    }
                    else{

                        ?>
                            <div class="alert alert-danger" role="alert">
                                Update data user failse
                            </div>
                        <?php
                    }
                }

                $dataUser = mysqli_fetch_array($data["dataUser"]);
            ?>
        </div>

        <form class="form-register form-fixwidth" action="auth/updateUser/<?php echo $dataUser['id'] ?>" method="POST">
            <h3>Edit user:<?php echo $dataUser['name'] ?></h3>
            <div class="form-group">
                <label for="exampleUsername">Username</label>
                <input type="text" class="form-control" name="username" value=<?php echo $dataUser['username'] ?> id="username" placeholder="Enter username" autocomplete="off">
                <span id="message_username" style="color:red;"></span>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <input type="password" class="form-control" name="password" id="input_password" disabled placeholder="If you change password, let's click input checkbox!" autocomplete="off">
                <input type="checkbox" style="margin-top:15px;" class="form-check-change-password" id="form-check-change-password"><span style="color:dodgerBlue;margin-left:5px;">Change password</span>
            </div>
            <div class="form-group">
                <label for="exampleName">Your Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $dataUser['name'] ?>" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" value="<?php echo $dataUser['email'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleName">Address</label>
                <input type="text" class="form-control" value="<?php echo $dataUser['address'] ?>" name="address" placeholder="Enter address">
            </div>
            <div class="form-group">
                <label for="exampleName">Permision</label>
                <select class="form-control" name="permision">
                    <option value="0" 
                    
                        <?php
                            if($dataUser['permision']== 0)
                            echo 'selected'
                        ?>

                    >User</option>
                    <option value="1"
                        <?php
                            if($dataUser['permision']== 1)
                            echo 'selected'
                        ?>
                    >Admin</option>        
                </select>
            </div>
            <button type="submit" name="btnRegister" id="btnRegister" class="btn btn-primary">Edit User</button>
        </form>
    </div>
</body>
</html>

