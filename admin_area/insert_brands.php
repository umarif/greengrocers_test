<?php
include("../includes/connect.php");

if (isset($_POST['insert_brand'])) {
    $brand_title = mysqli_real_escape_string($con, $_POST['brand_title']);

    $select_query = "SELECT * FROM brands WHERE brand_title = '$brand_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
        echo "<script>alert('Category already exists')</script>";
        exit();
    } else {
        $insert_query = "INSERT INTO brands (brand_title) VALUES ('$brand_title')";
        $result = mysqli_query($con, $insert_query);

        if ($result) {
            echo "<script>alert('Brand has been inserted successfully')</script>";
        } else {
            echo "<script>alert('Failed to insert brand')</script>";
        }
    }
}
?>
<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text gb-info"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="brand_title" id="floatingInputGroup1" placeholder="Insert brandds">
  
</div>
<div class="input-group w-10 mb-2 m-auto">

  <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_brand" value="insert brands">


</div>
</form>