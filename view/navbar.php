<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


<!--check session -->
<?php
            if (empty($_SESSION['user']['login'])) 
            {
                $lin = $_SESSION['base_url'] . "?r=login";
                           header('location:' . $lin);
                          
                        } else {
                          
                        }
                        ?>









    <div class="navbar">
        <div class="navbar-koseli">
            <h1>Koseli<ion-icon name="bicycle"></ion-icon></h1>
            <div class="navbar-menu">
                <ul>
                    <li>
                        <a href="<?= $base_url ?>?r=site"><span class="icon">
                                <ion-icon name="home-sharp"></ion-icon>
                            </span>
                            <span>Home</span></a>
                    </li>
                    <li>
                        <a href="<?= $base_url ?>?r=price"><span class="icon">
                        <ion-icon name="cash"></ion-icon>
                            </span>
                            <span>Prices</span></a>
                    </li>
                    <li>
                        <a href="<?= $base_url ?>?r=sendcourier"><span class="icon">
                            <ion-icon name="send"></ion-icon>
                            </span>
                            <span>Send Courier</span></a>
                    </li>
                    <li>
                        <a href="<?= $base_url ?>?r=track"><span class="icon">
                            <ion-icon name="location"></ion-icon>
                            </span>
                            <span>Track</span></a>
                    </li>
                
                 
                    <li>
                        <a href="<?= $base_url ?>?r=logout"><span class="icon">
                                <ion-icon name="log-out-sharp"></ion-icon>
                            </span>
                            <span>logout</span></a>
                    </li>
                </ul>
                
            </div>

        </div>

    </div>
  



    <div class="footer">
 <p>Copyright@Agraj Adhikari<br>
  <a href="koseli@gmail.com">koseli@gmail.com</a></p>
</div>

 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>






    <script src="javascript/sweetalert.js"></script>
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
