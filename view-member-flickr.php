<?php
// $user_id = null; 
if(!empty($_GET['user_id'])) $user_id = $_GET['user_id'];
if(!empty($_GET['flickrID'])) $flickrID = $_GET['flickrID'];
if(!empty($_GET['flickrImageSize'])) $flickrImageSize = $_GET['flickrImageSize'];


/*
Photos URLs:
http://static.flickr.com/{server-id}/{id}_{secret}.jpg
http://static.flickr.com/{server-id}/{id}_{secret}_[m|s|t|b].jpg
http://static.flickr.com/{server-id}/{id}_{secret}_o.(jpg|gif|png)

s small square 75x75 
t thumbnail, 100 on longest side 
m small, 240 on longest side 
- medium, 500 on longest side 
b large, 1024 on longest side (only exists for very large original images) 
o original image, either a jpg, gif or png, depending on source format 
*/


if($flickrID != NULL){

$flickrURL = "<a href=\"view-member.php?user_id=$user_id&content=flickr\">Flickr</a>";
echo "<div id=\"view-flickr\"><h1>$flickrURL</h1>";




include_once ('config/flickr_config.php');
$api_key = "c9113930708ea0f0e42b9abc965751df";//--API_KEY--;

/*  Find user_id by username using flickr.people.findByUsername method  */
//$username = "willwong77";
$username = $flickrID;

$url ="http://flickr.com/services/rest/?method=flickr.people.findByUsername"."&username=".$username."&api_key=".$api_key;
$xml = simplexml_load_file($url) or die("Unable to contact Flickr");
//echo "<h1>$url</h1>";
$flickr_user_id = $xml->user['nsid'];//--NSID--;
/*  end Find flickr_user_id by username using flickr.people.findByUsername method  */


$perpage = $xml->photos['perpage'];//--PER PAGE--;
$total   = $xml->photos['total'];//--TOTAL--;
$pages   = $xml->photos['pages'];//--PAGES--;
$page    = $xml->photos['page'];//--PAGE--;


$link_option = 2; 	//link to the original pic
					//line_option = 2 -> link to the flickr page


function photo_url($p, $size='t', $ext='jpg'){  
  // return "http://static.flickr.com/{--SERVER--}/{--ID--}_{--SECRET--}_$size.{$ext}";
  return "http://static.flickr.com/".$p['server']."/".$p['id']."_".$p['secret']."_$size.{$ext}";
}
function flickr_page_url($p, $uid){
/*
	$flickr_user_id = $p['owner'];
	return "http://www.flickr.com/photos/".$uid."/".$flickr_user_id."/";	
*/
	$size='b'; $ext='jpg';
	return "http://static.flickr.com/".$p['server']."/".$p['id']."_".$p['secret']."_$size.{$ext}";
}

$url ="http://flickr.com/services/rest/?method=flickr.people.getPublicPhotos"."&user_id=".$flickr_user_id."&api_key=".$api_key;
$xml = simplexml_load_file($url) or die("Unable to contact Flickr");


$perpage = $xml->photos['perpage'];//--PER PAGE--;
$total   = $xml->photos['total'];//--TOTAL--;
$pages   = $xml->photos['pages'];//--PAGES--;
$page    = $xml->photos['page'];//--PAGE--;

// echo 'Number of pages: 	' . $pages;
// echo '<br/>';
// echo 'Total photos: 	' . $total;
// echo '<br/>';

$title = "title";
// foreach(--PHOTOS-- as $photo){	
foreach($xml->photos->photo as $photo){	 
	if($link_option == 1){
		print "\n".	'<a href="'.photo_url($photo,'s').'" target="_blank">'."\n";
	}
	else{
		print "\n".	'<a href="'.flickr_page_url($photo, $flickr_user_id).'" target="_blank">'."\n";
	}
	// print '<img src="'.photo_url($photo,'s'). '"'.' alt="'.--TITLE--.'"/>'."</a>"."\n";
	//print '<img src="'.photo_url($photo,'s'). '"'.' alt="'.$title.'"/>'."</a>"."\n";
	print '<img src="'.photo_url($photo,$flickrImageSize). '"'.' alt="'.$title.'"/>'."</a>"."\n";

	//print "</div>"."\n";
}


if($pages>=2){
	for($i=2; $i<=$pages; $i++){
		$url ="http://flickr.com/services/rest/?method=flickr.people.getPublicPhotos"."&user_id=".$flickr_user_id."&api_key=".$api_key."&page=".$i;
		$xml = @simplexml_load_file($url) or die("Unable to contact Flickr");
		
		// iterate through photos
		foreach($xml->photos->photo as $photo){
		//foreach(--PHOTOS-- as $photo){	
			print "\n"."<div class=image>";
			if($link_option == 1){
				print "\n".	'<a href="'.photo_url($photo,'o').'" target="_blank">'."\n";
			}
			else{
				print "\n".	'<a href="'.flickr_page_url($photo, $user_id).'" target="_blank">'."\n";
			}
			//print '<img src="'.photo_url($photo,'s'). '"'.' alt="'.--TITLE--.'"/>'."</a>"."\n";
			//print '<img src="'.photo_url($photo,'s'). '"'.' alt="'.$title.'"/>'."</a>"."\n";
			print '<img src="'.photo_url($photo,$flickrImageSize). '"'.' alt="'.$title.'"/>'."</a>"."\n";
					
			print "</div>"."\n";
		}
	}
}
}//end if flickrID != null

?>

<div class="spacer"></div>
</div>