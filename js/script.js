// FLICKR
 function postRequestFlickr(strURL) {
	var xmlHttp;    
	if (window.XMLHttpRequest) { 
		// Mozilla, Safari, ...        
		var xmlHttp = new XMLHttpRequest();
    } else if (window.ActiveXObject) { 
		// IE        
		var xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }//end if

    xmlHttp.open('POST', strURL, true);

    xmlHttp.setRequestHeader('Content-Type', 
         'application/x-www-form-urlencoded');

    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            updateViewMemberFlickrPage(xmlHttp.responseText);
        }
    }//end  xmlHttp.onreadystatechange

    xmlHttp.send(strURL);
}//end function postRequest

function updateViewMemberFlickrPage(str){	
	console.log('updateFlickrPage');	
	//alert("updateFlickrPage");	
	var r = Math.floor((Math.random()*10)+1);
	var c = 'red';
	if(r < 2) c = 'blue';
	else if(r < 4) c = 'yellow';
	else if(r < 6) c = 'green';
	else if(r < 8) c = 'pink';
    document.getElementById("view-flickr").innerHTML = "" + str + "";
}


// TWITTER
 function postRequestTwitter(strURL) {
	var xmlHttp;    
	if (window.XMLHttpRequest) { 
		// Mozilla, Safari, ...        
		var xmlHttp = new XMLHttpRequest();
    } else if (window.ActiveXObject) { 
		// IE        
		var xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }//end if

    xmlHttp.open('POST', strURL, true);

    xmlHttp.setRequestHeader('Content-Type', 
         'application/x-www-form-urlencoded');

    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            updateViewMemberTwitterPage(xmlHttp.responseText);
        }
    }//end  xmlHttp.onreadystatechange

    xmlHttp.send(strURL);
}//end function postRequest

function updateViewMemberTwitterPage(str){	
	console.log('updateTwitterPage');		
	var r = Math.floor((Math.random()*10)+1);
	var c = 'red';
	if(r < 2) c = 'blue';
	else if(r < 4) c = 'yellow';
	else if(r < 6) c = 'green';
	else if(r < 8) c = 'pink';
    document.getElementById("view-tweets").innerHTML = "" + str + "";
}



//BLOG
function postRequestBlog(strURL) {
	var xmlHttp;    
	if (window.XMLHttpRequest) { 
		// Mozilla, Safari, ...        
		var xmlHttp = new XMLHttpRequest();
    } else if (window.ActiveXObject) { 
		// IE        
		var xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }//end if

    xmlHttp.open('POST', strURL, true);

    xmlHttp.setRequestHeader('Content-Type', 
         'application/x-www-form-urlencoded');

    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4) {
            updateViewMemberBlogPage(xmlHttp.responseText);
        }
    }//end  xmlHttp.onreadystatechange

    xmlHttp.send(strURL);
}//end function postRequest

function updateViewMemberBlogPage(str){	
	console.log('updateBlogPage');		
	var r = Math.floor((Math.random()*10)+1);
	var c = 'red';
	if(r < 2) c = 'blue';
	else if(r < 4) c = 'yellow';
	else if(r < 6) c = 'green';
	else if(r < 8) c = 'pink';
    document.getElementById("view-blogs").innerHTML = "" + str + "";
}




function updateBlog(){
	var url = "view-member-blog.php?user_id="+user_id+"&howManyBlogs="+howManyBlogs;
	postRequestBlog(url);	
}
function updateTwitter(){
	var url = "view-member-twitter.php?user_id="+user_id+"&twitterID="+twitterID+"&howManyTweets="+howManyTweets;
	postRequestTwitter(url);	
}
function updateFlickr(){
	var url = "view-member-flickr.php?user_id="+user_id+"&flickrID="+flickrID+"&flickrImageSize="+flickImageSize;
	postRequestFlickr(url);	
}

var user_id;
var twitterID, flickrID;
var howManyBlogs, howManyTweets, flickImageSize;

function updateViewMemberBlog(uID, hmb){
	user_id = uID;
	howManyBlogs = hmb;
	setInterval(updateBlog, 1000);
}
function updateViewMemberTwitter(uID, tID, hmt){
	user_id = uID;
	twitterID = tID;
	howManyTweets = hmt;
	setInterval(updateTwitter, 10000);
}
function updateViewMemberFlickr(uID, fID, fis){
	user_id = uID;
	flickrID = fID
	flickImageSize = fis;
	setInterval(updateFlickr, 5000);
}
