<!DOCTYPE html>

<head>
    <title>Koseli.com</title>
    <link rel="stylesheet" href="css/home.css">
</head>

<body >


    <div class="navbar">
        <p class="logo">Koseli'कोसेली'</p>
        <img src="img/logo.png" class="icon">
    </div>
    <div class="content"><br><br><br>
        <h2>Online Courier <br>Management<br> System</h2>
        <p class="par">It's a online courier management system named as 'koseli' which is a web based software developed by<br> Roshan Karki and Agraj Adhikari from Sungava College. <br>It is a project of 4th of BCA.
        </p>
    </div>
    <div class="box">
        <img src="img/koseli.png" class="avatar">
        <h1>Login Here....</h1>
        <br><br><br><br>
        <form action="<?= $base_url ?>?r=login" method="post" >
          
      <!--<select name="usertype"class="id">
                <option value="1">User</option>
                 <option value="2">Staff</option>
                 <option value="3">Admin</option>
            </select> -->
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required>

            <input type="submit"  value="Sign In">
</form>

            <a href="<?php echo $base_url?>?r=lost">Lost your Password?</a><br><br><br>
         <a href="<?php echo $base_url?>?r=newreg"><h3> New Registration</h3></a>

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