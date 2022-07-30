<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Staff</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


<!--check session -->
<?php
            if (empty($_SESSION['staff']['login'])) 
            {
                $lin = $_SESSION['base_url'] . "?r=login";
                           header('location:' . $lin);
                          
                        } else {
                          
                        }
                        ?>
    <div class="navbar">
        <div class="navbar-koseli">
            <h1>Koseli
                <ion-icon name="bicycle"></ion-icon>
            </h1>
            <div class="navbar-menu">
                <ul>
                    <li>
                        <a href="<?= $base_url ?>?r=home"><span class="icon">
                                <ion-icon name="home-sharp"></ion-icon>
                            </span>
                            <span>Home</span></a>
                    </li>
                    <li>
                        <a href="<?= $base_url ?>?r=adminrequest"><span class="icon">
                            <ion-icon name="shield-checkmark"></ion-icon>
                            </span>
                            <span>Admin Request</span></a>
                    </li>
              
                    <li>
                        <a href="<?= $base_url ?>?r=order"><span class="icon">
                        <ion-icon name="receipt"></ion-icon>
                            </span>
                            <span>My Orders</span></a>
                    </li>
                  <!--  <li>
                        <a href="<?= $base_url ?>?r=notification"><span class="icon">
                                <ion-icon name="notifications-circle-sharp"></ion-icon>
                            </span>
                            <span>Notification</span></a>
                    </li>-->
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








    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>