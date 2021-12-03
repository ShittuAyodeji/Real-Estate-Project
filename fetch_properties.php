<?php
include "database/connect.php";
include "includes/functions.php";
include "includes/session.php";
if(isset($_POST['transaction'])){	
$property_type=$_POST['property'];
$region=$_POST['region'];
setcookie('region',$region,time()+86000,'/');
$lga=$_POST['lga'];
$house_type=$_POST['house'];
$value=$_POST['price'];
$no_of_rooms=$_POST['room'];
$transaction=$_POST['transaction'];
$get_price=$_POST['calculate_price'];
$get_room=$_POST['calculate_room'];
$region_clause="";
$lga_clause="";
$house_clause="";
$price_clause="";
$room_number_clause="";
$house_type_clause="";
$room_clause="";
if(!empty($region)){
$region_clause="AND region='$region'";	
}
if(!empty($lga)){
$lga_clause=" AND lga='$lga'";	
}
if(!empty($house)){
$house_clause=" AND house='$house'";	
}
if(!empty($get_price)){
$price_clause=" AND price<=$value";	
}
if(!empty($get_room)){
$room_clause=" AND room<=$no_of_rooms";	
}
//echo $get_price."...===";
//echo $get_room;
 if($property_type=='Residential' AND !empty($house_type)){
	$house_type_clause=" AND house_type='$house_type'";
} 
$clause="WHERE type='$property_type' ".$region_clause.$lga_clause.$house_clause.$price_clause.$house_type_clause.$room_clause." AND status='$transaction' AND treated='1'";
//echo "SELECT * FROM properties ".$clause;
$sql=$dbc->prepare("SELECT * FROM properties ".$clause);
$sql->execute();
$result=$sql->get_result();
$fetched_rows=$result->num_rows;
$rows=$result->fetch_assoc();
$property_id=$rows['property_id'];
echo $fetched_rows;
}
?>