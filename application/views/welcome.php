<?php echo doctype('html5');?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=$title;?></title>

	<!-- Set the viewport width to device width for mobile -->
 	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
 	<meta name="description" content="Document Management System for the engineering departments of the 7 atlantic universities." />
  <meta name="author" content="Dalhousie Engineering Department" />
  <meta name="copyright" content="Maavis, Group. Copyright (c) 2012" />

  <!-- Included CSS Files -->
  <?php echo link_tag('stylesheets/foundation.css')."\n";?>
  <?php echo link_tag('stylesheets/ie.css')."\n";?>
  <?php echo link_tag('stylesheets/app.css')."\n";?>

  <!-- Included JS Files -->
  <?php foreach ($scripts as $script): ?>
  <script type='text/javascript' src = '<?php echo $base_url.$script;?>'></script>
  <?php endforeach;?>

	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
<div class="container" id="login">
	<div class="row">
		<div class="six columns centered info">  
			<h1>DalDMS</h1>  
			<h6>Document Management System</h6>
      <?php
        $email = array(
          'name'=>'email',
          'type'=>'text',
          'placeholder'=>'John.smith@school.ca'
        );
        $password = array(
          'name'=>'password',
          'placeholder'=>'password'
        );
        $login = array(
          'name'=>'loginsubmit',
          'value'=>'.',
          'class'=>'medium radius button icons'
        );
        $forgot = array(
          'name'=>'forgotsubmit',
          'value'=>'Forgot Password?',
          'class'=>'medium radius secondary button'
        );
      ?>
      <?php echo form_open('oauth/login');?>
      <label>Email:</label>
			<div class="row">
  				<div class="twelve columns">
    				<div class="row collapse">
      					<div class="one mobile-one columns">
        					<span class="prefix icons">U</span>
      					</div>
      					<div class="eleven mobile-three columns">
        					<?php echo form_input($email);?>
      					</div>
    				</div>
  				</div>
			</div>
      <label>Password:</label>
			<div class="row">
  				<div class="twelve columns">
    				<div class="row collapse">
      					<div class="one mobile-one columns">
        					<span class="prefix icons">x</span>
      					</div>
      					<div class="eleven mobile-three columns">
        					<?php echo form_password($password);?>
      					</div>
    				</div>
  				</div>
			</div>
      <div class="row">
        <label for="radio1">
  <input name="radio1" type="radio" id="radio1" style="display:none;">
  <span class="custom radio"></span> Radio Button 1
</label>

<label for="radio2">
  <input name="radio1" type="radio" id="radio2" style="display:none;">
  <span class="custom radio checked"></span> Radio Button 2
</label>

<label for="radio3">
  <input name="radio1" type="radio" id="radio3" disabled style="display:none;">
  <span class="custom radio"></span> Radio Button 3
</label>
      </div>

      <?php echo form_submit($login);?>
      <?php echo anchor('#', 'Forgot your password?', 'title="Forgot password"');?>
      <?php //echo form_submit($forgot);?>
      <?php echo form_close();?>
		</div>
	</div>
</div>
</body>
</html>