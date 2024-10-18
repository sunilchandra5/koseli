<?php

function db_connect()
{
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



function view_courier()
{
    $conn = db_connect();
    $sql = "SELECT * from courier INNER JOIN user ON courier.uid=user.id WHERE courier.status='1'";
    $result = $conn->query($sql);
    $conn->close();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function fetch_couriers_based_on_location($latitude, $longitude, $radius)
{
    $conn = db_connect();
    $sql = "SELECT user.*,courier.*, ( 6371 * acos( cos( radians(?) ) * cos( radians(platitude) ) * cos( radians(plongitude) - radians(?) ) + sin( radians(?) ) * sin( radians(platitude) ) ) ) AS distance FROM courier 
    INNER JOIN user ON courier.uid = user.id WHERE courier.status = '1' HAVING distance < ? ORDER BY distance;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dddi", $latitude, $longitude, $latitude, $radius);
    $stmt->execute();
    $result = $stmt->get_result();
    $conn->close();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}



function accept($sid, $uid)
{
    $conn = db_connect();
    $sql = "UPDATE courier SET sid='$sid', status='3'  WHERE oid='$uid'";
    $result = $conn->query($sql);
    if ($result) {

        $conn->close();
        return $result;
    } else {

        $conn->close();
        return false;
    }

}

function view_order($sid)
{
    $conn = db_connect();

    $sql = "SELECT * from courier JOIN user ON courier.uid=user.id WHERE courier.sid='$sid'";
    $result = $conn->query($sql);
    $conn->close();
    if ($result) {
        return $result;
    } else {
        return false;
    }

}





function deliver($sid)
{
    $conn = db_connect();
    $sql = "UPDATE courier SET status='4' WHERE oid=$sid";
    $result = $conn->query($sql);
    if ($result) {

        $conn->close();
        return $result;
    } else {

        $conn->close();
        return false;
    }

}





function delete($id)
{
    $conn = db_connect();
    $sql = "Delete from courier where oid=$id";
    $conn->query($sql);
    if ($conn->affected_rows > 0) {
        $conn->close();
        return TRUE;
    } else {
        $conn->close();
        return false;
    }
}

function find_courier_by_oid($oid)
{
    $conn = db_connect();
    $sql = "SELECT * FROM `courier` WHERE `oid` = ?";

    // Prepare statement to avoid SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $oid); // "i" means integer

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the associative array
        $courierData = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $courierData; // Return the associative array
    } else {
        $stmt->close();
        $conn->close();
        return false; // No results found
    }
}

function update_payment_status($orderId, $status)
{
    $conn = db_connect();
    $sql = "UPDATE `payment` SET `status`='$status' WHERE `courier_id`=$orderId";
    $result = $conn->query($sql);
    if ($result) {
        $conn->close();
        return $result;
    } else {

        $conn->close();
        return false;
    }
}

function update_courier_payment_status($courier_id, $status)
{
    $conn = db_connect();

    // Prepare the SQL statement
    $stmt = $conn->prepare("UPDATE `courier` SET `payment` = ? WHERE `oid` = ?");

    // Bind parameters to the prepared statement
    $stmt->bind_param("ii", $status, $courier_id); // "ii" means both parameters are integers

    // Execute the statement
    $result = $stmt->execute();

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    return $result; // Return the result of the execution
}


?>