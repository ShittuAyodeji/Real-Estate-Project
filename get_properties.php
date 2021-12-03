<?php
include "database/connect.php";
include "includes/functions.php";
include "includes/session.php";

if(isset($_SESSION['user_id'])){
	$id=$_SESSION['user_id'];
	$permission=$_SESSION['permission'];

if(isset($_POST['word']) && $_POST['word']!=""){
	$word=secure_input($_POST['word']);
	
	if(isset($_POST['type']) && $_POST['type']!=""){
		$type=$_POST['type'];
		$type_clause=" AND type='$type'";
	}else{
		$type_clause="";
	}
	if(isset($_POST['region']) && $_POST['region']!=""){
		$region=$_POST['region'];
		$region_clause=" AND region='$region'";
	}else{
		$region_clause="";
	}
	if(isset($_POST['lga']) && $_POST['lga']!=""){
		$lga=$_POST['lga'];
		$lga_clause=" AND lga='$lga'";
	}else{
		$lga_clause="";
	}
	if(isset($_POST['transaction']) && $_POST['transaction']!=""){
		$transaction=$_POST['transaction'];
		$transaction_clause=" AND status='$transaction'";
	}else{
		$transaction_clause="";
	}
	if(is_numeric($word)){	
	$criteria=" (manager_id=$word OR liason_id=$word OR security_id=$word)".$type_clause.$region_clause.$lga_clause.$transaction_clause;	
	}else{
	$criteria=" (description LIKE '%$word%' OR address LIKE '%$word%' OR type LIKE '%$word%' OR region LIKE '%$word%' OR lga LIKE '%$word%' OR house_type LIKE '%$word%' )".$type_clause.$region_clause.$lga_clause.$transaction_clause;
	}
	//echo $criteria;
if($permission==1){
$clause="WHERE".$criteria;	
}else if($permission==2){
$clause=" WHERE liason_id=$id AND ".$criteria;
}else if($permission==3){
$clause=" WHERE manager_id=$id AND ".$criteria;
}
$sql="SELECT * FROM properties ".$clause;
}else{
	if($permission==1){
	$clause="";	
	}else{
	$clause="WHERE manager_id=$id OR liason_id=$id OR security_id=$id";
	}

	$sql="SELECT * FROM properties ".$clause;
}
$sql="SELECT * FROM properties ".$clause;
$result=mysqli_query($dbc,$sql);
$fetched_rows=mysqli_num_rows($result);
$i=1;
if($fetched_rows>0){
	while($rows=mysqli_fetch_assoc($result)){
	$property_id=$rows['property_id'];	
	$type=$rows['type'];	
	$status=$rows['status'];	
	$manager_id=$rows['manager_id'];	
	$security_id=$rows['security_id'];	
	$liason_id=$rows['liason_id'];	
	$description=$rows['description'];	
	$region=$rows['region'];	
	$lga=$rows['lga'];	
	$address=$rows['address'];	
	$confirmed=$rows['treated'];	
	$date_addded=$rows['date_added'];	
	$manager_name=get_user_info($manager_id,"name","users",$dbc);
	$liason_name=get_user_info($liason_id,"name","users",$dbc);
	$security_name=get_user_info($security_id,"name","users",$dbc);
	$security_passport=get_user_info($security_id,"image","users",$dbc);
	$manager_passport=get_user_info($manager_id,"image","users",$dbc);
	$liason_passport=get_user_info($liason_id,"image","users",$dbc);
	$security_phone=get_user_info($security_id,"phone","users",$dbc);
	$manager_phone=get_user_info($manager_id,"phone","users",$dbc);
	$liason_phone=get_user_info($liason_id,"phone","users",$dbc);
	$odds=$fetched_rows%$i;
	if($odds==0){
		$back_color="deep-color";
	}else{
		$back_color="light-color";
	}
?>
<ul class="sub-views-header <?php echo $back_color; ?> view-property" id="<?php echo $property_id; ?>">
	<li class="edit-li-main id-main-<?php echo $property_id; ?>"><?php echo $type; ?></li>
	<li  class="edit-li-main description-main description-main-<?php echo $property_id; ?>"><?php echo $description; ?></li>
	<li  class="edit-li-main li-main-<?php echo $property_id; ?>"><?php echo $address; ?> </li>
	<li class="edit-li"><i id="<?php echo $property_id; ?>" class="fa fa-edit property-info-edit" aria-hidden="true"></i></li>
</ul>
<div class="property-details property-details-<?php echo $property_id; ?>" >
<div class="col-md-3 col-xs-12 float-left  mangers-info-wrap">
<form action="" method="post" class="property-<?php echo $property_id; ?>" enctype="multipart/form-data">
	<ul class="property-mangers-details">
	<li><strong>Property ID:</strong> <input type="text" readonly class="edit-input" name="update_property_id" value="<?php echo $property_id; ?>" /></li>
	<li><strong>Status:</strong> <input type="text" class="edit-input" name="update_property_status" value="<?php echo $status; ?>" /></li>
	<li><strong>Confirm:</strong> 
	<select class="edit-input" name="update_property_confirm">
	<option value="<?php echo $confirmed; ?>"><?php echo $confirmed; ?></option>
	<option value="0">0</option>
	<option value="1">1</option>
	</select></li>
	<li><strong>State:</strong> 
	<select class="edit-input property-region" data-id="<?php echo $property_id; ?>" name="update_property_region">
	<option value="<?php echo $region; ?>"><?php echo $region; ?></option>
	<?php echo include "regions.txt"; ?>
	</select></li>
	<li><strong>City:</strong> 
	<select class="edit-input property-lga property-lga-<?php echo $property_id; ?>" name="update_property_city">
	<option value="<?php echo $lga; ?>"><?php echo $lga; ?></option>
	</select></li>
	<li><strong>Location:</strong> <textarea readonly class="edit-input" name="update_property_address"><?php echo $address; ?></textarea></li>
	<li><strong>Add Images:</strong> <input type="file" multiple="multiple" autocomplete="off" class="edit-input" name="update_property_images[]" /></li>
	<li><input type="submit" target="<?php echo $property_id; ?>" class="property-edit-btn" name="update_property" value="update" /></li>
</ul>
</form>
<p class="property-photo" id="<?php echo $address; ?>" target="<?php echo $property_id; ?>"><i class="fa fa-eye" aria-hidden="true"></i> view photos</p>
</div>
<div class="col-md-3 col-xs-12 float-left mangers-details-wrap">
	<p><strong>Liason Officer</strong></p>
	<ul class="property-mangers-details">
	<li>
		<div class="user-image">
		<img class="liason-image-<?php echo $property_id; ?>" src="<?php echo "../".$liason_passport; ?>" alt="Liason Officer" />
		</div>
	</li>
	<li><strong>Names:</strong> <?php echo $liason_name; ?></li>
	<li><strong>ID:</strong> <span class="liason-<?php echo $property_id; ?>"><?php echo $liason_id; ?></span> <i id="<?php echo $liason_id."|".$property_id."|".$liason_name."|Liason Officer"; ?>" class="fa fa-edit edit-user-id" aria-hidden="true"></i></li>
	<li><strong>Phone:</strong> <a href="tel:<?php echo $liason_phone; ?>"><?php echo $liason_phone; ?></a></li>
</ul>
</div>
<div class="col-md-3 col-xs-12 float-left mangers-details-wrap">
	<p><strong>Property Manager</strong></p>
	<ul class="property-mangers-details">
	<li>
		<div class="user-image">
		<img class="manager-image-<?php echo $property_id; ?>" src="<?php echo "../".$manager_passport; ?>" alt="Property Manager" />
		</div>
	</li>
	<li><strong>Names:</strong> <?php echo $manager_name; ?></li>
	<li><strong>ID:</strong> <span class="manager-<?php echo $property_id; ?>"><?php echo $manager_id; ?></span> <i id="<?php echo $manager_id."|".$property_id."|".$manager_name."|Property Manager"; ?>" class="fa fa-edit edit-user-id" aria-hidden="true"></i></li>
	<li><strong>Phone:</strong> <a href="tel:<?php echo $manager_phone; ?>"><?php echo $manager_phone; ?></a></li>
</ul>
</div>
<div class="col-md-3 col-xs-12 float-left mangers-details-wrap">
	<p><strong>Security</strong></p>
	<span class="badge other-securities" target="<?php echo $property_id; ?>"><?php echo get_securities($property_id); ?></span>
	<ul class="property-mangers-details">
	<li>
		<div class="user-image">
		<img class="security-image-<?php echo $property_id; ?>" src="<?php echo "../".$security_passport; ?>" alt="Property Security" />
		</div>
	</li>
	<li><strong>Names:</strong> <?php echo $security_name; ?></li>
	<li><strong>ID:</strong> <span class="security-<?php echo $property_id; ?>"><?php echo $security_id; ?> </span> <i id="<?php echo $security_id."|".$property_id."|".$security_name."|Property Security"; ?>" class="fa fa-edit edit-user-id" aria-hidden="true"></i></li>
	<li><strong>Phone:</strong> <a href="tel:<?php echo $security_phone; ?>"><?php echo $security_phone; ?></a></li>
</ul>
</div>

</div>
<?php
$i++;		
	}
mysqli_close($dbc);
}else{
	if(isset($_POST['word']) && $_POST['word']!=""){
	if(isset($_POST['type']) && $_POST['type']!="--Select Type--"){
	$type=$_POST['type'];
	$search_type=" under ".$type;
	}else{
		$search_type="";
	}
	echo "No property found with ".$_POST['word'].$search_type;
}else{
	echo "You have no registered/assigned user";
}
}
}
?>