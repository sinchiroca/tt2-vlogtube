<?php Lang::load("vlog"); ?>
<?php echo Form::open('vlog/search'); ?>
<fieldset>

    <div class="clearfix">
 <?php echo Form::label(__('SEARCH_FIELD'), 'search_keyword'); ?>

 <div class="input">
     <?php
                echo Form::input('search_keyword', Input::post('search_keyword', isset($vlog) ? $vlog->video_name : ''), array("class" => "span4")
     );

     ?>
          
 </div>
    </div>
</fieldset> 
<div class="actions">
    <?php echo Form::submit('submit', __('SEARCH_SUBMIT'), array('class' => 'btn btn-primary')); ?>
</div>