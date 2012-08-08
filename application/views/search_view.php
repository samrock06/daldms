<div class="row" id="search-bar">
  <div class="twelve mobile-four columns">
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
<div class="row" id="inner-page-wrap">
  <div class="three mobile-four columns">
  	<?php
  		$list = $this->session->userdata('search');
			echo heading('Search History', 6)."\n";
  		echo ul($list)."\n";
  	?>
  </div>
  <div class="nine mobile-four columns" id="outline">
  	<?php 
      echo heading('Search Results', 4)."\n";
  		echo ul($list)."\n";
  		echo '<br>'."\n";
  		echo $this->pagination->create_links()."\n";
  	?>
  </div>
</div>
