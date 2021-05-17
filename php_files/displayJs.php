<?php  if (count($js_manipulate) > 0) : ?>
  	<?php foreach ($js_manipulate as $manipulation) : ?>
  	  <p><?php echo "<script>$manipulation</script>" ?></p>
  	<?php endforeach ?>
<?php  endif ?>