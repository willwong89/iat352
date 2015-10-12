<?php
//$user_id = NULL; 
if(!empty($_GET['user_id'])) $user_id = $_GET['user_id'];
if(!empty($_GET['twitterID'])) $twitterID = $_GET['twitterID'];
if(!empty($_GET['howManyTweets'])) $howManyTweets = $_GET['howManyTweets'];
//if(!empty($_GET['howManyTweets'])) $howManyTweets = $_GET['howManyTweets'];

$imageSize = 100;
if($howManyTweets > 10) $imageSize = 450;
$twitterURL = "<a href=\"view-member.php?user_id=$user_id&content=twitter\">Tweets</a>";
echo "<div id=\"view-tweets\" ><h1>$twitterURL</h1>";





if($twitterID != NULL){
	$screen_name = $twitterID; //parse the social media ID into the twitter page.
	
	// Require codebird
	require_once('includes/codebird-php-master/src/codebird.php');
	// Require authentication parameters
	require_once('config/twitter_config.php');
	
	// Set connection parameters and instantiate Codebird	
	\Codebird\Codebird::setConsumerKey($consumer_key, $consumer_secret);
	$cb = \Codebird\Codebird::getInstance();
	$cb->setToken($access_token, $access_token_secret);
	
	$reply = $cb->oauth2_token();
	$bearer_token = $reply->access_token;
	
	// App authentication
	\Codebird\Codebird::setBearerToken($bearer_token);
		
	// Create query
	$params = array(
		'screen_name' => $screen_name,	
		'count' => $howManyTweets
	);	
		
	// Make the REST call
	$res = (array) $cb->statuses_userTimeline($params);
	// Convert results to an associative array
	$data = json_decode(json_encode($res), true);
	
	
	
	
	// Optionally, store results in a file
	file_put_contents("twitter_req.json", json_encode($res));
	/*
	echo "<h1>User</h1>";
	echo "<img src=\"".$data['0']['user']['profile_image_url']."\"/>"; //getting the profile image
	echo "Name: ".$data['0']['user']['name']."<br/>"; //getting the username
	echo "Web: ".$data['0']['user']['url']."<br/>"; //getting the web site address
	echo "Location: ".$data['0']['user']['location']."<br/>"; //user location
	echo "Updates: ".$data['0']['user']['statuses_count']."<br/>"; //number of updates
	echo "Follower: ".$data['0']['user']['followers_count']."<br/>"; //number of followers
	echo "Following: ".$data['0']['user']['friends_count']."<br/>"; // following
	echo "Description: ".$data['0']['user']['description']."<br/>"; //user description
	echo '<br/>';
	echo '<br/>';
	echo "<h1>Tweets</h1>";
	*/

	
		
	/* begin converting JSON to XML */
	$xml = new DOMDocument('1.0', 'utf-8');
	$tweets = $xml->createElement("tweets");
	foreach ($data as $item){
		if($item["text"]!=""){
		$tweet = $xml->createElement("tweet");
		$tweet->appendChild($xml->createElement("text", $item['text']));
		$tweet->appendChild($xml->createElement("created_at", substr($item['created_at'], 0, 16)));
		if(!empty($item['entities']['media']['0']['media_url'])){
			$tweet->appendChild($xml->createElement("media_url", $item['entities']['media']['0']['media_url']));
		}
		$tweets->appendChild($tweet);
		}
	}//end foreach
	$xml->appendChild($tweets);	
	
	// print ($xml->saveHTML());
	$xml->save('twitter.xml');
	/* end converting JSON to XML */

	/* begin reading XML and printing html */
	$tweets = $xml->getElementsByTagName( "tweet" );
	foreach($tweets as $tweet){
	echo"<div class=\"tweet\">";
		echo  '<div class="date">';
		echo $tweet->getElementsByTagName( "created_at" )->item(0)->nodeValue."</div>";

		echo  '<div class="text">';
		echo $tweet->getElementsByTagName( "text" )->item(0)->nodeValue."</div>";
		
		if($tweet->getElementsByTagName( "media_url" )->item(0)){
			echo "<br />";
			echo "<img src=\"". $tweet->getElementsByTagName( "media_url" )->item(0)->nodeValue ."\" width=\"$imageSize\"/>";
			//echo $tweet->getElementsByTagName( "media_url" )->item(0)->nodeValue."<br />";
		}
		
		echo"</div>";
	}
	/* end reading XML and printing html */
	
	/* begin reading json and printing html */
	/*
	foreach ($data as $item){
		echo '<div class="tweet">';
			echo '<div class="date">'.substr($item['created_at'], 0, 16).'</div>';
			echo '<div class="text">'.$item['text'].'</div>';
			echo '<br/>';
			if(!empty($item['entities']['media']['0']['media_url'])){
				echo "<img src=\"".$item['entities']['media']['0']['media_url']."\" width=\"200\" height=\"200\"/>"; //getting the profile image
			}
		echo '</div>';
	}	
	*/
	/* end reading json and printing html */
	
}//end if $twitterID != null
?>
 <div class="spacer"></div>
 </div>