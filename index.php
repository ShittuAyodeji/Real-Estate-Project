<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Property - Sell, Buy, Rent, Market Properties</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Sell, Buy, Let, Rent, Lease Properties in Lagos, Buy or Sell Land, House, Filling Station, Farm
  Hotel, Office Space, Estates in Lagos, Nigeria">
   <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="icons/font/flaticon.css">
  <link rel="stylesheet" href="fontawesome/css/font-awesome.css">
  <script src="https://kit.fontawesome.com/dafa68008e.js" crossorigin="anonymous"></script>
 <script src="js/jquery-1.12.3.js"></script>
  <script src="js/bootstrap.min.js"></script>
  

 <link href="https://fonts.googleapis.com/css?family=Merriweather:wght@300|Poppins:wght@100|Noto+Serif:wght@700|Raleway|Quicksand|Rajdhani|Titillium+Web|Roboto+Slab:wght@500|Roboto+Slab:wght@600|Open+Sans:wght@300" rel="stylesheet">
	</head>
	<body>
<?php
if(isset($_COOKIE['region'])){
		  $stored_region=$_COOKIE['region'];
	  }else{
	  $stored_region="Lagos";
	  }
include "database/connect.php";
include "includes/functions.php";
include "includes/session.php";
?>
<p class="stored_region hidden"><?php echo $stored_region; ?></p>
	<?php include "includes/message_form.php"; ?>
	<!---start dashboard wrapper--->
<?php include "includes/search_board.php"; ?>
	<div class="container-fluid urban-front">
	
	<div class="front-overlay">
	<div class="front-overlay-inner">
	
	</div>
	</div>
				<div class="row">

				<div class="container">
	<?php echo nav('','images/pc-logo-transparent.png'); ?>

				</div>
<div class="header-container container">
<p class="h1 mb-5">How can we help you?</p>
<div class="row mb-3">
<div class="col-sm-2"></div>
<div class="col-sm-4"><span><a href="home-and-office-services/">HOME & OFFICE  SERVICES</a></span></div>
<div class="col-sm-4"><span><a href="market-your-property/">MARKET YOUR PROPERTY</a></span></div>
<!--<div class="col-sm-3"><span><a href="letting-or-renting/">LETTING OR RENTING</a></span></div>-->
<div class="col-sm-2"></div>
</div>
</div>
<div class="search-container container">
<!--<ul class="tab-nav">
      <li class="tabs"><span class="options buy active-tab" data-target="buy">BUY</span></li>
      <li class="tabs"><span class="options sell" data-target="sell">SELL</span></li>
      <li class="tabs"><span class="options rent" data-target="rent">RENT</span></li>
      <li class="tabs"><span class="options serviced" data-target="serviced">SERVICED</span></li>
     
    </ul>--->
<form>
  <div class="container form-container float-left p-0">
  <div class="select-location filters-up get-property">
   <div class="col-sm-12 col-md-3 col-12 float-left p-0 property-select-face">
  <ul class="tab-nav">
      <li class="tabs col-sm-6 col-6"><span class="options buy active-tab get-property" data-target="buy">BUY</span></li>
      <!--<li class="tabs"><span class="options sell" data-target="sell">SELL</span></li>-->
      <li class="tabs col-sm-6 col-6"><span class="options rent get-property" data-target="rent">RENT</span></li>
		<!--<li class="tabs"><span class="options serviced" data-target="serviced">SERVICED</span></li>-->
     
    </ul>
  </div>
   <div class="col-sm-6 col-md-3 col-6 float-left text-center trans get-property">
  <span><i class="fa fa-home"></i></span>
    <span>Select Property</span>
  </div>

   <div class="col-sm-6 col-md-3 col-6 float-left text-center trans get-property">
  <span><i class="fa fa-map-marker"></i></span>
    <span>Select Region</span>
  </div>
  
   <div class="col-sm-12 col-md-3 col-12 float-left p-0 get-property">
  <div class="form-group">
    <span class="btn btn-primary get-property">Search</span>
  </div>
  </div>
  </div>
 
  </div>
 </form>
				</div>
<div class="header-container container other-services">
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-4"><span><a href="internet-infrastructure/">INTERNET INFRASTRUCTURE</a></span></div>
<div class="col-sm-4"><span><a href="property-management/">PROPERTY MANAGEMENT</a></span></div>
<!--<div class="col-sm-3"><span><a href="buying-or-selling/">BUYING OR SELLING</a></span></div>--->
<div class="col-sm-2"></div>
</div>
</div>				
				<!---<div class="boxes-container">
				<ul class="list-group">
	<?php
	$sql="SELECT * FROM properties GROUP BY type LIMIT 5";
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
	?>
		<li class="list-group-item">
		<p><strong><?php echo get_rows($dbc,"properties","type",$type); ?></strong></p>
		<?php echo strtoupper($type); ?>
		</li>
		
	<?php
	}
	}
	?>
	</ul>
	</div>--->
	</div>
	

	</div>


	<div class="container" id="aboutus">
	<p class="h4 headings">Whether you are looking to sell, buy or rent, we help you actualize it.</p>
		<div class="row cards-wrap first-card-wrap">
		    <div class="col-sm-12 col-md-6 col-lg-6 card-box right-box right-image-box mobile"></div>
			<div class="col-sm-12 col-md-6 col-lg-6 card-box">
				<div class="col-sm-12 inner-card-box inner-top-box">
				<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-2"></div>
				<div class="col-sm-12 col-md-12 col-lg-8 float-left"><p class="h4 card-head">Buy, rent or sell a property</p>
				
				</div>
				<div class="col-sm-12 col-md-12 col-lg-2"></div>
				</div>
				</div>
				<div class="col-sm-12 inner-card-box inner-bottom-box">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-8 desc-sides left">
					<p>At some point, you start making plans on whether to acquire or rent a new property. If you 
					have found yourself at this point, we are happy you are taking a very bold step and we would be pleased to work for with to help you make the best decision.</p>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-4 desc-sides">
						<span  class="btn btn-primary btns front-btn get-property">Search properties</span>
					</div>
				</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-6 card-box right-box right-image-box desktop"></div>
		</div>
		
		<div class="row cards-wrap">
		<div class="col-sm-12 col-md-6 col-lg-6 card-box right-box left-image-box"></div>
			<div class="col-sm-12 col-md-6 col-lg-6 card-box ">
				<div class="col-sm-12 inner-card-box inner-top-box">
				<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-2"></div>
				<div class="col-sm-12 col-md-12 col-lg-8 float-left"><p class="h1 card-head">We value your satisfaction</p></div>
				<div class="col-sm-12 col-md-12 col-lg-2"></div>
				</div>
				</div>
				<div class="col-sm-12 inner-card-box inner-bottom-box">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-8 desc-sides left">
					<p>We would be honoured to assist you with your property needs. We want you to always
					 make us your number one choice anytime you are thinking of property, your satisfaction is 
					 very paramount to us.
					  </p>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-4 desc-sides">
						<a href="contact-us/" class="btn btn-primary btns front-btn">Get in touch</a>
					</div>
				</div>
				</div>
			</div>
		</div>

<p class="h2 headings service-head" id="services">You can trust us with</p>

		<div class="row mid-section">
		<div class="col-sm-4 col-md-4 col-lg-4 service-box">
			<div>
			<p class="h3">Property Management</p>
			<a href="property-management/" class="link-arrow fa fa-arrow-right"></a>
			</div>
		</div>
		<!--<div class="col-sm-6 col-md-4 col-lg-4 service-box">
			<div>
			<p class="h3">Buying or Selling</p>
			<a href="buying-or-selling/" class="link-arrow fa fa-arrow-right"></a>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-4 service-box">
			<div>
			<p class="h3">Letting or Renting</p>
			<a href="letting-or-renting/" class="link-arrow fa fa-arrow-right"></a>
			</div>
		</div>-->

		
		<div class="col-sm-4 col-md-4 col-lg-4 service-box">
			<div>
			<p class="h3">Market your property</p>
			<a href="market-your-property/" class="link-arrow fa fa-arrow-right"></a>
			</div>
		</div>
			<div class="col-sm-4 col-md-4 col-lg-4 service-box">
			<div>
			<p class="h3">Internet Infrastructure</p>
			<a href="internet-infrastructure/" class="link-arrow fa fa-arrow-right"></a>
			</div>
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4 service-box desktop">
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4 service-box">
		
			<div>
			<p class="h3">Home & Office Services</p>
			<a href="home-and-office-services/" class="link-arrow fa fa-arrow-right"></a>
			</div>
		</div>
		</div>
		
		
		<div class="row cards-wrap">
		    <div class="col-sm-6 card-box right-box right-image-box last-image-box mobile"></div>
			<div class="col-sm-6 card-box">
				<div class="col-sm-12 inner-card-box inner-top-box">
				<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-2"></div>
				<div class="col-sm-12 col-md-12 col-lg-8 float-left last-card-head"><p class="h1 card-head">Let's market your property</p></div>
				<div class="col-sm-12 col-md-12 col-lg-2"></div>
				</div>
				</div>
				<div class="col-sm-12 inner-card-box inner-bottom-box">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-8 desc-sides last-desc-sides left">
					<p>Now is the appropriate time to reasses your property needs and make that move you’ve been thinking about for a while.</p>
<p>Tell us your property needs and let us work to make it happen. We will consider all your needs and give you a really clear
and best support to make sure we meet your needs.</p>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-4 desc-sides">
						<p><a class="btn btn-primary btns front-btn last-btn" href="market-your-property/">Learn more</a></p>
					</div>
				</div>
				</div>
			</div>
			<div class="col-sm-6 card-box right-box right-image-box last-image-box desktop"></div>
		</div>
	</div>
	
		<div class="container-fluid p-3 display-properties-categories">
	<p class="h4 headings">Property Sectors</p>
	<div class="row">
		<?php
	$sql="SELECT *, COUNT(id) AS num FROM properties WHERE treated='1' GROUP BY type";
$result=mysqli_query($dbc,$sql);
$fetched_rows=mysqli_num_rows($result);
$i=1;
if($fetched_rows>0){
	while($rows=mysqli_fetch_assoc($result)){
	$property_id=$rows['property_id'];	
	$type=$rows['type'];	
	$num=$rows['num'];	
	$property_image=get_property_image($dbc,$property_id);
	$images=get_rows($dbc,"property_images","property_id",$property_id);
	if(empty(get_property_image($dbc,$property_id))){
		$property_image="images/pcommerce_back.png";
	}
	
	?>
		<div class="col-sm-3 col-md-2 col-lg-2 col-6 property-cat-card">
		<div class="property_category" style="background:#fff;">
		<a title="<?php echo $type; ?> properties in Nigeria" style="background:#fff; color:#000; font-weight:20px;" href="search/?req=property_<?php echo $type ?>--page_1"><p><?php echo $type." <sup class='badge'>".$num; ?></sup></p></a>
		</div>
		</div>
	<?php
	}
	}
	?>
		
	</div>
	</div>
	
	<div class="container-fluid p-3 display-properties">
	<!--<p class="h2 mt-0">Latest Properties</p>-->
	<div class="row">
		<?php
	$sql="SELECT * FROM properties WHERE treated='1' ORDER BY id LIMIT 4";
$result=mysqli_query($dbc,$sql);
$fetched_rows=mysqli_num_rows($result);
$i=1;
if($fetched_rows>0){
	while($rows=mysqli_fetch_assoc($result)){
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
	$rooms=$rows['room'];	
	$landSize=$rows['land_size'];
	$property_image=get_property_image($dbc,$property_id);
	$house_type=$house_type=="none" || empty($house_type) ? $type." property" : $house_type;	

	$baths=get_spaces_number($dbc,$property_id,"bath");
	$parlours=get_spaces_number($dbc,$property_id,"parlour");
	$images=get_rows($dbc,"property_images","property_id",$property_id);
	if(empty(get_property_image($dbc,$property_id))){
		$property_image="images/pcommerce_back.png";
	}
	?>
		<div class="col-sm-6 col-md-6 col-lg-3 col-12 property-card">
		<div class="thumbnail">
			<div class="property-avatar">
			<img src="<?php echo $property_image; ?>" alt="<?php echo $house_type." in ".$lga.", ".$region; ?>" />
			<p><strong class="float-left"><?php echo $type; ?></strong> <!--<span class="favorite"><i class="far fa-star"></i></span>--> <i class="fas fa-camera"></i> <?php echo $images; ?></p>
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
			<p class=""><?php echo $house_type;?> in <strong><?php echo $lga.", ".$region; ?></strong></p>
			<p><?php echo $address; ?>. <i class="fas fa-link"></i> <a class="links" href="property-details/?req=<?php echo $property_id; ?>">See details</a></p>
			</div>
		</div>
		</div>
	<?php
	}
	}
	?>
		
	</div>
	</div>
	<?php
	$footer =footer("");
	echo $footer; ?>
	<!---end dashboard wrapper--->
	</body>
	
<script src="js/script.js"></script>	
</html>