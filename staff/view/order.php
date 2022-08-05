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
        width: 1100px;
        height: 200px;
        border: 1px solid #bdc3c7;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }

th{
    padding: 20px;
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
 } ?>

</head>
<body>

    <div class="box">
    <?php
    $sid=  $_SESSION['staff']['user_id'];
    $request = view_order($sid);
if($request)
    $i=0;
    ?>

<table style=text-align:center>
<tr>
    <th colspan='2'></th>
    <th colspan='3'>Sender</th>
    <th colspan='3'>Receiver</th>
</tr>
   <tr>
        <th> Order <br>Name</th>
        <th> Product <br>Image</th>
        <th> Name</th>
        <th> Address</th>
        <th> Phone</th>
        <th> Name</th>
        <th> Address</th>
        <th> Phone </th>
        <th> Weight</th>
        <th> Action</th>
        
</tr>
<?php
while ($row = $request->fetch_assoc()) {
   $i++;
   ?>
    <tr>
       <td><?php echo $row['ordername']; ?></td>
       <td> <img src="../<?php echo $row['image']; ?>" alt="pic" style="max-width: 100px;"/> </td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['rname']; ?></td>
        <td><?php echo $row['raddress']; ?></td>
        <td><?php echo $row['rphone']; ?></td>
        <td><?php echo $row['weight']; ?>kg</td>
        
        <?php if ($row['status'] == '3') {
                                    ?>
							<td bgcolor=#d6491e >  <a style=color: white href=<?php echo $base_url; ?>?r=deliver&sid=<?php echo $row['oid']; ?>>Delivered<i class="fa-2x fa-regular fa-circle-check"></i></a>
</td>
                                
                                
                                <?php
                                } else {
                                    ?>							
                                <td bgcolor=#d6491e color='white' > Thank you! </td>
							<?php
                                } ?>

</tr>
<?php
    }


?>

</table>


</div>
</body>
</html>








