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
                                Create category success
                            </div>
                        <?php
                    }
                    else{

                        ?>
                            <div class="alert alert-danger" role="alert">
                                Create category failse
                            </div>
                        <?php
                    }
                }
            ?>
        </div>
        <form class="form-register" action="category/store" method="POST">
            <div class="form-group">
                <label for="exampleUsername">Category</label>
                <input type="text" class="form-control" name="name_category" required  placeholder="Enter category" autocomplete="off">
            </div>
            <button type="submit" name="btnCreateCategory" class="btn btn-primary">Create Category</button>
        </form>
    </div>
</body>
</html>

