<?php
require_once "database/connect.php";
include "includes/functions.php";
	$image_id = $_POST["image_id"];
	$upload_dir = "property_images/";
	$image = $_FILES['property_image']['name'];
	$filetype = $_FILES['property_image']['type'];
	$filesize = $_FILES['property_image']['size'];
	$filetmp  = $_FILES['property_image']['tmp_name'];
	$allowed =  array('gif','GIF','png','PNG','jpg','jpeg','JPEG','JPG');
	$ext = pathinfo($image, PATHINFO_EXTENSION);
	$imagename = explode('.',$_FILES['property_image']['name']);
	$imagename = $imagename[0];
	$imagename = $imagename.'-'.rand(5,time()).".".$ext;
	$property_image    = $upload_dir.$imagename;
		if(!empty($image) && in_array($ext,$allowed)){
		if(move_uploaded_file($filetmp,$property_image))
		{
	$sql_image="INSERT INTO property_images (property_id,image_link)
		VALUES('$image_id','$property_image')";		
	$image_result=mysqli_query($dbc,$sql_image) or die("error");
	if($image_result){
		echo "uploaded|".$property_image;
	}else{
		echo "error";
	}
		}
	}else{
		echo "Invalid Image";
	}
 mysqli_close($dbc);


 ?>