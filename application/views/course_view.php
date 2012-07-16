<?php
  $course_info = array();
  foreach ($course_attr as $id => $object)
  { 
    foreach ($object as $key => $value)
    { 
      $course_info[$id][$key] = $value;
    }
  }

  foreach ($course_info as $value) {
    $course_id = $value['c_id'];
    $course_name = $value['name'];
    $course_code = $value['code'];
    $course_uni = $value['university'];
    $course_dept = $value['department'];
    $course_prof = $value['prof_id'];
    $course_safety = $value['safety'];
    $course_computer = $value['computer'];
    $course_lec_cap = $value['lecture_cap'];
    $course_lab_cap = $value['lab_cap'];
    $course_syllabus = $value['syllabus'];
    $course_notes = $value['notes'];
    $course_assessment = $value['assessment'];
    $course_labs = $value['labs'];
    $course_exams = $value['exams'];
    $course_description = $value['description'];
  }
?>
<div class="row" id="search-bar">
  <div class="nine mobile-four columns">
    <h5><?php echo $course_code.' - '.$course_name."\n";?></h5>
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
      'class'=>'postfix secondary button icons'
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
<div class="row">
  <div class="three mobile-four columns">
    <ul class="side-nav">
      <li><a href="">Add Course</a></li>
    <?php
      foreach ($course_info as $value) {
        $url = str_replace(' ','',$value['code']);
        echo '<li><a href="course/'.$url.'">'.$value['code'].'</a></li>'."\n";
      }
    ?>
  	</ul>
  </div>
  <div class="nine mobile-four columns" id="outline">
      <h6>University</h6>
      <p>
        <?php echo $course_uni."\n";?>
      </p>
      <h6>Department</h6>
      <p>
        <?php echo $course_dept."\n";?>
      </p>
      <h6>Professor</h6>
      <p>
        <?php echo $user_title.' '.$firstname.' '.$lastname."\n";?>
      </p>
      <h6>Course Description</h6>
  		<p>
  			<?php echo $course_description."\n";?>
  		</p>
      <h6>Safety Coverage</h6>
      <p>
        <?php echo $course_safety."\n";?>
      </p>
      <h6>Computer Coverage</h6>
      <p>
        <?php echo $course_computer."\n";?>
      </p>
      <h6>Capacity</h6>
      <ul>
        <li>Lectures: <?php echo $course_lec_cap;?></li>
        <li>Labs: <?php echo $course_lab_cap;?></li>
      </ul>
      <h6>Links</h6>
      <ul>
        <li><a href="<?php echo $course_syllabus;?>">Syllabus</a></li>
        <li><a href="<?php echo $course_notes;?>">Notes</a></li>
        <li><a href="<?php echo $course_assessment;?>">Assessment</a></li>
        <li><a href="<?php echo $course_labs;?>">Labs</a></li>
        <li><a href="<?php echo $course_exams;?>">Exams</a></li>
      </li>
  </div>
</div><!-- End of list Row -->