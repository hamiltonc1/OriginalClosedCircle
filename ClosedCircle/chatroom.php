<?php
	require "header.php";  
?>

<script>
	
function getText() {
		
	var $a = document.getElementById('text').value;
	
	xhr = new XMLHttpRequest();
	xhr.open('POST' , 'chatdb.php',true);
	xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xhr.send('chat='+$a);
	xhr.onreadystatechange=function(){
		if (xhr.responseText)
		{
		//	document.getElementById('chatarea').innerHTML=xhr.responseText;
		}
	}
}
		
 
function setText(){
	
	xhr = new XMLHttpRequest();
	xhr.open('POST' , 'chatFetch.php' , true);
	xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xhr.send();
	xhr.onreadystatechange = function()
	{
		document.getElementById('chatarea').innerHTML = xhr.responseText;
	}
		
	}
	setInterval("setText()", 1000);
	
</script>
<?php
include_once('config.php');
echo	$_SESSION['uid'];
?>

<div id="chatbox">
	
	<div id ="chatarea">
	</div>
 
	
	<div id="textbox">
	<form>
		<textarea rows="4" cols="100" id="text"></textarea>
		<input type="button" value="send"  onclick="getText()" />
	</form>
	</div></center>
</div>

<?php
	
	$url = "https://www.youtube.com/embed/P00HMxdsVZI";
	
	if($_GET['submit'])
	{
		embed();
	}
	function embed()
	{
		$tempurl = $_GET["video"];
		
		if(strpos($tempurl, 'youtube'))
		{
			
			preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $tempurl, $matches);
			$url = "https://www.youtube.com/embed/" . $matches[1];
		}
		else if(strpos($tempurl, 'dailymotion'))
		{
			if (preg_match('!^.+dailymotion\.com/(video|hub)/([^_]+)[^#]*(#video=([^_&]+))?|(dai\.ly/([^_]+))!', $tempurl, $m)) {
				if (isset($m[6])) 
				{
					$vidID = $m[6];
				}
				else if (isset($m[4])) 
				{
					$vidID = $m[4];
				}
				else
				{
					vidID = $m[2];
				}
			}
			$url = "https://www.dailymotion.com/embed/video/" . $vidID;
		}
		else if(strpos($tempurl, 'vimeo'))
		{
			$vidID = (int) substr(parse_url($tempurl, PHP_URL_PATH), 1);
			$url =  "https://player.vimeo.com/video/" . $vidID;
		}
		
	}
?>

<div id="video">
	<form name ="chatroom.php" method ="pst">
		Enter url:<br>
		<input type="text" name="video" />
		<input type="submit" class="button" name="submit" value ="Submit"/>
	</form>

<iframe width="560" height="315" 
	src= "<?php echo $url;?>"
	frameborder="0" allow="accelerometer; autoplay; encrypted-media; 
	gyroscope; picture-in-picture" allowfullscreen>
</iframe> ;

</div>
<style>
#chatbox
{
	border:double;
	height:500px;
	width:750px;
	align;
}
#chatarea 
{
	width:750px;
	height:400px;
	border:double;
	float:left;
	overflow:auto;
}
#textbox 
{
	width:750px;
	height:89px;
	border:double;
	float:left;
}
#chatting 
{
	float:left;
}
</style>
