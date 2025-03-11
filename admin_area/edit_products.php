<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="SELECT * FROM `products` WHERE product_id=$edit_id";
    $result = mysqli_query($con,$get_data);
    $row = mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image=$row['product_image'];
    $product_price=$row['product_price'];

    //fetch category 
    $select_category = "SELECT * FROM `categories` WHERE category_id=$category_id";
    $result_category = mysqli_query($con,$select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $category_title = $row_category['category_title'];
    // echo $category_title;
     //fetch  brand
     $select_brand = "SELECT * FROM `brands` WHERE brand_id=$brand_id";
     $result_brand = mysqli_query($con,$select_brand);
     $row_brand = mysqli_fetch_assoc($result_brand);
     $brand_title = $row_brand['brand_title'];
    //  echo $brand_title;
}
 
?>
<div class="container mt-5">
<h1 class="text-center">Edit Product</h1>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-outline w-50 m-auto">
    <label for="product_title" class="form-label">Product Title</label>
    <input type="text" id="product_title" value="<?php echo $product_title?>" name="product_title" class="form-control" required="required">
</div>
<div class="form-outline w-50 m-auto mb-4">
    <label for="product_description" class="form-label">product description</label>
    <input type="text" id="product_description" value="<?php echo $product_description?>" name="product_description" class="form-control" required="required">
</div>
<!-- <div class="form-outline w-50 m-auto mb-4">
    <label for="product_keywords" class="form-label">Product keywords</label>
    <input type="text" id="product_keywords" value="<?php echo $product_keywords?>" name="product_keywords" class="form-control" required="required">
</div> -->
<div class="form-outline w-50 m-auto mb-4">
    <label for="product_keywords" class="form-label">Product keywords</label>
    <input type="text" id="product_keywords" value="<?php echo $product_keywords?>" name="product_keywords" class="form-control" required="required">
</div>
 <!-- categories -->
 <div class="form-outline w-50 m-auto mb-4">
 <label for="product_category" class="form-label">Product Categories</label>
    <select name="product_category" class="form-select">
    <option value="<?php echo $category_title?>"><?php echo $category_title?></option>
    <?php
 $select_category_all = "SELECT * FROM `categories`";
 $result_category_all = mysqli_query($con,$select_category_all);
 while($row_category_all = mysqli_fetch_assoc($result_category_all)){
    $category_title = $row_category_all['category_title'];
    $category_id = $row_category_all['category_id'];
    echo "<option value='$category_id'>$category_title</option>";
 };
 ?>   
</select>                
 </div> 
 <!-- brand -->
 <div class="form-outline w-50 m-auto mb-4">
 <label for="prodict_brands" class="form-label">Product Brands</label>
    <select name="product_brands" class="form-select">
    <option value="<?php echo $brand_title?>"><?php echo $brand_title?></option>
    <?php
 $select_brand_all = "SELECT * FROM `brands`";
 $result_brand_all = mysqli_query($con,$select_brand_all);
 while($row_brand_all = mysqli_fetch_assoc($result_brand_all)){
    $brand_title = $row_brand_all['brand_title'];
    $brand_id = $row_brand_all['brand_id'];
    echo "<option value='$brand_id'>$brand_title</option>";
 };
 ?>
    </select>                
 </div>

    <!-- image 1 -->
    <div class="form-outline mb-4 w-50 m-auto mb-4">
       <label for="product_image1" class="form_image1">Product image </label>
       <div class="d-flex">
        <input type="file" id="product_image1" class="form-control" name="product_image1" required="required">
        <img src="../product_images/<?php echo $product_image ?>" alt="" class="product_img"></div>
    </div>
    
    <!-- product price -->
    <div class="form-outline mb-4 w-50 m-auto">
       <label for="product_price" class="form-label">product price</label>
        <input type="text" id="product_price" value="<?php echo $product_price?>" class="form-control" placeholder="Enter product price" autocomplete="off" name="product_price" required>
      </div>
<!-- submit -->
   <div class="form-outline mb-4 w-50 m-auto">
     <input type="submit" class="btn btn-info w-50" value="Update Product" name="edit_product">
              </div>   
    
    </form>
</div>
    
<!-- editing products -->
 <?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_image1=$_FILES['product_image1']['name'];
    $tmp_image1=$_FILES['product_image1']['tmp_name'];

    // check if field is empty or not 
    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_brands=='' or $product_price==''){
echo "<script>alert('fill all require fields')</script>";
    }else{
        move_uploaded_file($tmp_image1,"../product_images/$product_image1");
        // query to update the product
        $update_product = "UPDATE `products` 
          SET product_title = '$product_title', 
              product_description = '$product_description', 
              product_keywords = '$product_keywords', 
              category_id = '$product_category', 
              brand_id = '$product_brands', 
              product_image = '$product_image1', 
              product_price = '$product_price', 
              date = NOW() 
          WHERE product_id = $edit_id";
        $result_update=mysqli_query($con,$update_product);
        if($update_product){
            echo "<script>alert('Product updated sucessfully')</script>";
            echo "<script>window.open('./insert_product.php', '_self')</script>";
        }
    }
}


?>