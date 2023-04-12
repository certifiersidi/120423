<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>MindMyPet</title>
    <link rel="stylesheet" type="text/css" href="webapp.css">
  </head>
  <body>
    <header>
      <h1><a href="webapp.php">MindMyPet</a></h1>
      <nav>
        <ul>
          <?php
            if (isset($_SESSION["useruid"])){
              echo "<li><a href='RequestList.php'>View list of pets</a></li>";
              echo "<li><a href='appointment.php'>Make an appointment</a></li>";
              echo "<li><a href='Report.php'>Report a problem</a></li>";
              echo "<li><a href='changepassword.php'>Change password</a></li>";
              echo "<li><a href='logout.inc.php'>Log out</a></li>";
            }
            else if(isset($_SESSION["user42"])){
              echo "<li><a href='logout.inc.php'>Log out</a></li>";
            }
            else{
              echo "<li><a href = 'signup.php' >Sign up</a></li>";
              echo "<li><a href = 'login.php'>Log in</a></li>";
              echo "<li><a href = 'admin.php'>Admin</a></li>";
        
            }
          ?>
        </ul>
      </nav>
    </header>
    <footer>
      <p>&copy; 2023 MindMyPet</p>
    </footer>