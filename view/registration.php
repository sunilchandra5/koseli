<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>New user Registration</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="css/registration.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript">
  
    </script>

    <!--this is the javascript validation -->
    
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
        <script type="text/javascript" src="controller/javascript/validation.js"></script>
</head>

<body>





    <div class="container">
        <div class="title">Registration</div>
        <div class="content">
            <form action="<?= $base_url ?>?r=newreg" method="post" name="form" onsubmit="return validation();">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <span id='nerror' style="color: red;"></span>
                        <input type="text" name="name" id="name" placeholder="Enter your name" value="<?php echo isset($_POST['name'])? $_POST['name']:''; ?>"oninput="name_validate();">
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <span id='uerror' style="color: red;"></span>
                        <input type="text" name="username" placeholder="Enter your username" value="<?php echo isset($_POST['username'])? $_POST['username']:''; ?>" oninput="username_validate();">
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span><span id="pass"></span>
                        <span id='perror' style="color: red;"></span>
                        <input type="password" name="password"  placeholder="Enter your password" value="<?php echo isset($_POST['password'])? $_POST['password']:''; ?>" oninput="check()">
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <span id='cerror' style="color: red;"></span>
                        <input type="password" name="confirmpassword" placeholder="Confirm your password" value="<?php echo isset($_POST['confirmpassword'])? $_POST['confirmpassword']:''; ?>" oninput="password_validate()">
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <span id='eerror' style="color: red;"></span>
                        <input type="text" name="email" placeholder="Enter your email" value="<?php echo isset($_POST['email'])? $_POST['email']:''; ?>"oninput= "email_validate() ">
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <span id='pherror' style="color: red;"></span>
                        <input type="text" name="phone" maxlength="10" placeholder="Enter your number" value="<?php echo isset($_POST['phone'])? $_POST['phone']:''; ?>"oninput="phone_validate()">
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <span id='adderror' style="color: red;"></span>
                        <input type="text" name="address" placeholder="Enter your Address" value="<?php echo isset($_POST['address'])? $_POST['address']:''; ?>" oninput="address_validate()">
                    </div>
                    <div class="input-box">
                        <span class="details".>Gender</span>
                        <div class="gen">
                            <select name="gender" class="gen">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

        
                        </div>
                    </div>


                </div>
                <div class="button">
                    <input type="submit" name="submit" value="Register" onclick="return confirm('Are you sure you want to Register?')"/>
                </div>
            </form>
        </div>
    </div>


    
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
   

</body>

</html>