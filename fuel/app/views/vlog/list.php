<?php if (Auth::has_access("vlog.create")) : ?>
    <p>
	<?php
	echo Html::anchor("/vlog/create/", "Add Vlog", array("class" => "btn btn-primary", "align" => "centre"))
	?>

    </p>
<?php endif?>
<?php foreach ($video_model as $vlog) : ?>
    <h3><?php
    echo Html::anchor("vlog/view/" . $vlog->video_id, $vlog->video_name, array("align" => "center"));
    ?></h3>
<?php endforeach; ?>
