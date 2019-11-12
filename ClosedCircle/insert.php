<?php
$uname = $_REQUST['uname'];


$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "closedcircle";

// Create connection
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

$msg = mysqli_real_escape_string($conn,$_REQUEST['msg']);
mysqli_query($conn, "INSERT INTO logs (`username`, `msg`) VALUES ('$uname', '$msg')");

$result = mysqli_query($conn, "SELECT * FROM logs ORDER by id DESC");
while($extract = mysql_fetch+array($result))
{
	echo $extract['username'] . ": " . $extract['msg'] . "<br>";
}
?>