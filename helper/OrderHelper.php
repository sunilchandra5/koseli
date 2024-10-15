<?php
function getPaymentStatus($status)
{
    switch ($status) {
        case '0':
            return 'Pending';
        case '1':
            return 'Completed';
        case '2':
            return 'Failed';
        case '3':
            return 'Cash on Delivery';
        default:
            return 'Invalid';
    }
}

function isPaymentCompleted($status)
{
    switch ($status) {
        case '0':
        case '3':
            return 'Pending';
        case '1':
            return 'Completed';
        case '2':
            return 'Failed';
        default:
            return 'Invalid';
    }
}

function getOrderStatus($status)
{
    switch ($status) {
        case '0':
            return 'Pending';
        case '1':
            return 'Approved';
        case '2':
            return 'Rejected';
        case '3':
            return 'Shipped';
        case '4':
            return 'Delivered';
        default:
            return 'Invalid';
    }
}

function getCourierPrice($weight)
{
    switch ($weight) {
        case $weight <= 1:
            return 120;
        case $weight <= 2:
            return 200;
        case $weight <= 4:
            return 250;
        case $weight <= 5:
            return 300;
        case $weight <= 7:
            return 400;
        default:
            return 500;
    }
}

?>