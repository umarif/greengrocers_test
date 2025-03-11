<!-- Database Connection -->
<?php
include("../includes/connect.php");
// include("../functions/common_function.php");
session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    // echo $order_id;
    $select_data = "SELECT * FROM `user_orders` WHERE order_id = '$order_id'";
    $result = mysqli_query($con,$select_data);
    $row_fetch = mysqli_fetch_assoc ($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}
if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query = "INSERT INTO `user_payment` (`order_id`, `invoice_number`, `amount`, `payment_mode`) 
                 VALUES ($order_id, $invoice_number, $amount, '$payment_mode')";
    // $insert_query="insert into 'user_payment' (order_id,invoice_number,amount,payment_mode) values ($order_id,$invoice_number,$amount,'$payment_mode')";
    $result = mysqli_query($con,$insert_query);
    if($result){
        echo "<h3 class='text-center'>Successfully completed the payment</h3>";
        echo "<script>window.open('profile.php', '_self')</script>";
    }
    $update_orders = "UPDATE `user_orders` SET `order_status` = 'complete' WHERE `order_id` = $order_id";

$result = mysqli_query($con, $update_orders);

if ($result) {
    echo "Order updated successfully.";
} else {
    echo "Error updating order: " . mysqli_error($con);
}
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- Boot strap css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 </head>
 <body class="gb-secondary">
    <h1 class="text-success text-center">Confirm Payment</h1>
    <div class="container-my5">
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
            <label for="">Invoice number</label>
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="">Payment option</label>
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option>Payment option</option>
                    <option>JAZZ Cash</option>
                    <option>Easypais</option>
                    <option>Cash on delivery</option>
                    <option>Bank transfer</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0" value="confirm" name="confirm_payment">
            </div>
        </form>


    </div>
    
 </body>
 </html>
