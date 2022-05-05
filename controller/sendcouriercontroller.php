<?php
include 'model/dbmodel.php';
include 'view/navbar.php';

if (empty($_POST)) {
    include 'view/sendcourier.php';
    return;
}
try
{  $sname = filterText($_POST['sname']);
   $semail =filterText($_POST['semail']);
   $sphone =filterText($_POST['sphone']);
   $saddress = filterText($_POST['saddress']);
   $slocation =filterText($_POST['slocation']);
   $weight =filterText($_POST['weight']);
   $rname = filterText($_POST['rname']);
   $remail =filterText($_POST['remail']);
   $rphone =filterText($_POST['rphone']);
   $raddress = filterText($_POST['raddress']);
   $rlocation =filterText($_POST['rlocation']);
   $date =$_POST['date'];
   $user= $_SESSION['user']['userid'];


   
   $target="";
   //if (!empty($_FILES['simg']) && $_FILES['simg']['error'] == 0) 
   {
    $target = "images/".basename($_FILES['simg']['name']);
      
    move_uploaded_file($_FILES['simg']['tmp_name'], $target);

   }
   $courier = send_courier($user,$sname,$semail,$sphone,$saddress,$slocation,$rname,$remail,$rphone,$raddress,$rlocation,$weight,$date,$target);
   if ($courier) {
    $_SESSION['message']="Your couirer has been sent to Admin for Approval";
    $_SESSION['status']="success";
       header("location:" . $base_url . "?r=sendcourier");
   } else {
       throwError(500, 'Unable to complete your request.');
   }
}
 catch (Exception $ex) {
    throwError();
}
?>