<?php
include "database/connect.php";
include "includes/functions.php";
include "includes/session.php";

if(isset($_SESSION['user_id'])){
	$id=$_SESSION['user_id'];
	$permission=$_SESSION['permission'];
}
if(isset($_POST['word']) && $_POST['word']!=""){
	$word=$_POST['word'];
	
	if(isset($_POST['type']) && $_POST['type']!="--Select Type--"){
		$type=$_POST['type'];
		$type_clause=" AND type='$type'";
	}else{
		$type_clause="";
	}
	if(is_numeric($word)){	
	$criteria=" (manager_id=$word OR liason_id=$word OR security_id=$word)".$type_clause;	
	}else{
	$criteria=" (description LIKE '%$word%' OR address LIKE '%$word%' OR type LIKE '%$word%')".$type_clause;
	}
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
	$address=$rows['address'];	
	$date_addded=$rows['date_added'];	
	$manager_name=get_user_info($manager_id,"name","users");
	$liason_name=get_user_info($liason_id,"name","users");
	$security_name=get_user_info($security_id,"name","users");
	$security_passport=get_user_info($security_id,"image","users");
	$manager_passport=get_user_info($manager_id,"image","users");
	$liason_passport=get_user_info($liason_id,"image","users");
	$security_phone=get_user_info($security_id,"phone","users");
	$manager_phone=get_user_info($manager_id,"phone","users");
	$liason_phone=get_user_info($liason_id,"phone","users");
	$odds=$fetched_rows%$i;
	if($odds==0){
		$back_color="deep-color";
	}else{
		$back_color="light-color";
	}
?>
<ul class="sub-views-header <?php echo $back_color; ?> view-property" id="<?php echo $property_id; ?>">
	<li class="edit-li-main id-main-<?php echo $property_id; ?>"><?php echo $type; ?></li>
	<li  class="edit-li-main description-main-<?php echo $property_id; ?>"><?php echo $description; ?></li>
	<li  class="edit-li-main li-main-<?php echo $property_id; ?>"><?php echo $address; ?> </li>
	<li class="edit-li"><i id="<?php echo $property_id; ?>" class="fa fa-edit property-info-edit" aria-hidden="true"></i></li>
</ul>
<div class="property-details property-details-<?php echo $property_id; ?>" >
<div class="col-md-3 col-xs-12 mangers-info-wrap">
<form action="" method="post" class="property-<?php echo $property_id; ?>" enctype="multipart/form-data">
	<ul class="property-mangers-details">
	<li><strong>Property ID:</strong> <input type="text" readonly class="edit-input" name="update_property_id" value="<?php echo $property_id; ?>" /></li>
	<li><strong>Status:</strong> <input type="text" class="edit-input" name="update_property_status" value="<?php echo $status; ?>" /></li>
	<li><strong>Location:</strong> <textarea readonly class="edit-input" name="update_property_address"><?php echo $address; ?></textarea></li>
	<li><strong>Add Images:</strong> <input type="file" multiple="multiple" class="edit-input" name="update_property_images[]" /></li>
	<li><input type="submit" target="<?php echo $property_id; ?>" class="property-edit-btn" name="update_property" value="update" /></li>
</ul>
</form>
<p class="property-photo" id="<?php echo $address; ?>" target="<?php echo $property_id; ?>"><i class="fa fa-eye" aria-hidden="true"></i> view photos</p>
</div>
<div class="col-md-3 col-xs-12 mangers-details-wrap">
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
<div class="col-md-3 col-xs-12 mangers-details-wrap">
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
<div class="col-md-3 col-xs-12 mangers-details-wrap">
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
?>