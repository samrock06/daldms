<section id="content" class="clearfix">
  <div class="container wrap">
  	<h3>
  		<?php
  			$path = $this->uri->segment(2);
			if($path == 'course'){
  				echo 'Course / '.$course[0]['name'];
  			}
  			else if($path == 'profile'){
  				echo 'Profile / '.$user_title.' '.$firstname.' '.$lastname;
  			}
  			else if($path == 'add_course'){
  				echo 'Add Course';
  			}
  			else if($path == 'search'){
  				echo 'Search';
  			}
  			else{
  				echo 'Home / '.$user_title.' '.$firstname.' '.$lastname;
  			}
  		?>
  	</h3>
  	<div class="row main-row">
    	<?php 
      		echo $page;
    	?>
	</div>
  </div>
<div id="myModal" class="reveal-modal">
  <h2>Awesome. I have it.</h2>
  <p class="lead">Your couch.  It's mine.</p>
  <p>Im a cool paragraph that lives inside of an even cooler modal. Wins</p>
  <a class="close-reveal-modal">&#215;</a>
</div>
</section>