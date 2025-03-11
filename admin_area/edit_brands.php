<?php
if(isset($_GET['edit_brands'])){
    $brand_id = $_GET['edit_brands'];
    $get_brand = "SELECT * FROM `brands` WHERE brand_id = $brand_id";
    $result = mysqli_query($con, $get_brand);
    $row = mysqli_fetch_assoc($result);
    $brand_title = $row['brand_title'];
    if(isset($_POST['update_brand'])){
        $brand_title = $_POST['brand_title'];
        $update_brand = "UPDATE `brands` SET `brand_title` = '$brand_title' WHERE brand_id = $brand_id";
        $result = mysqli_query($con, $update_brand);
        if($result){
            echo "<script>alert('Brand Updated Successfully')</script>";
            echo "<script>window.open('index.php?view_brands','_self')</script>";
        }else{
            echo "<script>alert('Brand Not Updated Successfully')</script>";
            echo "<script>window.open('index.php?view_brands','_self')</script>";
        }
    }
}




?>

<div class="container mt-3">
    <h1 class="text-center">Edit Brand</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label">Brand Title</label>
            <input type="text" id="brand_title" name="brand_title" class="form-control" required="required" value="<?php echo $brand_title; ?>">
        </div>
        <input type="submit" name="update_brand" value="Update Brand" class="btn btn-primary px-3 mb-3 mt-3">
    </form>
     
</div>