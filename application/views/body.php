<section id="search">
	<div class="container user">
		<div class="row">
			<div class="eight mobile-four columns">
				<?php echo '<h6>Welcome, '.$firstname.' '.$lastname.'!</h6>';?>
			</div>
			<div class="four mobile-four columns">
				<?php
        $form = array(
          'class'=>'custom'
        );
        $input = array(
          'name'=>'search',
          'type'=>'text',
          'placeholder'=>'Search',
          'class'=>$error
        );
        $search = array(
          'title'=>'search',
          'class'=>'postfix secondary button icons'
        );
        ?>
				<div class="row collapse">
				<?php echo form_open('u/search')."\n";?>
      		<div class="ten mobile-three columns">
       		 <?php echo form_input($input)."\n";?>
      		</div>
      		<div class="two mobile-one columns">
        		<?php echo anchor('#', 'L', $search)."\n";?>
      		</div>
      	<?php echo form_close()."\n";?>
    		</div>
			</div>
		</div>
	</div>
</section>
<section id="content">
	<div class="container wrap">
		<div class="row" id="tab-area">
			<div class="twelve mobile-four columns">
				<dl class="tabs four-up">
  				<dd class="active"><a href="#course">Course</a></dd>
  				<dd><a href="#profile">Profile</a></dd>
  				<dd><a href="#search">Search</a></dd>
  				<?php
  					if( $status === "admin"){
  						echo '<dd><a href="#admin">Admin</a></dd>'."\n";
  					}
  				?>
				</dl>

				<ul class="tabs-content">
  				<li class="active" id="courseTab">
  					<div class="row">
  						<div class="two mobile-four columns">
  							<ul class="side-nav">
  								<li class="active"><a href="#">CSCI 1106</a></li>
  								<li><a href="#">ENGR 1010</a></li>
  								<li><a href="#">PHYS 2040</a></li>
  								<li><a href="#">CSCI 4171</a></li>
								</ul>
  						</div>
  						<div class="ten mobile-four columns" id="outline">
  							<div class="row">
  								<?php echo heading('CSCI 1106 - Animated Computing', 5)."\n";?>
  								<hr>
  							</div>
  							<div class="row">
  								<?php echo heading('Assumed Learning Outcomes', 6)."\n";?>
  								<p>
  									What the student enrolling in this course is assumed to be able to do.
  								</p>
  								<ul class="outline-details">
  									<li>Write texts on a technical topic in a language appropriate for a given audience. [INFX 1615] [INFX 2690] [INFX 2691] [INFX 3600] [INFX 3601] [INFX 4600] [INFX 4601]</li>
  								</ul>
  							</div>
  							<div class="row">
  								<?php echo heading('Student Learning Outcomes', 6)."\n";?>
  								<p>
  									Student learning outcomes that are covered by this course.
  								</p>
  								<ul class="outline-details">
  										<li>Apply various techniques to identify and recover from faults.</li>
											<li>Describe and justify what constitutes a good game.</li>
											<li>Describe how an event driven system works.</li>
											<li>Describe issues that should be considered when designing a website.</li>
											<li>Describe techniques for determining the usability of a website.</li>
											<li>Design a basic multipage website.</li>
											<li>Design a simple animated game.</li>
											<li>Explain the purpose and structure of the Hypertext Mark Language (HTML).</li>
											<li>Identify future directions in various technologies and computer science fields.</li>
											<li>Identify some of the challenges in robotics and mechanisms for overcoming these challenges.</li>
											<li>Identify the challenges in designing and implementing games.</li>
											<li>Implement a game using integrated media presentation authoring software.</li>
											<li>Program a robot to accomplish tasks of moderate complexity.</li>
											<li>Use sensors and actuators in a robotics applications.</li>
											<li>Use states and transitions to model the behaviour of a system.</li>
											<li>Work with peers on a shared project.</li>
											<li>Use web authoring software to implement a basic multipage website.</li>
											<li>Write a technical report describing and justifying the design and implementation of a project.</li>
  									</ul>
  							</div>
  						</div>
  					</div><!-- End of list Row -->
  				</li>
  				<li id="profileTab">This is simple tab 2's content. Now you see it!</li>
  				<li id="searchTab">This is simple tab 3's content. It's, you know...okay.</li>
  				<?php
  					if( $status === "admin"){
  						echo '<li id="adminTab">This is simple tab 4\'s content. It\'s, you know...okay.</li>'."\n";
  					}
  				?>
				</ul>
				<!--<a href="#" class="button" data-reveal-id="myModal">Click Me For A Modal</a>-->
			</div>
		</div>
	</div>
<div id="myModal" class="reveal-modal">
  <h2>Awesome. I have it.</h2>
  <p class="lead">Your couch.  It's mine.</p>
  <p>Im a cool paragraph that lives inside of an even cooler modal. Wins</p>
  <a class="close-reveal-modal">&#215;</a>
</div>
</section>