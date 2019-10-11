<?php

require "header.php";

?>
<main>
  <div>
    <section>
      <div class="form-wrapper2">
        <h1>HELP</h1>
        
       button class="help" onclick="getLocation()">Give Your Location</button>
              <p id="demo"></p>
        <form action="includes/help.inc.php" method="post"><br>
           <input type="text" name="name" placeholder="Name"><br>
           <input type="text" name="phone" placeholder="Phone no"><br>
           <input type="text" name="desc" placeholder="Brief-Description of food"><br>
           <input type="text" name="quantity" placeholder="Quantity of food items"><br>        
           <button class="help" type="submit" name="help-submit">Help</button>
        </form>  
      </div>  
          <div class="mapouter"><div class="gmap_canvas"><iframe  width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=new%20delhi%20&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/blog/nordvpn-coupon-code/">nordvpn coupon</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;margin:auto;padding:25px 0px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div> 

    </section>
  </div>
</main>

<?php

require "footer.php";

?>
