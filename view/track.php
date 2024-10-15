<?php
include 'model/dbmodel.php';
include 'helper/OrderHelper.php';



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

        thead {
            background-color: #f6a78f;
        }

        th {
            padding: 20px;
        }

        td {
            padding: 10px;
        }

        tr {
            transition: all .2s ease-in;
            cursor: pointer;
        }

        tbody>tr:hover {
            background-color: #f5f5f5;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
        }

        @media only screen and (max-width: 768px) {
            table {
                width: 90%;
            }
        }

        .view-icon {
            color: green;
            font-size: 28px;


        }
    </style>
</head>

<body>

    <div class="box">
        <?php
        $userid = $_SESSION['user']['userid'];
        $request = view_order($userid);
        if ($request)
            $i = 0;
        ?>
        <table style=text-align:center>
            <thead>

                <tr>
                    <th>S.N</th>
                    <th> Order Name</th>
                    <th> To-</th>
                    <th> Phone</th>
                    <th> Address</th>

                    <th> Weight</th>
                    <th> Product Image</th>
                    <th> Status</th>
                    <th>Payment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                while ($row = $request->fetch_assoc()) {
                    $i++;
                    $uid = $row['uid'];
                    ?>

                    <tr>

                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['ordername']; ?></td>
                        <td><?php echo $row['rname']; ?></td>
                        <td><?php echo $row['rphone']; ?></td>
                        <td><?php echo $row['raddress']; ?></td>
                        <td><?php echo $row['weight']; ?>kg</td>
                        <td> <img src="<?php echo $row['image']; ?>" alt="pic" style="max-width: 100px;" /> </td>
                        <td><?php echo getOrderStatus($row['status']); ?></td>
                        <td><?php echo getPaymentStatus($row['payment']); ?></td>
                        <td>
                            <a href="<?= $base_url ?>?r=courierdetail&oid=<?php echo $row['oid'] ?>"
                                style=" text-decoration:none;">
                                <ion-icon name="eye-outline" class="view-icon"></ion-icon>
                            </a>
                        </td>
                    </tr>
                    <?php
                }

                ?>
            </tbody>
        </table>



    </div>

</body>

</html>