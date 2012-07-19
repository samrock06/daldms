<?php
  $associates = array();
  foreach ($assoc_unis as $id => $object)
  { 
    foreach ($object as $key => $value)
    { 
      $associates[$id][$key] = $value;
    }
  }
?>
<footer id="footer">
<div class="container" id="topFooter">
  <div class="row">
      <div class="four mobile-four columns">
        <h5>ASSOCIATE UNIVERSITIES</h5>
        <ul>
        <?php
          for ($i=0; $i < count($associates); $i++) {
            echo '<li><a href="'.$base_url.'u/university/'.$associates[$i]['uid'].'">'.$associates[$i]['university'].'</a></li>'."\n";
          }
        ?>
        </ul>
      </div>
      <div class="four mobile-four columns">
        <h5>CONTACT</h5>
        <form class="custom">
          <div class="row">
            <div class="twelve columns">
              <div class="row collapse">
                <div class="two mobile-one columns">
                  <span class="prefix icons">@</span>
                </div>
                <div class="ten mobile-three columns">
                  <input type="text" placeholder="Email"/>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="twelve columns">
              <textarea name="" cols="40" rows="7" type="textarea" placeholder="Message" ></textarea>
            </div>
          </div>
          <input type="submit" name="" value="Send" class="medium radius button"  />
        </form>
      </div>
      <div class="four mobile-four columns">
      </div>
  </div>
</div>
<div class="container" id="bottomFooter">
    <div class="row">
    	<div class="four columns">
          <p>Site content &copy; 2012 MAAVIS, group.</p>
        </div>
        <div class="eight columns">
          <ul class="link-list right">
            <li><a href="../index.php">Home</a></li>
            <li class="footer-div">|</li>
            <li><a href="<?php echo $base_url;?>u/profile">Profile</a></li>
            <li class="footer-div">|</li>
            <li><a href="<?php echo $base_url;?>u/course">Course</a></li>
            <li class="footer-div">|</li>
            <li><a href="<?php echo $base_url;?>u/about">Documents</a></li>
            <li class="footer-div">|</li>
            <li><a href="<?php echo $base_url;?>u/about">About</a></li>
          </ul>
        </div>
    </div>
</div>
</footer>
<script type="text/javascript"> 
   $(window).load(function() {
       $('#featuredContent').orbit({ 
       		animationSpeed: 800,                // how fast animtions are
     		timer: true, 			 // true or false to have the timer
     		resetTimerOnClick: false,
       		fluid: '16x6' 
       });
   });
   function textCounter(field,cntfield,maxlimit) {
		if (field.value.length > maxlimit) // if too long...trim it!
			field.value = field.value.substring(0, maxlimit);
		// otherwise, update 'characters left' counter
		else
			cntfield.value = maxlimit - field.value.length;
	}
</script>
</body>
</html>