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
<body>
<body onload = removeHash();>
<!--=====================================
  HEADER SECTION
======================================-->
<header id="header">
  <div class="container">
    <div class="row">
      <div class="nine mobile-four columns" id="navigation">
        <ul class="nav hide-on-phones">
          <li class="user-details"><?php echo $firstname.' '.$lastname.' ('.ucfirst($status).')';?></li>
          <li class="nav-divider"></li>
          <li><a href="<?php echo $base_url;?>u/"><span class="raphael">S</span> Home</a></li>
          <li><a href="<?php echo $base_url;?>u/profile"><span class="raphael">L</span> Profile</a></li>
          <li><a href="<?php echo $base_url;?>u/course"><span class="raphael">Û</span> Course</a></li>
          <li><a href="<?php echo $base_url;?>oauth/logout"><span class="raphael">Ï</span> Logout</a></li>
        </ul>
      </div>
      <div class="three mobile-four columns" id="navigation">
        <ul class="branding">
          <li><?php 
            $attr = array(
              'title' => 'Brand',
              'class' => 'brand',

            );
            echo anchor('/','DalDMS', $attr);
            ?>
          </li>
          <li class="mobile-logout"><a href="<?php echo $base_url;?>oauth/logout"><span class="raphael">Ï</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</header>