<?php include('../includes/connect.php');
 include('../functions/common_function.php');
 @session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login</title>
    <!-- Boot strap css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
body{
overflow-x:hidden;
}
</style>

</head>
<body>
    <div class="container-fluid m-3">
    <h2 class="class text-center">User Login</h2>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-12 col-xl-6">
<form action="" method="post">
    <!-- username field-->
    <div class="form-outline mb-4">
        <label for="user_username" class="form-lable">Username</label>
        <input type="text" name="user_username" id="user_username" class="form-control" required placeholder="Enter your username" autocomplete="off" name="user_username" />
    </div>
    <!-- User Password -->
    <div class="form-outline mb-4">
        <label for="user_password" class="form-lable">Password</label>
        <input type="password" name="user_password" id="user_password" class="form-control" required placeholder="Enter your password" autocomplete="off" name="user_password" />
    </div>

    <!-- submit button -->
    <div class="form-outline mb-4">
        <input type="submit" name="user_login" id="user_login" class="btn btn-success py-2 px-3" value="Login" />
    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ? <a href="user_registration.php"> Register</a></p>
    </div>
</form>
        </div>
    </div>

    </div>
    
</body>
</html>

<?php
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if(isset($_POST['user_login'])){
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    // Use prepared statements to prevent SQL injection
    $select_query = "SELECT * FROM user_table WHERE username = ?";
    $stmt = $con->prepare($select_query);
    $stmt->bind_param("s", $user_username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row_count = $result->num_rows;
    $row_data = $result->fetch_assoc();
    $user_ip=getIPAddress();

// cart items
    $select_query_cart = "SELECT * FROM cart_details WHERE ip_address = '$user_ip'";
   
    $select_cart=mysqli_query($con,$select_query_cart);   
    $row_count_cart = $select_cart->num_rows;

    if($row_count > 0){
        $_SESSION['username']=$user_username;
        // Verify the password
        if(password_verify($user_password, $row_data['user_password'])){
            // echo "<script>alert('Login successful')</script>";
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']=$user_username;
            echo "<script>alert('Login successful')</script>";
            echo "<script>window.open('profile.php', '_self')</script>";
        }else{
            $_SESSION['username']=$user_username;
            echo "<script>alert('Login successful')</script>";
            echo "<script>window.open('payment.php', '_self')</script>";
        }
        } else {
            echo "<script>alert('Invalid Credentials')</script>";  
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$con->close();

?>