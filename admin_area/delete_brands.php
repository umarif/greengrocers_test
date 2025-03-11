<?php
if(isset($_GET['delete_brands'])){
    $brand_id = $_GET['delete_brands'];
    $delete_brand = "DELETE FROM `brands` WHERE brand_id = $brand_id";
    $result = mysqli_query($con, $delete_brand);
    if($result){
        echo "<script>alert('Brand Deleted Successfully')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }else{
        echo "<script>alert('Brand Not Deleted Successfully')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }
}


?>