<ul>
    <?php foreach ($comments as $comment) : ?>
    <li> <?php if (isset($comment[1])) { echo "Author: ".$comment[1];} ?></li>
    <li> <?php echo ($comments[0]->comment_descr) ? htmlspecialchars_decode($comments[0]->comment_descr) : "(no comments)"; ?> </li>
    <li> <?php echo "Date: ".($comments[0]->comment_post_date); ?></li>
    
    <?php endforeach; ?> 
    
</ul>
<?php if (Auth::has_access("comments.create")) : ?>
    <p>
	<?php
	$html = render("comments/create", array('id'=>$comment->comment_video_id)); 
        echo $html;  
	?>
    </p>
<?php endif?>
