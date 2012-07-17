<div class="row" id="search-bar">
  <div class="nine mobile-four columns">
    <h5>Profile - <?php echo $user_title.' '.$firstname.', '.$lastname."\n";?></h5>
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
    <img src="http://placehold.it/260x260" alt="">
    <ul class="course-edit">
      
    </ul>
    <ul class="side-nav">

  	</ul>
  </div>
</div>