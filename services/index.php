<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Property Commerce - Let or Rent Properties</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Let, Rent, Lease Properties in Lagos, Buy or Sell Land, House, Filling Station, Farm
  Hotel, Office Space, Estates in Lagos, Nigeria">
   <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/forth-painter.css">
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
	
	<div class="provider-form-wrap form-wraps">
	<span class="close close-message">&times;</span>
	<strong class="h5">Join service providers</strong>
	<p>Provide professional service to properties</p>
	<div class="form-group">
	<select class="form-control form-input required" autocomplete="off" name="service_type">
			  <option value="">--Select service type--</option>
			  <?php include "../includes/service_options.php"; ?>
	</select>
	</div>
	<div class="form-group">
	<input class="form-control form-input required" type="text" name="company" placeholder="Company name"  />
	</div>
	<div class="form-group">
	<input class="form-control form-input required" type="text" name="address" placeholder="Company address" />
	</div>
	<div class="form-group">
	<input class="form-control form-input" type="text" name="website" placeholder="Company website" required />
	</div>
	<div class="form-group">
	<input class="form-control form-input required" type="text" name="phones" placeholder="Phone" required />
	</div>
	<div class="form-group">
	<input class="form-control form-input required" type="text" name="email" placeholder="Email" required />
	</div>
	<div class="form-group">
	<input class="form-control form-input required" type="text" name="admin" placeholder="Company's representative name" required />
	</div>
	<div class="form-group">
	<label for="company_logo">Company logo:</label>
	<input class="form-control form-input required" type="file" name="logo"  required />
	</div>
	<div class="form-group">
	<textarea class="form-control form-input property-message required" rows="4" name="description" placeholder="Description" required /></textarea>
	</div>
	<div class="form-group">
	<input class="form-control btn-primary send-services btns" type="button" value="Join" />
	</div>
	</div>
<div class="container-fluid search-board">
<div class="inner-search-board">
		<div class="container-fluid nav-container">
					<?php echo nav('../','images/pc-logo.png'); ?>

				</div>	
<p class="h2 page_title main-page-title float-left" style="width:100%; margin-top:170px;">Find Services</p>
<div class="container">
			<div class="input-group form-group">
			<select class="form-control select-service-type form-input" autocomplete="off">
			  <option value="">Search services</option>
			  <?php include "../includes/service_options.php"; ?>
			</select>
			<div class="input-group-prepend">
				<span class="input-group-text btn search-services">Search</span>
				</div>
			</div>
			<span class="btn btn-primary mc bold join-service">Join our service providers</span>
			</div>
</div>
</div>

<?php include "../includes/search_board.php"; ?>

<div class="container">

<!--<p class="h4 page-intro">If you are looking to acquire a new office space, commercial properties, a new home and other related 
properties. We have the reputation of 
providing efficient letting or renting services for property owners and tenants. We aim to meet our clients' need and build 
long-lasting relationships.</p>

 
 <p class="btns btn btn-primary get-property">Rent a property</p>
 <p class="btns btn btn-primary send-message-btn">Get in touch</p>-->
 	
 

<?php 
$related_sql=$dbc->prepare("SELECT * FROM services WHERE approved='1' LIMIT 20");
$related_sql->execute();
$related_result=$related_sql->get_result();
$related_rows=$related_result->num_rows;
?>

<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12 col-12 sub-head">
<p class="h2" style="text-align:center;"><strong>Verified & Reliable Service providers</strong></p>
</div>
<div class="collect-services row" style="width:100%;">
<?php
if($related_rows>0){
while($related_rows=$related_result->fetch_assoc()){
	$id=$related_rows['id'];	
	$company=$related_rows['company'];		
	$description=$related_rows['description'];	
	if(strlen($description)>70){
		$description=substr($description,0,70)."...";
	}
	$address=$related_rows['address'];	
	$phone=$related_rows['phone'];	
	$email=$related_rows['email'];	
	$service_type=$related_rows['service_type'];	
	$images=$related_rows['image_path'];
	if(empty($images)){
		$images="../images/pcommerce_back.png";
	}
?>
<div class="col-sm-6 col-md-4 col-lg-4 col-12 ">
			<div class="services-card">
			<div class=" row">
			<div class="services-wrap col-sm-12 col-12 col-md-12">
			<div class="services-avatar-wrap">
			<img src="../<?php echo $images; ?>" alt="<?php echo $company; ?>" />
			</div>
			<p><strong class="company-<?php echo $id; ?>"><?php echo $company; ?></strong></p>
			</div>
			<div class="services-desc  col-sm-12 col-12 col-md-12">
			</p><?php echo $description; ?></p>
			<p class="btns btn btn-primary send-message-btn service-message" id="<?php echo $id; ?>">Get in touch</p>
			</div>
		</div>
		</div>
		</div>
<?php
}
}

?>
</div>
</div>
</div>

<!--<div class="container-fluid">
<div class="col-sm-12 col-md-12 col-lg-12 col-12 mt-5 mb-5">
<p class="h2" style="text-align:center; margin-top:80px;"><strong>Services</p>
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
			<a href="../buying-or-selling/" class="link-arrow fa fa-arrow-right"></a>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6 service-box">
			<div>
			<p class="h3">Letting or Renting</p>
			<a href="" class="link-arrow fa fa-arrow-right"></a>
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
</div>-->
<?php
	$footer =footer("../");
	echo $footer; ?>
	</body>
	
<script src="../js/script.js"></script>			
				
</html>