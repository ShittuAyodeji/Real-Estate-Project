<?php
if(isset($_POST['update_firstname'])){
include "database/connect.php";
include "includes/functions.php";
include "includes/session.php";
	if(isset($_SESSION['user_id'])){
	$registrant_id=$_SESSION['user_id'];

	$employee_type=secure_input($_POST['update_role']);
	$employee_firstname=secure_input($_POST['update_firstname']);
	$employee_lastname=secure_input($_POST['update_lastname']);
	/* $employee_phone=$_POST['user_phone']; */
	$employee_email=$_POST['update_email'];
	$employee_address1=secure_input($_POST['update_address1']);
	$employee_address2=secure_input($_POST['update_address2']);
	$user_id=secure_input($_POST['update_id']);
	$update_type=secure_input($_POST['update_type']);
	
	$time_updated=date('Y-m-d H:i:s');
	$executor_names=explode(" ",get_user_info($registrant_id,"name","users",$dbc));
	$for_names=explode(" ",get_user_info($user_id,"name","users",$dbc));
	$executor_firstname=$executor_names[0];
	$executor_lastname=$executor_names[1];
	$for_firstname=$for_names[0];
	$for_lastname=$for_names[1];
	$time=date("Y-m-d H:i:s");
	if(empty($employee_address2)){
			$employee_address2="not needed";
		}
	$upload_dir = "passports/";
	$image = $_FILES['update_image']['name'];
	$filetype = $_FILES['update_image']['type'];
	$filesize = $_FILES['update_image']['size'];
	$filetmp  = $_FILES['update_image']['tmp_name'];
	$allowed =  array('gif','png','jpg','jpeg','JPEG');
	$ext = pathinfo($image, PATHINFO_EXTENSION);
	$imagename = explode('.',$_FILES['update_image']['name']);
	$imagename = $imagename[0];
	$imagename = $imagename.'-'.rand(5,time()).".".$ext;
	$employee_passport= $upload_dir.$imagename;

$changes="";	
$sql="SELECT * FROM users WHERE user_id=$user_id";
$result=mysqli_query($dbc,$sql);
$fetched_rows=mysqli_num_rows($result);
if($fetched_rows>0){
	while($rows_changes=mysqli_fetch_assoc($result)){
		$fn_change=$rows_changes['firstname'];
		$ln_change=$rows_changes['lastname'];
		$address1_change=$rows_changes['address1'];
		$address2_change=$rows_changes['address2'];
		$type_change=$rows_changes['user_type'];
		$email_change=$rows_changes['email'];
		if($employee_firstname!=$fn_change){
		$changes.="Firstname,";	
		}
		if($employee_lastname!=$ln_change){
		$changes.="Lastname, ";	
		}
		if($employee_address1!=$address1_change){
		$changes.="Address1, ";	
		}
		if($employee_address2!=$address2_change){
		$changes.="Address2, ";	
		}
		if($employee_type!=$type_change){
		$changes.="User type, ";	
		}
		if($employee_email!=$email_change){
		$changes.="User type, ";	
		}
	}
	}
	if(!empty($image) && in_array($ext,$allowed)){
		if(move_uploaded_file($filetmp,$employee_passport))
		{
		
	$sql="UPDATE users SET user_id=$user_id,firstname='$employee_firstname',lastname='$employee_lastname',
							email='$employee_email',passport='$employee_passport',address1='$employee_address1',address2='$employee_address2',
							user_type='$employee_type',registrant_id=$registrant_id WHERE user_id=$user_id";		
			}
	$employee_passport = $upload_dir.$imagename;	
		}else{
				$sql="UPDATE users SET user_id=$user_id,firstname='$employee_firstname',lastname='$employee_lastname',
							email='$employee_email',address1='$employee_address1',address2='$employee_address2',
							user_type='$employee_type',registrant_id=$registrant_id WHERE user_id=$user_id";		
		}
	$user_result=mysqli_query($dbc,$sql) or die("error");
	if($user_result){
		if(!empty($image) && in_array($ext,$allowed)){
			$activities=" updated passport photograph for ";
			echo "../".$employee_passport."|Update Successful";
		$sql="INSERT INTO activities (executor_id,type,executor_firstname,executor_lastname,for_id,for_firstname,for_lastname,activity,time)
		VALUES('$registrant_id','$update_type','$executor_firstname','$executor_lastname','$user_id','$for_firstname','$for_lastname','$activities',
		'$time')";		
		$activities_result=mysqli_query($dbc,$sql) or die(mysqli_error($dbc));
			
		}else{
		echo "|Update Successful";
		if($changes!=""){
		$activities=" updated ".$changes."for";
		/* 	echo "../".$employee_passport."|Update Successful"; */
		$sql="INSERT INTO activities (executor_id,type,executor_firstname,executor_lastname,for_id,for_firstname,for_lastname,activity,time)
		VALUES('$registrant_id','$update_type','$executor_firstname','$executor_lastname','$user_id','$for_firstname','$for_lastname','$activities',
		'$time')";		
		$activities_result=mysqli_query($dbc,$sql) or die("error");
		mysqli_close($dbc);
		}	
		}
	}	
}
}
?>