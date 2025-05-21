<?php
if ( isset( $errMsg ) ) :
?>
<div class="p-3 mb-2 bg-danger text-white"><?php echo $errMsg ?></div>
<?php endif ?>

<?php
if ( isset( $successMsg ) ) :
	?>
	<div class="p-3 mb-2 bg-success text-white"><?php echo $successMsg ?></div>
<?php endif ?>
