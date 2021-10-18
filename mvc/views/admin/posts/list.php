<?php
    // while($dataCategory = mysqli_fetch_array($data["dataCategory"])){
    //     echo $dataCategory["id"];
    // }
    //print_r($dataCategory);
    // foreach($dataCategory as $cate)
    // {
    //     echo $cate;
    // }
    // $dataCategory = $data["dataCategory"];

    // echo gettype($dataCategory);

    // if(is_array($dataCategory)){
    //     echo "1";
    // }
    // else echo "2";

    // while($row = $dataCategory->fetch_assoc()) {

    //     echo "id: " . $row["id"]. " - Name: " . $row["name_category"]. "<br>";
    //     //echo gettype((int)$row["id"]);
    // }
    
?>

<table class="table mt-3" style="padding:0px 20px;" id="table_post" data-page-length='3'>
    <div class="d-flex justify-content-end">
        <a href="post/create" class="my-3 btn btn-primary "><i class="fa fa-plus"></i> Create posts</a>
    </div>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        
        <?php
            $dataCategory =$data["dataCategory"];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mvc_php";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
            }
            if(mysqli_num_rows($data["dataPosts"]) > 0)
            {
                $i = 1;
                
                while($row = mysqli_fetch_array($data["dataPosts"]))
                {

                    $sql = "SELECT name_category, id FROM category WHERE id = '$row[category_id]' ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        while($cate = $result->fetch_assoc()) {
                            //echo "id: " . $cate["id"]. " - Name: " . $cate["name_category"]. "<br>";
                            $cate_post = $cate["name_category"];
                        }

                    } else {

                        $cate_post .= ', <span class="text-danger">Lỗi</span>';
                    }


                    echo "<tr>";
                        echo "<td>" . $i++. "</td>";
                        echo "<td><img width='60px' src="."public/upload/images/". $row["image"] ."></td>";
                        echo "<td>" . $row["name_post"] ."</td>";
                        
                        echo "<td>".$cate_post."</td>";
                        echo '<td>
                            <a onclick="return confirm(\'Are you sure delete this post ?\')" href="post/delete/'. $row["id"] .' " class="btn btn-danger">Delete
                            <a href="post/edit/' . $row["id"] .'" class="btn btn-success ml-1">Edit

                            </td>';
                    echo "</tr>";
                }
            }
            else{
                echo '<td>No result. <a href="auth/register">Create New Post</a> </td>';
            }
            

        ?>
        

    </tbody>
</table>

