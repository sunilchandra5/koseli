

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Document</title>
    <style>
        body {
            margin: 50px;
    position: relative;
    left: 23rem;
    width: 45%;
        }
table {
    width: 155%;
    border-collapse: collapse;
    border: 1px solid #bdc3c7;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
}
.user {
    position: relative;
    left: 60%;
    margin: 20px;
   
}
th{
    padding:15px;
}
td {
    padding: 10px;
}
tr {
        transition: all .2s ease-in;
        cursor: pointer;
    }

tr:hover {
        background-color: #f5f5f5;
        transform: scale(1.02);
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    
    }
    
    @media only screen and (max-width: 768px) {
        table {
            width: 90%;
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



</head>
<body>
  
    <div class="user">
    <h1>USERS</h1>
</div>

    <div class="box">
    <?php
   
if($users)
$i=0;
echo"
<table border=1 style=text-align:center>


   <tr>
        <th> S.N</th>
        <th> Name</th>
        <th> Username</th>
        <th> Email</th>
        <th>Phone</th>
        <th> Address</th>
        <th> Gender</th>
        <th colspan=2> Action</th>
</tr>";
while ($row = $users->fetch_assoc()) {
    $i++;
    echo"
    <tr>
       
        <td>".$i."</td>
        <td>". $row["name"] ."</td>
        <td>". $row["username"] ."</td>
        <td>". $row["email"] ."</td>
        <td>". $row["phone"] ."</td>
        <td>". $row["address"] ."</td>
        <td>". $row["gender"] ."</td>
        <td>  <a href=". $base_url."?r=edituser&id=".$row["id"]."><ion-icon name='create-outline'></ion-icon></a> </td>
        <td>  <a href=". $base_url."?r=deleteuser&id=".$row["id"]."><ion-icon name='trash-outline'></ion-icon></a> </td>
</tr>";
}


echo "</table>";
?>

</div>




  
</body>
</html>