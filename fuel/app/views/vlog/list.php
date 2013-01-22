<?php if (Auth::has_access("vlog.create")) : ?>
    <p>
	<?php
	echo Html::anchor("/vlog/create/", "Add Vlog", array("class" => "btn btn-primary", "align" => "centre"))
	?>

    </p>
<?php endif?>
<?php foreach ($video_model as $vlog) : ?>
    <h3>
    <?php if ($vlog->video_report == 0) : ?> 
        <?php echo Html::anchor("vlog/view/" . $vlog->video_id, $vlog->video_name, array("align" => "center")); ?>
        <p>
        <iframe width="420" height="315" align="center" src=<?php echo $vlog->video_url ?> frameborder="0" allowfullscreen></iframe>
        </p>
        <?php echo Html::anchor('vlog/delete/' . $vlog->video_id, '<i class="icon-remove"></i> Delete this vlog', array("class" => "btn", "onclick"=>"return confirm('Really?');"));?>
        
     <?php endif ?></h3>
    
<?php endforeach; ?>
