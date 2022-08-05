<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Add a Staff</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
* {
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    height: 100vh;
    position: fixed;
    justify-content: center;
    align-items: center;
    padding: 60px;
    margin-left: 35%;
}

.container {
    position: relative;
    max-width: 700px;
    width: 100%;
    background-color: #fff;
    padding: 25px 30px;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
}



.container .title {
    font-size: 25px;
    font-weight: 500;
    position: relative;
    text-align: center;
}

.content form .user-details {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 20px 0 12px 0;
}

form .user-details .input-box {
    margin-bottom: 15px;
    width: calc(100% / 2 - 20px);
}

form .input-box span.details {
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
}

.user-details .input-box input {
    height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
}

form .button {
    height: 45px;
    margin: 35px 0
}

form .button input {
    height: 100%;
    width: 100%;
    border-radius: 5px;
    border: none;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    background: rgb(212, 87, 38);
}

form .gen select {
    position: relative;
    top: 8px;
    width: 100px;
    height: 30px;
    text-align: center;
    border-radius: 5px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
}

form .button input:hover {
    transform: scale(0.99);
    background: rgb(206, 154, 154);
    color: black;
}

@media(max-width: 584px) {
    .container {
        max-width: 100%;
    }
    form .user-details .input-box {
        margin-bottom: 15px;
        width: 100%;
    }
    form .category {
        width: 100%;
    }
    .content form .user-details {
        max-height: 300px;
        overflow-y: scroll;
    }
    .user-details::-webkit-scrollbar {
        width: 5px;
    }
}

@media(max-width: 459px) {
    .container .content .category {
        flex-direction: column;
    }
}

        </style>




<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <?php
 if(isset($_SESSION['message'])&& $_SESSION['message'] !='')
 {
     ?>
       <script>
        swal({
  title: "<?php echo $_SESSION['message'];?>",
  //text: "You clicked the button!",
  icon: "<?php echo $_SESSION['status'];?>",
  button: "ok",
});
        </script>
     <?php
     unset($_SESSION['message']);
 } 
  ?>
  




  <script type="text/javascript" >
        function check() {
            var len = document.form.password.value.length;
            if (len > 7){
                document.getElementById("perror").innerHTML ="";
            } 
            else {
                document.getElementById("perror").innerHTML ="Poor";
            }
        }
        function name_validate() {
    var name = document.forms["form"]["name"].value;
    var nameformat = /^[a-zA-Z\s]*$/;
    if (name.trim() == "") {
        document.getElementById('nerror').innerHTML = "Name required";
        
    } else if (!nameformat.test(name)) {
        document.getElementById('nerror').innerHTML = "Name only contain alphabates";
        
    } else {
        document.getElementById('nerror').innerHTML = "";
       
    }

}

function username_validate(){
    var uname = document.forms["form"]["username"].value;
    if (uname.trim() == "") {
        document.getElementById('uerror').innerHTML = "UserName required";
       
    } else {
        document.getElementById('uerror').innerHTML = "";
        
    }
}

function password_validate(){
    var pass = document.forms["form"]["password"].value;
    var cpass = document.forms["form"]["confirmpassword"].value;
    if (cpass != pass) {
        document.getElementById('cerror').innerHTML = "Password not matched";
       
    } else {
        document.getElementById('cerror').innerHTML = "";
       
    }
}

function email_validate(){
    var email = document.forms["form"]["email"].value;
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
    var phone = document.forms["form"]["phone"].value;
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
    var address = document.forms["form"]["address"].value;
    if (address.trim() == "") {
        document.getElementById('adderror').innerHTML = "Address required";
      
    } else {
        document.getElementById('adderror').innerHTML = "";
       
    }
}
        </script>

        <!--end of validation-->













</head>

<body>

    <div class="container">


        <div class="title">Add a Delivery Person</div>
        <div class="content">
            <form action="<?= $base_url ?>?r=addperson" method="POST" name="form">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <span id='nerror' style="color: red;"></span>
                        <input type="text" name="name" placeholder="person name" value="<?php echo isset($_POST['name'])? $_POST['name']:''; ?>" oninput="name_validate();">
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <span id='uerror' style="color: red;"></span>
                        <input type="text" name="username" placeholder="person username" value="<?php echo isset($_POST['username'])? $_POST['username']:''; ?>" oninput="username_validate();"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <span id='perror' style="color: red;"></span>
                        <input type="password" name="password" placeholder="person password" value="<?php echo isset($_POST['password'])? $_POST['password']:''; ?>" oninput="check();"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <span id='cerror' style="color: red;"></span>
                        <input type="password" name="confirmpassword" placeholder="Confirm password" value="<?php echo isset($_POST['confirmpassword'])? $_POST['confirmpassword']:''; ?>" oninput="password_validate();"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <span id='eerror' style="color: red;"></span>
                        <input type="text" name="email" placeholder="person's email" value="<?php echo isset($_POST['email'])? $_POST['email']:''; ?>" oninput="email_validate();"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <span id='pherror' style="color: red;"></span>
                        <input type="text" name="phone" maxlength="10" placeholder="person's number" value="<?php echo isset($_POST['phone'])? $_POST['phone']:''; ?>"  oninput="phone_validate();"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <span id='aerror' style="color: red;"></span>
                        <input type="text" name="address" placeholder="person address" value="<?php echo isset($_POST['address'])? $_POST['address']:''; ?>" oninput="address_validate();"required>
                    </div>
                    <div class="input-box">
                        <span class="details">Gender</span>
                        <div class="gen">
                            <select name="gender" class="gen">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
                        </div>
                    </div>


                </div>
                <div class="button">
                    <input type="submit" value="Add" onclick="return confirm('Are you sure you want to Register?')">
                </div>
            </form>
        </div>
    </div>

