<?php include('../includes/connect.php');
 include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Boot strap css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid m-3 w-75">
    <h2 class="class text-center">Admin Login</h2>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-4">
            <img src="../images/mlogo.png" alt="Amin Registration" class="img-fluid">
        </div>
        <div class="col-lg-6">
            <form action="" method="post">
                <div class="form-group">
                    <label for="username" class="form-label">User Name</label>
                    <input type="text" name="username" id="username" class="form-control" required> 
        </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required> 
        </div>
              <div>
            <input type="submit" class="bg-primary py-2 px-3 border-0 mt-3" name="admin_login" value="login">
            <p class="small fw-bold mt-2 pt-1">Don't have an account <a href="admin_registration.php" class="link-danger">Register</a></p>
        </div> 
        </form>   
    </div>
    </div>
</body>
</html>