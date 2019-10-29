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

<div id="video">
	<form action="/chatroom.php">
		Enter url:<br>
		<input type="text" id="input1" />
		<button onclick="myJsFunction()"></button>
		<script type="text/javascript">
			function myJsFunction(){
			var text=document.getElementById('input1').value;
			var parts = text.split('/');
			var lastSegment = parts.pop() || parts.pop();
			
			if()
			{
				
			}
			else if()
			{
			}
			else if()
			{
			}
			else
			{
				
			}
			}
		</script>
	
	<iframe width ="560" height = "315"
		src = document.getElementById('videoURL').innerHTML;
		frameborder="0">
	</iframe>
</div>
<style>
#chatbox
{
	border:double;
	height:500px;
	width:1000px;
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
