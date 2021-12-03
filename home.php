<html>
	<head>
		<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="icons/font/flaticon.css">
  <link rel="stylesheet" href="fontawesome/css/font-awesome.css">
  <script src="https://kit.fontawesome.com/dafa68008e.js" crossorigin="anonymous"></script>
 <script src="js/jquery-1.12.3.js"></script>
  <script src="js/bootstrap.min.js"></script>
  

 <link href="https://fonts.googleapis.com/css?family=Noto+Serif:wght@700|Raleway|Quicksand|Rajdhani|Titillium+Web|Roboto+Slab:wght@500|Roboto+Slab:wght@600|Open+Sans:wght@300" rel="stylesheet">
	</head>
	
	<body>
<?php
include "database/connect.php";
include "includes/functions.php";
include "includes/session.php";
?>
	<div class="message-sender-wrap">
	<span class="close close-message">&times;</span>
	<strong class="h5">Get In Touch</strong>
	<p>We can't wait to start working on your request</p>
	<div class="form-group">
	<input class="form-control" type="text" name="phones" placeholder="Enter your phone number" required />
	</div>
	<div class="form-group">
	<input class="form-control" type="text" name="phones" placeholder="Enter your Email" required />
	</div>
	
	<div class="form-group">
	<textarea class="form-control property-message" name="property_message" placeholder="Enter Message" required /></textarea>
	</div>
	<div class="form-group">
	<input class="form-control btn-primary send-property-message btns" type="button" value="Send Message" />
	</div>
	</div>
	<!---start dashboard wrapper--->
					<div class="advanced-search container-fluid">
				<span class="fa fa-times close close-filters"></span>
				<div class="col-sm-4 col-xs-12 float-left">
					<ul class="tab-nav transaction-type">
      <li class="tabs"><span class="options buy active-tab" data-target="Buy">BUY</span></li>
      <!--<li class="tabs"><span class="options sell" data-target="sell">SELL</span></li>-->
      <li class="tabs"><span class="options rent" data-target="Rent">RENT</span></li>
	  <input class="form-control hidden selected_tab" type="hidden" />
      <!--<li class="tabs"><span class="options serviced" data-target="serviced">SERVICED</span></li>-->
     
    </ul>
				</div>
				<div class="col-sm-12 col-xs-12 float-left alert-container">
					<span class="filter-tab filters alert">
					</span>
				</div>
				<div class="row list-wrap float-left">
				
				
				
				
				<div class="col-sm-12 col-md-12 col-lg-2 col-12 p-1 lists midth" style="margin-top:0 !important">
				<p class="h5 property-head head p-1">PROPERTY TYPE</p>
				<ul class="list-group properties">
		<li class="list-group-item" data-status="check" data-type="property" data-value="Residential"><i class="fa fa-square-o check"></i> Residential</li>
		<li class="list-group-item" data-status="check" data-type="property" data-value="New Build"><i class="fa fa-square-o check"></i> New Build</li>
		<li class="list-group-item" data-status="check" data-type="property" data-value="Waterfront"><i class="fa fa-square-o check"></i> Waterfront</li>
		<li class="list-group-item" data-status="check" data-type="property" data-value="Educational"><i class="fa fa-square-o check"></i> Educational</li>
		<li class="list-group-item" data-status="check" data-type="property" data-value="Hotels"><i class="fa fa-square-o check"></i> Hotel</li>
		<li class="list-group-item" data-status="check" data-type="property" data-value="Filling Station"><i class="fa fa-square-o check"></i> Filling Station</li>
		<li class="list-group-item" data-status="check" data-type="property" data-value="Farm"><i class="fa fa-square-o check"></i> Farm</li>
		<li class="list-group-item" data-status="check" data-type="property" data-value="Healthcare"><i class="fa fa-square-o check"></i> Healthcare</li>
		<li class="list-group-item" data-status="check" data-type="property" data-value="Forest"><i class="fa fa-square-o check"></i> Forest/Woodland</li>
		<li class="list-group-item" data-status="check" data-type="property" data-value="Office"><i class="fa fa-square-o check"></i> Office & Business Space</li>
		<li class="list-group-item" data-status="check" data-type="property" data-value="Estate"><i class="fa fa-square-o check"></i> Estate</li>
		<li class="list-group-item" data-status="check" data-type="property" data-value="Student Accomodation"><i class="fa fa-square-o check"></i> Student Accomodation</li>
		<li class="list-group-item" data-status="check" data-type="property" data-value="Leisure"><i class="fa fa-square-o check"></i> Leisure or Trade</li>
		<li class="list-group-item" data-status="check" data-type="property" data-value="Marine"><i class="fa fa-square-o check"></i> Marine</li>
		<li class="list-group-item" data-status="check" data-type="property" data-value="Bars and Restuarants"><i class="fa fa-square-o check"></i> Bars and Restuarants</li>
		<li class="list-group-item" data-status="check" data-type="property" data-value="Shopping Centres"><i class="fa fa-square-o check"></i> Shopping Centres</li>
		<li class="list-group-item" data-status="check" data-type="property" data-value="Sport Venues"><i class="fa fa-square-o check"></i> Sport Venues</li>
		<li class="list-group-item" data-status="check" data-type="property" data-value="Tourist Attractions"><i class="fa fa-square-o check"></i> Tourist Attractions</li>
		<li class="list-group-item" data-status="check" data-type="property" data-value="Energy"><i class="fa fa-square-o check"></i> Energy</li>
				</ul>
				</div>
				
				<div class="col-sm-12 col-md-12 col-lg-2 col-12 p-1 lists midth">
				<p class="h5 regions-head head p-1">SELECT REGION</p>
				<ul class="list-group region">
<li class="list-group-item" data-status="check" data-type="region" data-value="Abuja"><i class="fa fa-square-o check"></i> Abuja</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Abia"><i class="fa fa-square-o square"></i> Abia</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Adamawa"><i class="fa fa-square-o square"></i> Adamawa</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Akwa Ibom"><i class="fa fa-square-o square"></i> Akwa Ibom</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Anambra"><i class="fa fa-square-o square"></i> Anambra</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Bauchi"><i class="fa fa-square-o square"></i> Bauchi</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Bayelsa"><i class="fa fa-square-o square"></i> Bayelsa</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Benue"><i class="fa fa-square-o square"></i> Benue</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Borno"><i class="fa fa-square-o square"></i> Borno</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Cross River"><i class="fa fa-square-o square"></i> Cross River</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Delta"><i class="fa fa-square-o square"></i> Delta</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Ebonyi"><i class="fa fa-square-o square"></i> Ebonyi</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Edo"><i class="fa fa-square-o square"></i> Edo</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Ekiti"><i class="fa fa-square-o square"></i> Ekiti</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Enugu"><i class="fa fa-square-o square"></i> Enugu</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Gombe"><i class="fa fa-square-o square"></i> Gombe</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Imo"><i class="fa fa-square-o square"></i> Imo</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Jigawa"><i class="fa fa-square-o square"></i> Jigawa</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Kaduna"><i class="fa fa-square-o square"></i> Kaduna</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Kano"><i class="fa fa-square-o square"></i> Kano</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Katsina"><i class="fa fa-square-o square"></i> Katsina</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Kebbi"><i class="fa fa-square-o square"></i> Kebbi</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Kogi"><i class="fa fa-square-o square"></i> Kogi</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Kwara"><i class="fa fa-square-o square"></i> Kwara</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Lagos"><i class="fa fa-square-o"></i> Lagos</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Nasarawa"><i class="fa fa-square-o square"></i> Nasarawa</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Niger"><i class="fa fa-square-o square"></i> Niger</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Ogun"><i class="fa fa-square-o square"></i> Ogun</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Ondo"><i class="fa fa-square-o square"></i> Ondo</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Osun"><i class="fa fa-square-o square"></i> Osun</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Oyo"><i class="fa fa-square-o square"></i> Oyo</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Plateau"><i class="fa fa-square-o square"></i> Plateau</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Rivers"><i class="fa fa-square-o square"></i> Rivers</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Sokoto"><i class="fa fa-square-o square"></i> Sokoto</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Taraba"><i class="fa fa-square-o square"></i> Taraba</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Yobe"><i class="fa fa-square-o square"></i> Yobe</li>
<li class="list-group-item" data-status="check" data-type="region" data-value="Zamfara"><i class="fa fa-square-o square"></i> Zamfara</li>
				</ul>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-2 col-12 p-1 lists float-left midth">
				<p class="h5 head p-1">SELECT CITY in <span class="towns-head"></span></p>
				<ul class="list-group towns">
				
				</ul>
				</div>
				<div class="col-sm-12 col-md-2 col-12 houses house-type types-of p-1 lists midth">
					<p class="h5 head p-1">SELECCT HOUSE</p>
				<ul class="list-group select-house-type house">
						<li class="list-group-item" data-status="check" data-type="house" data-value="Bungalow" ><i class="fa fa-square-o square"></i> Bungalow</li>
						<li class="list-group-item" data-status="check" data-type="house" data-value="Duplex"><i class="fa fa-square-o square"></i> Duplex</li>
						<li class="list-group-item" data-status="check" data-type="house" data-value="Flats"><i class="fa fa-square-o square"></i> Flats</li>
						<li class="list-group-item" data-status="check" data-type="house" data-value="Penthouse"><i class="fa fa-square-o square"></i> Penthouse</li>
						<li class="list-group-item" data-status="check" data-type="house" data-value="Detached"><i class="fa fa-square-o square"></i> Detached</li>
						<li class="list-group-item" data-status="check" data-type="house" data-value="Semi-Detached"><i class="fa fa-square-o square"></i> Semi-Detached</li>
						<li class="list-group-item" data-status="check" data-type="house" data-value="Terraced"><i class="fa fa-square-o square"></i> Terraced</li>
						<li class="list-group-item" data-status="check" data-type="house" data-value="Mansion"><i class="fa fa-square-o square"></i> Mansion</li>
				</ul>
					</div>
				
				<div class="col-sm-12 col-md-12 col-lg-4 col-12 p-1">
					<div class="get-values m-3">
					<div class="values value-type types-of">
					<p class="head">No of rooms</p>
					<div class="row">
					<div class="col-sm-2 col-md-2 col-2 value-action"><i class="fa fa-minus" data-type="minus" data-target="room"></i></div>
					<div class="col-sm-8 col-md-8 col-8 value-action values p-0">
					<input type="text" autocomplete="off" data-value="1"  placeholder="Add No of rooms" class="form-control room-values" disabled />
					</div>
					<div class="col-sm-2 col-md-2 col-2 value-action"><i class="fa fa-plus" data-type="plus" data-target="room"></i></div>
					</div>
					</div>
					<p class="head">Price range</p>
					<div class="row">
					<div class="col-sm-2 col-md-2 col-2 value-action max-text p-0">
					<p>MAX:</p>
					</div>
					<div class="col-sm-2 col-md-2 col-2 value-action"><i class="fa fa-minus" data-type="minus" data-target="price"></i></div>
					<div class="col-sm-6 col-md-6 col-6 value-action values p-0">
					<input type="text" data-value="0" placeholder="Add price" class="form-control price-values" autocomplete="off" />
					</div>
					<div class="col-sm-2 col-md-2 col-2 value-action"><i class="fa fa-plus" data-type="plus" data-target="price"></i></div>
					<div class="col-sm-6 col-md-6 col-6 price-text">
					<label for="increase">-/+ price by:</label>
					</div>
					<div class="col-sm-6 col-md-6 col-6 p-0">
					<div class="form-group">
					<select class="form-control price-range" autocomplete="off">
						<option value="50000">50,000</option>
						<option value="100000">100,000</option>
						<option value="200000">200,000</option>
						<option value="500000">500,000</option>
						<option value="1000000">1,000,000</option>
						<option value="10000000">10,000,000</option>
						<option value="20000000">20,000,000</option>
						<option value="50000000">50,000,000</option>
						<option value="100000000">100,000,000</option>
					</select>
					</div>
					</div>
					<div class="col-sm-12 col-md-12 col-12">
					<p class="filtered"><span>-</span></p>
				</div>
					</div>
					</div>
				
				</div>
				
				</div>
	
	</div>
	<div class="container-fluid urban-front">
	
	<div class="front-overlay">
	<div class="front-overlay-inner">
	
	</div>
	</div>
				<div class="row">

				<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/"><img src="images/pc-logo-transparent.png" alt="Property Commerce" /></a>
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
<div class="header-container container">
<p class="h1 mb-5">How can we help you?</p>
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-3"><span><a href="home-and-office-services/">HOME & OFFICE  SERVICES</a></span></div>
<div class="col-sm-3"><span><a href="market-your-property/">MARKET YOUR PROPERTY</a></span></div>
<div class="col-sm-3"><span><a href="letting-or-renting/">LETTING OR RENTING</a></span></div>
<div class="col-sm-1"></div>
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
      <li class="tabs col-sm-6 col-6"><span class="options buy active-tab" data-target="buy">BUY</span></li>
      <!--<li class="tabs"><span class="options sell" data-target="sell">SELL</span></li>-->
      <li class="tabs col-sm-6 col-6"><span class="options rent" data-target="rent">RENT</span></li>
		<!--<li class="tabs"><span class="options serviced" data-target="serviced">SERVICED</span></li>-->
     
    </ul>
  </div>
   <div class="col-sm-6 col-md-3 col-6 float-left text-center trans">
  <span><i class="fa fa-home"></i></span>
    <span>Select Property</span>
  </div>

   <div class="col-sm-6 col-md-3 col-6 float-left text-center trans">
  <span><i class="fa fa-map-marker"></i></span>
    <span>Select Region</span>
  </div>
  
   <div class="col-sm-12 col-md-3 col-12 float-left p-0 ">
  <div class="form-group">
    <span class="btn btn-primary">Search</span>
  </div>
  </div>
  </div>
 
  </div>
 </form>
				</div>
<div class="header-container container other-services">
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-3"><span><a href="internet-infrastructure/">INTERNET INFRASTRUCTURE</a></span></div>
<div class="col-sm-3"><span><a href="property-management/">PROPERTY MANAGEMENT</a></span></div>
<div class="col-sm-3"><span><a href="buying-or-selling/">BUYING OR SELLING</a></span></div>
<div class="col-sm-1"></div>
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
	
	<div class="container-fluid p-3 display-properties">
	<p class="h2 headings mt-0">Latest Properties</p>
	<div class="row mt-5">
		<?php
	$sql="SELECT * FROM properties WHERE treated='1' ORDER BY id LIMIT 4";
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
	$price=$rows['price'];	
	$address=$rows['address'];	
	$lga=$rows['lga'];	
	$region=$rows['region'];	
	$rooms=$rows['room'];	
	$landSize=$rows['land_size'];
	$property_image=get_property_image($dbc,$property_id);
	$baths=get_spaces_number($dbc,$property_id,"bath");
	$parlours=get_spaces_number($dbc,$property_id,"parlour");
	$images=get_rows($dbc,"property_images","property_id",$property_id);
	?>
		<div class="col-sm-3 col-md-3 col-lg-3 col-12 property-card">
		<div class="thumbnail">
			<div class="property-photo"  style="background-image:url('<?php echo $property_image; ?>')">
			
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
			<p class=""><strong><?php echo $lga.", ".$region; ?></strong></p>
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
	<div class="container" id="aboutus">
	<p class="h2 headings">We are good with everything property</p>
		<div class="row cards-wrap">
			<div class="col-sm-6 card-box">
				<div class="col-sm-12 inner-card-box inner-top-box">
				<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8 float-left"><p class="h1 card-head">We want to work for you</p></div>
				<div class="col-sm-2"></div>
				</div>
				</div>
				<div class="col-sm-12 inner-card-box">
				<div class="row">
					<div class="col-sm-8 desc-sides left">
					<p>Over 39,000 people work for us in more than 70 countries all over the world.
					This breadth of global coverage, combined with specialist services and market insight,
					means we'll always have an expert who is local to you.</p>
					</div>
					<div class="col-sm-4 desc-sides">
						<p class="btn btn-success btns mt-5">Meet Our Experts</p>
					</div>
				</div>
				</div>
			</div>
			<div class="col-sm-6 card-box right-box right-image-box"></div>
		</div>
		
		<div class="row cards-wrap">
		<div class="col-sm-6 card-box right-box left-image-box"></div>
			<div class="col-sm-6 card-box ">
				<div class="col-sm-12 inner-card-box inner-top-box">
				<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8 float-left"><p class="h1 card-head">We value your satisfaction</p></div>
				<div class="col-sm-2"></div>
				</div>
				</div>
				<div class="col-sm-12 inner-card-box">
				<div class="row">
					<div class="col-sm-8 desc-sides left">
					<p>Over 39,000 people work for us in more than 70 countries all over the world.
					This breadth of global coverage, combined with specialist services and market insight,
					means we'll always have an expert who is local to you.</p>
					</div>
					<div class="col-sm-4 desc-sides">
						<p class="btn btn-success btns mt-5">Learn more</p>
					</div>
				</div>
				</div>
			</div>
		</div>

<p class="h2 headings service-head" id="services">Our Services</p>

		<div class="row mid-section">
		<div class="col-sm-6 col-md-6 col-lg-6 service-box">
			<div>
			<p class="h3">Property Management</p>
			<a href="property-management/" class="link-arrow fa fa-arrow-right"></a>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6 service-box">
			<div>
			<p class="h3">Buying or Selling</p>
			<a href="buying-or-selling/" class="link-arrow fa fa-arrow-right"></a>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6 service-box">
			<div>
			<p class="h3">Letting or Renting</p>
			<a href="letting-or-renting/" class="link-arrow fa fa-arrow-right"></a>
			</div>
		</div>

		
		<div class="col-sm-6 col-md-6 col-lg-6 service-box">
			<div>
			<p class="h3">Market Your property</p>
			<a href="market-your-property/" class="link-arrow fa fa-arrow-right"></a>
			</div>
		</div>
			<div class="col-sm-6 col-md-6 col-lg-6 service-box">
			<div>
			<p class="h3">Internet Infrastructure</p>
			<a href="internet-infrastructure/" class="link-arrow fa fa-arrow-right"></a>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6 service-box">
			<div>
			<p class="h3">Home & Office Services</p>
			<a href="home-and-office-services/" class="link-arrow fa fa-arrow-right"></a>
			</div>
		</div>
		</div>
		
		
		<div class="row cards-wrap">
			<div class="col-sm-6 card-box">
				<div class="col-sm-12 inner-card-box inner-top-box">
				<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8 float-left"><p class="h1 card-head">Let's market your property</p></div>
				<div class="col-sm-2"></div>
				</div>
				</div>
				<div class="col-sm-12 inner-card-box">
				<div class="row">
					<div class="col-sm-8 desc-sides left">
					<p>Over 39,000 people work for us in more than 70 countries all over the world.
					This breadth of global coverage, combined with specialist services and market insight,
					means we'll always have an expert who is local to you.</p>
					</div>
					<div class="col-sm-4 desc-sides">
						<p class="btn btn-success btns mt-5">Arrange property valuation</p>
						<p><a class="btn btn-primary btns" href="market-your-property/">Learn more</a></p>
					</div>
				</div>
				</div>
			</div>
			<div class="col-sm-6 card-box right-box right-image-box"></div>
		</div>
	</div>
	<div class="home-page-footer container-fluid">
	<div class="row">
		<div class="col-sm-6">
		<p>Property Commerce &copy; <?php echo date('Y'); ?></p>
		</div>
		<div class="col-sm-6">
		<ul class="footer-list">
		<li><a href="#services">Services</a> |</li>
		<li><a href="#aboutus">About Us</a> |</li>
		<li><a href="">Contact Us</a> |</li>
		<li><a href="">Privacy Policy</a></li>
		</ul>
		</div>
	</div>
	</div>
	<!---end dashboard wrapper--->
	</body>
	
<script src="js/script.js"></script>
				
				
			
				
				
			
				

</html>