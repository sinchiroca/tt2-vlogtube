<? echo Form::open(array('class'=>'well form-horizontal span4','action'=>'/form/send')) ?>
<!DOCTYPE HTML>
<html>
<legend>Login or register to portal</legend>
<fieldset>

<div class="control-group">

<div class="controls">
    <label>Login using your username and password</label>
    <? echo Form::input('username'); ?><br>
    <? echo Form::password('password'); ?>
</div>
</div>
<div class="control-group">
<div class="controls">
<input type="submit" name="submit" class="btn btn-primary btn-large" value="Login">
</div>
</div>
    
<div class="control-group">

<div class="controls">
    <label>Register, if you don't have an account</label>
    <? echo Form::input('username'); ?><br>
    <? echo Form::password('password'); ?>
</div>
</div>
<div class="control-group">
<div class="controls">
<input type="submit" name="submit" class="btn btn-primary btn-large" value="Register">
</div>
</div>
    
</fieldset>
</form>

</html>
