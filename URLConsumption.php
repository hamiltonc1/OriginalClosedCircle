<?php
//retrieve token
if (isset($_GET["token"]) && preg_match('/^[0-9a-f]{40}$/i', $_GET["token"])){
  $token = $_GET["token"];
}
else {
  throw new Exception("No valid token");
}

//verify token
$query = $db->prepare("SELECT username, tstamp FROM chat WHERE token = ?");
$query->execute(array($token));
$row = $query->fetch(PDO::FETCH_ASSOC);
$query->closeCursor();

if($row) {
  extract($row);
}
else {
  throw new Exception("No valid token");
}

//chatroom feature here

$query = $db->prepare(
  "DELETE FROM chat WHERE username = ? AND token = ? AND tstamp = ?",
);
$query->execute(
  array(
    $username,
    $token,
    $tstamp
    )
  );

  $delta = 86400;
  if ($_SERVER["REQUEST_TIME"] - $tstamp > $delta) {
    throw new Exception("Chatroom has expired");
  }
 ?>
