<!-- Database Connection -->
<?php
include("../includes/connect.php");
session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Grocers - Checkout Page</title>
<!-- Boot strap css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

 <!-- font awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 <!-- link css file -->
<link rel="stylesheet" href="style.css">
</head>
<body>
<!-- Navbar -->
 <div class="container-flud">
    <!-- First Child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid">
    <img src="./images/logo.png" alt="" class="logo">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Vegetables</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Fruits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>        
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="search" name="search_data">
          <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
<!-- Second child -->
 <nav class="navbar navbar-expand-lg navbar-light bg-warning">

 <ul class="navbar-nav me-auto">
    <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>
    <?php
    if(!isset($_SESSION['username'])){
      echo "  <li class='nav-item'>
          <a class='nav-link' href='./user_login.php'>Login</a>
        </li>";
    }else{
      echo "  <li class='nav-item'>
      <a class='nav-link' href='logout.php'>Logout</a>
    </li>";
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
    <div class="col-md-12">
                <!-- Products First row -->
      <div class="row px-1">
        <?php
        if(!isset($_SESSION['username'])){
          include('user_login.php');

        }else{
          include('payment.php');
        }
        ?>
<!-- row ends here -->
</div>
  <!-- Colom Ends here -->
</div>
<!-- Products End here -->

    <div class="col-md-2 navbar-dark bg-primary p-0 text-center">
   
 
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