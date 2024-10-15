<?php
include 'model/dbmodel.php';

$paymentDetails = array();

$data = $_GET['data'];

$decoded_data = base64_decode($data);

// Convert the JSON string into a PHP associative array
$data_array = json_decode($decoded_data, true);

$oid = $_SESSION['orderId'] ?? null;

if ($data_array && $oid) {
    $paymentDetails['transaction_code'] = $data_array['transaction_code'] ?? '';
    $paymentDetails['status'] = $data_array['status'] ?? '';
    $paymentDetails['total_amount'] = $data_array['total_amount'] ?? '';

    $pmnt_status = $paymentDetails['status'] == 'COMPLETE' ? 1 : 2;
    save_payment_details($paymentDetails['transaction_code'], $paymentDetails['total_amount'], 'ESEWA', $paymentDetails['status'], $oid);
    update_payment($oid, $pmnt_status);
    $_SESSION['orderId'] = null;
} else {
    // If response or order ID is missing, redirect to the track list page
    header("Location: /college-project/?r=track");
    exit();
}
$paymentMessage = ($paymentDetails['status'] == 'COMPLETE') ? 'Payment Successful!' : 'Payment Failed!';
$paymentClass = ($paymentDetails['status'] == 'COMPLETE') ? 'success' : 'failure';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Status</title>
    <style>
    /* Basic CSS Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #333;
    }

    .container {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 400px;
        width: 100%;
    }

    /* Success message styling */
    .success h1 {
        color: #4CAF50;
    }

    /* Failure message styling */
    .failure h1 {
        color: #e74c3c;
    }

    .container p {
        font-size: 1rem;
        margin: 15px 0;
    }

    .order-details {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 8px;
        margin: 20px 0;
        text-align: left;
    }

    .order-details p {
        margin: 5px 0;
        font-size: 0.9rem;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 1rem;
    }

    .btn:hover {
        background-color: #45a049;
    }

    /* Media Queries for Responsiveness */
    @media(max-width: 500px) {
        .container {
            padding: 20px;
        }

        .container h1 {
            font-size: 1.5rem;
        }

        .btn {
            font-size: 0.9rem;
        }
    }
    </style>
</head>

<body>

    <div class="container <?php echo $paymentClass; ?>">
        <h1><?php echo $paymentMessage; ?></h1>
        <p><?php echo ($paymentDetails['status'] == 'COMPLETE') ? 'Your payment has been completed successfully. Thank you for your purchase!' : 'Unfortunately, your payment failed. Please try again.'; ?>
        </p>

        <div class="order-details">
            <p><strong>Order ID:</strong> <?php echo $oid; ?></p>
            <p><strong>Transaction Code:</strong> <?php echo $paymentDetails['transaction_code']; ?></p>
            <p><strong>Total Amount:</strong> <?php echo $paymentDetails['total_amount']; ?></p>
        </div>

        <?php if ($paymentDetails['status'] == 'COMPLETE') { ?>
        <a href="/college-project/?r=track" class="btn">Go to Courrier list</a>
        <?php } else { ?>
        <a href="/college-project/?r=courierdetail&oid=<?php echo $oid; ?>" class="btn">Retry Payment</a>
        <?php } ?>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="javascript/sweetalert.js"></script>
    <?php
    if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
        ?>
    <script>
    swal({
        title: "<?php echo $_SESSION['message']; ?>",
        //text: "You clicked the button!",
        icon: "<?php echo $_SESSION['status']; ?>",
        button: "ok",
    });
    </script>
    <?php
        unset($_SESSION['message']);
    }
    ?>





</body>

</html>