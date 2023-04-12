<?php 
  include_once 'header.php';
?>
   
<section class ="blog" id="blog">    
  <form method = "POST" action="Report.inc.php" id="formId"  required>
    <div id = "blog">
      <fieldset id="entry" >
        <legend id="ask"> Report a Problem </legend>             
        <p>
          <input type="text" name="title" style='display:block; width:auto;' placeholder= "Title" size="100" required/>   
        </p>
        <p>
          <textarea cols="96" rows="14" name ="text" style='display:block; width:auto;' placeholder="Enter your text here..." class ="text" required>  
          </textarea>  
        </p>
        <p>
          <input type="email" name="email" style='display:block; width:auto;' placeholder="Please enter your e-mail" >
        </p>          
       <p>                      
        <input type="submit" name="submit">
        </p>
      </fieldset>
    </div>
  </form>
</section>
      