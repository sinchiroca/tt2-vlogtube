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
	    <h1><a href="/">&laquo;VlogTube&raquo;: Video Diary Portal.</a></h1>	   
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
                    <div class="span2">
                        <aside id="auth">	    
                            <?php
                            $auth = Auth::instance();
                            $user_id = $auth->get_user_id();
                            if ($user_id[1] != 0) :
                                ?>
                            <div id="logged-in">
                                Logged in as <?php echo $auth->get_email(); ?>
                            </div>
                            <div id="logout">
                                    <?php
                                    echo Html::anchor("account/logout", "Log out");
                                    ?>
                            </div>
                                <?php
                            else :
                                echo Html::anchor("account/simpleauth", "Would You like to log in?");
                                ?>
                            <?php
                            endif;
                            ?>
                        </aside>
                        <?php
                            if (isset($content)) {
                                echo $content;
                            };
                        ?>
                    </div>
                    <div class="span5">                        
                        <?php
                            if (isset($page_content)) {
                                echo $page_content;
                            };
                         ?>
                    </div>
                    <div class="span2">
                        //THIS part is devoted for SEARCH
                    </div>
                </div>
            </div>
	</section>
    </body>
</html>
