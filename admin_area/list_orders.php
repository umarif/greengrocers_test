<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5 w-75 mx-auto">
    <thead class="bg-info">

    <?php
    $get_orders = "select * from `user_orders`";
    $result= mysqli_query($con, $get_orders);
    $row_count = mysqli_num_rows($result);


if($row_count == 0){
    echo "<h2 class='text-center text-danger'>No Orders Found</h2>";
}
else{
        echo "     <tr>
        <td>S.No</td>
        <td>Due Amount</td>
        <td>Invoice No</td>
        <td>Total Products</td>
        <td>Order Date</td>
        <td>Status</td>
        <td>Delete</td>
</tr>  </thead>
<Tbody>";
    $i = 0;
    while($row = mysqli_fetch_array($result)){
        $order_id = $row['order_id'];
        $user_id = $row['user_id'];
        $amount_due = $row['amount_due'];
        $invoice_number = $row['invoice_number'];
        $products = $row['total_products'];
        $date = $row['order_date'];
        $status = $row['order_status'];
        $i++;
        echo "<tr>
        <td>$i</td>
        <td>$amount_due</td>
        <td>$invoice_number</td>
        <td>$products</td>
        <td>$date</td>
        <td>$status</td>
        <td class='text-center'><a href='delete_order.php?delete_order=$order_id'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";
    }
}

?>

</Tbody>
</table>