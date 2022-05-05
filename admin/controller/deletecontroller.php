<html>
    <head><title>hello</title>
    


    
    <?php
include "model/dbmodel.php";

$id = "";
if(isset($_GET["id"]))
{
	$id = $_GET["id"];
}

$del = delete_courier($id);
if($del)
{
    $_SESSION['message']="Data deleted successfully";
    $_SESSION['status']="success";
    redirect("bin");
}
else
{
    $_SESSION['message']="Data not deleted successfully";
    $_SESSION['status']="error";
    redirect("bin");
}




?>


</head>
<body>
</body>
</html>