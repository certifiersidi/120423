<?php 
  include_once 'header.php';
?>
<section class="signup-form">
    <h2>Sign up</h2>
    <form action="signup.inc.php" method="POST">
      <input type="text" name="name" placeholder="name">
      <input type="text" name="email" placeholder="email">
      <input type="text" name="uid" placeholder="username">
      <input type="password" name="pwd" placeholder="password">
      <input type="password" name="pwdrepeat" placeholder="enter password again">
      <button type="submit" name="submit">Sign up</button>
    </form>
    <?php
    if (isset($_GET["error"])){
      if($_GET["error"] == "invaliduid"){
        echo "Try another username";
      }
      else if($_GET["error"] == "invalidemail"){
        echo "Choose a proper email";
      }
      else if($_GET["error"] == "passwordsdontmatch"){
        echo "Passwords don't match";
      }
      else if($_GET["error"] == "usernametaken"){
        echo "Username taken :(.";
      }
      else if($_GET["error"] == "none"){
        echo "You have signed up!";
      }
    }?>
</section>