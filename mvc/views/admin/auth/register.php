<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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
        <div class=" d-flex justify-content-end">
            <a href="auth/listuser" class="my-3 btn btn-primary "><i class="fa fa-users"></i> List User</a>
        </div>
        <div class="mt-3 mb-3">
            <?php
                if(isset($data['result']))
                {
                    if($data['result'] == "true")
                    {
                        ?>
                            <div class="alert alert-primary" role="alert">
                                Insert new data user success
                            </div>
                        <?php
                    }
                    else{

                        ?>
                            <div class="alert alert-danger" role="alert">
                                Insert new data user failse
                            </div>
                        <?php
                    }
                }
            ?>
        </div>
        <form class="form-register form-fixwidth" action="auth/postRegister" method="POST">
            
            <h3 class="my-2"> <i class="fa fa-plus"></i> Create User</h3>
            <div class="form-group">
                <label for="exampleUsername">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" autocomplete="off">
                <span id="message_username" style="color:red;"></span>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="exampleName">Your Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleName">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Enter address">
            </div>
            <div class="form-group">
                <label for="exampleName">Permision</label>
                <select class="form-control" name="permision">
                    <option value="0">User</option>
                    <?php
                        if ( isset($_SESSION['permision']) && $_SESSION['permision'] ==1)
                        {
                            ?>
                                <option value="1">Admin</option> 
                            <?php
                        }
                    ?>
                          
                </select>
            </div>
            <button type="submit" name="btnRegister" id="btnRegister" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>
</html>

