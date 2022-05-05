<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>New user Registration</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="css/registration.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>





    <div class="container">
        <div class="title">Registration</div>
        <div class="content">
            <form action="<?= $base_url ?>?r=newreg" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" name="confirmpassword" placeholder="Confirm your password" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" name="phone" placeholder="Enter your number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <input type="text" name="address" placeholder="Enter your number" required>
                    </div>
                    <div class="input-box">
                        <span class="details".
                        >Gender</span>
                        <div class="gen">
                            <select name="gender" class="gen">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

        
                        </div>
                    </div>


                </div>
                <div class="button">
                    <input type="submit" name="submit" value="Register" >
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