<!DOCTYPE html>
<html lang="en">
	<head>
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
$word="[dll] loJ baddo cinema AJ";
function strip_clean($string){
$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\.-]/', '', $string); // Removes special chars.
   $string = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one

   return str_replace("-"," ",$string);	
}
function rename_type($word){
		$found=false;
		$new_type="";;
	   $type_array=[
       ['hiphop','r&b','instrumentalist','rapper','musicals','dj','lyrics','songs','song','music','album','new single','playlist','tracklist','mixtape','ft.','jingles'],
       ['movie','movies','cinema','sci-fi','album','film', 'blockbuster','blue screen'],
       ['actor','actress','cinematographer','singer','song-writer','artist'],
       ['admission','semester','schorlaship','university','school','tertiary']
       ]; 
  
     $types=['music','movies','entertainment','education'];
	 
	$word=strip_clean($word);
	$word_array=explode(" ",$word);
	$count_words=count($word_array);
	$j=0;
	while($j<$count_words){
		$type=strtolower($word_array[$j]);
		
	$i=0;
	 $count=count($type_array);
	 while($i<$count){
		 if(in_array($type,$type_array[$i])){
		 $new_type = $types[$i];
		 $found=true;
		 break;
	 }
		 $i++;
	 }
	if($found==true){ break;}	
		$j++;
	}
return $new_type;
}

echo rename_type($word);
?>
	</body>				
</html>