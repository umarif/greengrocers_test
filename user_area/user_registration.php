<?php include('../includes/connect.php');
 include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <!-- Boot strap css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid m-3">
    <h2 class="class text-center">New User Registration Form</h2>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-12 col-xl-6">
<form action="" method="post" enctype="multipart/form-data">
    <!-- username field-->
    <div class="form-outline mb-4">
        <label for="user_username" class="form-lable">Username</label>
        <input type="text" name="user_username" id="user_username" class="form-control" required placeholder="Enter your username" autocomplete="off" name="user_username" />
    </div>
    <!-- User email -->
    <div class="form-outline mb-4">
        <label for="user_email" class="form-lable">User Email</label>
        <input type="email" name="user_email" id="user_email" class="form-control" required placeholder="Enter your Email Address" autocomplete="off" name="user_email" />
    </div>
    <!-- User Password -->
    <div class="form-outline mb-4">
        <label for="user_password" class="form-lable">User password</label>
        <input type="password" name="user_password" id="user_password" class="form-control" required placeholder="Enter your password" autocomplete="off" name="user_password" />
    </div>
        <!-- confirm Password -->
        <div class="form-outline mb-4">
        <label for="conf_user_password" class="form-lable">Confirm password</label>
        <input type="password" name="conf_user_password" id="conf_user_password" class="form-control" required placeholder="Confirm your password" autocomplete="off" name="conf_user_password" />
    </div>
    <!-- User Image -->
    <div class="form-outline mb-4">
        <label for="user_image" class="form-lable">User Image</label>
        <input type="file" name="user_image" id="user_image" class="form-control" required name="user_image" />
    </div>
   <!-- User Address -->
    <div class="form-outline mb-4">
        <label for="user_address" class="form-lable">Address</label>
        <input type="text" name="user_address" id="user_address" class="form-control" required placeholder="Enter your address" autocomplete="off" name="user_address" />
    </div>
    <!-- User mobile Contact -->
    <div class="form-outline mb-4">
        <label for="user_mobile" class="form-lable">Mobile no</label>
        <input type="text" name="user_mobile" id="user_mobile" class="form-control" required placeholder="Enter your mobile no" autocomplete="off" name="user_mobile" />
    </div>
    <!-- submit button -->
    <div class="form-outline mb-4">
        <input type="submit" name="user_register" id="user_register" class="btn btn-success py-2 px-3" value="Register" />
    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="user_login.php"> Login</a></p>
    </div>
</form>
        </div>
    </div>

    </div>
    
</body>
</html>
<!-- php code -->
<?php
if(isset($_POST['user_register'])){
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];
    $user_ip = getIPAddress();
    // select query
$select_query = "select * from user_table where username='$user_username' or user_email='$user_email'";
$result = mysqli_query($con,$select_query);
$rows_count = mysqli_num_rows($result);
if($rows_count>0){
    echo "<script>alert('Username and email already exist')</script>";
}else if($user_password!=$conf_user_password){
    echo "<script>alert('Password does not match')</script>";
}
else{
  // insert query
  move_uploaded_file($user_image_tmp,"user_images/$user_image");
  $insert_query="insert into user_table (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_mobile')";
  $sql_execute = mysqli_query($con,$insert_query);
}
//select cart items
$select_cart_items="select * from cart_details where ip_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_items);
$rows_count = mysqli_num_rows($result_cart);
if($rows_count>0){
    $_SESSION['username']=$user_username;
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.opn('checkout.php', '_self')</script>";
}else{
    echo "<script>window.opn('../index.php', '_self')</script>"; 
}

}
?>