<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>New user Registration</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="css/registration.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="controller/javascript/validation.js">
  
    </script>

    
    <script type="text/javascript">
        function check() {
            var len = document.form.password.value.length;
            if (len > 7){
                document.getElementById("perror").innerHTML ="<span style='color: green;'>Gooooooood</span>";
            } 
            else {
                document.getElementById("perror").innerHTML ="Poor";
            }
        }
        </script>
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
                        <input type="text" name="name" id="name" placeholder="Enter your name">
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <span id='uerror' style="color: red;"></span>
                        <input type="text" name="username" placeholder="Enter your username">
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span><span id="pass"></span>
                        <span id='perror' style="color: red;"></span>
                        <input type="password" name="password"  placeholder="Enter your password"  oninput="check()">
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <span id='cerror' style="color: red;"></span>
                        <input type="password" name="confirmpassword" placeholder="Confirm your password">
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <span id='eerror' style="color: red;"></span>
                        <input type="text" name="email" placeholder="Enter your email">
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <span id='pherror' style="color: red;"></span>
                        <input type="text" name="phone" maxlength="10" placeholder="Enter your number">
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <span id='adderror' style="color: red;"></span>
                        <input type="text" name="address" placeholder="Enter your Address">
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