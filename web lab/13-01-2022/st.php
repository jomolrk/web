<html>
<body>
<table>
<tr> <th>sid</th>
<th>fname</th>
<th>lname</th>
<th>phno</th>
<th>course</th>
<th>semester</th></tr>
<?php
include('connection.php');
$sql="SELECT * FROM `studentid1` ";
$result=mysqli_query($link,$sql);
if($result)
{
while($row=mysqli_fetch_row($result))
{
?>
<tr><td><?php echo $row[0];?></td>
<td><?php echo $row[1];?></td>
<td><?php echo $row[2];?></td>
<td><?php echo $row[3];?></td>
<td><?php echo $row[4];?></td>
<td><?php echo $row[5];?></td></tr>
<?php
}
}
?>
</table></body></html>

