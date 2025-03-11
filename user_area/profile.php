<!-- Database Connection -->
<?php
include("../includes/connect.php");
include("../functions/common_function.php");
session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome: <?php echo $_SESSION['username'] ?></title>
<!-- Boot strap css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

 <!-- font awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 <!-- link css file -->
 <link rel="stylesheet" href="../cs/style.css">
<style>
.edit_image {
    width: 100px;
    object-fit: contain;
    height: 100px;
}
  </style>
</head>
<body>
<!-- Navbar -->
 <div class="container-flud">
    <!-- First Child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid" >
    <img src="../images/logo.png" alt="" class="logo">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Vegetables</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Fruits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup> <?php cart_items(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:<?php total_cart_price(); ?>/- </a>
        </li>

       
      </ul>
      <form class="d-flex" action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="search" name="search_data">
          <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
<!-- Calling cart function -->
 <?php
cart();
?>
<!-- Second child -->
 <nav class="navbar navbar-expand-lg navbar-light bg-warning">

 <ul class="navbar-nav me-auto">

        <?php
                if(!isset($_SESSION['username'])){
                  echo "    <li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li> ";
                }else{
                  echo "<li class='nav-item'> <a class='nav-link' href='./profile.php'>Welcome ".$_SESSION['username']."</a></li>";
                }

        // user login show
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'> <a class='nav-link' href='./user_login.php'>Login</a></li>";
        }else{
          echo "<li class='nav-item'> <a class='nav-link' href='./logout.php'>Logout</a></li>";
        }

        ?>
    </ul>
 </nav>

    <!-- Third child -->
     <div class="bgligh">
        <h3 class="text-center">Green Grocers</h3>
        <p class="text-center">Buy fresh and green and stay healthy</p>
     </div>

<!-- Fourth child -->
<div class="row">
    <div class="col-md-2 p-2" style="height:100vh">
<ul class="navbar-nav bg-secondry text-center">
    <li class="nave-item bg-success">
    <a class="nav-link active" href="#"><h4>User Profile</h4></a>
    </li>
    <?php
$username=$_SESSION['username'];
$user_image="select * from user_table where username='$username'";
$user_image=mysqli_query($con,$user_image);
$row_image=mysqli_fetch_array($user_image);
$user_image=$row_image['user_image'];
echo "  <li class='nav-item bg-secondry'>
    <img src='./user_images/$user_image' class='profile_img'>
        </li>";
    ?>
  
        <li class="nave-item bg-warning">
    <a class="nav-link active" href="profile.php">Pending orders</a>
    </li> <li class="nave-item bg-warning">
    <a class="nav-link active" href="profile.php?edit_account">Edit account</a>
    </li> <li class="nave-item bg-warning">
    <a class="nav-link active" href="profile.php?my_orders">My orders</a>
    </li>
    <li class="nave-item bg-warning">
    <a class="nav-link active" href="profile.php?delete_account">Delet account</a>
    </li>
    <li class="nave-item bg-warning">
    <a class="nav-link active" href="logout.php">Logout</a>
    </li>
</ul>
    </div>
    <div class="col-md-10 text-center">
<?php get_user_order_details(); 
if(isset($_GET['edit_account'])){
  include('edit_account.php');
}
if(isset($_GET['my_orders'])){
  include('user_orders.php');
}
if(isset($_GET['delete_account'])){
  include('delete_account.php');
}
?>

    </div>

</div>

<!-- last child -->
 <!-- including footer -->
  <?php include("../includes/footer.php") ?>

 </div>

<!-- Boot strap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
</body>
</html>