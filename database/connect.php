<?php
$connect_error = 'We are experiencing down time';
$dbc = mysqli_connect('localhost','root','','security') 
		   or die($connect_error);
?>