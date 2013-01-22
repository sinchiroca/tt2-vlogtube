<?php Lang::load("account"); ?>
<?php
echo Form::open();
echo Form::fieldset_open(null, __('VIEW_CREATE_TITLE'));
?>

<label for="usermail"><?php echo __('VIEW_CREATE_EMAIL'); ?></label>
<input type="text" name="usermail" id="usermail" />

<label for="password"><?php echo __('VIEW_CREATE_PASSW'); ?></label>
<input type="password" name="password" id="password" />

<label for="password_rep"><?php echo __('VIEW_CREATE_PASSW_AGAIN'); ?></label>
<input type="password" name="password_rep" id="password_rep" /><br>

<input type="Submit" value="<?php echo __('VIEW_CREATE_SUBMIT'); ?>" class="btn btn-primary" />
<?php
echo Form::fieldset_close();
echo Form::close();
?>

<div id="login" align="center">
<?php
    echo Html::anchor("/", __('VIEW_CREATE_LOGIN_REDIRECT'));
    ?>
</div>
