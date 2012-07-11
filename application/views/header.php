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
  <?php echo link_tag('stylesheets/body.css')."\n";?>
  <link href='http://fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>

  <!-- Included JS Files -->
  <?php foreach ($scripts as $script): ?>
  <script type='text/javascript' src = '<?php echo $base_url.$script;?>'></script>
  <?php endforeach;?>
  <script type="text/javascript">
  function removeHash () { 
    history.pushState("", document.title, window.location.pathname + window.location.search);
  }
  </script>
	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body onload = removeHash();>
<!--=====================================
  HEADER SECTION
======================================-->
<header id="header">
  <div class="container">
    <div class="row">
      <div class="twelve mobile-four columns" id="navigation">
        <ul class="branding">
          <li><?php 
            $attr = array(
              'title' => 'Brand',
              'class' => 'brand'
            );
            echo anchor('/','DalDMS', $attr);
            ?>
          </li>
        </ul>
        <ul class="nav">
          <?php
            $class=array(
                'class'=>'icons'
              );
          ?>
          <li><?php echo anchor('profile','U', $class);?></li>
          <li><?php echo anchor('settings','S',$class);?></li>
          <li><?php echo anchor('questions','?',$class);?></li>
          <li><?php echo anchor('oauth/logout','X',$class);?></li>
        </ul>
      </div>
    </div>
  </div>
</header>