<?php
    include_once 'header.php';
    include_once 'dbh.inc.php';
  //  include_once 'functions.inc.php';

    if (isset($_POST["submit"]))
    {
        $email = $_POST["email"];
        $username = $_POST["uid"];
        $oPwd = $_POST["oldPwd"];
        $nPwd = $_POST["newPwd"];

        $query = mysqli_query($conn, "SELECT usersemail, usersPwd from users where usersemail = '$email' AND usersPwd = '$oPwd' ");

        $num = mysqli_fetch_array($query);

        if ($num > 0){
            $con = mysqli_query($conn, "UPDATE users set usersPwd = '$nPwd' WHERE usersemail = '$email' ");
            $_SESSION['msg'] = "Password Changed successfully";
        }
        else{
            $_SESSION['msg'] = "Passsword doesn't match.";
        }
    }
?>


<h2>Change your password</h2>
    <form action="" method="POST">

        <?php 
            echo $_SESSION['msg'];
        ?>
        <?php 
            $_SESSION['msg'] = "";
        ?>

        <input type="text" name="email" placeholder="E-mail">
        <input type="text" name="uid" placeholder="username">
        <input type="password" name="oldPwd" placeholder="Current password">
        <input type="text" name="newPwd" placeholder="New password">
        <button type="submit" name="submit">Confirm and go to log in</button>
    </form>