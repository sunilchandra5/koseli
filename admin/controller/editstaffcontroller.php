<?php

include "model/dbmodel.php";
include "view/navbar.php";
include "view/footer.php";
$id = "";
if(isset($_GET["id"]))
{
	$id = $_GET["id"];
}

if(empty($_POST))
{
$edit=editstaff($id);
include "view/editstaff.php";
return;
}

try
{
    $flag = empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['confirmpassword']) || empty($_POST['email']) 
    || empty($_POST['phone']) || empty($_POST['address']);

    //validate user inputdata
    if ($flag) {
        $_SESSION['message']="All input field are required";
        $_SESSION['status']="error";
        include 'view/staff.php';
        return;
    }
    $password = filtertext($_POST['password']);
    if (strlen($password) < 7) {
        $_SESSION['message']="Password minimum length is 7";
        $_SESSION['status']="error";
        include 'view/staff.php';
        return;
    }

     //checking if username is already exists.
     $username= filtertext($_POST['username']);
     $valudate=find_user_by_username($username);
     if ($valudate){
        $_SESSION['message']="user already taken";
        $_SESSION['status']="error";
         include 'view/staff.php';
         return;
     }

   //checking password.
   $cpassword = filtertext($_POST['confirmpassword']);
   if ($password != $cpassword) {
    $_SESSION['message']="Password and confirm Password is not matched";
    $_SESSION['status']="error";
       include 'view/staff.php';
       return;
   }
   $name = filterText($_POST['name']);
          
if(!preg_match ('/^([a-zA-Z]+)$/', $name)){
    $_SESSION['message']="Name doesnot have numbers in them";
        $_SESSION['status']="warning";
         include 'view/staff.php';
         return;
    }
   $email =filterText($_POST['email']);
   $address = filterText($_POST['address']);
   $phone = filterText($_POST['phone']);
   if (strlen($phone) < 10 || strlen($phone) > 10) 
   {
    $_SESSION['message']="Phone number must be 10 character";
    $_SESSION['status']="warning";
    include 'view/staff.php';
    return;
}
   

   $gender= filterText($_POST['gender']);
 

   $user = updatestaff($id, $name, $username, $password, $email,$phone, $address,$gender);
   if ($user) {
    $_SESSION['message']="Staff update successfully";
    $_SESSION['status']="success";
    include 'view/staff.php';
   } else {
       throwError(500, 'Unable to complete your request.');
   }
}
 catch (Exception $ex) {
    throwError();
}
?>

?>