<?php

if (isset($_POST['submit'])) {

  $petID = $_POST['pet-id'];
  $pet_name = $_POST['pet_name'];
  $appointment_date = $_POST['appointment_date'];
  $appointment_time = $_POST['appointment_time'];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  MakeAppointment($conn, $petID, $pet_name, $appointment_date, $appointment_time);
}