<?php
if(isset($_GET['edit_category'])){
    $cat_id = $_GET['edit_category'];
    $get_cat = "SELECT * FROM `categories` WHERE category_id = $cat_id";
    $result = mysqli_query($con, $get_cat);
    $row = mysqli_fetch_assoc($result);
    $cat_title = $row['category_title'];
    if(isset($_POST['update_category'])){
        $cat_title = $_POST['category_title'];
        $update_cat = "UPDATE `categories` SET `category_title` = '$cat_title' WHERE category_id = $cat_id";
        $result = mysqli_query($con, $update_cat);
        if($result){
            echo "<script>alert('Category Updated Successfully')</script>";
            echo "<script>window.open('index.php?view_categories','_self')</script>";
        }else{
            echo "<script>alert('Category Not Updated Successfully')</script>";
            echo "<script>window.open('index.php?view_categories','_self')</script>";
        }
    }
}


?>



<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" id="category_title" name="category_title" class="form-control" required="required" value="<?php echo $cat_title; ?>">
        </div>
        <input type="submit" name="update_category" value="Update Category" class="btn btn-primary px-3 mb-3 mt-3">
    </form>
     
</div>