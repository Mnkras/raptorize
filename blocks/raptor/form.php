<?php defined('C5_EXECUTE') or die("Access Denied.");?>

<script type="text/javascript">
$('#entrance').change(function(){
	if ($(this).val() == 'timer')/*if the value is timer*/
	{
		$('#timer').show();/*show the div*/
	} else {
		$('#timer').hide();/*hide the div*/
	}

	if ($(this).val() == 'click')/*if the value is click*/
	{
		$('#button').show();/*show the div*/
	} else {
		$('#button').hide();/*hide the div*/
	}

	if ($(this).val() == 'konami-code')/*if the value is konami-code*/
	{
		$('#code').show();/*show the div*/
	} else {
		$('#code').hide();/*hide the div*/
	}
});
</script>

<label class="control-label" for="entrance"><?php    echo t('Raptor Entrance Type') ?>:</label>
<select id="entrance" name="entrance">
	<option value="konami-code" <?php    echo ($entrance == "konami-code"?'selected':'')?> >On Konami-Code</option>
	<option value="timer" <?php    echo ($entrance == "timer"?'selected':'')?> >Timer</option>
	<option value="click" <?php    echo ($entrance == "click"?'selected':'')?> >On Click</option>
</select>
<br /><br />
<div id="timer" <?php    if($entrance != 'timer'){?>style="display:none;"<?php    } ?>>
	<label class="control-label" for="timer"><?php    echo t('Time (in milliseconds)') ?>:</label>
	<input type="text" style="width: 150px" name="time" value="<?php    echo $controller->time ?>"/>
</div>
<div id="button" <?php    if($entrance != 'click'){?>style="display:none;"<?php    } ?>>
	<label class="control-label" for="button"><?php    echo t('Button Text') ?>:</label>
	<input type="text" style="width: 150px" name="buttontext" value="<?php    echo $controller->buttontext ?>"/>
</div>
<div id="code" <?php    if($entrance != 'konami-code'){?>style="display:none;"<?php    } ?>>
	<p>The Konami-Code is as follows: &uarr; &uarr; &darr; &darr; &larr; &rarr; &larr; &rarr; B A.</p>
</div>
