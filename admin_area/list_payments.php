<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5 w-75 mx-auto">
    <thead class="bg-info">

    <?php
    $get_payment = "select * from `user_payment`";
    $result= mysqli_query($con, $get_payment);
    $row_count = mysqli_num_rows($result);


if($row_count == 0){
    echo "<h2 class='text-center text-danger'>No Payment Found</h2>";
}
else{
        echo "     <tr>
        <td>S.No</td>
        <td>Invoice No</td>
        <td>Amount</td>
        <td>Payment Mode</td>
        <td>Order Date</td>
        <td>Delete</td>
</tr>  </thead>
<Tbody>";
    $i = 0;
    while($row = mysqli_fetch_array($result)){
        $order_id = $row['order_id'];
        $payment_id = $row['payment_id'];
        $amount = $row['amount'];
        $invoice_number = $row['invoice_number'];
        $payment_mode = $row['payment_mode'];
        $date = $row['date'];
        $i++;
        echo "<tr>
        <td>$i</td>
        <td>$invoice_number</td>
        <td>$amount</td>
        <td>$payment_mode</td>
        <td>$date</td>
                <td class='text-center'><a href='delete_order.php?delete_order=$order_id'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";
    }
}

?>

</Tbody>
</table>