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
</head>
<body>

    <div class="box">
    <?php
    $userid= $_SESSION['user']['userid'];
    $request = view_order($userid);
if($request)
    $i=0;
?>
<table style=text-align:center>
   <tr>
   <th>S.N</th>
        <th> Order Name</th>
        <th> To-</th>
        <th> Phone</th>
        <th> Address</th>
        
        <th> Weight</th>
        <th> Product Image</th>
<th> Status</th>
        
</tr><?php
while($row = $request->fetch_assoc()) {
    $i++;
    $uid= $row['uid'];
    ?>
    <tr>
       
        <td><?php echo $i; ?></td>
        <td><?php echo $row['ordername']; ?></td>
        <td><?php echo $row['rname']; ?></td>
        <td><?php echo $row['rphone']; ?></td>
        <td><?php echo $row['raddress']; ?></td>
        
        <td><?php echo $row['weight']; ?>kg</td>
        <td> <img src="<?php echo $row['image']; ?>" alt="pic" style="max-width: 100px;"/> </td>


<?php
switch($row['status']) {
    case 0:
        ?>
        <td>Pending</td>
        <?php
    break;
    case 1:
        ?>
        <td>Admin has Approved</td>
        <?php
    break;
    case 2:
        ?>
        <td>Your Courier has been Rejected</td>
        <?php
    break;
    case 3:
        ?>
        <td>Your Courier is on the way</td>
        <?php
    break;
    case 4:
        ?>
        <td>Your Courier has been Sucessfully delivered</td>
        <?php
    break;
    default:
    ?>
    <td>error</td>
    <?php
 
}
?>


       

</tr>
<?php
}

?>

</table>



</div>

</body>
</html>
