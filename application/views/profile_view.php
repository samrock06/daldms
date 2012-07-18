<?php
$course_info = array();
  foreach ($course_attr as $id => $object)
  { 
    foreach ($object as $key => $value)
    { 
      $course_info[$id][$key] = $value;
    }
  }
  for($i=0; $i < count($course_info); $i++){
  	$courses[$i] = $course_info[$i]['name'];
  }
?>
<div class="row" id="search-bar">
  <div class="nine mobile-four columns">
    <h5>Profile</h5>
  </div>
  <div class="three mobile-four columns">
  <?php
    $form = array(
      'class'=>'custom'
    );
    $input = array(
      'name'=>'search',
      'id'=>'searchBox',
      'type'=>'text',
      'placeholder'=>'Search',
    );
    $search = array(
      'name'=>'submit',
      'id'=>'searchSubmit',
      'value'=>'L',
      'class'=>'postfix button icons'
    );
    ?>
    <div class="row collapse">
      <?php echo form_open('u/search')."\n";?>
        <div class="ten mobile-three columns">
          <?php echo form_input($input)."\n";?>
        </div>
        <div class="two mobile-one columns">
          <?php echo form_submit($search)."\n";?>
        </div>
          <?php echo form_close()."\n";?>
    </div>
  </div>
</div>
<div class="row" id="inner-page-wrap">
  <div class="three mobile-four columns">
    <?php echo $profile_image;?>
    <ul class="course-edit">
      <li><a href="">Edit</a></li>
      <li class="nav-div"></li>
      <li><a href="">Delete</a></li>
    </ul>
    <ul class="side-nav">

  	</ul>
  </div>
  <div class="nine mobile-four columns" id="outline">
  	<h6>Name</h6>
    <p>
      <?php echo $user_title.' '.$firstname.' '.$lastname."\n";?>
    </p>
    <h6>Email</h6>
    <p>
    	<?php echo $user_email."\n";?>
    </p>
  	<h6>University</h6>
    <p>
      <?php echo $university."\n";?>
    </p> 
    <h6>Address</h6>
    <p>
    	<?php 
    		$adr = explode(",",$address);
    		for($i = 0; $i < count($adr); $i++){
    			echo $adr[$i]."<br>\n";
    		}
    	?>
    </p> 
    <h6>Course(s)</h6>
    <ul>
    <?php
    	for ($i=0; $i < count($course_info); $i++) {
        echo '<li><a href="'.$base_url.'u/course/'.$course_info[$i]['c_id'].'">'.$course_info[$i]['name'].' - '.$course_info[$i]['code'].'</a></li>'."\n";
      }
    ?>
     </ul>
  </div>
</div>