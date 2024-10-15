<?php
include 'model/dbmodel.php';
include 'helper/OrderHelper.php';

$oid = $_GET['oid'];
$_SESSION['orderId'] = $oid;
$request = find_courier_by_oid($oid);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['courier_id']) && isset($_POST['courier_total_amount'])) {
    $orderId = $_POST['courier_id'];
    $total = $_POST['courier_total_amount'];
    save_payment_details(uuidv4(), $total, "COD", "PENDING", $orderId);
    update_payment($oid, 3);
    echo "<script>window.location.href='" . $base_url . "?r=courierdetail&oid=" . $oid . "';</script>";
}




function uuidv4()
{
    $data = random_bytes(16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Courier Detail</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/hmac-sha256.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/enc-base64.min.js"></script>

    <link rel="stylesheet" href="css/courierdetail.css">
</head>

<body>
    <div class="wrapper">
        <div class="hidden-container"></div>
        <div class="visible-container">

            <?php while ($row = $request->fetch_assoc()) { ?>

                <?php if ($row['payment'] == 0 || $row['payment'] == 2) { ?>
                    <div>
                        <?php if ($row['payment'] == 2) { ?>
                            <div class="failed-container">
                                <div class="failed-content">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-x-circle">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="15" y1="9" x2="9" y2="15"></line>
                                            <line x1="9" y1="9" x2="15" y2="15"></line>
                                        </svg>
                                    </div>
                                    <h2>Payment Failed</h2>
                                    <p>Your payment could not be processed last time. Please try again from below link or contact
                                        support.</p>
                                </div>
                            </div>
                        <?php } ?>
                        <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST" class="invoice"
                            onsubmit="generateSignature()" target="_blank">
                            <h2>Invoice Details</h2>
                            <table>
                                <tbody>
                                    <tr class="">
                                        <td>Order ID:</td>
                                        <td><input type="text" id="oid" name="oid" value="<?php echo $row['oid']; ?>" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Courier charge:</td>
                                        <td>
                                            <input type="text" id="amount" name="amount"
                                                value="<?php echo getCourierPrice($row['weight']) ?>" readonly>
                                            <br>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Tax:</td>
                                        <td>
                                            <input type="text" id="tax_amount" name="tax_amount"
                                                value="<?php echo getCourierPrice($row['weight']) * 0.13 ?>" readonly>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Total Amount:</td>
                                        <td><input type="text" id="total_amount" name="total_amount"
                                                value="<?php echo getCourierPrice($row['weight']) * 1.13 ?>" readonly>
                                        </td>
                                    </tr>

                                    <tr class="hidden">
                                        <td>Transaction UUID:</td>
                                        <td><input type="text" id="transaction_uuid" name="transaction_uuid"
                                                value="<?php echo uuidv4() ?>" readonly> </td>
                                    </tr>

                                    <tr class="hidden">
                                        <td>Product Code:</td>
                                        <td><input type="text" id="product_code" name="product_code" value="EPAYTEST"
                                                required="">
                                        </td>
                                    </tr>

                                    <tr class="hidden">
                                        <td>Product Service Charge:</td>
                                        <td><input type="text" id="product_service_charge" name="product_service_charge"
                                                value="0" readonly> </td>
                                    </tr>

                                    <tr class="hidden">
                                        <td>Product Delivery Charge:</td>
                                        <td><input type="text" id="product_delivery_charge" name="product_delivery_charge"
                                                value="0" readonly> </td>
                                    </tr>

                                    <tr class="hidden">
                                        <td>Success URL:</td>
                                        <td><input type="text" id="success_url" name="success_url"
                                                value="http://localhost/college-project" readonly>
                                        </td>
                                    </tr>

                                    <tr class="hidden">
                                        <td>Failure URL:</td>
                                        <td><input type="text" id="failure_url" name="failure_url"
                                                value="http://localhost/college-project" readonly>
                                        </td>
                                    </tr>

                                    <tr class="hidden">
                                        <td>signed Field Names:</td>
                                        <td><input type="text" id="signed_field_names" name="signed_field_names"
                                                value="total_amount,transaction_uuid,product_code" required="">
                                        </td>
                                    </tr>

                                    <tr class="hidden">
                                        <td>Signature:</td>
                                        <td><input type="text" id="signature" name="signature"
                                                value="4Ov7pCI1zIOdwtV2BRMUNjz1upIlT/COTxfLhWvVurE=" required="">
                                        </td>
                                    </tr>
                                    <tr class="hidden">
                                        <td>Secret Key:</td>
                                        <td><input type="text" id="secret" name="secret" value="8gBm/:&EnhH.1/q" required="">
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <input value=" Pay with eSewa " type="submit" class="payment-button">
                        </form>

                        <form action="#" method="POST" onsubmit="confirmSubmission(event)">
                            <input type="hidden" name="courier_id" value="<?php echo $oid; ?>">
                            <input type="hidden" id="courier_total_amount" name="courier_total_amount"
                                value="<?php echo getCourierPrice($row['weight']) * 1.13 ?>">
                            <button
                                style="color: white; margin-top: 24px; padding: 8px; border-radius: 6px; background-color: blue; border: none; cursor: pointer;">Request
                                COD</button>
                        </form>
                    </div>

                <?php } else { ?>

                    <div class="container">
                        <div class="info-header">
                            <h1>Payment: <?php echo isPaymentCompleted($row['payment']) ?></h1>
                            <p>Your payment has been processed. Here is the details!</p>
                        </div>

                        <?php
                        $payment = find_payment_by_courier_id($oid);
                        while ($pmt_row = $payment->fetch_assoc()) {
                            ?>
                            <div class="details">
                                <h2>Payment Summary</h2>
                                <ul>
                                    <li><strong>Transaction Code:</strong> <?php echo $pmt_row['transaction_id'] ?></li>
                                    <li><strong>Order ID:</strong> <?php echo $pmt_row['courier_id'] ?></li>
                                    <li><strong>Total Amount (With 13% TAX):</strong> <?php echo $pmt_row['amount'] ?></li>
                                    <li><strong>Payment Method:</strong> <?php echo $pmt_row['method'] ?></li>
                                    <li><strong>Status:</strong> <?php echo isPaymentCompleted($row['payment']) ?></li>
                                </ul>
                            </div>
                        <?php } ?>
                        <div class="courier-details">
                            <h3>Courier Details</h3>
                            <ul>
                                <li><strong>Tracking Number:</strong> <?php echo $row['oid'] ?></li>
                                <li><strong>Order Name:</strong> <?php echo $row['ordername'] ?></li>
                                <li><strong>Receiver Name:</strong> <?php echo $row['rname'] ?></li>
                                <li><strong>Receiver Email:</strong> <?php echo $row['remail'] ?></li>
                                <li><strong>Receiver Phone:</strong> <?php echo $row['rphone'] ?></li>
                                <li><strong>Receiver Address:</strong> <?php echo $row['raddress'] ?></li>
                                <li><strong>Weight:</strong> <?php echo $row['weight'] ?></li>
                                <li><strong>Delivery Charge:</strong><?php echo getCourierPrice($row['weight']) ?></li>
                                <li><strong>Estimated Delivery:</strong> 3-5 business days</li>
                                <li><strong>Courier Service:</strong> Fast Delivery Co.</li>
                                <li><strong>Order Status:</strong>
                                    <?php echo $row['status'] == 0 ? "Pending" : ($row['status'] == 1 ? 'Delivered' : 'Rejected'); ?>
                                </li>

                            </ul>
                        </div>
                        <a href="/college-project/?r=track" class="go-back-button">Go Back to Track List</a>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    </div>


    <script>
        function generateSignature() {
            var currentTime = new Date();
            var formattedTime = currentTime.toISOString().slice(2, 10).replace(/-/g, '') + '-' + currentTime.getHours() +
                currentTime.getMinutes() + currentTime.getSeconds();
            document.getElementById("transaction_uuid").value = formattedTime;


            var total_amount = document.getElementById("total_amount").value;
            var transaction_uuid = document.getElementById("transaction_uuid").value;
            var product_code = document.getElementById("product_code").value;
            var secret = "8gBm/:&EnhH.1/q";

            var hash = CryptoJS.HmacSHA256(
                `total_amount=${total_amount},transaction_uuid=${transaction_uuid},product_code=${product_code}`,
                `${secret}`);
            var hashInBase64 = CryptoJS.enc.Base64.stringify(hash);
            document.getElementById("signature").value = hashInBase64;
        }

        function confirmSubmission(event) {
            var userConfirmed = confirm("Are you sure you want to proceed with COD request?");
            if (!userConfirmed) {
                // Prevent form submission if the user clicks "Cancel"
                event.preventDefault();
            }
        }
    </script>



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