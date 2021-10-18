<table class="table " style="padding:0px 20px;" id="table_user" data-page-length='5'>
    <div class=" d-flex justify-content-end">
        <a href="auth/register" class="my-3 btn btn-primary "><i class="fa fa-plus"></i> Create User</a>
    </div>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        
        <?php
            if(mysqli_num_rows($data["listUser"]) > 0)
            {
                $i = 1;
                while($row = mysqli_fetch_array($data["listUser"]))
                {
                    echo "<tr>";
                        echo "<td>" . $i++. "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["address"] . "</td>";
                        echo '<td>
                            <a onclick="return confirm(\'Are you sure delete this user ?\')" href="auth/deleteUser/'. $row["id"] .' " class="btn btn-danger">Delete
                            <a href="auth/edituser/' . $row["id"] .'" class="btn btn-success ml-1">Edit

                            </td>
                        ';
                    echo "</tr>";
                }
            }
            else{
                echo '<td>No result. <a href="auth/register">Create New User</a> </td>';
            }
            

        ?>
        

    </tbody>
</table>

