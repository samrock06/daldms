<?php
  foreach ($course_info as $value) {
    $segment = $this->uri->segment(3);
    if(!empty($segment) && $value['c_id'] === $segment){
      $course_id = $value['c_id'];
      $course_name = $value['name'];
      $course_code = $value['code'];
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
  }
?>
<h6>University</h6>
      <p>
        <?php echo $university."\n";?>
      </p>
      <h6>Department</h6>
      <p>
        <?php echo $course_dept."\n";?>
      </p>
      <h6>Professor</h6>
      <p>
        <?php echo $user_title.' '.$firstname.' '.$lastname."\n";?>
      </p>
      <h6>Course</h6>
      <p>
        <?php echo $course_code.' - '.$course_name."\n";?>
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
        <li>Lecture: <?php echo $course_lec_cap;?></li>
        <li>Lab: <?php echo $course_lab_cap;?></li>
      </ul>
      <h6>Links</h6>
      <ul>
        <li><a href="<?php echo $course_syllabus;?>">Syllabus</a></li>
        <li><a href="<?php echo $course_notes;?>">Notes</a></li>
        <li><a href="<?php echo $course_assessment;?>">Assessment</a></li>
        <li><a href="<?php echo $course_labs;?>">Labs</a></li>
        <li><a href="<?php echo $course_exams;?>">Exams</a></li>
      </li>