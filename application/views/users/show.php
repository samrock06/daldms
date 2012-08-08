<section id="content">
	<div class="container wrap">
		<?php 
      if (isset($fn))
      {
    ?>
      <h1><?php echo $fn . ' ' . $ln; ?></h1>
      
    <?php
      } else {
    ?>
      <h1>User not found</h1>
    <?php
      }
		?>
    <p><?php echo anchor('/users/edit/'.$id, 'Edit User', array('class' => 'button')); ?></p>
	</div>
</section>