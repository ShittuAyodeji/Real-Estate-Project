<?php
if(isset($_POST['property_type'])){
	require_once "database/connect.php";
	require_once "includes/functions.php";
	$type=$_POST['property_type'];
	$address=$_POST['property_address'];
	$state=$_POST['property_state'];
	$lga=$_POST['property_lga'];
	$house_type=$_POST['house_type'];
	$land_size=$_POST['land_size'];
	$price=$_POST['price'];
	$status=$_POST['property_status'];
	$rooms=$_POST['rooms'];
	$parlours=$_POST['parlours'];
	$bath=$_POST['bath'];
	$property_id=$_POST['image_id'];
	$description=$_POST['property_description'];
	$parking=$_POST['parking'];
	
	$date_added=date('Y-m-d');
	$time=date("Y-m-d H:i:s");
if($description==""){
		$description="No Description";
	}
	$sql="INSERT INTO properties (property_id,type,house_type,status,description,land_size,room,price,region,lga,address,date_added)
		VALUES('$property_id','$type','$house_type','$status','$description',
		'$land_size','$rooms','$price','$state','$lga','$address','$date_added')";		
	$properties_result=mysqli_query($dbc,$sql) or die(mysqli_error($dbc));
	if($properties_result){
		$sql_house="INSERT INTO house (property_id,type,rooms,bath,parlour,parking_space)
		VALUES('$property_id','$house_type','$rooms','$bath','$parlours','$parking')";		
	$result=mysqli_query($dbc,$sql_house) or die(mysqli_error($dbc));
	if($result){
		echo "Thanks";
	}
	}
}
?>