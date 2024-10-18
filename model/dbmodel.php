<?php

function db_connect()
{
    $db['host'] = "localhost";
    $db['username'] = "root";
    $db['password'] = "";
    $db['db_name'] = "koseli";
    $conn = mysqli_connect($db['host'], $db['username'], $db['password'], $db['db_name']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}


function user_login($username)
{

    $conn = db_connect();
    $sql = "SELECT * FROM user where username='$username' limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return false;
    }
}


function staff_login($username)
{

    $conn = db_connect();

    $sql = "SELECT * FROM staff where username='$username' limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return false;
    }
}


function admin_login($username, $password)
{

    $conn = db_connect();

    $sql = "SELECT * FROM admin where username='$username' and password='$password' limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return false;
    }
}



function find_user_by_username($username)
{
    $conn = db_connect();
    $sql = "SELECT * FROM user where username='$username' limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}


function find_user_by_email($email)
{
    $conn = db_connect();
    $sql = "SELECT * FROM user where email='$email' limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function register_new_user($name, $username, $password, $email, $phone, $address, $gender)
{

    $conn = db_connect();
    $stmt = $conn->prepare("INSERT INTO user (name,username,password,email,phone,address,gender) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param('sssssss', $name, $username, $password, $email, $phone, $address, $gender);



    $result = $stmt->execute();
    if ($result) {
        $stmt->close();
        $conn->close();
        return $result;
    } else {
        $stmt->close();
        $conn->close();
        return false;
    }
}



function send_courier($user, $ordername, $rname, $remail, $rphone, $raddress, $weight, $date, $target, $latitude, $longitude)
{

    $conn = db_connect();
    $stm = $conn->prepare("INSERT INTO courier (uid,ordername,rname,remail,rphone,raddress,weight,date,image, platitude, plongitude) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $stm->bind_param('isssssissss', $user, $ordername, $rname, $remail, $rphone, $raddress, $weight, $date, $target, $latitude, $longitude);
    $result = $stm->execute();
    if ($result) {
        $stm->close();
        $conn->close();
        return $result;
    } else {
        $stm->close();
        $conn->close();
        return false;
    }
}

function view_order($userid)
{
    $conn = db_connect();
    $sql = "SELECT * from courier WHERE uid='$userid'";
    $result = $conn->query($sql);
    $conn->close();
    if ($result) {
        return $result;
    } else {
        return false;
    }

}



function lost($email)
{

    $conn = db_connect();

    $sql = "SELECT * FROM user where email='$email'limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return false;
    }
}

function search($email)
{
    $conn = db_connect();
    $sql = "SELECT * from user where email='$email'";
    $result = $conn->query($sql);
    $conn->close();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}



function update_password($newpassword, $email)
{
    $conn = db_connect();
    $sql = "UPDATE `user` SET `password`='$newpassword' WHERE `email`='$email'";
    $result = $conn->query($sql);
    if ($result) {

        $conn->close();
        return $result;
    } else {

        $conn->close();
        return false;
    }
}

function find_courier_by_oid($oid)
{
    $conn = db_connect();
    $sql = "SELECT * FROM `courier` WHERE `oid` = $oid";
    $result = $conn->query($sql);
    if ($result) {

        $conn->close();
        return $result;
    } else {

        $conn->close();
        return false;
    }
}

function update_payment($orderId, $status)
{
    $conn = db_connect();
    $sql = "UPDATE `courier` SET `payment`='$status' WHERE `oid`=$orderId";
    $result = $conn->query($sql);
    if ($result) {
        $conn->close();
        return $result;
    } else {

        $conn->close();
        return false;
    }
}

function save_payment_details($transaction_id, $amount, $method, $status, $courier_id)
{
    $conn = db_connect();
    $stm = $conn->prepare("INSERT INTO `payment`(`transaction_id`, `amount`, `method`, `status`, `courier_id`) VALUES (?,?,?,?,?)");
    $stm->bind_param('sdssi', $transaction_id, $amount, $method, $status, $courier_id);
    $result = $stm->execute();
    if ($result) {
        $stm->close();
        $conn->close();
        return $result;
    } else {
        $stm->close();
        $conn->close();
        return false;
    }
}

function find_payment_by_courier_id($courier_id)
{
    $conn = db_connect();
    $sql = "SELECT * FROM `payment` WHERE `courier_id` = $courier_id LIMIT 1";
    $result = $conn->query($sql);
    if ($result) {

        $conn->close();
        return $result;
    } else {

        $conn->close();
        return false;
    }
}



?>