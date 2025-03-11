<?php
// Fetch user data for editing
if (isset($_GET['edit_account'])) {
    $user_session_name = $_SESSION['username'];
    $select_query = "SELECT * FROM `user_table` WHERE username = '$user_session_name'";
    $result_query = mysqli_query($con, $select_query);
    if ($result_query && mysqli_num_rows($result_query) > 0) {
        $row_fetch = mysqli_fetch_assoc($result_query);
        $user_id = $row_fetch['user_id'];
        $username = $row_fetch['username'];
        $user_email = $row_fetch['user_email'];
        $user_address = $row_fetch['user_address'];
        $user_mobile = $row_fetch['user_mobile'];
        $user_image = $row_fetch['user_image'];
    } else {
        echo "<script>alert('User not found')</script>";
    }
}

// Update user data
if (isset($_POST['user_update'])) {
    $update_id = $user_id;
    $username = mysqli_real_escape_string($con, $_POST['user_username']);
    $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
    $user_address = mysqli_real_escape_string($con, $_POST['user_address']);
    $user_mobile = mysqli_real_escape_string($con, $_POST['user_mobile']);
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];

    // Handle file upload if a new image is provided
    if (!empty($user_image)) {
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
    } else {
        // If no new image is uploaded, keep the existing image
        $user_image = $row_fetch['user_image'];
    }

    // Update query using prepared statements
    $update_data = "UPDATE `user_table` SET 
                    `username` = ?, 
                    `user_email` = ?, 
                    `user_image` = ?, 
                    `user_address` = ?, 
                    `user_mobile` = ? 
                    WHERE `user_id` = ?";
    $stmt = mysqli_prepare($con, $update_data);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssi", $username, $user_email, $user_image, $user_address, $user_mobile, $update_id);
        $result_query_update = mysqli_stmt_execute($stmt);

        if ($result_query_update) {
            echo "<script>alert('Data updated successfully')</script>";
        } else {
            echo "<script>alert('Failed to update data')</script>";
        }
    } else {
        echo "<script>alert('Error preparing statement')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <style>
        .edit_image {
            width: 100px;
            object-fit: contain;
            height: 100px;
        }
    </style>
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $username; ?>" name="user_username">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email; ?>" name="user_email">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control" name="user_image">
            <img src="./user_images/<?php echo $user_image; ?>" alt="User Image" class="edit_image">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address; ?>" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile; ?>" name="user_mobile">
        </div>
        <input type="submit" value="Update" class="bg-info py-2 px-3 border-0 text-center" name="user_update">
    </form>
</body>
</html>