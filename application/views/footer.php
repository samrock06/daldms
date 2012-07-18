<footer id="footer">
<div class="container">
    <div class="row">
    	<div class="four columns">
          <p>Site content &copy; 2012 MAAVIS, group.</p>
        </div>
        <div class="eight columns">
          <ul class="link-list right">
            <li><a href="../index.php">Home</a></li>
            <li><a href="<?php echo $base_url;?>u/profile">Profile</a></li>
            <li><a href="<?php echo $base_url;?>u/course">Course</a></li>
            <li><a href="<?php echo $base_url;?>u/about">Documents</a></li>
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