<table class="table mt-3" style="padding:0px 20px;">
    <div class="d-flex justify-content-end">
        <a href="category/create" class="my-3 btn btn-primary "><i class="fa fa-plus"></i> Create category</a>
    </div>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        
        <?php
            if(mysqli_num_rows($data["listCategory"]) > 0)
            {
                $i = 1;
                while($row = mysqli_fetch_array($data["listCategory"]))
                {
                    echo "<tr>";
                        echo "<td>" . $i++. "</td>";
                        echo "<td>" . $row["name_category"] . "</td>";
                        echo '<td>
                            <a onclick="return confirm(\'Are you sure delete this category ?\')" href="category/delete/'. $row["id"] .' " class="btn btn-danger">Delete
                            <a href="category/edit/' . $row["id"] .'" class="btn btn-success ml-1">Edit

                            </td>
                        ';
                    echo "</tr>";
                }
            }
            else{
                echo '<td>No result. <a href="auth/register">Create New Category</a> </td>';
            }
            

        ?>
        

    </tbody>
</table>

