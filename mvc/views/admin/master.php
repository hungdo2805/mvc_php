

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <base href="/mvc_php/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="public/css/style.css">

    <link rel="stylesheet" type="text/css" href="public/css/datatables.css">

    <script src="public/ckeditor/ckeditor.js"></script>
    <script src="public/ckfinder/ckfinder.js"></script>

    
  
       
</head>
<body>

    <?php require_once("./mvc/views/admin/header.php") ?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <?php
                    if ( isset($_SESSION['username']) && $_SESSION['permision'] ==1)
                    {
                        ?>
                            <div class="col-md-2">
                                <?php require_once("./mvc/views/admin/sidebar.php") ?>
                            </div>
                        <?php
                    }
                ?>

                <div class="col-md-10">
                    <?php require_once("./mvc/views/admin/".$data['Page'].".php") ?>
                </div>
            </div>     
        </div>  
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="public/js/bootstrap-tagsinput.js"></script>
    <script src="public/js/dataTables.js"></script>  
    <script src="public/js/main.js"></script>

</body>
</html>