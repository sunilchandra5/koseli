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
    $i=0;
    $request = view_courier();
if($request)
 
?>
<table style=text-align:center>
   <tr>
   <th> S.N</th>
        <th> Order Name</th>
        <th> To-</th>
        <th> Phone</th>
        <th> Weight</th>
        <th> Sender</th>
        <th> Image</th>
        <th> Action</th>
        
</tr><?php
while ($row = $request->fetch_assoc()) {
  
    $i++;
    $uid= $row['oid'];
    ?>
    <tr>
       
    <td><?php echo $i; ?></td>
        <td><?php echo $row['ordername']; ?></td>
        
        <td><?php echo $row['rname']; ?></td>
        <td><?php echo $row['rphone']; ?></td>
        <td><?php echo $row['weight']  ; ?>KG</td>
        <td><a style="color:black" href="<?php echo $base_url; ?>?r=sender&uid=<?php echo $row['id']; ?>"> <button>Details</button></a></td>
        
        <td> <img src="../<?php echo $row['image']; ?>" alt="pic" style="max-width: 100px;"/> </td> 
        <td bgcolor=#d6491e >  <a style=color: white href=<?php echo $base_url; ?>?r=accept&uid=<?php echo $uid; ?>><i class="fa-2x fa-solid fa-user-check"></i></a><br><br>
        <a style="color:" white href=<?php echo $base_url; ?>?r=reject&uid=<?php echo $uid; ?>><i class="fa-2x fa-solid fa-ban"></i></a></td>
    

</tr>
<?php
}
?>

</table>


</div>









