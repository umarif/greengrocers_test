<h1 class="text-center text-success">All Products</h1>
<table class="table table-bordered mt-5 m-auto align-center" style="width:90%">
    <thead class="bg-success">
        <tr>
        <th>S NO</th>
        <th>Product Title</th>
        <th style="width:20%">Product Image</th>
        <th>Product Price</th>
        <th>Total Sold</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
    </thead>
<tbody class="bg-light">
    <?php
$get_products = "SELECT * FROM `products`";
$result = mysqli_query($con, $get_products);
$number=0;
while ($row = mysqli_fetch_assoc($result)) {
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_image = $row['product_image'];
    $product_price = $row['product_price'];
    $status = $row['status'];
    $number++;
    ?>
    <tr class='text-center'>
    <td><?php echo $number; ?></td>
    <td><?php echo $product_title; ?></td>
    <td><img src='../product_images/<?php echo $product_image;?>' class='product_img'/></td>
    <td><?php echo $product_price;?>/-</td>
    <td><?php 
    $get_count = "SELECT * FROM `orders_pending` WHERE product_id = $product_id";
$result_count = mysqli_query($con, $get_count);
$rows_count = mysqli_num_rows($result_count);
echo $rows_count;
?></td>
    <td><?php echo $status;?></td>
      <td><a href='index.php?edit_products=<?php echo $product_id ?>' class='text-center'><i class='fa-solid fa-pen-to-square'></i></a></td>
    <td><a href='index.php?delete_product=<?php echo $product_id ?>'><i class='fa-solid fa-trash'></i></a></td>
</tr>
<?php
}

?>


</tbody>
</table>
