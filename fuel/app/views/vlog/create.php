<h2><?php echo __('NEW_VLOG_TITLE'); ?></h2>

<script type="text/javascript">
    $(document).ready(
    function(){
	$("#start").datetimepicker({
	    showSecond: false,
	    timeFormat: 'HH:mm:ss',
	    dateFormat: 'yy-mm-dd',
	    showOn: "button",
	    buttonImage: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABsAAAAWCAMAAAAGlBe5AAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAGAUExURfP+/4SbxMra+qSmuPr9/9fY+LzX+8axynWu+lBqtbnL68KntPHt/trz/1iL82eb/87F1+v+/6fFzZqrxS1htZdxgev0/5yz0qitv4Sk1Ozp/OLs/qm81Km4yDZtxpOs0LXN9FZ9w+X7/9nt/8zj/kxadFRphJmyxeL0/4qixqLI/3BNV4i5/Gh6kOPn/4OduLzn//7j7cDP4XyUverb7ZeZu9rY65qpsJnE/67F6vvX5qyGlOnZ99Po+uXI14enuSpDZIhrgT1YeP3y+4yw1n6i/4yIqJmzuszq/vT1/2h/m1h5qmaIy7q80vHI1Nvh+aS94MTh/qSZsdDf8LGpx/va3HqTr5mbrFSG32WBtzhTatPl/4SRpnWMtYCb0uvg8zFLbIeNnpW4+snO9q7T//Ly9muWz01lgLXT6DZPdClDWqaw07Kyzp+OoFxGW3ldcRdGYFU/VO7U4Oq7vv/RzCM9Yn6js+Dq+G2Fq22UsXV+nitXdICu4pG138bG4P39/U40qcsAAAIgSURBVHjadM5pV9pQEAbgIQRUJIVL5AYSwhJiSUABjaEioilaIAoGXBA3xIIL2kqrbW1tbf66tz+gz8x5P8ycOWfA/j+4oIWLJ/qCt8e29xmjawm9RTAL0jWD4OXlJbwZDvd64aNeI3HVmGpMEY2pRGIG/uSJ9PJw+DG9PDlHyvfhH5/vTRTC9WF+OMyn02Q3N7fcnSTTro+YjEJLc6hnqubQtKOj3vb2VSIa7UZnoqRnwEmbtN00MQaPAGaWlSSg7rAiM5vb4L+0vXaTt2kcorFp7pv2ZcFZoC2KvQaRxrYZokFJphBY1qHJewtVrzAoqhUIIADLKSDmZr2uZAu750vn/qprMOC0EdQCotjUI5HU+o9AKuT8PF0KBscT+7r+bEBAQjjbVJCUDzDYXJpeONhZe7+66qLYCrwD2vbu04CYmmRvLJQWiPtV/qS9+RtqIJCdLZTLNbzxsFI6OFh7+MpnPa1fXyCFMD/Qs4J8k9vjV3aCj992HjNr/r+R3DGsR1hdr96xuVxHdO6WxplxJnM/saufzt9CCARAIk6WGS5JuaxPLstl3VGUJ84Z5BcARVQUheGYZFLm5Hq7HXNT8WLMgEMMaI9NMrJblU+oYqddd8fVuDveUg1wPuHyIivLlEeVZXcr527HW44iOdP6IC4uimyHi+U6WzG1Q4JTtbNYzPFzawSn8/Ozx7fHRt8wKiOS/b7x3Rj1jVGl/yrAAB1dfRd6NP7oAAAAAElFTkSuQmCC",
	    buttonImageOnly: true});
	   
    });
</script>
<script src="http://cdn.aloha-editor.org/latest/lib/aloha.js"
	data-aloha-plugins="common/ui,
	common/format,
	common/list,
	common/link">
</script>
<script>
    Aloha.ready( function() {
	var $ = Aloha.jQuery;
	$('#description').aloha();
    });
</script>

<?php Lang::load("vlog"); ?>

<?php echo Form::open('vlog/create'); ?>
<fieldset>

    <div class="clearfix">
	<?php echo Form::label(__('ADD_VLOG'), 'video_name'); ?>

	<div class="input">
	    <?php
	    echo Form::input('video_name', Input::post('video_name', isset($vlog) ? $vlog->video_name : ''), array("class" => "span4")
	    );
	    ?>
	</div>
    </div>
    <div class="clearfix">
	<?php echo Form::label(__('ADD_VLOG_LINK'), 'video_url'); ?>

	<div class="input">
	    <?php
	    echo Form::input('video_url', Input::post('video_url', isset($vlog) ? $vlog->video_url : ''), array("class" => "span4")
	    );
	    ?>
	</div>
    </div>
    <div class="clearfix">
	<?php echo Form::label(__('ADD_VLOG_DESCR'), 'description'); ?>

	<div class="input">
	    <?php
	    echo Form::textarea('video_descr', Input::post('video_descr', isset($vlog) ? $vlog->video_descr : ''), array("video_descr" => "video_descr", "rows" => 4, "class" => "span4"));
	    ?>
	</div>
    </div>

</fieldset>	
<div class="actions">

    <?php echo Form::submit('submit', __('ADD_VLOG_SUBMIT'), array('class' => 'btn btn-primary')); ?>

</div>
<?php echo Form::close() ?>
