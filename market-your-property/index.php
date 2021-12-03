<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Property - Sell, Buy, Rent, Market Your Properties</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Sell or Buy Properties in Lagos, Buy or Sell Land, House, Filling Station, Farm
  Hotel, Office Space, Estates in Nigeria">
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
	<?php echo nav('../','images/pc-logo-transparent.png'); ?>

				</div>	
<p class="h2 page_title main-page-title float-left" style="width:100%; margin-top:170px;">Market your property</p>

</div>
</div>

<?php include "../includes/search_board.php"; ?>

<div class="container">

<p class="h4 page-intro">If you are planning to sell or let your property. We provide exceptional and effective 
marketing strategy to help you put your property in front of buyers or people looking to rent a property.
Whether residential, rural and commercial sectors.</p>
<p class="mt-5">Now is the appropriate time to reasses your property needs and make that move you’ve been thinking about for a while.</p>
<p>Tell us your property needs and let us work to make it happen. We will consider all your needs and give you a really clear
and best support to make sure we meet your needs.</p>
<p>Our platform makes interested buyers to easily find your properties with just few clicks. We make all transaction open and clear to both parties, so you have
 all the information you need to make the best decision.</p>
 
 <p class="h4 mt-5 headings">Tell Us about your property</p>
 <p style="text-align:center;">Complete the form below, we will get in touch to discuss more.</p>
 
 	<div class="row">
 	<div class="board properties-board guest-properties-board">
	<div class="market-property-board">
	<p class="fa fa-spinner fa-spin spin-property-add spin"></p>
	
	<form class="property-form" method="post" action="">
	<div class="new-property-form">
			<div class="col-md-4 col-12 float-left">
			<div class="input-group form-group">
			 <div class="input-group-prepend">
			<span class="input-group-text"><i class="fa fa-bank" aria-hidden="true"></i></span>
		  </div>	
				<select class="form-control form-input required" autocomplete="off" name="property_type">
					<option value="">--Select property type--</option>
					<option value="Residential">Residential</option>
					<option value="New Build">New Build</option>
					<option value="Waterfront">Waterfront</option>
					<option value="Educational">Educational</option>
					<option value="Hotels">Hotel</option>
					<option value="Filling Station">Filling Station</option>
					<option value="Farm">Farm</option>
					<option value="Healthcare">Healthcare</option>
					<option value="Forest">Forest/Woodland</option>
					<option value="Office">Office & Business Space</option>
					<option value="Estate">Estate</option>
					<option value="Student Accomodation">Student Accomodation</option>
					<option value="Leisure">Leisure or Trade</option>
					<option value="Marine">Marine</option>
					<option value="Marine">Marine</option>
					<option value="Bars and Restuarants">Bars and Restuarants</option>
					<option value="Shopping Centres">Shopping Centres</option>
					<option value="Sport Venues">Sport Venues</option>
					<option value="Tourist Attractions">Tourist Attractions</option>
					<option value="Energy">Energy</option>
				</select>
			</div>
			</div>
			
			<div class="col-md-4 col-12 float-left">
			<div class="input-group form-group">
			 <div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-handshake" aria-hidden="true"></i></span>
				</div>
				<select class="form-control form-input required" autocomplete="off" name="property_status">
					<option value="">--Select transaction type--</option>
					<option value="Rent">Rent</option>
					<option value="Buy">For Sale</option>
				</select>
			</div>
			</div>
			
			<!---<div class="col-md-4 col-12 float-left">
			<div class="input-group form-group">
			 <div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-bank" aria-hidden="true"></i></span>
				</div>
				<select class="form-control" autocomplete="off" name="property_condtion[]">
					<option value="--Status--">--Condition--</option>
					<option value="New">New</option>
					<option value="Old">Old</option>
					<option value="Delapidated">Delapidated</option>
				</select>
			</div>
			</div>--->
			<div class="col-md-4 col-12 float-left">
			<div class="input-group form-group">
			 <div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
				</div>
				<select class="form-control required select-state form-input" data-value="1" type="text" autocomplete="off" name="property_state">
			  <option value="">--Select State--</option>
			  <option value="Abuja">Abuja</option>
			  <option value="Abia">Abia</option>
			  <option value="Adamawa">Adamawa</option>
			  <option value="Akwa Ibom">Akwa Ibom</option>
			  <option value="Anambra">Anambra</option>
			  <option value="Bauchi">Bauchi</option>
			  <option value="Bayelsa">Bayelsa</option>
			  <option value="Benue">Benue</option>
			  <option value="Borno">Borno</option>
			  <option value="Cross River">Cross River</option>
			  <option value="Delta">Delta</option>
			  <option value="Ebonyi">Ebonyi</option>
			  <option value="Edo">Edo</option>
			  <option value="Ekiti">Ekiti</option>
			  <option value="Enugu">Enugu</option>
			  <option value="Gombe">Gombe</option>
			  <option value="Imo">Imo</option>
			  <option value="Jigawa">Jigawa</option>
			  <option value="Kaduna">Kaduna</option>
			  <option value="Kano">Kano</option>
			  <option value="Katsina">Katsina</option>
			  <option value="Kebbi">Kebbi</option>
			  <option value="Kogi">Kogi</option>
			  <option value="Kwara">Kwara</option>
			  <option value="Lagos">Lagos</option>
			  <option value="Nassarawa">Nassarawa</option>
			  <option value="Niger">Niger</option>
			  <option value="Ogun">Ogun</option>
			  <option value="Ondo">Ondo</option>
			  <option value="Osun">Osun</option>
			  <option value="Oyo">Oyo</option>
			  <option value="Plateau">Plateau</option>
			  <option value="Rivers">Rivers</option>
			  <option value="Sokoto">Sokoto</option>
			  <option value="Taraba">Taraba</option>
			  <option value="Yobe">Yobe</option>
			  <option value="Zamfara">Zamfara</option>
			</select>
				<!--<input class="form-control required" type="text" autocomplete="off" name="property_state[]" placeholder="Property State" />-->
			</div>
			</div>
			<div class="col-md-4 col-12 float-left">
			<div class="input-group form-group">
			 <div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
				</div>
				<select class="form-control required get-lga address-lga-1 form-input" type="text" autocomplete="off" name="property_lga">
			  <option value="">--Select LGA--</option>
			  
			</select>
				<!--<input class="form-control required" type="text" autocomplete="off" name="property_state[]" placeholder="Property State" />-->
			</div>
			</div>
			<div class="col-md-4 col-12 float-left">
			<div class="input-group form-group">
			 <div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-home" aria-hidden="true"></i></span>
				</div>
				<select class="form-control house-type form-input" type="text" autocomplete="off" name="house_type">
			  <option value="">--Select House type--</option>
			  <option value="Bungalow" >Bungalow</option>
				<option value="Duplex">Duplex</option>
				<option value="Flats">Flats</option>
				<option value="Penthouse">Penthouse</option>
				<option value="Detached">Detached</option>
				<option value="Semi-Detached">Semi-Detached</option>
				<option value="Terraced">Terraced</option>
				<option value="Mansion">Mansion</option>
			</select>
				<!--<input class="form-control required" type="text" autocomplete="off" name="property_state[]" placeholder="Property State" />-->
			</div>
			</div>
			
			
			<div class="col-md-4 col-12 float-left">
			<div class="input-group form-group">
			 <div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-ruler-combined"></i></span>
				</div>
				<input class="form-control required form-input" type="text" autocomplete="off" name="land_size" min='1' placeholder="Land size (ex: 345,72 sq m)" />
			</div>
			</div>
			
			<div class="col-md-4 col-12 float-left">
			<div class="input-group form-group">
			 <div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-bed" aria-hidden="true"></i></span>
				</div>
				<input class="form-control form-input" type="number" autocomplete="off" name="rooms" min='1' placeholder="No of Rooms" />
			</div>
			</div>
			
			<div class="col-md-4 col-12 float-left">
			<div class="input-group form-group">
			 <div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-couch" aria-hidden="true"></i></span>
				</div>
				<input class="form-control form-input" type="number" autocomplete="off" name="parlours" min='1' placeholder="No of Lounge/Parlour" />
			</div>
			</div>
			
			<div class="col-md-4 col-12 float-left">
			<div class="input-group form-group">
			 <div class="input-group-prepend">
				<span class="input-group-text"><i class="fas fa-bath" aria-hidden="true"></i></span>
				</div>
				<input class="form-control form-input" type="number" autocomplete="off" name="bath" min='1' placeholder="No of Bath/Toilets" />
			</div>
			</div>
			
			<div class="col-md-6 col-12 float-left">
			<div class="input-group form-group">
			 <div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-car" aria-hidden="true"></i></span>
				</div>
				<input class="form-control form-input" type="number" autocomplete="off" name="parking" min='1' placeholder="Parking Space" />
			</div>
			</div>
			
			<div class="col-md-6 col-12 float-left">
			<div class="input-group form-group">
			 <div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-money" aria-hidden="true"></i></span>
				</div>
				<input class="form-control required form-input" type="text" autocomplete="off" name="price" placeholder="Price" />
			</div>
			</div>
			<div class="col-md-6 col-12 float-left">
			<div class="input-group form-group">
			 <div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-at" aria-hidden="true"></i></span>
				</div>
				<input class="form-control required form-input" type="text" autocomplete="off" name="email"  placeholder="Email" />
			</div>
			</div>
			
			<div class="col-md-6 col-12 float-left">
			<div class="input-group form-group">
			 <div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span>
				</div>
				<input class="form-control required form-input" type="text" autocomplete="off" name="phone" placeholder="Phone number" />
			</div>
			</div>
			
			<div class="col-md-12 col-12 float-left">
			<div class="input-group form-group">
			 <div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
				</div>
				<input class="form-control required form-input" type="text" autocomplete="off" name="property_address"  placeholder="Property Street Address" />
			</div>
			</div>
			
			<div class="col-md-12 col-12 float-left">
			<div class="input-group form-group">
			 <div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-pencil" aria-hidden="true"></i></span>
			</div>
				<textarea class="form-control form-input required" rows="3" autocomplete="off" name="property_description" placeholder="Property Description"></textarea>
			</div>
			</div>
			<div class="col-md-12 col-xs-12 preview-wrap  float-left">
			</div>
			<div class="col-md-12 col-xs-12 collect-images-1  float-left">
			<div class="image-div-1">
			<div class="image-click file-input" target="1" id="1">
			<i class="fa fa-camera"></i><p style="font-size:10px;">+ Add Photos</p>
			<p class="image-caption-wrap image-1"></p>
			</div>
		<p class="image-caption-wrap image-1 mb-0" style="font-size:11px;">You can add up to 9 photos</p>
		<span class="image-caption-wrap image-1" style="font-size:11px;">Click or Tap the photo icon to add your photos one after the other</span>
				<input class="image-usables image_id form-input" target="1" type="text" autocomplete="off" name="image_id" value="<?php echo rand(time(),4); ?>" />
			</div>
			</div>
			
		</div>
		
		
		<div class="col-md-12 col-12 float-left">
		<input type="button" class="btn btn-success btns non-execute float-right" target="property" value="Disabled" />
		<input type="submit" class="btn btn-success btns execute" style="display:none;" target="property" value="Save" />
		</div>
		</form>
		</div>
		
	</div>
	</div>
 
 
<?php 
$related_sql=$dbc->prepare("SELECT * FROM properties WHERE treated='1' LIMIT 8");
$related_sql->execute();
$related_result=$related_sql->get_result();
$related_rows=$related_result->num_rows;
?>

<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12 col-12 sub-head">
<p class="h2" style="text-align:center;"><strong>Properties For Sale/Rent</strong></p>
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
$house_type=$house_type=="none" ? $type : $house_type;	
	
	$landSize=$related_rows['land_size'];
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

?>
</div>
</div>

<?php
include "../includes/services.php";

	$footer =footer("../");
	echo $footer; ?>
	<form action="" method="post" class="file-form hidden">
		<input type="file" name="property_image" class="current-file-input" id="letter">
		<input type="text" name="image_id" class="current-file-id" />
	</form>
	</body>
	
<script src="../js/script.js"></script>			
<script>
$(document).ready(function(){
$(document).on('click','.file-input',function(){
				const fileId=document.querySelector(".image_id").value;
				document.querySelector(".current-file-input").click();
				// $(".current-file").val(file);
				document.querySelector(".current-file-id").value=fileId; 
			});
	const imageSelection = document.querySelector(".current-file-input");
	const submitImage = document.querySelector(".file-form");
			/* imageSelection.addEventListener("change",function(e){
				document.querySelector(".file-form").submit();
			}); */
			 $(document).on('change','.current-file-input',function(){
						$('.file-form').unbind('submit');
						$('.file-form').submit();
				 }); 				 
$(document).on('submit','.file-form',function(event){
	event.preventDefault();
				   const url="http://localhost/lamonde/upload_files.php";
				  $.ajax({
					 url:url,
					 method:"POST",
					 data:new FormData(this),
					 contentType:false,
					 processData:false,
					 beforeSend:function(){
						alertMessage.innerHTML='Uploading photo...';
						alertMessageWrap.classList.remove('alert-warning'); 
						alertMessageWrap.classList.add('alert-success'); 
					 },
					 success:function(data)
					 { 
						 data=$.trim(data).split("|");
						 let message,img='';
						  message = data[0];
							if(data.length>1){
							 img = data[1];
							}
						 if(message=="uploaded"){
							 document.querySelector(".non-execute")!=null ? document.querySelector(".non-execute").style="display:none;" : null;
							 document.querySelector(".execute")!=null ?  document.querySelector(".execute").style="display:block;" : null;
						 img="http://localhost/lamonde/"+img;
							const newImage = '<div class="preview-image col-sm-4 col-md-4 col-6 col-lg-3 float-left"><div class="preview" style="background-image:url('+img+')"></div></div>';
							$(".preview-wrap").append(newImage);
						 }
					 }
					});
				 });
				 });
</script>				
</html>