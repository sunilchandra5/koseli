<!DOCTYPE html>

<head>
    <title>Change password</title>
    <link rel="stylesheet" href="css/lostpass.css">
</head>

<body>

    <div class="box">
        <h1>Enter the new Password</h1>
        <br><br><br><br>
        <form action="<?php echo $base_url?>?r=newpass" method="post">

            <!--<select name="usertype"class="id">
                <option value="1">User</option>
                 <option value="2">Staff</option>
                 <option value="3">Admin</option>
            </select> -->
            <?php
        if($password){
            while ($row = $password->fetch_assoc()) {
            ?>
             <p>Name</p>
            <input type="email" name="email" value=<?php echo $row['name'] ?> readonly>

            <p>Email</p>
            <input type="email" name="email" value=<?php echo $row['email'] ?> readonly>
            <p>New Password</p>
            <input type="text" name="newpassword" placeholder="New Password" required>
            <p>Confirm Password</p>
            <input type="text" name="newcpassword" placeholder="New Password" required>

            <input type="submit" value="Change">
           <?php 
            }}
            ?>
        </form>
        


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