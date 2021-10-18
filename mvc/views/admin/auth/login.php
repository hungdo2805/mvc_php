<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
                    if($data['result'])
                    {
                        ?>
                            <div class="alert alert-primary" role="alert">
                                Login success
                            </div>
                        <?php
                    }
                    else{

                        ?>
                            <div class="alert alert-danger" role="alert">
                                Wrong username or password!
                            </div>
                        <?php
                    }
                }
            ?>
        </div>
        <form class="form-register" action="auth/loginPost" method="POST">
            <div class="form-group">
                <label for="exampleUsername">Username</label>
                <input type="text" class="form-control" name="username"  placeholder="Enter username" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
            </div>
            <button type="submit" name="btnRegister" id="btnRegister" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>

