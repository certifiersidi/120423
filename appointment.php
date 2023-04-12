<?php
  include_once 'header.php';
?>


<section class="appointment-form">
  <h2>Make a pet minder appointment</h2>
  <form action="appointment.inc.php" method="POST">
    <label for="pet=id">Pet ID</label>
    <input type="text" name="pet-id" placeholder="Enter pet-id">
    <label for="pet-name">Pet name</label>
    <input type="text" name="pet_name" id="pet-name" placeholder="Enter pet name">
    <label for="appointment-date">Appointment date</label>
    <input type="date" name="appointment_date" id="appointment-date">
    <label for="appointment-time">Appointment time</label>
    <input type="time" name="appointment_time" id="appointment-time">
    <button type="submit" name="submit">Book appointment</button>
  </form>
  <?php
    // check for appointment errors
    if (isset($_GET["error"])){
      if($_GET["error"] == "emptyinput"){
        echo "<p class='error'>Fill in all the fields</p>";
      }
      else if($_GET["error"] == "invaliddate"){
        echo "<p class='error'>Invalid appointment date</p>";
      }
      else if($_GET["error"] == "invalidtime"){
        echo "<p class='error'>Invalid appointment time</p>";
      }
      else if($_GET["error"] == "none"){
        echo "<p class='success'>Appointment booked successfully!</p>";
      }
    }
  ?>
</section>