<h2><?php echo $vlog->video_name ?></h2>

<p>
    <strong>Description:</strong>
    <?php
    //Stupid hack. Since FuelPHP encodes everything, 
    //even HTML content coming from Aloha editor.
    //hence we have to decode "htmlspecialchars" to avoid
    //double encoding
    echo ($vlog->video_descr) ? htmlspecialchars_decode($vlog->video_descr) : "(no description)";
    ?></p>
<p>
