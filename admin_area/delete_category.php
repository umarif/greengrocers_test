<?php

if(isset($_GET['delete_category'])){
    $cat_id = $_GET['delete_category'];
    $delete_cat = "DELETE FROM `categories` WHERE category_id = $cat_id";
    $result = mysqli_query($con, $delete_cat);
    if($result){
        echo "<script>alert('Category Deleted Successfully')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }else{
        echo "<script>alert('Category Not Deleted Successfully')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
}

?>