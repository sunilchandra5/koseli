<?php
include 'model/dbmodel.php';
$email = "";
if(isset($_GET["email"]))
{
	$email = $_GET["email"];
}

if(empty($_POST))
{
 
    $password=search($email);
include "view/newpassword.php";
return;
}


try {
    if (empty($_POST['newpassword']) || empty($_POST['newcpassword'])){
        $_SESSION['message']="Enter the password to change";
        $_SESSION['status']="error";
        redirect(lost);
        return;
    }
   
    $newpassword = filtertext($_POST['newpassword']);
    if (strlen($newpassword) < 7) {
        $_SESSION['message']="length of password must be >7";
        $_SESSION['status']="warning";
        redirect(lost);
        return;
    }

    $newcpassword = filtertext($_POST['newcpassword']);
   if ($newpassword != $newcpassword) {
    $_SESSION['message']="password and confirm password is not matched";
    $_SESSION['status']="warning";
    redirect(lost);
       return;
   }

$new=update_password($newpassword);
if ($new) {
    $_SESSION['message']="Password changed sucessfully";
    $_SESSION['status']="success";
      redirect(login);
   } else {
       throwError(500, 'Unable to complete your request.');
   }
    } catch (Exception $ex) {
        include 'controller/ErrorController.php';
    }
?>