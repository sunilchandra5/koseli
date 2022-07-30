
<?php

function db_connect() {
    $db['host'] = "localhost";
    $db['username'] = "root";
    $db['password'] = "";
    $db['db_name'] = "koseli";
    $conn = new mysqli($db['host'], $db['username'], $db['password'], $db['db_name']);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}


 
function find_user_by_username($email)
{
    $conn= db_connect();
    $sql = "SELECT * FROM staff where email='$email' limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function register_new_staff($name, $username, $password, $email,$phone, $address,$gender)
{

    $conn = db_connect();
    $stmt = $conn->prepare("INSERT INTO staff (name,username,password,email,phone,address,gender) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param ('sssssss', $name, $username, $password, $email,$phone, $address,$gender);
    


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


function view_users()
{
$conn = db_connect();
$sql = "SELECT * from user";
$result = $conn->query($sql);
$conn->close();
if($result)
{
    return $result;
}
else
{
    return false;
}

}


function view_staff()
{
$conn = db_connect();
$sql = "SELECT * from staff";
$result = $conn->query($sql);
$conn->close();
if($result)
{
    return $result;
}
else
{
    return false;
}

}




function view_courier()
{
$conn = db_connect();
$sql = "SELECT * from courier WHERE status='0'";
$result = $conn->query($sql);
$conn->close();
if($result)
{
    return $result;
}
else
{
    return false;
}

}



function delete($id) {
    $conn = db_connect();
    $sql = "Delete from user where id=$id";
    $conn->query($sql);
    if ($conn->affected_rows > 0) {
        $conn->close();
        return TRUE;
    } else {
        $conn->close();
        return false;
    }
}

function accept($uid) {
    $conn = db_connect();
    $sql = "UPDATE `courier` SET `status`='1' WHERE id=$uid";
$result = $conn->query($sql);
if($result){
        
        $conn->close();
        return $result;
}
else {
        
        $conn->close();
        return false;
}

}

function reject($uid) {
    $conn = db_connect();
    $sql = "UPDATE `courier` SET `status`='2' WHERE id=$uid";
$result = $conn->query($sql);
if($result){
        
        $conn->close();
        return $result;
}
else {
        
        $conn->close();
        return false;
}

}



function view_reject()
{
$conn = db_connect();
$sql = "SELECT * from courier WHERE status='2'";
$result = $conn->query($sql);
$conn->close();
if($result)
{
    return $result;
}
else
{
    return false;
}

}




function delete_courier($id) {
    $conn = db_connect();
    $sql = "Delete from courier where id=$id";
    $conn->query($sql);
    if ($conn->affected_rows > 0) {
        $conn->close();
        return TRUE;
    } else {
        $conn->close();
        return false;
    }
}




function editstaff($id)
{
$conn = db_connect();
$sql = "SELECT * from staff where id='$id'";
$result = $conn->query($sql);
$conn->close();
if($result)
{
    return $result;
}
else
{
    return false;
}

}




function updatestaff($id, $name, $username, $password, $email,$phone, $address,$gender)
{
    $conn = db_connect();
    $stmt = $conn->prepare("update staff set name = ? , username = ? , password = ?, email = ? , phone = ? , address = ? , gender = ? where id = ?");
    $stmt->bind_param('sssssssi',$name, $username, $password, $email,$phone, $address,$gender,$id);
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















?>

