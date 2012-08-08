<div class="row" id="search-bar">
  <div class="nine mobile-four columns">
    <h5>Welcome!</h5>
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
      <?php echo form_open('user/search')."\n";?>
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
      <div id="featured">
        <img src="<?php echo $base_url;?>images/featured.png" />
        <img src="<?php echo $base_url;?>images/featured1.png" />
        <img src="<?php echo $base_url;?>images/featured2.png" />
        </div>
      </div>
<div class="row" id="inner-page-wrap">
  <div class="nine mobile-four columns" id="welcome">
    <h4>Central Repository for Associate Universities.</h4>
    <div class="row">
      <div class="five columns">
        <img src="http://placehold.it/260x180" alt="">
      </div>
      <div class="seven columns">
        <h5>Some Random Post</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.   
          <a href="">Read More >></a>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="five columns">
        <img src="http://placehold.it/260x180" alt="">
      </div>
      <div class="seven columns">
        <h5>Some Random Post</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
          <a href="">Read More >></a>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="five columns">
        <img src="http://placehold.it/260x180" alt="">
      </div>
      <div class="seven columns">
        <h5>Some Random Post</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
          <a href="">Read More >></a>
        </p>
      </div>
    </div>
  </div>
  <div class="three mobile-four columns">
    <?php //echo $profile_image;?>
    <ul class="side-nav">

    </ul>
  </div>
</div>