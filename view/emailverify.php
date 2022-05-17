<!DOCTYPE html>

<head>
    <title>Email Verify</title>
    <link rel="stylesheet" href="css/lostpass.css">
</head>

<body>

    <div class="box">
        <h1>Verify the Following Details</h1>
        <br><br><br><br>
        <form action="<?php echo $base_url?>?r=lost" method="post">

            <!--<select name="usertype"class="id">
                <option value="1">User</option>
                 <option value="2">Staff</option>
                 <option value="3">Admin</option>
            </select> -->
            <p>Email</p>
            <input type="email" name="lemail" placeholder="Email" required>


            <input type="submit" value="Verify">
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