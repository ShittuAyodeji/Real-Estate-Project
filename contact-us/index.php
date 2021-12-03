<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Property - Sell, Buy, Rent, Market Properties</title>
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
<p class="h2 page_title main-page-title float-left" style="width:100%; margin-top:170px;">Contact Us</p>

</div>
</div>

<?php include "../includes/search_board.php"; ?>

<div class="container">
<p class="h4 sub-head">We are always looking forward to hearing from you</p>
<p><strong>Email: </strong>hello@property.test</p>
<p class="desktop"><strong>Phone: </strong>+234806701111</p>
<p class="mobile"><a class="btn btns btn-primary" href="tel:+234806701111"> +234(0)6701111</a></p>
<p class="btns btn btn-primary send-message-btn">Send Message</p>
<p class="mobile"><a href="https://wa.me/2347067920578?text=Hello" class="btns btn"><i class="fab fa-whatsapp"></i> Chat Us</a></p>
 
<p class="h4">Follow Us</p>
<ul class="social-list">
<li><a href=""><i class="fab fa-twitter"></i> Twitter</a></li>
<li><a href=""><i class="fab fa-instagram"></i> Instagram</a></li>
<li><a href=""><i class="fab fa-youtube"></i> Youtube</a> </li>
<li><a href=""><i class="fab fa-facebook"></i> Facebook</a></li>
</ul>
	
 
</div>
<?php
	$footer =footer("../");
	echo $footer; ?>
	</body>
	
<script src="../js/script.js"></script>			
				
</html>