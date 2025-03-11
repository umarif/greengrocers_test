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
    <title>Admin Dashboard</title>
    <!-- Bootstrap Css Link -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
   
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <!-- Font Awesome  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Css Link -->
      <!-- link css file -->
 <link rel="stylesheet" href="../cs/style.css">
     <style>
        .admin_image{
    width: 100px;
    object-fit: contain;
}
.footer{
    position: absolute;
    bottom: 0;
}
body{
	overflow-x:hidden;
}
.product_img{
    width: 100px;
    object-fit: contain;
}
    </style>

</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- First Child -->
    <nav class="navbar navbar-xpand-lg navbar-light bg-info">
    <div class="container-fluid">
        <img src="../images/logo.png" alt="" class="logo">
        <nav class="navbar navbar-xpand-lg">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link">Welcome Guest</a>
                </li>
            </ul>
        </nav>
    </div>
    </nav>
        <!-- Second Child -->
        <div class="gb-light">
            <h3 class="text-center p-3">Manage Details</h3>
         </div>

         <!-- Third Child -->
          <div class="row">
            <div class="col-md-12 bg-warning p-1 d-flex align-items-center">
                <div class="px-5">
                    <a href="#"><img src="../images/admin-panel.png" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <!-- Button button*10>a.nav-link.text-light.gb-info.my-1-->
                <div class="button text-center">
                <button><a href="insert_product.php" class="nav-link text-dark bg-info my-1">Insert Product</a></button>
                <button><a href="index.php?view_products" class="nav-link text-dark bg-info my-1">View Products</a></button>
                <button><a href="index.php?insert_category" class="nav-link text-dark bg-info my-1">Insert Categories</a></button>
                <button><a href="index.php?view_categories" class="nav-link text-dark bg-info my-1">View Categories</a></button>
                <button><a href="index.php?insert_brands" class="nav-link text-dark bg-info my-1">Insert Brands</a></button>
                <button><a href="index.php?view_brands" class="nav-link text-dark bg-info my-1">View Brands</a></button>
                <button><a href="index.php?list_orders" class="nav-link text-dark bg-info my-1">All Orders</a></button>
                <button><a href="index.php?list_payments" class="nav-link text-dark bg-info my-1">All Payments</a></button>
                <button><a href="index.php?list_users" class="nav-link text-dark bg-info my-1">All Users</a></button>
                <button><a href="" class="nav-link text-dark bg-info my-1">Logout</a></button>
                </div>
            </div>
          </div>

          <!-- Fourth Child -->
           <div class="contaner my-3">
            <?php 
            if(isset($_GET['insert_category'])){
                include("insert_categories.php");
            }
            if(isset($_GET['insert_brands'])){
                include("insert_brands.php");
            }
            if(isset($_GET['view_products'])){
                include("view_products.php");
            }
            if(isset($_GET['edit_products'])){
                include("edit_products.php");
            }
            if(isset($_GET['delete_product'])){
                include("delete_product.php");
            }
            if(isset($_GET['view_categories'])){
                include("view_categories.php");
            }
            if(isset($_GET['view_brands'])){
                include("view_brands.php");
            }
            if(isset($_GET['edit_category'])){
                include("edit_category.php");
            }
            if(isset($_GET['edit_brands'])){
                include("edit_brands.php");
            }
            if(isset($_GET['delete_category'])){
                include("delete_category.php");
            }
            if(isset($_GET['delete_brands'])){
                include("delete_brands.php");
            }
            if(isset($_GET['list_orders'])){
                include("list_orders.php");
            }
            if(isset($_GET['list_payments'])){
                include("list_payments.php");
            }
            if(isset($_GET['list_users'])){
                include("list_users.php");
            }
            ?>
           </div>

          <!-- last child   -->
        <!-- Footer -->
        <?php include("../includes/footer.php") ?>
    </div>



  <!-- Bootstrap Js Link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- popup test -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

</body>
</html>