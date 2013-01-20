<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php
if (isset($page_title)) {
    echo $page_title;
}
if (isset($title)) {
    echo $title;
}
?></title>
	<?php
	if (isset($libs_js)) {
	    //some views may want to add extra scripts
	    echo Asset::js($libs_js);
	}
	?>

	<?php echo Asset::css('bootstrap.css'); ?>
	<?php
	if (isset($libs_css)) {
	    //some views may want to add extra stylesheets
	    echo Asset::css($libs_css);
	}
	?>
    </head>
    <body>
	<header>
	    <h1><a href="/">&laquo;VlogTube&raquo; : video diary portal.</a></h1>
	    <h3><?php
                if (isset($page_title)) {
                    echo $page_title;
                }
                if (isset($title)) {
                    echo $title;
                }
            ?></h3>	   
	</header>
	<section id="main">
	    <div class="row">
		<?php if (Session::get_flash('success')): ?>
    		<div class="alert-message success">
    		    <p>
			    <?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
    		    </p>
    		</div>
		<?php endif; ?>
		<?php if (Session::get_flash('error')): ?>
    		<div class="alert-message error">
    		    <p>
			    <?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
    		    </p>
    		</div>
		<?php endif; ?>
	    </div>

            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span5">
                        abcdefgha
                    </div>
                    <div class="span2">
                        <?php
                            if (isset($page_content)) {
                                echo $page_content;
                            };
                         ?>
                    </div>
                    <div class="span5">
                        //THIS part is devoted for SEARCH
                    </div>
                </div>
            </div>
	</section>
    </body>
</html>
