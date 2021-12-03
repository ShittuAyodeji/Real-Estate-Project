<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Property - Property Management</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Property Managers, Property Caretakers in Lagos, Abuja, Portharcourt, Nigeria">
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
<p class="h2 page_title main-page-title float-left" style="width:100%; margin-top:170px;">Property Management</p>

</div>
</div>

<div class="container-fluid sec-adv-search">
<div class="row alert-container">
<div class="col-sm-12 col-12 float-left" style="width:100%; padding:0;">
					<span class="filter-tab filters alert">
					</span>
				</div>
</div>
<span class="fa fa-times close close-filters"></span>
<div class="row filter-row">

<div class="col-sm-12 col-12 tab-nav-wrap">
					<ul class="tab-nav transaction-type sec-transaction-type">
      <li class="tabs"><span class="options buy active-tab" data-target="Buy">BUY</span></li>
      <!--<li class="tabs"><span class="options sell" data-target="sell">SELL</span></li>-->
      <li class="tabs"><span class="options rent" data-target="Rent">RENT</span></li>
	  <input class="form-control hidden selected_tab" type="hidden" />
      <!--<li class="tabs"><span class="options serviced" data-target="serviced">SERVICED</span></li>-->
     
    </ul>
				</div>
<div class="col-sm-12 col-md-12 col-lg-2 col-12 filter-col property-col">
<p class="h5 regions-head head p-1 deeper">SELECT PROPERTY</p>
		<ul class="list-group properties">
		<li class="list-group-item" data-status="check" data-type="property" data-value="Residential"><i class="fa fa-square-o check"></i> Residential</li>
		<li class="list-group-item" data-status="check" data-type="property" data-value="Land"><i class="fa fa-square-o check"></i> Land</li>
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
<div class="col-sm-12 col-md-12 col-lg-2 col-12 filter-col">
				<p class="h5 regions-head head p-1 deeper">SELECT REGION</p>
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

<div class="col-lg-2 col-sm-12 col-md-12 col-12 filter-col">
	<p class="h5 head p-1 deeper">SELECT CITY in <span class="towns-head"></span></p>
	<ul class="list-group towns">
	
	</ul>
</div>

	<div class="col-lg-2 col-sm-12 col-md-12 col-12 houses house-type types-of filter-col">
					<p class="head deeper">Select house type</p>
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
					
					<div class="col-lg-4 col-sm-12 col-md-12 col-12 get-values float-left filter-col">
					<div class="values value-type types-of">
					
					<div class="rows">
					<p class="head deeper" style="width:100%;">NUMBER OF ROOMS</p>
					<div class="col-sm-2 float-left col-2 value-action"><i class="fa fa-minus" data-type="minus" data-target="room"></i></div>
					<div class="col-sm-8 float-left col-8 value-action values p-0">
					<input type="text" autocomplete="off" data-value="1"  placeholder="Add No of rooms" class="form-control room-values" disabled />
					</div>
					<div class="col-sm-2 float-left col-2 value-action"><i class="fa fa-plus" data-type="plus" data-target="room"></i></div>
					</div>
					</div>
					
					<div class="rows">
					<p class="head deeper" style="width:100%;">ENTER PRICE</p>
					<div class="col-sm-2 float-left col-2 value-action max-text p-0">
					<p>MAX:</p>
					</div>
					<div class="col-sm-2 col-2 float-left value-action"><i class="fa fa-minus" data-type="minus" data-target="price"></i></div>
					<div class="col-sm-6 col-6 float-left value-action values p-0">
					<input type="text" data-value="0" placeholder="Add price" class="form-control price-values" autocomplete="off" />
					</div>
					<div class="col-sm-2 col-2 float-left value-action"><i class="fa fa-plus" data-type="plus" data-target="price"></i></div>
					<div class="col-sm-6 col-6 float-left price-text">
					<label for="increase">-/+ price by:</label>
					</div>
					<div class="col-sm-6 float-left col-6 p-0">
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
					<!--<div class="col-sm-12">
					<p class="filtered"><span>-</span></p>
				</div>-->
					</div>
					</div>
</div>
</div>

<div class="container">

<p class="h4 page-intro">You own a property and you want to rent or let it out or you would like Us to manage
 your properties? It is essential for every property owners to have capable hands to manage their properties with efficient
communication with tenants/occupants  and real estate service providers. We offer support on rentals and  property management services.
</p>

 
 <p class="btns btn btn-primary get-property">Buy a property</p>
 <p class="btns btn btn-primary send-message-btn">Get in touch</p>
 	
 </div>

<?php 
$related_sql=$dbc->prepare("SELECT * FROM properties WHERE treated='1' and status='buy' LIMIT 8");
$related_sql->execute();
$related_result=$related_sql->get_result();
$related_rows=$related_result->num_rows;

include "../includes/services.php";

	$footer =footer("../");
	echo $footer; ?>
	</body>
	
<script src="../js/script.js"></script>		
</html>