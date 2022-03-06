<html>
<body>
<form action="#" method="post">
<table>
<tr>
<th>FirstName</th>
<th>Student Id</th>
<th>Course</th>
<th>Phone no</th>
<th>Semester</th>
</tr>
<?php
include('connection.php');
$sql="SELECT * FROM student";
$result=mysqli_query($con,$sql);
if($result)
{
while($row=mysqli_fetch_row($result))
{
?>
<tr>
<td><input type="text" name=FirstName value=<?php echo $row[0]; ?>> </td>
<td><input type="text" name=StudentId value=<?php echo $row[1]; ?>> </td>
<td><input type="text" name=Course value=<?php echo $row[2]; ?>> </td>
<td><input type="text" name=PhoneNo value=<?php echo $row[3]; ?>> </td>
<td><input type="text" name=Semester value=<?php echo $row[4]; ?>> </td>
</tr>
<?php
}
}
?>
</table>
</form>
</body>
</html>


