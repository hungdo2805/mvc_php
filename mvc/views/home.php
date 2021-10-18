
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <base href="/mvc_php/">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">

        *{
            padding:0px;
            margin:0px;
        }
        header{
            background:dodgerBlue;
        }
        header nav{
            text-align: center;
            color:#fff;
        }
        .navbar-nav .nav-link {
            color:#fff;
        }
        .navbar-brand{
            color:#fff;
            font-weight:700;
        }
        .navbar-brand:hover{
            color:#fff;
        }
    </style>
</head>
<body>
    <header>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="./">Home</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <?php
                            if (isset($_SESSION['username']))
                            {
                                ?>
                                    <?php
                                       if ( isset($_SESSION['permision']) && $_SESSION['permision'] ==1)
                                       {
                                           ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="auth/listuser"><i class="fa fa-home"></i>Go to administration</a>
                                                </li>
                                           <?php
                                       }
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link"><i class="fa fa-user"></i>:<?php echo $_SESSION['name'] ?></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="auth/logout">Logout</a>
                                    </li>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="auth/login">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="auth/register">Register</a>
                                    </li>
                                <?php
                            }
                        ?>

                    </ul>
                </div>
            </nav>
        </div>
        <!-- <a href="auth/register">Register</a> -->
    </header>
    <div class="container content">
        <?php require_once("./mvc/views/pages/".$data['Page'].".php") ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="public/js/main.js"></script>

</body>
</html>