<!DOCTYPE html>
<html lang="en">
	<head>
	    <title>Property - Sell, BuySe, Rent, Market Properties</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Sell, Buy, Let, Rent, Lease Properties in Lagos, Buy or Sell Land, House, Filling Station, Farm
  Hotel, Office Space, Estates in Lagos, Nigeria">
   <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../icons/font/flaticon.css">
  <link rel="stylesheet" href="../fontawesome/css/font-awesome.css">
  <script src="https://kit.fontawesome.com/dafa68008e.js" crossorigin="anonymous"></script>
   <script src="../js/jquery-1.12.3.js"></script>
  <script src="../js/bootstrap.min.js"></script>

 <link href="https://fonts.googleapis.com/css?family=Quicksand|Rajdhani|Titillium+Web|Roboto+Slab:wght@500|Roboto+Slab:wght@600" rel="stylesheet">
	</head>
	
	<body>
<?php

include "../database/connect.php";
include "../includes/functions.php";
include "../includes/session.php";
$req = $_GET['req'];
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
$parameters = explode("-",$req);
for($i=0; $i<count($parameters); $i++){
	$get = explode("_",$parameters[$i]);
	switch ($get[0]){
		case 'transaction':
		$transaction=$get[1];
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
		$property_type=$get[1];
		break;
		
		default:
		break;
	}
}
/* if(isset($_COOKIE['region'])){
		  $stored_region=$_COOKIE['region'];
	  }else{
	  $stored_region="Lagos";
	  } */
?>
<p class="stored_region hidden">Lagos</p>
<?php include "../includes/message_form.php"; ?>
			<div class="container-fluid nav-container">
				<nav class="navbar navbar-expand-lg navbar-light bg-light back-light">
  <a class="navbar-brand" href="../"><img src="../images/pc-logo.png" alt="Property" /></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
     <ul class="navbar-nav">
      <li class="nav-item active">
	  <a class="btn btn-primary refine-search btns get-property filters-up" >Find a property</a>
      </li>
	  
      <li class="nav-item">
        <a class="nav-link" href="../#services">Our Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../contact-us/">Contact Us</a>
      </li>
    </ul>
  </div>
</nav>

				</div>	
<div class="container-fluid p-0  m-0 carousel-board">
<div class="container-fluid" style="height:100%;">  
  <div id="myCarousel" class="carousel slide" data-interval="false">
    <!-- Indicators -->
    <ol class="carousel-indicators">
	<?php
	$sql_image=$dbc->prepare("SELECT * FROM property_images WHERE property_id=$req");
$sql_image->execute();
$result_images=$sql_image->get_result();
$fetched_images=$result_images->num_rows;
$i=0;
if($fetched_images>0){
while($i<$fetched_images){
	$i==0 ? $active="active" : $active="";
	?>
      <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php echo $active; ?>"></li>
	 <?php
	 $i++;
}
}
?>
    </ol>
 <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="fas fa-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="fas fa-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
    <!-- Wrapper for slides -->
    <div class="carousel-inner property-carousel" style="height:100%;">
	<?php
	$image="images/pcommerce_ack.png";
	if($fetched_images>0){
		$j=0;
	while($imgs=$result_images->fetch_assoc()){
		$j==0 ? $active="active" : $active="";
		$image=$imgs['image_link'];
	?>
      <div class="item <?php echo $active; ?> carousel-item" style="background-image:url('../<?php echo $image; ?>'); width:100%;">
     
      </div>
	<?php
	$j++;
	}
	}else{
	?>
<div class="item <?php echo $active; ?> carousel-item" style="background-image:url('../<?php echo $image; ?>'); width:100%;">
     
      </div>
<?php	
	}
	?>
    </div>

    <!-- Left and right controls -->
  </div>
</div>
<!---end carousel--->
</div>
<?php include "../includes/message_form.php"; ?>
<?php include "../includes/search_board.php"; ?>

<div class="container-fluid p-3" style="padding-top:0 !important; border-top:1px solid #f1f3ed; border-left:none;">
<div class="row" style=" margin-left:-16px; margin-right:-16px;">
<?php 
//echo "SELECT * FROM properties ".$clause;
$sql=$dbc->prepare("SELECT * FROM properties WHERE property_id=$req");
$sql->execute();
$result=$sql->get_result();
$fetched_rows=$result->num_rows;
if($fetched_rows>0){
$rows=$result->fetch_assoc();
$property_id=$rows['property_id'];	
	$house_type=$rows['house_type'];	
	$type=$rows['type'];	
	$status=$rows['status'];	
	$manager_id=$rows['manager_id'];	
	$security_id=$rows['security_id'];	
	$liason_id=$rows['liason_id'];	
	$description=$rows['description'];	
	$price=$rows['price'];	
	$address=$rows['address'];	
	$lga=$rows['lga'];	
	$region=$rows['region'];	
	$landSize=$rows['land_size'];	
	$rooms=$rows['room'];	
	$property_image="../".get_property_image($dbc,$property_id);
	$baths=get_spaces_number($dbc,$property_id,"bath");
	$parlours=get_spaces_number($dbc,$property_id,"parlour");
	$images=get_rows($dbc,"property_images","property_id",$property_id); 

if(empty(get_property_image($dbc,$property_id))){
		$property_image="../images/pcommerce_bck.png";
	}?>

<?php
}

?>
<div class="col-sm-4 col-12 desc-boxes">
<p class="lead"><?php echo $type; ?> property</p>
<p class="h2"><?php echo $lga.", ".$region; ?></p>
<p class="lead"><i class="fas fa-map-marker-alt"></i> <?php echo $address ?></p>
</div>
<div class="col-sm-4 col-12 border-left desc-boxes">
<p class="lead">Price</p>
<p class="h2"><?php echo "&#8358;".number_format($price); ?></p>
<?php 
			if($house_type!="none"){
			?>
<p class="lead"><i class="fas fa-home"></i> <?php echo $house_type; ?></p>
<?php
			}
			?>
</div>
<div class="col-sm-4 col-12 border-left desc-boxes">
	<div class="property-page-features">
			<div class="row">
			<?php 
			if($rooms!=0){
			?>
			<div class="col-sm-6 col-6 feature-divs"><i class="fas fa-ruler-combined"></i> <?php echo $landSize; ?> sq m</div>
			<div class="col-sm-6 col-6 feature-divs"><i class="fas fa-bed"></i> <sup><strong><?php echo $rooms; ?></strong></sup></div>
			<?php
			} 
			if($baths!=0){
			?>
			<div class="col-sm-6 col-6 feature-divs"><i class="fas fa-bath"></i> <sup><strong><?php echo $baths; ?></strong></sup></div>
			<?php
			}
			if($baths!=0){
			?>
			<div class="col-sm-6 col-6 feature-divs"><i class="fas fa-couch"></i> <sup><strong><?php echo $parlours; ?></strong></sup></div>
			<?php
			}
			?>
			</div>
			</div>
</div>
<div class="col-sm-6 col-12">
<br/>
<p class="h3">DESCRIPTION</p>
<p><?php  echo $description; ?></p>
</div>
<div class="col-sm-6 col-12">
<div class="row">
<div class="col-sm-3 col-12"></div>
<div class="col-sm-6">
<br/>
<p class="h3">CONTACT US</p>
<p class="call-btn"><a class="btn btns mobile" href="tel:2347067920578"><i class="fas fa-phone"></i> Call</a></p>
<p class="desktop"><strong>Phone:</strong> (234) 7067920578</p>
<p class="btn btn-primary btns get-in-touch send-message-btn">Send Message</p>
<br/>
<p class="btn btn-primary btns mobile-search mobile" style="color:#fff !important;">Find another property</p>
</div>
<div class="col-sm-3 col-12"></div>
</div>
</div>
</div>
</div>
<?php
	$footer =footer("../");
	echo $footer; ?>
	</body>
	
<script src="../js/script.js"></script>		
				
</html>