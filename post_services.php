<?php
if(isset($_POST['service_type'])){
	require_once "database/connect.php";
	require_once "includes/functions.php";
	$upload_dir='services-photo/';
	$service_type=$_POST['service_type'];
	$company=$_POST['company'];
	$address=$_POST['address'];
	$website=$_POST['website'];
	$phone=$_POST['phones'];
	$email=$_POST['email'];
	$admin=$_POST['admin'];
	$description=$_POST['description'];
	$date_added=date('Y-m-d');
	$time=date("Y-m-d H:i:s");
	
	$image = $_FILES['logo']['name'];
	$filetmp  = $_FILES['logo']['tmp_name'];
	$allowed =  array('gif','GIF','png','PNG','jpg','jpeg','JPEG','JPG');
	$ext = pathinfo($image, PATHINFO_EXTENSION);
	$imagename = explode('.',$image);
	$imagename = $imagename[0];
	$imagename = $imagename.'-'.rand(5,time()).".".$ext;
	$image_path    = $upload_dir.$imagename;
		if(!empty($image) && in_array($ext,$allowed)){
		if(move_uploaded_file($filetmp,$image_path))
		{
			$query="INSERT INTO services (service_type, address, website, phone, email, admin, description, company, image_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$sql=$dbc->prepare($query)  or die(mysqli_error($dbc));	
		$sql->bind_param('sssssssss',$service_type,$address,$website,$phone,$email,$admin,$description,$company,$image_path);
	$result=$sql->execute() or die(mysqli_error($dbc));
	if($result){
		echo "Thanks";
	}
}	
}
}
?>