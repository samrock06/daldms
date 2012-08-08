<?php
	$form = array(
		'name'=>'myForm',
		'class'=>'custom',
		'onKeyDown'=>'textCounter(document.myForm.c_desc,document.myForm.remLen2,5000)',
		'onKeyUp'=>'textCounter(document.myForm.c_desc,document.myForm.remLen2,5000)'
	);
	$name = array(
		'name'=>'c_name',
      	'type'=>'text',
      	'placeholder'=>'E.g. - Engineering Design I'
	);
	$department = array(
		'name'=>'c_dept',
      	'type'=>'text',
      	'placeholder'=>'E.g. - Mineral Engineering'
      	
	);
	$code = array(
		'name'=>'c_code',
      	'type'=>'text',
      	'placeholder'=>'E.g. - CSCI 1106'
      	
	);
	$safe_cov = array(
		'name'=>'c_safe',
      	'type'=>'text',
      	'placeholder'=>'E.g. - 100'
      	
	);
	$comp_cov = array(
		'name'=>'c_comp',
      	'type'=>'text',
      	'placeholder'=>'E.g. - 100'
      	
	);
	$lec_cap = array(
		'name'=>'c_lec_cap',
      	'type'=>'text',
      	'placeholder'=>'E.g. - 60'
      	
	);
	$lab_cap = array(
		'name'=>'c_lab_cap',
      	'type'=>'text',
      	'placeholder'=>'E.g. - 20'
      	
	);
	$syllabus = array(
		'name'=>'c_syllabus',
      	'type'=>'text',
      	'placeholder'=>'syllabus.pdf'
      	
	);
	$notes = array(
		'name'=>'c_notes',
      	'type'=>'text',
      	'placeholder'=>'Notes'
      	
	);
	$assess = array(
		'name'=>'c_assess',
      	'type'=>'text',
      	'placeholder'=>'assessment.pdf'
      	
	);
	$labs = array(
		'name'=>'c_labs',
      	'type'=>'text',
      	'placeholder'=>'Labs'
      	
	);
	$exams = array(
		'name'=>'c_exams',
      	'type'=>'text',
      	'placeholder'=>'Exams'
      	
	);
	$description = array(
		'name'=>'c_desc',
      	'type'=>'textarea',
      	'rows'=>'7',
      	'placeholder'=>'Course Description'
	);
	$university = array(

	);
	$submit = array(
		'name'=>'addSubmit',
		'value'=>'Add Course',
		'class'=>'medium radius button'
	);
	echo heading('Add a Course', 4)."\n";
	echo form_open("/add", $form)."\n";

	echo '<div class="row">'."\n";
	echo '<div class="six mobile-three columns">'."\n";
	echo form_label('Course', 'course')."\n";
    echo form_input($name)."\n";
    echo '</div>'."\n";
    echo '<div class="six mobile-three columns">'."\n";
    echo form_label('Department', 'department')."\n";
    echo form_input($department)."\n";
    echo '</div>'."\n";
    echo '</div>'."\n";

    echo '<div class="row">'."\n";
	echo '<div class="six mobile-three columns">'."\n";
	echo form_label('Code', 'code')."\n";
    echo form_input($code)."\n";
    echo '</div>'."\n";
    echo '</div>'."\n";

    echo '<hr>'."\n";
    echo '<div class="row">'."\n";
	echo '<div class="six mobile-three columns">'."\n";
	echo form_label('Safety Coverage', 'safety')."\n";
    echo form_input($safe_cov)."\n";
    echo '</div>'."\n";
    echo '<div class="six mobile-three columns">'."\n";
    echo form_label('Computer Coverage', 'computer')."\n";
    echo form_input($comp_cov)."\n";
    echo '</div>'."\n";
    echo '</div>'."\n";

    echo '<hr>'."\n";
    echo '<div class="row">'."\n";
	echo '<div class="six mobile-three columns">'."\n";
	echo form_label('Lecture Capacity', 'lecture')."\n";
    echo form_input($lec_cap)."\n";
    echo '</div>'."\n";
    echo '<div class="six mobile-three columns">'."\n";
    echo form_label('Lab Capacity', 'lab')."\n";
    echo form_input($lab_cap)."\n";
    echo '</div>'."\n";
    echo '</div>'."\n";

    echo '<hr>'."\n";
    echo '<div class="row">'."\n";
	echo '<div class="six mobile-three columns">'."\n";
	echo form_label('Syllabus', 'syllabus')."\n";
    echo form_input($syllabus)."\n";
    echo '</div>'."\n";
    echo '<div class="six mobile-three columns">'."\n";
    echo form_label('Notes', 'notes')."\n";
    echo form_input($notes)."\n";
    echo '</div>'."\n";
    echo '<div class="six mobile-three columns">'."\n";
    echo form_label('Assessment', 'assessment')."\n";
    echo form_input($assess)."\n";
    echo '</div>'."\n";
    echo '<div class="six mobile-three columns">'."\n";
    echo form_label('Labs', 'labs')."\n";
    echo form_input($labs)."\n";
    echo '</div>'."\n";
    echo '</div>'."\n";

    echo '<div class="row">'."\n";
    echo '<div class="six mobile-three columns">'."\n";
    echo form_label('Exams', 'exams')."\n";
    echo form_input($exams)."\n";
    echo '</div>'."\n";
    echo '</div>'."\n";

    echo '<hr>'."\n";
    echo '<div class="row">'."\n";
    echo '<div class="twelve mobile-four columns">'."\n";
    echo form_label('Description (5000 max characters)', 'description')."\n";
    echo form_textarea($description)."\n";
    echo '</div>'."\n";
    echo '</div>'."\n";

    echo '<div class="row">'."\n";
    echo '<div class="two mobile-one columns">'."\n";
    echo form_label('Characters left', 'characters')."\n";
    echo '<input readonly type="text" name="remLen2" size="3" maxlength="3" value="5000">';
	echo '</div>'."\n";
	echo '</div>'."\n";
  	echo '<hr>'."\n";

    echo form_submit($submit);
	echo form_close()."\n";
?>