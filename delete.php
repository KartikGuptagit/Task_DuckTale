<?php

include("connection.php");
error_reporting(0);

$id=$_GET['id'];
$query="DELETE FROM user_records WHERE id='$id'";
//echo $query;

$data=mysqli_query($conn,$query);

if($data)
{
	//echo "<script>alert('record delete from database')</script>";
?>

<META HTTP-EQUIV="Refresh" CONTENT="0 ;URL=http://localhost/DuckTale_task/display.php">
<?php
}

else
{
	echo "failed to delete records";
}
?>