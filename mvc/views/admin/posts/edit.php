<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post edit Page</title>
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
                                Edit post success
                            </div>
                        <?php
                    }
                    else{

                        ?>
                            <div class="alert alert-danger" role="alert">
                                Edit post fails
                            </div>
                        <?php
                    }
                }
                $dataPost = mysqli_fetch_array($data["dataPost"]);

            ?>
        </div>
        <form class="form-register" action="post/updatepost/<?php echo $dataPost['id'] ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleUsername">Name post</label>
                <input type="text" class="form-control" name="name_post" value="<?php echo $dataPost['name_post']; ?>" id="name_post"  placeholder="Enter name post"  autocomplete="off">
                <span id="message_namepost" style="color:red;"></span>
    
                <?php 
                    if( isset($data['errors']['name_post']) )
                    {
                        ?>
                            <span class="message-error"><?php echo $data['errors']['name_post']; ?></span>
                        <?php
                    }
                ?>
            </div>
            <div class="form-group">
                <label for="content">Content post</label>
                <textarea class="form-control" name="content" id="content" rows="5"><?php echo $dataPost['content'] ?></textarea>
                               
                <?php 
                    if( isset($data['errors']['content']) )
                    {
                        ?>
                            <span class="message-error"><?php echo $data['errors']['content']; ?></span>
                        <?php
                    }
                ?>
                         
                
                
                <script>
                    CKEDITOR.replace( 'content',
                    {
                        filebrowserBrowseUrl: 'public/ckfinder/ckfinder.html',
                        filebrowserImageBrowseUrl: 'public/ckfinder/ckfinder.html?type=Images',
                        filebrowserUploadUrl: 'public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                        filebrowserImageUploadUrl: 'public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
                    });
                </script>
            </div>
            <div class="form-group">
                <label for="exampleName">Category</label>
                <select class="form-control" name="category_id">
                    <?php
                        while($row = mysqli_fetch_array($data["dataCategory"]))
                        {
                            if($row['id'] == $dataPost['category_id'])
                            {
                                echo "<option value=".$row['id']." selected >".$row['name_category']."</option>";
                            }
                            else {
                                echo "<option value=".$row['id']." >".$row['name_category']."</option>";
                            }
                        }

                    ?>

                </select>
            </div>
            <div class="form-group">
                <label for="exampleUsername">Tags</label>
                <input type="text" value="<?php echo $dataPost['tags'] ?>" data-role="tagsinput" class="form-control" name="tags" required placeholder="Enter content post" required autocomplete="off">
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="exampleFormControlFile1">Image post</label>
                    <input type="file" class="form-control-file" name="image" >


                    <?php 
                        if( isset($data['errors']['error_file']) )
                        {
                            ?>
                                <span class="message-error"><?php echo $data['errors']['error_file']; ?></span>
                            <?php
                        }
                        if( isset($data['errors']['error_size']) )
                        {
                            ?>
                                <span class="message-error"><?php echo $data['errors']['error_size']; ?></span>
                            <?php
                        }
                        if( isset($data['errors']['error_exist']) )
                        {
                            ?>
                                <span class="message-error"><?php echo $data['errors']['error_exist']; ?></span>
                            <?php
                        }
                        
                    ?>
                </div>
                <div class="col-md-6">
                    <div class="image_preview my-2 d-flex justify-content-center">
                        <img style="width:100px" src="public/upload/images/<?php echo $dataPost['image'] ?>" alt="">
                    </div>
                </div>
            </div>
            <button type="submit" name="btnUpdatePost" class="btn btn-primary">Edit posts</button>
        </form>
    </div>
</body>
</html>

<!-- <span class="message-error"><php echo isset($data['errors']['content']) ? $data['errors']['content'] : ''; ?></span> -->
