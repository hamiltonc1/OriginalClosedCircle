<?php
session_start();
include_once('config.php');
if(isset($_POST['chat']))
{
	$result = mysqli_query($conn , "INSERT INTO `closedcircle`.`chat`
            (`chat_id`,
             `chat_person_name`,
             `chat_value`,
			 `chat_time`
			 )
VALUES (NULL,
        '$_SESSION[uid]',
		'$_POST[chat]',
		NOW()
		);");
	
	}
 
?>