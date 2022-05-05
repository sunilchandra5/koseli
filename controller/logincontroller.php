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



    $user = db_login($username, $password);
    if ($user) {
        

        if($user["usertype"]==0)
        {
            $_SESSION['admin']['login'] = TRUE;
            $_SESSION['admin']['user_id'] = $user['id'];
            $_SESSION['admin']['user_name'] = $user['username'];
            header("location:admin/"); 
           
        }
        
        if($user["usertype"]==1)
        {
            $_SESSION['user']['login'] = TRUE;
            $_SESSION['user']['userid'] = $user['id'];
            $_SESSION['user']['username'] = $user['username'];
            $_SESSION['user']['sname'] = $user['name'];
            $_SESSION['user']['semail'] = $user['email'];
            $_SESSION['user']['sphone'] = $user['phone'];
            $_SESSION['user']['saddress'] = $user['address'];
            redirect('site');
        }
        if($user["usertype"]==2)
        {
            $_SESSION['staff']['login'] = TRUE;
            $_SESSION['staff']['user_id'] = $user['id'];
            $_SESSION['staff']['user_name'] = $user['username'];
            header("location:staff/");
        }
   

    } else {
        $_SESSION['message']="No User found";
        $_SESSION['status']="error";
        include 'view/home.php';
        return;
    }
} catch (Exception $ex) {
    include 'controller/ErrorController.php';
}





