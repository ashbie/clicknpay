<?php  if (count($errors) > 0) : ?>
	<div class='alert alert-warning alert-dismissible fade show' role='alert'>
	<strong>
		<?php foreach ($errors as $error) : ?>
			<p><?php echo $error ?></p>
		<?php endforeach ?>
	</strong>
	</div>
<?php  endif ?>
