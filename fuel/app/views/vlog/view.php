<h2><?php echo $vlog->video_name ?></h2>
<iframe width="420" height="315" align="center" src=<?php echo $vlog->video_url ?> frameborder="0" allowfullscreen></iframe>
<p>
    <strong>Description:</strong>
    <?php
    echo ($vlog->video_descr) ? htmlspecialchars_decode($vlog->video_descr) : "(no description)";
    ?>
</p>
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

