<?php
include("../includes/connect.php");
if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_categories = $_POST['product_categories'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $poduct_status = 'true';
    $product_image1 = $_FILES['product_image1']['name'];
    $temp_name1 = $_FILES['product_image1']['tmp_name'];
    move_uploaded_file($temp_name1, "../product_images/$product_image1");
    $product_status = 'true';
    $insert_query = "INSERT INTO products ( product_title, product_description, product_keywords, category_id, brand_id, product_price, product_image, date, status) 
    VALUES ('$product_title', '$product_description', '$product_keywords', '$product_categories', '$product_brand', '$product_price', '$product_image1', now(), '$product_status')";

    $result = mysqli_query($con, $insert_query);
    if($result){
        echo "<script>alert('Product has been inserted successfully')</script>";
        echo "<script>window.open('index.php?insert_product', '_self')</script>";
    } else {
        echo "<script>alert('Product has not been inserted successfully')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
        <!-- Bootstrap Css Link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Font Awesome  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Css Link -->
     <link rel="stylesheet" href="../style.css">

</head>
<body class="bg-light">
    <!-- Navbar -->
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- Form -->
         <form action="" method="post" enctype="multipart/form-data">
            <!-- Ttile -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">product title</label>
                <input type="text" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" name="product_title" required>
            </div>
                 <!-- description -->
                 <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">product description</label>
                <input type="text" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" name="product_description" required>
            </div>
                    <!-- keyword -->
                    <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">product keywords</label>
                <input type="text" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" name="product_keywords" required>
            </div>
                 <!-- categories -->
                 <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_categories" id="" class="form-select">
                        <option value="">Select category</option>
                        <?php
                        $select_query = "SELECT * FROM categories";
                        $result_query = mysqli_query($con, $select_query);

                        while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_id = $row['category_id'];
                         $category_title = $row['category_title'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                        ?>
                    </select>                
                </div>  
                    <!-- subcategories -->
                                 <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_subcategories" id="" class="form-select">
                        <option value="">Select subcategory</option>

                            <!--?php
                            $select_query = "SELECT * FROM subcategories";
                            $result_query = mysqli_query($con, $select_query);

                            if (mysqli_num_rows($result_query) > 0) {
                                while ($row = mysqli_fetch_assoc($result_query)) {
                                    $subcategory_id = $row['subcategory_id'];
                                    $subcategory_title = $row['subcategory_title'];
                                    echo "<option value='$subcategory_id'>$subcategory_title</option>";
                                }
                            } else {
                                echo "<option value=''>No subcategories found</option>";
                            }
                            ?-->
                    </select>                
                </div>
                <!-- brand -->
                    <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_brand" id="" class="form-select">
                        <option value="">Select brand</option>
                        <?php
                        $select_query = "SELECT * FROM brands";
                        $result_query = mysqli_query($con, $select_query);

                        while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_id = $row['brand_id'];
                         $brand_title = $row['brand_title'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                        ?>

                    </select>                
                </div>  
                 <!-- image 1 -->
                 <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="product_image1">Product image </label>
                <input type="file" id="product_image1" class="form-control" name="product_image1" required>
            </div>
                <!-- image 2
                 <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="product_image2">Product image 2</label>
                <input type="file" id="product_image2" class="form-control" name="product_image2" required>
            </div>
                 
                  <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="product_image3">Product image 3</label>
                <input type="file" id="product_image3" class="form-control" name="product_image3" required>
            </div>  -->
            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">product price</label>
                <input type="text" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" name="product_price" required>
            </div>
            <!-- status -->
            <!--div class="form-outline mb-4 w-50 m-auto">
                <label for="product_status" class="form-label">product status</label>
                <input type="text" id="product_status" class="form-control" placeholder="Enter product status" autocomplete="off" name="product_status" required>
            </div-->
            <!-- submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" class="btn btn-info w-50" value="insert Product" name="insert_product">
              </div>
      </form>
     </div>
        <!-- First Child -->
   
    
</body>
</html>