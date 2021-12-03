<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Property Commerce - Sell, Buy, Rent, Market Properties</title>
		<meta name="description" content="Sell, Buy, Let, Rent, Lease Properties in Lagos, Buy or Sell Land, House, Filling Station, Farm
  Hotel, Office Space, Estates in Lagos, Nigeria">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="../css/forth-painter.css">
  <link rel="stylesheet" href="../icons/font/flaticon.css">
  <link rel="stylesheet" href="../fontawesome/css/font-awesome.css">
 <script src="../js/jquery-1.12.3.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/dafa68008e.js" crossorigin="anonymous"></script>
 <script src="../js/jquery-1.12.3.js"></script>
  <script src="../js/bootstrap.min.js"></script>
 <link href="https://fonts.googleapis.com/css?family=Quicksand|Rajdhani|Titillium+Web|Roboto+Slab:wght@500|Roboto+Slab:wght@600" rel="stylesheet">
	</head>
	
	<body>
<?php
if(isset($_COOKIE['region'])){
		  $stored_region=$_COOKIE['region'];
	  }else{
	  $stored_region="Lagos";
	  }
include "../database/connect.php";
include "../includes/functions.php";
include "../includes/session.php";

$property_type="";
$region="";
$lga="";
$house_type="";
$price="";
$no_of_rooms="";
$transaction="";
$region_clause="";
$lga_clause="";
$house_clause="";
$price_clause="";
$room_number_clause="";
$house_type_clause="";
$room_clause="";
$transaction_clause="";
if(isset($_GET['req'])){;
$req = $_GET['req'];
$parameters = explode("--",$req);
for($i=0; $i<count($parameters); $i++){
	$get = explode("_",$parameters[$i]);
	switch ($get[0]){
		case 'transaction':
		$transaction=ucfirst($get[1]);
		break;
		
		case 'region':
		$region=$get[1];
		break;
		
		case 'lga':
		$lga=$get[1];
		break;
		
		case 'house':
		$house_type=$get[1];
		break;
		
		case 'room':
		$no_of_rooms=$get[1];
		break;
		
		case 'price':
		$price=$get[1];
		break;
		
		case 'property':
		$property_type=strtolower($get[1]);
		break;
		
		default:
		break;
	}
}
}else{
	$req="";
}

$req=="" ? $main_title="Available properties" : $main_title="properties";
$req=="" ? $class_main_title="hidden" : $class_main_title="";
?>
<p class="stored_region hidden"><?php echo $stored_region; ?></p>
<ul class="hidden selections">
<li class="selected_region"><?php echo $region; ?></li>
<li class="selected_transaction"><?php echo $transaction; ?></li>
<li class="selected_property_type"><?php echo ucfirst($property_type); ?></li>
<li class="selected_house_type"><?php echo $house_type; ?></li>
<li class="selected_room"><?php echo $no_of_rooms; ?></li>
<li class="selected_price"><?php echo $price; ?></li>
<li class="selected_lga"><?php echo $lga; ?></li>
</ul>	
<?php include "../includes/message_form.php"; ?>
	
<div class="container-fluid search-board">
<div class="inner-search-board">
			<div class="container">
	<?php echo nav('../','images/pc-logo-transparent.png'); ?>

				</div>
<p class="h2 page_title"><?php echo ucfirst($property_type)." ".$main_title; ?></p>
<p class="<?php echo $class_main_title; ?> retreived-filter"><?php
$house_type!="" ? $house_word="(".$house_type.")" : $house_word="";
$lga!="" ? $lga_word=" in ".$lga."," : $lga_word="";
$region!="" ? $region_word=" in ".$region : $region_word="";
if($lga!="" && $region!=""){
$region_word=" ".$region;	
}
$price!="" ? $price_word=" at &#8358;".number_format($price)." max" : $price_word="";
$no_of_rooms!="" ? $room_word=" with ".$no_of_rooms." rooms" : $room_word="";
 echo $transaction." ".$property_type." properties".$house_word.$room_word.$price_word.$lga_word.$region_word;
 ?></p>
 <div class="col-sm-12 col-12 fullwidth">
<span class="btn btn-primary update-filter btns filters-up">UPDATE SEARCH</span>
</div>
</div>
</div>

<?php include "../includes/search_board.php"; ?>

<div class="container p-3">

<p class="h4 mt-5"><strong>See Results </strong></p>
<p class="<?php echo $class_main_title; ?>"><?php
$house_type!="" ? $house_word="(".$house_type.")" : $house_word="";
$lga!="" ? $lga_word=" in ".$lga."," : $lga_word="";
$region!="" ? $region_word=" in ".$region : $region_word="";
if($lga!="" && $region!=""){
$region_word=" ".$region;	
}
$price!="" ? $price_word=" at &#8358;".number_format($price)." max" : $price_word="";
$no_of_rooms!="" ? $room_word=" with ".$no_of_rooms." rooms" : $room_word="";
 echo $transaction." ".$property_type." property".$house_word.$room_word.$price_word.$lga_word.$region_word;
 ?></p>
<div class="row mt-3">
<?php 

if(!empty($region)){
$region_clause="AND region='$region'";	
}
if(!empty($lga)){
$lga_clause=" AND lga='$lga'";	
}
if(!empty($house_type)){
$house_clause=" AND house_type='$house_type'";	
}
if(!empty($get_price)){
$price_clause=" AND price<=$price";	
}
if(!empty($get_room)){
$room_clause=" AND room<=$no_of_rooms";	
}
//echo $get_price."...===";
//echo $get_room;
 if($property_type=='House' AND !empty($house_type)){
	$house_type_clause=" AND house_type='$house_type'";
}

  if(!empty($transaction)){
	$transaction_clause=" AND status='$transaction'";
} 
if(!empty($req)){
$clause="WHERE type='$property_type' ".$region_clause.$lga_clause.$house_clause.$price_clause.$house_type_clause.$room_clause.$transaction_clause." AND treated='1' LIMIT 30";
}else{
	$clause=" WHERE treated='1' LIMIT 30";
}
//echo "SELECT * FROM properties ".$clause;
$sql=$dbc->prepare("SELECT * FROM properties ".$clause);
$sql->execute();
$result=$sql->get_result();
$fetched_rows=$result->num_rows;
if($fetched_rows>0){
while($rows=$result->fetch_assoc()){
$property_id=$rows['property_id'];	
	$type=$rows['type'];	
	$house_type=$rows['house_type'];	
	$status=$rows['status'];	
	$manager_id=$rows['manager_id'];	
	$security_id=$rows['security_id'];	
	$liason_id=$rows['liason_id'];	
	$description=$rows['description'];	
	$price=$rows['price'];	
	$address=$rows['address'];	
	$lga=$rows['lga'];	
	$region=$rows['region'];	
	$rooms=get_spaces_number($dbc,$property_id,"room");	
	$landSize=$rows['land_size'];
	$house_type=$house_type=="none" || empty($house_type) ? $type." property" : $house_type;
	$property_image="../".get_property_image($dbc,$property_id);
	$baths=get_spaces_number($dbc,$property_id,"bath");
	$parlours=get_spaces_number($dbc,$property_id,"parlour");
	$images=get_rows($dbc,"property_images","property_id",$property_id); 
	if(empty(get_property_image($dbc,$property_id))){
		$property_image="../images/pcommerce_back.png";
	}
	
?>
<div class="col-sm-12 col-md-6 col-lg-3 col-12 property-card">
		<div class="thumbnail">
			<div class="property-avatar">
			<img src="<?php echo $property_image; ?>" alt="<?php echo $house_type." in ".$lga.", ".$region; ?>" />
			<p><strong class="float-left"><?php echo $type; ?></strong> <i class="fas fa-camera"></i> <?php echo $images; ?></p>
			</div>
			<div class="property-desc">
			<div class="property-features">
			<ul>
			<?php 
			if($rooms!=0){
			?>
			<li><i class="fas fa-bed"></i> <sup><strong class="badge"><?php echo $rooms; ?></strong></sup></li>
			<?php
			} 
			if($baths!=0){
			?>
			<li><i class="fas fa-bath"></i> <sup><strong class="badge"><?php echo $baths; ?></strong></sup></li>
			<?php
			}
			if($baths!=0){
			?>
			<li><i class="fas fa-couch"></i> <sup><strong class="badge"><?php echo $parlours; ?></strong></sup></li>
			<?php
			}
			?>
			</ul>
			</div>
			<p class="h5 mt-1"><strong class="property-title"><i class="fas fa-ruler-combined"></i> <span class="sqrt"><?php echo $landSize; ?> sq m</span></strong> | <strong>&#8358;<?php echo number_format($price); ?></strong></p>
			<p class=""><?php echo $house_type; ?> in <strong><?php echo $lga.", ".$region; ?></strong></p>
			<p><?php echo $address; ?>. <i class="fas fa-link"></i> <a class="links" href="../property-details/?req=<?php echo $property_id; ?>">See details</a></p>
			</div>
		</div>
		</div>
<?php
}
}
$transaction_clause=='' ? $head='Browse other property sectors' : $head='Similar properties';
?>
</div>
<div class="row mt-5">

<?php
$related_clause="WHERE type!='$property_type' ".$region_clause.$transaction_clause." AND treated='1'  ORDER BY rand()";
//echo "SELECT * FROM properties ".$clause;
$related_sql=$dbc->prepare("SELECT * FROM properties ".$related_clause);
	if(empty($transaction_clause) || empty($req)){
	$related_sql=$dbc->prepare("SELECT *, COUNT(id) AS num FROM properties WHERE treated='1' GROUP BY type");
}
$related_sql->execute() or die(mysqli_error($dbc));
$related_result=$related_sql->get_result();
$related_rows=$related_result->num_rows;
if($related_rows>0){
	?>
	<div class="col-sm-12 col-md-12 col-lg-12 col-12">
<p class="h4 mt-5 mb-3"><strong><?php echo $head; ?></strong></p>
</div>
	<?php
while($related_rows=$related_result->fetch_assoc()){
$property_id=$related_rows['property_id'];	
	$type=$related_rows['type'];	
	$status=$related_rows['status'];	
	$manager_id=$related_rows['manager_id'];	
	$security_id=$related_rows['security_id'];	
	$liason_id=$related_rows['liason_id'];	
	$description=$related_rows['description'];	
	$price=$related_rows['price'];	
	$address=$related_rows['address'];	
	$lga=$related_rows['lga'];	
	$region=$related_rows['region'];	
	$rooms=$related_rows['room'];	
	$house_type=$related_rows['house_type'];	
	$house_type=$house_type=="none" || empty($house_type) ? $type." property" : $house_type;
	$landSize=$related_rows['land_size'];
	$property_image="../".get_property_image($dbc,$property_id);
	$baths=get_spaces_number($dbc,$property_id,"bath");
	$parlours=get_spaces_number($dbc,$property_id,"parlour");
	$images=get_rows($dbc,"property_images","property_id",$property_id); 
	if(empty(get_property_image($dbc,$property_id))){
		$property_image="../images/pcommerce_back.png";
	}
	if(!empty($transaction_clause)){

?>
<div class="col-sm-12 col-md-6 col-lg-3 col-12 property-card">
		<div class="thumbnail">
			<div class="property-avatar">
			<img src="<?php echo $property_image; ?>" alt="<?php echo $house_type." in ".$lga.", ".$region; ?>" />
			<p><strong class="float-left"><?php echo $type; ?></strong> <span class="favorite"><i class="far fa-star"></i></span> <i class="fas fa-camera"></i> <?php echo $images; ?></p>
			</div>
			<div class="property-desc">
			<div class="property-features">
			<ul>
			<?php 
			if($rooms!=0){
			?>
			<li><i class="fas fa-bed"></i> <sup><strong class="badge"><?php echo $rooms; ?></strong></sup></li>
			<?php
			} 
			if($baths!=0){
			?>
			<li><i class="fas fa-bath"></i> <sup><strong class="badge"><?php echo $baths; ?></strong></sup></li>
			<?php
			}
			if($baths!=0){
			?>
			<li><i class="fas fa-couch"></i> <sup><strong class="badge"><?php echo $parlours; ?></strong></sup></li>
			<?php
			}
			?>
			</ul>
			</div>
			<p class="h5 mt-1"><strong class="property-title"><i class="fas fa-ruler-combined"></i> <span class="sqrt"><?php echo $landSize; ?> sq m</span></strong> | <strong>&#8358;<?php echo number_format($price); ?></strong></p>
			<p class=""><?php echo $house_type; ?> in <strong><?php echo $lga.", ".$region; ?></strong></p>
			<p><?php echo $address; ?>. <i class="fas fa-link"></i> <a class="links" href="../property-details/?req=<?php echo $property_id; ?>">See details</a></p>
			</div>
		</div>
		</div>
<?php
}else{
	$num=$related_rows['num'];
?>
<div class="col-sm-3 col-md-2 col-lg-2 col-6 property-cat-card">
		<div class="property_category" style="background:#fff;">
		<a title="<?php echo $type; ?> properties in Nigeria" style="background:#fff; color:#000; font-weight:20px;" href="../search/?req=property_<?php echo $type ?>--page_1"><p><?php echo $type." <sup class='badge'>".$num; ?></sup></p></a>
		</div>
		</div>
<?php
}
}
}

?>
</div>
</div>
<?php
	$footer =footer("../");
	echo $footer; ?>
	</body>
	
<script src="../js/script.js"></script>		
				
</html>