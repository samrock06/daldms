<footer id="footer">
<div class="container" id="topFooter">
  <div class="row">
      <div class="four mobile-four columns">
        <h5>ASSOCIATE UNIVERSITIES</h5>
        <ul>
        <?php
          for ($i=0; $i < count($assoc_unis); $i++) {
            echo '<li><a href="'.$base_url.'u/university/'.$assoc_unis[$i]['uid'].'">'.$assoc_unis[$i]['university'].'</a></li>'."\n";
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
          <p>&copy; 2012 Dalhousie University.<br>
            Halifax, Nova Scotia, Canada B3H 4R2<br>
            1.902.494.2211
          </p>
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
  <!-- Included JS Files -->
  <script type='text/javascript' src = '<?php echo $scripts[0];?>'></script>
  <?php 
    for($i = 1; $i < count($scripts); $i++){
      echo '<script type="text/javascript" src = "'.$base_url.$scripts[$i].'"></script>'."\n";
    }
  ?>
  <script>
    $(window).load(function() {
      $('#featured').orbit({ 
        animation: 'horizontal-push',                  // fade, horizontal-slide, vertical-slide, horizontal-push
        animationSpeed: 800,                // how fast animtions are
        timer: true,       // true or false to have the timer
        resetTimerOnClick: false,           // true resets the timer instead of pausing slideshow progress
        advanceSpeed: 4000,      // if timer is enabled, time between transitions 
        pauseOnHover: true,     // if you hover pauses the slider
        startClockOnMouseOut: false,   // if clock should start on MouseOut
        startClockOnMouseOutAfter: 1000,   // how long after MouseOut should the timer start again
        directionalNav: true,      // manual advancing directional navs
        captions: true,        // do you want captions?
        captionAnimation: 'fade',      // fade, slideOpen, none
        captionAnimationSpeed: 800,    // if so how quickly should they animate in
        bullets: false,      // true or false to activate the bullet navigation
        bulletThumbs: false,     // thumbnails for the bullets
        bulletThumbLocation: '',     // location from this file where thumbs will be
        afterSlideChange: function(){},    // empty function 
        fluid: true                         // or set a aspect ratio for content slides (ex: '4x3')
      });
    });
  </script>
  <script type="text/javascript"> 
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