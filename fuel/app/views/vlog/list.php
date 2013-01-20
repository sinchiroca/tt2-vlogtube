<?php foreach ($vlog_model as $vlog) : ?>
    <h3><?php
    echo Html::anchor("vlog/view/" . $vlog->video_id, $vlog->video_name);
    ?></h3>
    <ul>
	<?php foreach ($vlog->comments as $comment) : ?>
            <li><?php echo $comment->users->username; ?></li>
	    <li><?php echo $comment->comment_descr; ?></li>
            <li><?php echo $comment->comment_post_date; ?></li>
	<?php
            endforeach;  
        ?>
    </ul>
<?php endforeach; ?>
