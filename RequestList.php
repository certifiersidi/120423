<?php
include 'header.php';
?>
<nav>
    <ul id="">
        <li><a id="list" href="Request.php">Add Pet</a></li>
    </ul>
</nav>
<?php
include_once 'dbh.inc.php'; 
include_once 'functions.inc.php';

displayRequests($conn);
?>

