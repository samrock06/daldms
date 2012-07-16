<section id="search">
	<div class="container user">
		<div class="row">
			<div class="eight mobile-four columns">
				
			</div>
			
		</div>
	</div>
</section>
<section id="content">
	<div class="container wrap">
		<?php 
			if($page === 'course'){
				echo $course;
			}
			else if($page === 'profile'){
				echo $profile;
			}
			else if($page === 'search'){
				echo $search;
			}
			else{
				echo $land;
			}
		?>
				<!--<a href="#" class="button" data-reveal-id="myModal">Click Me For A Modal</a>-->
	</div>
<div id="myModal" class="reveal-modal">
  <h2>Awesome. I have it.</h2>
  <p class="lead">Your couch.  It's mine.</p>
  <p>Im a cool paragraph that lives inside of an even cooler modal. Wins</p>
  <a class="close-reveal-modal">&#215;</a>
</div>
</section>