<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5 w-75 mx-auto">
    <thead class="bg-info">

    <?php
    $get_payment = "select * from `user_table`";
    $result= mysqli_query($con, $get_payment);
    $row_count = mysqli_num_rows($result);


if($row_count == 0){
    echo "<h2 class='text-center text-danger'>No User Found</h2>";
}
else{
        echo "     <tr>
        <td>S.No</td>
        <td>User ID</td>
        <td>User Name</td>
        <td>User Email</td>
        <td>User Image</td>
        <td>User Address</td>
        <td>User Contact</td>
        <td>Delete</td>
</tr>  </thead>
<Tbody>";
    $i = 0;
    while($row = mysqli_fetch_array($result)){
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_address = $row['user_address'];
        $user_mobile = $row['user_mobile'];
        $i++;
        echo "<tr>
        <td>$i</td>

        <td>$user_id</td>
        <td>$username</td>
        <td>$user_email</td>
        <td><img src='../user_area/user_images/$user_image' alt=$username class='product_img'/></td>
        <td>$user_address</td>
        <td>$user_mobile</td>
        <td class='text-center'><a href='delete_user.php?delete_user=$user_id'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";
    }
}

?>

</Tbody>
</table>