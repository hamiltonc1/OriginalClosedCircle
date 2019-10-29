<?php
  
  require "header.php";
  
?>

    <main>
      <div class="wrapper-main">
        <section class="section-default">
         
          <?php
          if (!isset($_SESSION['id'])) 
		  {
            echo '<p class="login-status">Welcome to Closed Circle, please sign in</p>';
          }
          else if (isset($_SESSION['id'])) 
		  {
			$user = $_SESSION['uid'];
			$uniq_id = uniqid();
            echo '<p class="login-status">Welcome '. $user.'</p>';
			echo '<div style = "text-align: center;"><a href="/closedcircle/chatroom.php?id=' . $uniq_id .'"> <button type = "submit"> Create Chat</button></a></div>';
          }
          ?>
        </section>
      </div>
    </main>

<?php

  require "footer.php";
?>
