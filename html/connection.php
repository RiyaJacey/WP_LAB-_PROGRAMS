<?php
$con=mysqli_connect("localhost","root","","artgallery");
if($con===false)
{
die("ERROR: could not connect. " . mysqli_connect_error());
}
echo "connection successfful. :) " . mysqli_get_host_info($con);
?>