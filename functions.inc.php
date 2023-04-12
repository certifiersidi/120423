<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
     $result = true;   
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
     $result = true;   
    }
    else{
        $result = false;
    }
    return $result;
}


function invalidEmail($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
     $result = true;   
    }
    else{
        $result = false;
    }
    return $result;
}


function pwdMatch($pwd, $pwdRepeat){
    if ($pwd !== $pwdRepeat){
     $result = true;   
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersemail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd, $pwdRepeat){

    if (pwdMatch($pwd, $pwdRepeat) === false){
        $sql = "INSERT INTO users (usersName, usersemail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtfailed");
        exit();
    }
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $pwd,);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../login.php?error=none");
        exit();
    }
    else{
        header("location: ../signup.php?error=passwordsdontmatch");
    }
    



}

function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false){
        header("location: ../signup.php");
        exit();
    }

    $pwdDb = $uidExists["usersPwd"];
    if ($pwd === $pwdDb){
        $checkPwd = true;
    }
    else{
        $checkPwd = false;
    }

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin2");
        exit();
    }
    else if ($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersid"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../webapp.php");
        exit();
    }
}

function addPet($conn, $email, $animal, $pName, $pBreed, $pDoB, $pGender, $pSize){
    $sql = "INSERT INTO petdetails (userEmail, petType, petName, petBreed, petDoB, PetGender, PetSize) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../Request.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssss", $email, $animal, $pName, $pBreed, $pDoB, $pGender, $pSize);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../RequestList.php");
    exit();
}

function reportProblem($conn, $title, $content, $email,){
    $sql = "INSERT INTO problem (title, content, email) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../Request.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $title, $content, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../viewProblem.php?ProblemReported");
    exit();
}

function displayReports($conn){
    $query = mysqli_query($conn, "SELECT * FROM problem ORDER BY date DESC;");

        foreach($query as $row) :
            ?>
            <div>
                <?php
            echo 'From: <tr><td class="email">'. $row["email"] . "</td>" . "</p>";
            echo '<p><tr><td class="title">'. $row["title"] . "</td>" . "</p>";
            echo '<p><tr><td class="content">'. $row["content"] . "</td>" . "</p>";
            echo '<p>Posted on: <tr><td class="date">'. $row["date"] . "</td>" . "</p>";
            echo '<br><br>';
            if (isset($_SESSION['user42'])){
                echo '<input type="textzone">Answer</input>';
                echo '<button type-""></button>';
            }
            ?>
            </div>
            <?php
        endforeach;

    }

function displayRequests($conn){
    $query = mysqli_query($conn, "SELECT * FROM petdetails ORDER BY IDpet DESC;");

        foreach($query as $row) :
            ?>
            <div class="petprint">
                <?php
            echo '<p>Owner email: <tr><td class="Oremail">'. $row["userEmail"] . "</td>" . "  ";
            echo '<p>Pet type: <tr><td class="animal">'. $row["petType"] . "</td>" . "  ". "</p>";
            echo '<p>Pet name: <tr><td class="pName">'. $row["petName"] . "</td>" . "  ". "</p>";
            echo '<p>Pet breed: <tr><td class="PetBreed">'. $row["petBreed"] . "</td>" . "  ". "</p>";
            echo '<p>Pet Date of Birth<tr><td class="DoB">'. $row["petDoB"] . "</td>" . "  ". "</p>";
            echo '<p>Pet Gender: <tr><td class="gender">'. $row["PetGender"] . "</td>" . "  ". "</p>";
            echo '<p>Pet size: <tr><td class="size">'. $row["PetSize"] . "</td>". "</p>". "</p>";
            echo '<br><br>';
            echo '</div>';
            ?>
            </div>
            <?php

        endforeach;

    }

function MakeAppointment($conn, $petID, $pet_name, $appointment_date, $appointment_time){

    if (!preg_match("/^[a-zA-Z ]*$/", $pet_name)) {
        header("Location: appointment.php?error=invalidpetname");
        exit();
      }
      else if (!strtotime($appointment_date)) {
        header("Location: appointment.php?error=invaliddate");
        exit();
      }
      else if (!strtotime($appointment_time)) {
        header("Location: appointment.php?error=invalidtime");
        exit();
      }

  $sql = "INSERT INTO appointments (petID, pName, Adate, Atime) VALUES (?, ?, ?, ?)";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: appointment.php?error=sqlerror");
    exit();
  }
  else {
    mysqli_stmt_bind_param($stmt, "ssss", $petID, $pet_name, $appointment_date, $appointment_time);
    mysqli_stmt_execute($stmt);
    header("Location: appointment.php?error=none");
    exit();
  }
}

function loginAdmin($username, $pwd){

    if ($username == 'user42' && $pwd == 'SEGROUP42-'){
        session_start();
        $_SESSION["user42"] = $username;
        header("location: ../viewProblem.php");
    }
    else{
        header("location: ../admin.php");
    }
}