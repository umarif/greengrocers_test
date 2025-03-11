<?php
include("../includes/connect.php");

if (isset($_POST['insert_cat'])) {
    $cat_title = mysqli_real_escape_string($con, $_POST['cat_title']);

    $select_query = "SELECT * FROM categories WHERE category_title = '$cat_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
        echo "<script>alert('Category already exists')</script>";
        exit();
    } else {
        $insert_query = "INSERT INTO categories (category_title) VALUES ('$cat_title')";
        $result = mysqli_query($con, $insert_query);

        if ($result) {
            echo "<script>alert('Category has been inserted successfully')</script>";
        } else {
            echo "<script>alert('Failed to insert category')</script>";
        }
    }
}
?>
<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text gb-info"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="cat_title" id="floatingInputGroup1" placeholder="Insert categories">
  
</div>
<div class="input-group w-10 mb-2 m-auto">

   <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="insert categories">

</div>
</form>