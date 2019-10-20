// CREATE TABLE chat(
//  token CHAR(40) NOT NULL,
//  username VACHAR(45) NOT NULL,
//  tstamp INTEGER UNSIGNED NOT NULL,
//  PRIMARY KEY(token)
// );

<?php
//create a database on the PC back home
$token = sha1(uniqid($username, true))

$query = $db->prepare(
  "INSERT INTO pending_users(username, token, tstamp)VALUES (?,?,?)"
);
$query->execute(
  array(
    $username,
    $token,
    $_SERVER["REQUEST_TIME"]
    )
  );

$url = "http://closedcircle.com/chat.php?token=$token";

$message = <<<ENDMSG
Here is a link for your chatroom: $url
Thank you for using our service!
ENDMSG;

mail($address, "Closed Circle Chatroom", $message)
 ?>
