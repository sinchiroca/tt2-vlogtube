    <?php echo Asset::js('bootstrap.min.js'); ?>
    <?php echo Asset::css('bootstrap.min.css'); ?>
<?php Lang::load("account"); ?>
<?php
echo Form::open('account/simpleauth');
echo Form::fieldset_open(null, __('VIEW_SIMPLEAUTH_TITLE'));
?>

<label for="username"><?php echo __('VIEW_SIMPLEAUTH_USER'); ?></label>
<input type="text" name="username" id="username" />
<label for="password"><?php echo __('VIEW_CREATE_PASSW'); ?></label>
<input type="password" name="password" id="password" /><br>
<input type="Submit" value="<?php echo __('VIEW_SIMPLEAUTH_SUBMIT'); ?>" class="btn btn-primary" />
<?php
echo Form::fieldset_close();
echo Form::close();
?>

<div id="register" align="center">
    
<?php
    echo Html::anchor("account/create", __('VIEW_SIMPLEAUTH_REGISTER_REDIRECT'));
    ?>
   
</div>
