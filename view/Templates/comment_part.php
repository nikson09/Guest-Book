
	<?php foreach($cats as $cat) :?>
	<li class="media">	<div class="media-left">
                                  <a href="#">
                                    <img class="media-object img-circle" src="/Templates/avatar.png" alt="...">
                                  </a>
                                </div>
                                <div class="media-body">
                                  <div class="panel panel-info">
                                    <div class="panel-heading">
                                      <div class="author">	<?php echo $cat['name']; ?></div>
                                      <div class="metadata">
                                                      <span class="date"><?php echo $cat['date']; ?></span>
                                                    </div>
                                                  </div>
                                                  <div class="panel-body">
                                                    <div class="media-text text-justify"><p><?php echo $cat['text']; ?></p></div>
                                                    <div class="pull-right"><a class="btn btn-info reaply" id="<?php echo $cat['comment_id']; ?>" href="#">Ответить</a></div>
                                                  </div>
                                                </div>

                                           </div>
		<?php if(count($cat['children']) > 0) :?>
	<ul class="media-list">		<?php echo comment::renderTemplate(ROOT. '/view/Templates/comment_part.php',['cats'=>$cat['children']]); ?></ul>
	</li>
		<?php  endif; ?>

	<?php endforeach; ?>



