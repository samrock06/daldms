<section id="content">
	<div class="container">
		<div class="row" id="search">
			<div class="eight mobile-four columns">
			</div>
			<div class="four mobile four columns">
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
          'class'=>'postfix button icons'
        );
        ?>
				<div class="row collapse">
				<?php echo form_open('search')."\n";?>
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

		<div class="row" id="tab-area">
			<div class="twelve mobile-four columns">
				<dl class="tabs">
  				<dd class="active"><a href="#simple1">Course</a></dd>
  				<dd><a href="#simple2">Profile</a></dd>
  				<dd><a href="#simple3">Search</a></dd>
  				<?php
  					if( $status === "admin"){
  						echo '<dd><a href="#simple4">Admin</a></dd>'."\n";
  					}
  				?>
				</dl>

				<ul class="tabs-content">
  				<li class="active" id="simple1Tab">
  					<div class="row">
  						<div class="twelve mobile-four columns">
  							<?php echo heading('Linear Algebra - Math 2030', 5)."\n";?>
  							<hr>
  						</div>
  					</div>
  				</li>
  				<li id="simple2Tab">This is simple tab 2's content. Now you see it!</li>
  				<li id="simple3Tab">This is simple tab 3's content. It's, you know...okay.</li>
  				<?php
  					if( $status === "admin"){
  						echo '<li id="simple4Tab">This is simple tab 4\'s content. It\'s, you know...okay.</li>'."\n";
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