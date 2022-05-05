<?php
include 'model/dbmodel.php';
include 'view/navbar.php';
include 'view/footer.php';


if (empty($_POST)) {
    include 'view/addaperson.php';
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
        include 'view/addaperson.php';
        return;
    }
    $password = filtertext($_POST['password']);
    if (strlen($password) < 7) {
        $_SESSION['message']="Password minimum length is 7";
        $_SESSION['status']="error";
        include 'view/addaperson.php';
        return;
    }

     //checking if username is already exists.
     $username= filtertext($_POST['username']);
     $valudate=find_user_by_username($username);
     if ($valudate){
        $_SESSION['message']="user already taken";
        $_SESSION['status']="error";
         include 'view/addaperson.php';
         return;
     }

   //checking password.
   $cpassword = filtertext($_POST['confirmpassword']);
   if ($password != $cpassword) {
    $_SESSION['message']="Password and confirm Password is not matched";
    $_SESSION['status']="error";
       include 'view/addaperson.php';
       return;
   }
   $name = filterText($_POST['name']);
   $email =filterText($_POST['email']);
   $address = filterText($_POST['address']);
   $phone = filterText($_POST['phone']);
   $gender= filterText($_POST['gender']);
   $usertype = 2 ;

   $user = register_new_user($usertype, $name, $username, $password, $email,$phone, $address,$gender);
   if ($user) {
    $_SESSION['message']="Staff added successfully";
    $_SESSION['status']="success";
       header("location:" . $base_url . "?r=addperson");
   } else {
       throwError(500, 'Unable to complete your request.');
   }
}
 catch (Exception $ex) {
    throwError();
}
?>