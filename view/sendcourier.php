<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Courier</title>
    <link rel="stylesheet" type="text/css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
* {
    margin: 0px;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

table {
    position: relative;
    border: 2px solid;
    border-radius: 20px;
    left: 35%;
}

table td {
    padding: 10px;
}

.trans input {
    height: 43px;
    outline: none;
    font-size: 14px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
}

input[type="file"] {
    padding: 10px;
    border: none;
}
    </style>
</head>

<body>
<?php
echo $_SESSION['user']['saddress'] ;
?>


    <div class="trans">
        <form action="<?= $base_url ?>?r=sendcourier" method="post" enctype="multipart/form-data">

            <table>

                <tr>
                    <td colspan="4" >
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <th colspan="2">
                        <h2>SENDER</h2>
                    </th>
                    <th colspan="2">
                        <h2>RECEIVER</h2>
                    </th>
                </tr>
                <tr>
                    <td colspan="4">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <th colspan="2"></th>
                    <th colspan="2"></th>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="sname" value="<?php echo $_SESSION['user']['sname'] ; ?>" readonly></td>

                    <td>Name:</td>
                    <td><input type="text" name="rname" placeholder="Receiver FullName" required></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="semail" value="<?php echo $_SESSION['user']['semail'] ; ?>" readonly></td>

                    <td>Email:</td>
                    <td><input type="text" name="remail" placeholder="Receiver Email" required></td>
                </tr>
                <tr>
                    <td>PhoneNo.:</td>
                    <td><input type="number" name="sphone" value="<?php echo $_SESSION['user']['sphone'] ; ?>" readonly></td>

                    <td>PhoneNo.:</td>
                    <td><input type="number" name="rphone" placeholder="Receiver number" required></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" name="saddress" value="<?php echo $_SESSION['user']['saddress'] ; ?>" readonly></td>

                    <td>Address:</td>
                    <td><input type="text" name="raddress" placeholder="Receiver address" required></td>
                </tr>
                <tr>
                    <td>Geo-location:</td>
                    <td><input type="text" name="slocation" placeholder="eg-27.571883,84.533984" required></td>

                    <td>Geo-location:</td>
                    <td><input type="text" name="rlocation" placeholder="eg-27.571883,84.533984" required></td>
                </tr>

                <tr>
                    <td>Weight:</td><br><br>
                    <td><input type="number" name="weight" placeholder="Weights in kg" required></td>
                    <td>Date:</td>
                    <td><input type="date" name="date"></td>

                </tr>
                <tr>
    </div>

    <td>Items Image:</td>

    <td><input type="file" name="simg"></td>
    </tr>
    <tr>
        <td colspan="4" align="center"><input type="submit" name="submit" value="Place Order" style="background-color: orange; border-radius: 15px; width: 140px; height: 50px;cursor:pointer;"></td>
    </tr>
    </table>

    </form>
</body>

</html>