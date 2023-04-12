<?php
include_once 'header.php';
?>

<section>
    <h2></h2>
    <form action="admin.inc.php" method="post">
        <input type="text" name="adminUid" placeholder="username" required>
        <input type="password" name="adminPwd" placeholder="password" required>
        <button type="submit" name="submit">Log in</button>
    </form>
</section>