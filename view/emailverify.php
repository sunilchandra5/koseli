<!DOCTYPE html>

<head>
    <title>Email Verify</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            margin: 100px;
            font-family: sans-serif;
            background: linear-gradient(to top, rgb(0, 0, 0, 0.6)50%, rgba(0, 0, 0, 0.6)50%);
        }
        
        .box {
            box-shadow: 0 0 30px rgb(0, 0, 0);
            color: #fff;
            position: fixed;
            box-sizing: border-box;
            border-radius: 6%;
            padding: 10px 30px;
        }
        
        .box p {
            margin: 0;
            padding: 0;
            font-weight: bold;
        }
        
        .box input {
            width: 100%;
            margin-bottom: 20px;
        }
        
        .box input[type="email"]{
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
        }
        
        .box input[type="submit"] {
            border: none;
            outline: none;
            height: 40px;
            background: #d6491e;
            color: rgb(255, 255, 255);
            font-size: 18px;
            border-radius: 20px;
        }
        
        .box input[type="submit"]:hover {
            cursor: pointer;
            background: #ffffff;
            color: #000;
        }
    </style>
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