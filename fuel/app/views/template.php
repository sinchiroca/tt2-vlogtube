<?php
use Fuel\Core\Asset;
?>

<!DOCTYPE HTML>
<html>
    <head>
    <title>
        <?php if (isset($page_title)) {
            echo $page_title;
        }
        if (isset($title)) {
            echo $title;
        }
        ?>
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php echo Asset::js('bootstrap.min.js'); ?>
    <?php echo Asset::css('bootstrap.min.css'); ?>
    </head>

<body>

<div class="container-fluid">
<div class="row-fluid">

<div class="span10">
<div class="page-header" align="center">
<h2>
    VlogTube Videoblog Portal
</h2>
</div>
    <div class="span2">
  <?php if (isset($page_sidebar)) {echo $page_sidebar;} ?>
</div>
    <div class="container" align="center">
        <?php if (isset($page_content)) {echo $page_content;} ?>
        <?php if (isset($content)) {echo $content;} ?>
    </div>
    
    <div class="span9" id="search">
        <?php echo $page_search; ?>
    </div>
    
    <?php if (Session::get_flash('error')): ?>
    <div class="alert-message error" align="center">
    <p>
        <?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
    </p>
    </div>
<?php endif; ?>
    
    	<?php if (Session::get_flash('success')): ?>
<div class="alert-message success">
<p>
<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
</p>
</div>
<?php endif; ?>

</body>
</html>