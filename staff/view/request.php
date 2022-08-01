<?php
    include 'model/dbmodel.php';
   
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Request</title>
    <style>
        body {
            margin: 50px;
    position: relative;
    left: 21rem;
    width: 45%;
        }

        table {
        position: relative;
        left: 62%;
       bottom: 10px;
        transform: translate(-37%, 0%);
        border-collapse: collapse;
    width:1000px;
        height: 200px;
        border: 1px solid #bdc3c7;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }




.head {
    position: relative;
    left: 36%;
    margin: 20px;
   
}
th{
    padding: 10px;
}
td {
    padding: 15px;
}

tr {
        transition: all .2s ease-in;
        cursor: pointer;
    }
.data:hover {
        background-color: #f5f5f5;
        transform: scale(1.02);
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }
    
    @media only screen and (max-width: 768px) {
        table {
            width: 90%;
        }
    }


    a {
    color: #fff;
}






        </style>
        <script src="https://kit.fontawesome.com/ee312ef85d.js" crossorigin="anonymous"></script>




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
  
    

    <div class="box">
    <?php
    $sid=$_SESSION['staff']['user_id'];
    $request = view_courier();
if($request)
    $i=0;
?>
<table style=text-align:center>
<div class= data>
 <?php
while ($row = $request->fetch_assoc()) {
    $i++;
   
    ?>
    <tr> <th colspan=7><h2><?php echo $i; ?>.Sender<h2></th>
</tr>
      <tr>
 
      <th> Date</th>
        <th> Name</th>
        <th> Email</th>
        <th> Phone</th>
        <th> Address</th>
        <th> weight</th>
        
        
</tr>
    <tr>
       
     
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['address']; ?></td>
        
        <td><?php echo $row['weight']; ?>kg</td>
       

</tr>
<tr> 
    <th colspan=7><h2>Receiver<h2></th>
</tr>
<tr>
    <th> Image</th>
    <th> Name</th>
    <th> Email</th>
    <th> Phone</th>
    <th> Address</th>
    <th> Action</th>
</tr>
<tr>
    <td> <img src="../<?php echo $row['image']; ?>" alt="pic" style="max-width: 100px;"/> </td>
    <td><?php echo $row['rname']; ?></td>
    <td><?php echo $row['remail']; ?></td>
    <td><?php echo $row['rphone']; ?></td>
    <td><?php echo $row['raddress']; ?></td>
    <td bgcolor=#d6491e >  <a style=color: white href=<?php echo $base_url; ?>?r=accept&uid=<?php echo $row['oid'] ;?>&sid=<?php echo $sid ; ?>><i class="fa-2x fa-regular fa-circle-check"></i></a>
</tr>
<?php
    }

?>
</div>
</table>


</div>
</body>
</html>








