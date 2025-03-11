<!-- Database Connection -->
<?php
include("includes/connect.php");
include("functions/common_function.php");
session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart details</title>
<!-- Boot strap css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

 <!-- font awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 <!-- link css file -->
<link rel="stylesheet" href="style.css">
<style>

    .cart_img{
        width: 80px;
        height: 80px;
        object-fit:contain
    }
    </style>
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup> <?php cart_items(); ?></sup></a>
        </li>
        <li class="nav-item">
          <!-- <a class="nav-link" href="#">Total Price:<?php total_cart_price(); ?>/- </a>
        </li> -->

       
      </ul>
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
                  echo "<li class='nav-item'> <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></li>";
                }

        // user login show
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'> <a class='nav-link' href='./user_area/user_login.php'>Login</a></li>";
        }else{
          echo "<li class='nav-item'> <a class='nav-link' href='./user_area/logout.php'>Logout</a></li>";
        }

        ?>
 </ul>
 </nav>

    <!-- Third child -->
     <div class="bgligh">
        <h3 class="text-center">Green Grocers</h3>
        <p class="text-center">Buy fresh and green and stay healthy</p>
     </div>
<!-- Fourth child Table-->

<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-border text-center">

                <!-- php code Fetching dynamic data from db -->
                <?php
          global $con;
          $get_ip_add = getIPAddress();
          $total_price = 0;
          $cart_query = "SELECT * FROM cart_details where ip_address = '$get_ip_add'";
          $result = mysqli_query($con,$cart_query);
          $result_count = mysqli_num_rows($result);
          if($result_count>0){
            echo "            <thead>
                <tr>
            <th>Product Title</th>
            <th>Product image</th>
            <th>quantity</th>
            <th>Total Price</th>
            <th>Remove</th>
            <th colspan='2'>Operation</th>
                </tr>
            </thead>
            <tbody>";

          while($row=mysqli_fetch_array($result)){
            $product_id = $row['product_id'];
            $select_products = "SELECT * FROM products where product_id = '$product_id'";
            $result_products = mysqli_query($con,$select_products);
            while($row_product_price=mysqli_fetch_array($result_products)){
              $product_price = array($row_product_price['product_price']);
              $price_table = $row_product_price['product_price'];
                $product_title = $row_product_price['product_title'];
                $product_image = $row_product_price['product_image'];
              $product_value = array_sum($product_price);
              $total_price += $product_value;

                ?>
                <tr>
            <td><?php echo $product_title ?></td>
            <td><img src="./product_images/<?php echo $product_image ?>" alt="" class="cart_img"></td>
            <td><input type="text" name="qty" id="" class="form-input w-50"></td>
            <?php
                $get_ip_add = getIPAddress();
                if(isset($_POST['update_cart'])){
                    $quantities = $_POST['qty'];
                    $quantities = (int)$quantities;
                    $update_cart = "UPDATE cart_details set quantity = '$quantities' where ip_address = '$get_ip_add'";
                    $result_products_quantity = mysqli_query($con,$update_cart);
                    $total_price = $total_price * $quantities;
                }
            ?>

            <td><?php echo $price_table ?>/-</td>
            <td> <input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
            <td>
                <!-- <button class="bg-info px-3 py-2 border=0">Update</button> -->
                <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border=0" name="update_cart">
                <!-- <button class="bg-info px-3 py-2 border=0">Remove</button> -->
                <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border=0" name="remove_cart">
            </td>        
                </tr>
                <?php
                            }
                        }
                    }
        else{
            echo "<h2 class='text-center text-danger'>No items in cart / Cart is empty</h2>";
        }
                        ?>
            </tbody>
        </table>
        <!-- Subtotal -->
        <div class="d-flex mb-5">
            <?php 
         global $con;
         $get_ip_add = getIPAddress();
         $cart_query = "SELECT * FROM cart_details where ip_address = '$get_ip_add'";
         $result = mysqli_query($con, $cart_query);
         $result_count = mysqli_num_rows($result);
         if($result_count>0){
            echo "            <h4 class='px-3'>Subtotal:<strong class='text-info'> $total_price/-</strong></h4>
           <input type='submit' value='Continue Shoping' class='bg-info px-3 py-2 border=0' name='continue_shoping'>
          <button class='bg-warning px-3 py-2 border=0'><a href='./user_area/checkout.php' class='text-dark text-decoration-none'>Checkout</a></button> ";
         }else{
            echo " <input type='submit' value='Continue Shoping' class='bg-info px-3 py-2 border=0' name='continue_shoping'>";
         }
if(isset($_POST['continue_shoping'])){
    echo "<script>window.open('index.php','_self')</script>";
}

?>

        </div>
    </div>
</div>
</form>
<!-- function to remove item -->
<?php 
function remove_cart_item(){
    global $con;
if(isset($_POST['remove_cart'])){
      foreach($_POST['removeitem'] as $remove_id){
        echo $remove_id;
        $delete_query = "DELETE FROM cart_details where product_id = 
        $remove_id";
        $run_delete = mysqli_query($con,$delete_query);
        if($run_delete){
         echo "<script>window.open('cart.php','_self')</script>";
        }
    }
}

}
echo $remove_item = remove_cart_item();

?>
<!-- End of fourth child Table -->

<!-- last child -->
 <!-- including footer -->
  <?php include("./includes/footer.php") ?>

 </div>




<!-- Boot strap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
</body>
</html>