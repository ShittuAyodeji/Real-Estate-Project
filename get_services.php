<?php
if(isset($_POST['service_type'])){
include "database/connect.php";
include "includes/functions.php";
$page=isset($_POST['page']) ? $_POST['page'] : 0;
$service_type=isset($_POST['service_type']) ? $_POST['service_type'] : '';
$limit=20;
$fetched=array();
$status='1';
$query="SELECT * FROM services WHERE approved=? AND service_type=? LIMIT ".$page.",".$limit;
$related_sql=$dbc->prepare($query);
$related_sql->bind_param('ss',$status,$service_type);
if(empty($service_type)){
$query="SELECT * FROM services WHERE approved=? LIMIT ".$page.",".$limit;	
$related_sql=$dbc->prepare($query);
$related_sql->bind_param('s',$status);
}

$related_sql->execute();
$related_result=$related_sql->get_result();
$related_rows=$related_result->num_rows;

if($related_rows>0){
while($related_rows=$related_result->fetch_assoc()){
		
	$images=$related_rows['image_path'];
	if(empty($images)){
		$images="../images/pcommerce_back.png";
	}
	$description=$related_rows['description'];
		if(strlen($description)>70){
		$description=substr($description,0,70)."...";
	}
	$data = array(
		'id'=>$related_rows['id'],	
		'company'=>$related_rows['company'],	
		'description'=>$description,	
		'address'=>$related_rows['address'],	
		'phone'=>$related_rows['phone'],	
		'email'=>$related_rows['email'],
		'service_type'=>$related_rows['service_type'],
		'image'=>$images
	);
	array_push($fetched,$data);
}
}
echo json_encode($fetched);
}
?>
