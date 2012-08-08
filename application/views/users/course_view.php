<div class="row" id="search-bar">
  <div class="nine mobile-four columns">
    <h5><?php 
          $segment = $this->uri->segment(3);
          if(!empty($segment)){
            for($i=0; $i < count($course_info); $i++){
              if($course_info[$i]['c_id'] === $segment){
                echo $course_info[$i]['code'].' - '.$course_info[$i]['name'].".\n";
              }
            }
          }
          else{
            echo $user_title.' '.$firstname.' '.$lastname."\n";
          }
        ?>
    </h5>
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
  </div>
  <div class="nine mobile-four columns" id="outline">
      <?php echo $single_course;?>
  </div>
</div><!-- End of list Row -->