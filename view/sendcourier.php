<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Courier</title>

    <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
    type="text/css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
   
<!-- Date picker -->
    <script language="javascript">
        $(document).ready(function () {
            $("#date_picker").datepicker({
                minDate: 0
            });
        });

        $("#FilUploader").change(function () {
        var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Only formats are allowed : "+fileExtension.join(', '));
        }
    });
    </script>




<script type="text/javascript">

function name_validate() {
    var name = document.forms["form"]["rname"].value;
    var nameformat = /^[a-zA-Z\s]*$/;
    if (name.trim() == "") {
        document.getElementById('nerror').innerHTML = "Name required";
        
    } else if (!nameformat.test(name)) {
        document.getElementById('nerror').innerHTML = "Name only contain alphabates";
        
    } else {
        document.getElementById('nerror').innerHTML = "";
       
    }

}

function email_validate(){
    var email = document.forms["form"]["remail"].value;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email.trim() == "") {
        document.getElementById('eerror').innerHTML = "Email required";
       
    } else if (!mailformat.test(email)) {
        document.getElementById('eerror').innerHTML = "Email is not valid";
       
    } else {
        document.getElementById('eerror').innerHTML = "";
       
    }
}

function phone_validate(){
    var phone = document.forms["form"]["rphone"].value;
    var phoneformat = /^([8-9]{2})*([0-9]{8})*$/;
    if (phone.trim() == "") {
        document.getElementById('pherror').innerHTML = "Phone number requiered";
       
    }
    if (!phoneformat.test(phone)) {
        document.getElementById('pherror').innerHTML = "starts with 98-- and exact 10 digts";
      

    } else {
        document.getElementById('pherror').innerHTML = "";
        
    }
}

function address_validate(){
    var address = document.forms["form"]["raddress"].value;
    if (address.trim() == "") {
        document.getElementById('adderror').innerHTML = "Address required";
      
    } else {
        document.getElementById('adderror').innerHTML = "";
       
    }
}


function date_validate(){
    var address = document.forms["form"]["date"].value;
    if (address.trim() == "") {
        document.getElementById('derror').innerHTML = "Date required";
      
    } else {
        document.getElementById('derror').innerHTML = "";
       
    }
}

function isImage($image){
    $extension = pathinfo($image, PATHINFO_EXTENSION);
    $imgExtArr = ['jpg', 'jpeg', 'png'];
    if(in_array($extension, $imgExtArr)){
        return true;
    }
    return false;
}
    </script>






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


    <div class="trans">
        <form action="<?= $base_url ?>?r=sendcourier" method="post" name="form" enctype="multipart/form-data" onsubmit="return isImage($_POST['simg'];)">

            <table>
            <td>Name Of the Order:</td>
                    <td><input type="text" name="ordername" required></td>


                <tr>
                    <td colspan="4" > 
                        <span id='nerror' style="color: red;"></span>
                        <span id='eerror' style="color: red;"></span>
                        <span id='pherror' style="color: red;"></span>
                        <span id='adderror' style="color: red;"></span>
                        <span id='derror' style="color: red;"></span>
                    </td>
                    <td>
                        
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
                    
                    <td><input type="text" value="<?php echo $_SESSION['user']['sname'] ; ?>" readonly></td>
                   
                    <td>Name:</td>
                   
                    <td><input type="text" name="rname" placeholder="Receiver FullName" oninput="name_validate();"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" value="<?php echo $_SESSION['user']['semail'] ; ?>" readonly></td>

                    <td>Email:</td>
                    <td><input type="text" name="remail" placeholder="Receiver Email"oninput="email_validate();" required></td>
                </tr>
                <tr>
                    <td>PhoneNo.:</td>
                    <td><input type="number" value="<?php echo $_SESSION['user']['sphone'] ; ?>" readonly></td>

                    <td>PhoneNo.:</td>
                    <td><input type="text" maxlength="10" name="rphone" placeholder="Receiver number" oninput="phone_validate();"></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" value="<?php echo $_SESSION['user']['saddress'] ; ?>" readonly></td>

                    <td>Address:</td>
                    <td><input type="text" name="raddress" placeholder="Receiver address" oninput="address_validate();"></td>
                </tr>
               

                <tr>
                    <td>Weight:</td><br><br>
                    <td><input type="number" name="weight" placeholder="Weights in kg" min="1"  value="1" required></td>
                    <td>Date:</td>
                    <td><input type="text" id="date_picker" name="date" oninput="date_validate();"></td>

                </tr>
                <tr>
    </div>

    <td>Items Image:</td>
    <span id='error' style="color: red;"></span>

    <td><input type="file" name="simg" id="FilUploader" onfocus="file()"></td>
    </tr>
    <tr>
        <td colspan="4" align="center">
            <input type="submit" name="submit" value="Place Order" style="background-color: orange; border-radius: 15px; width: 140px; height: 50px;cursor:pointer;" onclick="return confirm('Are you sure you want to continue?')"></td>
    </tr>
    </table>

    </form>
</body>

</html>