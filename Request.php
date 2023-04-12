<?php 
  include_once 'header.php';
?>
<h2>Enter Your Pet Details</h2>
<form action="Request.inc.php" name="petDetails" method="post">

  <div>
    <label for="Oemail">Enter the e-mail address of your account</label>
    <input type="email" name="Oemail" placeholder="example@email.com" required>
  </div>

  <div>
    <label for="animal">What animal is your pet</label>
    <select name="animal" id="animal" required>
      <option value="" selected disabled hidden>Click here</option>
      <option value="dog">Dog</option>
      <option value="cat">Cat</option>
    </select>
  </div>

  <div>
    <label for="pName">What's the name of your pet?</label>
    <input type="text" name="pName" placeholder="Name" required>
  </div>

  <div>
    <label for="PetBreed">What's the breed of your pet?</label>
    <input type="text" name="PetBreed" placeholder="What's the breed of your pet?" required>
  </div>

  <div>
    <label for="DoB">What is his/her date of birth?</label>
    <input type="date" name="DoB" required>
  </div>

  <div>
    <label for="gender">What gender is your pet?</label>
    <select name="gender" id="gender" required>
      <option value="" selected disabled hidden>Click here</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
  </div>

  <div>
    <label for="size">What is your pet size?</label>
    <select name="size" id="size" required>
      <option value="" selected disabled hidden>Click here</option>
      <option value="small">Small</option>
      <option value="medium">Medium</option>
      <option value="large">Large</option>
    </select>
  </div>

  <button type="submit" name="submit">Submit</button>
  <label for="submit">Submit Pet Details</label>

</form>
<?php
// header("location: ../RequestList.php");