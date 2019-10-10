<?php

require "header.php";

?>
<main>
  <div>
    <section>
      <div class="form-wrapper">
        <h1>Register</h1>
        
        <form action="includes/signup.inc.php" method="post"><br>
           <input type="text" name="name" placeholder="Name"><br>
           <input type="text" name="mail" placeholder="E-mail"><br>
           <input type="text" name="phone" placeholder="Phone no"><br>
           <input type="text" name="address" placeholder="Address"><br>
           <button class="register" type="submit" name="signup-submit">Register</button>
        </form>  
      </div>  
    </section>
  </div>
</main>

<?php

require "footer.php";

?>