    <?php echo Asset::js('bootstrap.min.js'); ?>
    <?php echo Asset::css('bootstrap.min.css'); ?>

<?php
echo Form::open('account/simpleauth');
echo Form::fieldset_open(null, "Please, login");
?>

<label for="username">User name</label>
<input type="text" name="username" id="username" />
<label for="password">Password</label>
<input type="password" name="password" id="password" /><br>
<input type="Submit" value="Log in" class="btn btn-primary" />
<?php
echo Form::fieldset_close();
echo Form::close();
?>

<div id="register" align="center">
    
<?php
    echo Html::anchor("account/create", "Not registered? Become a member!");
    ?>
   
</div>
