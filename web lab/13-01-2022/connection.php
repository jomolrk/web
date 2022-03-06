<?php
$link=mysqli_connect("localhost","root","","student");
if($link===false)
{
die("ERROR: could not connect to database:".mysqli_connect_error());
}
echo"connected successfully".mysqli_get_host_info($link);
?>

