
<?php if(isset($cats)) :?>
	<?php echo comment::renderTemplate(ROOT . '/view/Templates/comment_part.php',['cats'=>$cats]); ?>
<?php endif; ?>
