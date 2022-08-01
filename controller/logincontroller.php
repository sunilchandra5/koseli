<?php

include 'model/dbmodel.php';


if (empty($_POST)) {
    include 'view/home.php';
    return;
}

try {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $_SESSION['message']="Username and Password are required";
        $_SESSION['status']="error";
        include 'view/home.php';
        return;
    }
    $username = filtertext($_POST['username']);
    $password = filtertext($_POST['password']);
    $usertype = $_POST['usertype'];
    switch ($usertype){
        case 'user':
            $user = user_login($username, $password);  
            if ($user) {
                $_SESSION['user']['login'] = TRUE;
                $_SESSION['user']['userid'] = $user['id'];
                $_SESSION['user']['username'] = $user['username'];
                $_SESSION['user']['sname'] = $user['name'];
                $_SESSION['user']['semail'] = $user['email'];
                $_SESSION['user']['sphone'] = $user['phone'];
                $_SESSION['user']['saddress'] = $user['address'];
                redirect('site');
            }
            else{
                
            $_SESSION['message']="Username and Password is incorrect";
            $_SESSION['status']="error";
            include 'view/home.php';
            return;
            }
            break;

        case "staff":
            $staff = staff_login($username, $password);  
            if ($staff) {
           
              $_SESSION['staff']['login'] = TRUE;
              $_SESSION['staff']['user_id'] = $staff['id'];
              $_SESSION['staff']['user_name'] = $staff['username'];
              header("location:staff/");
        }
        else{
            
            $_SESSION['message']="Username and Password is incorrect";
            $_SESSION['status']="error";
            include 'view/home.php';
            return;
        }
        break;

        case "admin":
            
        $admin = admin_login($username, $password);  
        if ($admin) {
           
            $_SESSION['admin']['login'] = TRUE;
            $_SESSION['admin']['user_id'] = $admin['id'];
            $_SESSION['admin']['user_name'] = $admin['username'];
            header("location:admin/"); 
        }
        else{
            
            $_SESSION['message']="Username and Password is incorrect";
            $_SESSION['status']="error";
            include 'view/home.php';
            return;
        }
        break;
         

        default:
            $_SESSION['message']="Username and Password is incorrect";
            $_SESSION['status']="error";
            include 'view/home.php';
            return;
        }


} catch (Exception $ex) {
    include 'controller/ErrorController.php';
}





