<?php
function validate_numbers($value){
	$re = '/^[0-9]+$/i';
	return preg_match($re,$value);
}

function validate_letters_only($value){
	$re = '/^[a-zA-Z\- ]+$/i';
return preg_match($re,$value);
}

function validate_numbers_alpha($value){
	$re = '/^[0-9a-zA-Z\/.$@_]+$/i';
return preg_match($re,$value);
}
function validate_dates($value){
	$re = '/^[0-9\/ ]+$/i';
return preg_match($re,$value);
} 


function validate_textfield($value){
	$re = '/^[0-9a-zA-Z\-.+,_ ]+$/i';
return preg_match($re,$value);
}

function get_timeago ($ptime)
{
	$estimate_time = time() - $ptime;
	if($estimate_time <1)
	{
		return '< 1 sec';
	}
	$condition = array(
					12 * 30 * 24 *60 *60 => 'year',
					30 * 24 *60 *60      => 'month',
					24 *60 *60           => 'day',
					60 *60               => 'hour',
					60                   => 'min',
					1                  	 => 'sec',
					
					);
	foreach ($condition as $secs => $str)
	{
		$d = $estimate_time / $secs;
		
		if($d >=1){
		$r =round( $d );
		return $r. ' '. $str . ($r > 1 ? 's' : '');
		}
	}
}

function secure_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = str_replace('@','(at)',$data);
  $data = str_replace('?','(<question mark>)',$data);
  $data = str_replace('*','(star)',$data);
  $data = str_replace('%','(percentage)',$data);
  $data = str_replace('#','(hashtag)',$data);
  $data = str_replace('^','(angle)',$data);
  $data = str_replace('=','(equals)',$data);
  $data = str_replace('<','(less than)',$data);
  $data = str_replace('>','(greater than)',$data);
  $data = str_replace('{','({)',$data);
  $data = str_replace('}','(})',$data);
  $data = str_replace('~','(tilde)',$data);
  $data = str_replace(':','(:)',$data);
  $data = str_replace(';','(;)',$data);
  $data = str_replace('|','(|)',$data);
  $data = str_replace('_','(underscore)',$data);
  $data = str_replace("'","\'",$data);
  $data = str_replace('"','(")',$data);
  return $data;
  }
 function reverse_secure_input($data) {
	$data = str_replace('(at)','@',$data);
  $data = str_replace('<question mark>','(?)',$data);
  $data = str_replace('(star)','*',$data);
  $data = str_replace('(percentage)','%',$data);
  $data = str_replace('(hashtag)','#',$data);
  $data = str_replace('(angle)','^',$data);
  $data = str_replace('(equals)','=',$data);
  $data = str_replace('(less than)','<',$data);
  $data = str_replace('(greater than)','>',$data);
  $data = str_replace('({)','{',$data);
  $data = str_replace('(})','}',$data);
  $data = str_replace('(tilde)','~',$data);
  $data = str_replace('(:)',':',$data);
  $data = str_replace('(;)',';',$data);
  $data = str_replace('(|)','|',$data);
  $data = str_replace('(underscore)','_',$data);
  $data = str_replace("\'","'",$data);
  $data = str_replace('(")','"',$data);
  return $data;	 
 }
  function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}	
function get_user_info($user_id,$value,$table,$dbc){
	$user_sql="SELECT * FROM ".$table." WHERE user_id='$user_id'";
	$result=mysqli_query($dbc,$user_sql);
	$fetched_rows=mysqli_num_rows($result);
	if($fetched_rows==1){
	$row=mysqli_fetch_assoc($result);
	$firstname=$row['firstname'];
	$lastname=$row['lastname'];
	$passport=$row['passport'];
	$phone=$row['phone'];
	if($value=="name"){
	return ucfirst($firstname)." ".ucfirst($lastname);
	}else if($value=="image"){
	return $passport;
	}else if($value=="phone"){
	return $phone;
	}
	}
}
function get_property_info($property_id,$value){
	include "database/connect.php";
	$user_sql="SELECT * FROM properties WHERE property_id='$property_id'";
	$result=mysqli_query($dbc,$user_sql);
	$fetched_rows=mysqli_num_rows($result);
	if($fetched_rows==1){
	$row=mysqli_fetch_assoc($result);
	$address=$row['address'];
	$description=$row['description'];
	$region=$row['region'];
	$lga=$row['lga'];

	if($value=="address"){
	return $address.",".$lga.", ".$region;
	}else if($value=="description"){
	return $description;
	}
	}
}
function get_spaces_number($dbc,$property_id,$type){
	$number=0;
	$user_sql="SELECT * FROM house WHERE property_id=$property_id";
	$result=mysqli_query($dbc,$user_sql);
	$fetched_rows=mysqli_num_rows($result);
	if($fetched_rows>0){
	$row=mysqli_fetch_assoc($result);
	if($type=="bath"){
	$number=$row['bath'];	
	}else if($type=="parlour"){
		$number=$row['parlour'];
	}else if($type=="room"){
	$number=$row['rooms'];
	}
	return $number;
	}
}
function get_property_image($dbc,$property_id){
	$user_sql="SELECT * FROM property_images WHERE property_id=$property_id";
	$result=mysqli_query($dbc,$user_sql);
	$fetched_rows=mysqli_num_rows($result);
	if($fetched_rows>0){
	$row=mysqli_fetch_assoc($result);
	$image=$row['image_link'];
	return $image;
	}
}

function get_securities($value){
	include "database/connect.php";
	$user_sql="SELECT * FROM securities WHERE property_id='$value'";
	$result=mysqli_query($dbc,$user_sql);
	$fetched_rows=mysqli_num_rows($result);
	return $fetched_rows;
}

function get_rows($dbc,$table,$key,$value){
	$user_sql="SELECT * FROM ".$table." WHERE ".$key."='$value'";
	$result=mysqli_query($dbc,$user_sql);
	$fetched_rows=mysqli_num_rows($result);
	return $fetched_rows;
}

			function current_time ($current_time){
			$time=explode(" ",$current_time);
			$date=$time[0];
			$time=$time[1];
			$time_posted=explode(':',$time);
			$month_posted=explode('-',$date);
			$sent_date=strtotime($date);
			$now=strtotime(date('Y-m-d'));
			$current_month=explode("-",date('Y-m-d'));
			$datediff =$now-$sent_date;
			$test=floor($datediff /(60*60*24));
			if($month_posted[1]=='1'){$month='January';}
			else if($month_posted[1]=='2'){$month='Feb';}
			else if($month_posted[1]=='3'){$month='Mar';}
			else if($month_posted[1]=='4'){$month='Apr';}
			else if($month_posted[1]=='5'){$month='May';}
			else if($month_posted[1]=='6'){$month='Jun';}
			else if($month_posted[1]=='7'){$month='Jul';}
			else if($month_posted[1]=='8'){$month='Aug';}
			else if($month_posted[1]=='9'){$month='Sep';}
			else if($month_posted[1]=='10'){$month='Oct';}
			else if($month_posted[1]=='11'){$month='Nov';}
			else if($month_posted[1]=='12'){$month='Dec';}
			
			if($time_posted[0]=='13'){$hr='1:'.$time_posted[0].'PM';}else if($time_posted[0]=='01'){$hr='1:'.$time_posted[0].'AM';}
			else if($time_posted[0]=='14'){$hr='2:'.$time_posted[1].'PM';}else if($time_posted[0]=='02'){$hr='2:'.$time_posted[1].' AM';}
			else if($time_posted[0]=='15'){$hr='3:'.$time_posted[1].'PM';}else if($time_posted[0]=='03'){$hr='3:'.$time_posted[1].' AM';}
			else if($time_posted[0]=='16'){$hr='4:'.$time_posted[1].'PM';}else if($time_posted[0]=='04'){$hr='4:'.$time_posted[1].' AM';}
			else if($time_posted[0]=='17'){$hr='5:'.$time_posted[1].'PM';}else if($time_posted[0]=='05'){$hr='5:'.$time_posted[1].' AM';}
			else if($time_posted[0]=='18'){$hr='6:'.$time_posted[1].'PM';}else if($time_posted[0]=='06'){$hr='6:'.$time_posted[1].' AM';}
			else if($time_posted[0]=='19'){$hr='7:'.$time_posted[1].'PM';}else if($time_posted[0]=='07'){$hr='7:'.$time_posted[1].' AM';}
			else if($time_posted[0]=='20'){$hr='8:'.$time_posted[1].'PM';}else if($time_posted[0]=='08'){$hr='8:'.$time_posted[1].' AM';}
			else if($time_posted[0]=='21'){$hr='9:'.$time_posted[1].'PM';}else if($time_posted[0]=='09'){$hr='9:'.$time_posted[1].' AM';}
			else if($time_posted[0]=='22'){$hr='10:'.$time_posted[1].'PM';}else if($time_posted[0]=='10'){$hr='10:'.$time_posted[1].' AM';}
			else if($time_posted[0]=='23'){$hr='11:'.$time_posted[1].'PM';}else if($time_posted[0]=='11'){$hr='11:'.$time_posted[1].' AM';}
			else if($time_posted[0]=='00'){$hr='12:'.$time_posted[1].'AM';}else if($time_posted[0]=='12'){$hr='1:'.$time_posted[1].' PM';}

			return $hr;
			
			}
			
			function date_posted ($current_time){
			$time=explode(" ",$current_time);
			$date=$time[0];
			$time=$time[1];
			$month_posted=explode('-',$date);
			$day=$month_posted[2];
			$year=$month_posted[0];
			if($month_posted[1]=='1'){$month='January';}
			else if($month_posted[1]=='2'){$month='Feb';}
			else if($month_posted[1]=='3'){$month='Mar';}
			else if($month_posted[1]=='4'){$month='Apr';}
			else if($month_posted[1]=='5'){$month='May';}
			else if($month_posted[1]=='6'){$month='Jun';}
			else if($month_posted[1]=='7'){$month='Jul';}
			else if($month_posted[1]=='8'){$month='Aug';}
			else if($month_posted[1]=='9'){$month='Sep';}
			else if($month_posted[1]=='10'){$month='Oct';}
			else if($month_posted[1]=='11'){$month='Nov';}
			else if($month_posted[1]=='12'){$month='Dec';}
			return $day." ".$month." ".$year;
			}
function nav($link){
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/"><img src="<?php echo $link; ?>images/pc-logo-transparent.png" alt="Property" /></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item active">
	  <a class="btn btn-primary refine-search btns get-property filters-up" >Find a property</a>
      </li>
	  
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $link; ?>services/">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $link; ?>contact-us/">Contact Us</a>
      </li>
    </ul>
  </div>
</nav>
<?php
}

function footer($link){
?>
<div class="page-footer container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-6 col-lg-4">
		<img src="<?php echo $link; ?>images/pc-logo.png" alt="Property Commerce" />
		</div>
		<div class="col-sm-6 col-md-6 col-lg-4">
		<ul class="list-group">
		<li class="list-group-item"><a href="<?php echo $link; ?>market-your-property/">MARKET YOUR PROPERTY</a></li>
		<li class="list-group-item"><a href="<?php echo $link; ?>buying-or-selling/">BUYING OR SELLING</a></li>
		<li class="list-group-item"><a href="<?php echo $link; ?>renting-or-letting/">RENTING OR LETTING</a></li>
		<li class="list-group-item"><a href="<?php echo $link; ?>services/">HOME & OFFICE SERVICES</a></li>
		<li class="list-group-item"><a href="<?php echo $link; ?>property-management/">PROPERTY MANAGEMENT</a></li>
		<li class="list-group-item" ><a href="<?php echo $link; ?>internet-infrastructure/">INTERNET INFRASTRUCTURE</a></li>
		</ul>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-4 right-footer">
		<ul class="footer-list">
		<li class="list-group-item"><a href="<?php echo $link; ?>services/">SERVICES</a></li>
		<li class="list-group-item"><a href="<?php echo $link; ?>contact-us/">CONTACT US</a></li>
		<li class="list-group-item">Phone: <a href="tel:+2348067920578">+2348067111111</a></li>
		<li class="list-group-item">Email : hello@property.test</li>
		<li class="list-group-item"><a href="<?php echo $link; ?>/privacy-policy/">PRIVACY POLICY</a></li>
		</ul>
		<ul class="social-list">
<li><a href="https://www.twitter.com/propcommerce"><i class="fab fa-twitter"></i> Twitter</a></li>
<li><a href=""><i class="fab fa-instagram"></i> Instagram</a></li>
<li><a href="https://www.youtube.com/UC477P5Nrt4DOaTQxNzsZOCg"><i class="fab fa-youtube"></i> Youtube</a> </li>
<li><a href="https://www.facebook.com/propertycommerceng"><i class="fab fa-facebook"></i> Facebook</a></li>
</ul>
		</div>
		<div class="col-sm-12 col-md-12 col-lg-12 copy-right">
		<p>Property Commerce &copy; <?php echo date('Y'); ?></p>
		</div>
	</div>
	</div>
<?php
}
?>