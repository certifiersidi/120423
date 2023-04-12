<?php 
  include_once 'header.php';
?>

<section class="signup-form">
    <h2>Log in</h2>
    <form action="login.inc.php" method="post">
        <input type="text" name="uid" placeholder="username" required>
        <input type="password" name="pwd" placeholder="password" required>
        <button type="submit" name="submit">Log in</button>
    </form>
</section>