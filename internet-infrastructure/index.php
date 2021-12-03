<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Property - Internet Infrastructure</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Internet Infrastructure Services, Networking Service in Lagos, Nigria">
   <link rel="conical" href="">
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
<p class="h2 page_title main-page-title float-left" style="width:100%; margin-top:170px;">Internet Infrastructure</p>

</div>
</div>

<?php include "../includes/search_board.php"; ?>

<div class="container">

<p class="h4 page-intro">Every home and commercial centres need high-speed internet services to stay connected
 to the rest of the wolrd and keep business running. We help setup High-speed Commercial and Residential Internet Services</p>
<p>Connectivity is the foundation of effective communication, most importantly for homes and businesses. Our Team of experts
 provide reliable and cost effective network infrastructure for your home and businesses (Hotels, Schools, Office Space, Malls, etc.), 
 We offer complete service from the design phase to implementation as well as making sure you enjoy maximum
 internet uptime as all services are continually monitored.</p>
 <p class="btns btn btn-primary send-message-btn">Request quote</p>
 	
 
</div>


<?php
include "../includes/services.php";
	$footer =footer("../");
	echo $footer; ?>
	</body>
	
<script src="../js/script.js"></script>		
				
</html>