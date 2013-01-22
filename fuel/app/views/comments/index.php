<h3><?php 
    echo Html::anchor("vlog/view/".$vlog->vidoe_id, $vlog->video_name);
    ?>
</h3>
<p>
    <strong>Comments:</strong>
    <ul>
	<?php foreach ($vlog->comments as $comment) : ?>
            <li><?php echo $comment->comment_descr; ?></li>
            <li><?php echo "Post Date: ".$comment->comment_post_date; ?></li>
	    <?php
	endforeach; 
	?>
            <li><?php echo Html::anchor("/comments/create/".$vlog->video_id, "Add a Comment", array("class" => "btn btn-primary"));?></li>
    </ul>
</p> 