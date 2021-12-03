<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Property - Home and Office Services</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Home and Office Services in Lagos, Nigria. Security Systems in Lagos, CCTV Installation, Air Conditioner Services
   Elecrical Services, Painting, Plumbing Services">
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
<p class="h2 page_title main-page-title float-left" style="width:100%; margin-top:170px;">Home & Office Services</p>

</div>
</div>

<?php include "../includes/search_board.php"; ?>

<div class="container">

<p class="h4 page-intro">We understand the importance of feeling safe and secure. We know that it is of highest
 priority to protect your home and business place with best services & solutions that would put your mind at rest.</p>

<p class="h5 mt-4">We have professionally designed home and office solutions for you</p>
<p class="h5 mt-4">Security Systems</p>
<ul class="">
<li class="">Intercoms and Video Doorbells</li>
<li class="">Fire, Smoke Alarms and Emergency Lightning</li>
<li class="">Closed Circuit Television (CCTV)</li>
<li class="">Intruder Alarms</li>
</ul>

<p class="h5 mt-4">Utilities & Appliances</p>
<ul class="">
<li class="">Plumbing Services</li>
<li class="">Home Appliances Services (Air Conditioner (AC) Installation, Washing Machine, etc.)</li>
<li class="">Elecrical Services</li>
<li class="">Painting Services</li>
<li class="">Construction Services</li>
<li class="">Renovation & Refurbishment Services</li>
<li class="">Pest Control Services</li>
</ul>

<p class="h5 mt-4">Why you should work with Us?</p>
<ul class="">
<li><p><strong>Verified professionals</strong> - We do thorough verifcations, background checks for all our professionals to ensure your safety</p></li>
<li><p><strong>99.9% work satisfaction</strong> - In order to ensure high quality of service, We work only with most qualified professionals to give you
nothing short of 99.9% satisfaction.</p></li>
</ul>

 <p class="btns btn btn-primary send-message-btn">Get in touch</p>
 	
 
</div>

<?php
include "../includes/services.php";
	$footer =footer("../");
	echo $footer; ?>
	</body>
	
<script src="../js/script.js"></script>	
				
</html>