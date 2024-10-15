<?php

include "model/dbmodel.php";


$sid = "";
$uid = "";


$sid = $_GET["sid"];
$uid = $_GET["uid"];



$accept = accept($sid, $uid);
$courier = find_courier_by_oid($uid);

if ($accept) {
    if ($courier && $courier['payment'] == 3) {
        update_payment_status($uid, "COMPLETED");
        update_courier_payment_status($uid, 1);
    }
    redirect('adminrequest');
} else {
    $_SESSION['message'] = "Data is not approved";

    $_SESSION['status'] = "error";
    redirect('adminrequest');
}