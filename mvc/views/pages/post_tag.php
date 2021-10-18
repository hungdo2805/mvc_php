<?php
    if(mysqli_num_rows($data["dataPostTags"]) > 0){

        ?><h1>Tag:<?php echo $data['tag'] ?></h1><?php 

        echo "<div class='row mt-2'>";
            while($post = mysqli_fetch_array($data["dataPostTags"]))
            {
                
                    echo "<div class='col-md-4'>";
                        ?>
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" style="height:250px;object-fit:cover;" src="public/upload/images/<?php echo $post['image'] ;?>" alt="Card image cap">
                                <div class="card-body"> 
                                    <h5 class="card-title"><?php echo $post['name_post'] ?></h5>
                                    <a href="post/details/<?php echo $post['slug'] .".". $post['category_id']?>.html" class="btn btn-primary">View more</a>
                                </div>
                            </div>
                        <?php 
                    echo "</div>";
            
            }
        echo "</div>";
    }
    else {
        ?><h1>Tag:<?php echo $data['tag']  ?> Noresult!</h1><?php 
    }
?>