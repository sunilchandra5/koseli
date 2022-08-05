<?php
    include 'model/dbmodel.php';
    ?>



    <style>



a {
    color: #fff;
}





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



.user {
    position: relative;
    left: 60%;
   
}
.head {
    position: relative;
    left: 36%;
    margin: 20px;
   
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






    <div class="box">
    <?php
    $request = view_order();
if($request)
   
?>
<table style=text-align:center>
   <tr>
   <th> User</th>
   <th> Staff</th>
   <th> Date</th>
        <th> Order <br> Name</th>
        <th> To-</th>
        <th> Phone</th>
        <th> Weight</th>
      
        <th> Image</th>
        <th> Status</th>
        
</tr><?php
while ($row = $request->fetch_assoc()) {
  
    $uid= $row['oid'];
    ?>
    <tr>
    <td> <a style="color:black" href="<?php echo $base_url; ?>?r=sender&uid=<?php echo $row['id']; ?>"> <button>Details</button> </a></td>
        
        <?php
        if ($row['sid'] !=0){
            ?>
            <td> <a style="color:black" href="<?php echo $base_url; ?>?r=approvestaff&sid=<?php echo $row['sid']; ?>">  <button>Details</button></a></td>
       <?php } else {
        ?>
        <td>- - - </td>
        <?php
       }


        
        ?>
    <td><?php echo $row['date']; ?></td>
    
        <td><?php echo $row['ordername']; ?></td>
        
        <td><?php echo $row['rname']; ?></td>
        <td><?php echo $row['rphone']; ?></td>
        <td><?php echo $row['weight']  ; ?>KG</td>
        
        <td> <img src="../<?php echo $row['image']; ?>" alt="pic" style="max-width: 100px;"/> </td> 
        
        <?php
         

switch($row['status']) {
    case 0:
        ?>
        <td bgcolor=grey><b>Pending</b></td>
        <?php
    break;
    case 1:
        ?>
        <td bgcolor=yellow >Approved</td>
        <?php
    break;
    case 2:
        ?>
        <td bgcolor=red style="color:white"><b>Rejected</b></td>
        <?php
    break;
    case 3:
        ?>
        <td bgcolor=blue style="color:white">
            Staff<br> Approved
        </td>
        <?php
    break;
    case 4:
        ?>
        <td bgcolor=green style="color:white">Completed</td>
        <?php
    break;
    default:
      }  ?></td>
    

</tr>
<?php
}

?>

</table>


</div>