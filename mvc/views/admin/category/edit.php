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
                                Update category success
                            </div>
                        <?php
                    }
                    else{

                        ?>
                            <div class="alert alert-danger" role="alert">
                                Update category failse
                            </div>
                        <?php
                    }
                }

                $dataCategory = mysqli_fetch_array($data["dataCategory"]);
            ?>
        </div>
        <form class="form-register" action="category/updatecategory/<?php echo $dataCategory['id'] ?>" method="POST">
            <h5>Edit category</h5>
            <div class="form-group">
                <label for="exampleUsername">Category</label>
                <input type="text" class="form-control" name="name_category" value="<?php echo $dataCategory['name_category'] ?>" required  placeholder="Enter category" autocomplete="off">
            </div>
            <button type="submit" name="btnUpdadteCategory" class="btn btn-primary">Update Category</button>
        </form>
    </div>
</body>
</html>

