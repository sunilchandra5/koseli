
<?php

function db_connect() {
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


function db_login($username, $password) {

    $conn = db_connect();

    $sql = "SELECT * FROM user where username='$username' and password='$password' limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) 
    {
        $row = $result->fetch_assoc();
        return $row;
    } 
    else 
    {
        return false;
    }
}

 
function find_user_by_username($username)
{
    $conn= db_connect();
    $sql = "SELECT * FROM user where username='$username' limit 1";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function register_new_user($usertype, $name, $username, $password, $email,$phone, $address,$gender)
{

    $conn = db_connect();
    $stmt = $conn->prepare("INSERT INTO user (usertype, name,username,password,email,phone,address,gender) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param ('isssssss', $usertype, $name, $username, $password, $email,$phone, $address,$gender);
    


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

function send_courier($user,$sname,$semail,$sphone,$saddress,$slocation,$rname,$remail,$rphone,$raddress,$rlocation,$weight,$date,$target)
{
    $conn =db_connect();
    $stm = $conn->prepare("INSERT INTO courier (uid,sname,semail,sphone,saddress,slocation,rname,remail,rphone,raddress,rlocation,weight,date,image) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stm->bind_param('issssssssssiss',$user, $sname, $semail, $sphone, $saddress, $slocation, $rname, $remail, $rphone, $raddress, $rlocation, $weight, $date, $target);

    $result = $stm->execute();
    if ($result){
        $stm->close();
        $conn->close();
        return $result;
    }
    else {
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
if($result)
{
    return $result;
}
else
{
    return false;
}

}

?>