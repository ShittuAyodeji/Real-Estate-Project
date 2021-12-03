<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Property - Buy or Sell Properties</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Sell or Buy Properties in Lagos, Buy or Sell Land, House, Filling Station, Farm
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
		if(isset($_COOKIE['region'])){
		  $stored_region=$_COOKIE['region'];
	  }else{
	  $stored_region="Lagos";
	  }
include "../database/connect.php";
include "../includes/functions.php";
include "../includes/session.php";
?>
<p class="stored_region hidden"><?php echo $stored_region; ?></p>
<div class="container-fluid property-alert alert alert-warning">
<p></p>
</div>
<?php include "../includes/message_form.php"; ?>
	
<div class="container-fluid search-board">
<div class="inner-search-board">
		<div class="container-fluid nav-container">
	<?php echo nav('../','images/pc-logo.png'); ?>

				</div>	
<p class="h2 page_title main-page-title float-left" style="width:100%; margin-top:170px;">Buying & Selling</p>

</div>
</div>

<?php include "../includes/search_board.php"; ?>

<div class="container">

<p class="h4 page-intro">Are you an investor? Looking to start a new business? Want to find a suitable home 
for your family or relocating?. If you are planning to buy or sell a property/multiple properties in any sector, We will help you through valuation and every stage of the transaction process.</p>
<p>If you have been thinking of buying or selling a property, put it all in our hands and lets help advice you
on how you can get the best deal for your property. We want to make sure you always come back to us anytime  you want a
professional advice on properties.</p>

 
 <p class="btns btn btn-primary get-property">Buy a property</p>
 <p class="btns btn btn-primary send-message-btn">Get in touch</p>
 	
 
<?php 
$related_sql=$dbc->prepare("SELECT * FROM properties WHERE treated='1' AND status='Buy' LIMIT 8");
$related_sql->execute();
$related_result=$related_sql->get_result();
$related_rows=$related_result->num_rows;
?>
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12 col-12 sub-head">
<p class="h2" style="text-align:center;"><strong>Properties For Sale</strong></p>
</div>
<?php
if($related_rows>0){
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
	$landSize=$related_rows['land_size'];
	$property_image="../".get_property_image($dbc,$property_id);
	$baths=get_spaces_number($dbc,$property_id,"bath");
	$parlours=get_spaces_number($dbc,$property_id,"parlour");
	$images=get_rows($dbc,"property_images","property_id",$property_id); 
?>
<div class="col-sm-12 col-md-6 col-lg-3 col-12 property-card">
		<div class="thumbnail">
			<div class="property-avatar"  style="background-image:url('<?php echo $property_image; ?>')">
			
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
}
}

?>
</div>
</div>

<div class="container-fluid">
<div class="col-sm-12 col-md-12 col-lg-12 col-12 sub-head">
<p class="h2" style="text-align:center;"><strong>Services</strong></p>
</div>
		<div class="row mid-section">
		<div class="col-sm-6 col-md-6 col-lg-6 service-box">
			<div>
			<p class="h3">Property Management</p>
			<a href="../property-management/" class="link-arrow fa fa-arrow-right"></a>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6 service-box">
			<div>
			<p class="h3">Buying or Selling</p>
			<a href="" class="link-arrow fa fa-arrow-right"></a>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6 service-box">
			<div>
			<p class="h3">Letting or Renting</p>
			<a href="../letting-or-renting/" class="link-arrow fa fa-arrow-right"></a>
			</div>
		</div>

		
		<div class="col-sm-6 col-md-6 col-lg-6 service-box">
			<div>
			<p class="h3">Market Your property</p>
			<a href="../market-your-property/" class="link-arrow fa fa-arrow-right"></a>
			</div>
		</div>
			<div class="col-sm-6 col-md-6 col-lg-6 service-box">
			<div>
			<p class="h3">Internet Infrastructure</p>
			<a href="../internet-infrastructure/" class="link-arrow fa fa-arrow-right"></a>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6 service-box">
			<div>
			<p class="h3">Home & Office Services</p>
			<a href="../home-and-office-services/" class="link-arrow fa fa-arrow-right"></a>
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