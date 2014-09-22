<?php
defined('C5_EXECUTE') or die("Access Denied.");

$c = Page::getCurrentPage();

if($c->isEditmode() && $entrance != 'click') { //if we are in editmode and the entrance type is not click, we are going to show something so that the block isn't invisble?>
	<div class="ccm-edit-mode-disabled-item">
		<div style="padding:8px 0px;"><?php    echo t('Raptorize Block'); ?></div>
	</div>
<?php    }
if($entrance == 'click') {//if the entrance type is equal to click show the button
echo '<input type="button" value="' . $buttontext . '" id="raptorize-' . $bID . '" class="raptorize">';
} ?>
