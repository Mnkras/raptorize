<?php
defined('C5_EXECUTE') or die("Access Denied.");
$b = $controller->getBlockObject();
$btID = $b->getBlockTypeID();
$bt = BlockType::getByID($btID);
$url = Loader::helper('concrete/urls');
$c = Page::getCurrentPage();

if($c->isEditmode() && $entrance != 'click') { //if we are in editmode and the entrance type is not click, we are going to show something so that the block isn't invisble?>
	<div class="ccm-edit-mode-disabled-item">
		<div style="padding:8px 0px;"><?php    echo t('Raptorize Block'); ?></div>
	</div>
<?php    }
if($entrance == 'click') {//if the entrance type is equal to click show the button
echo '<input type="button" value="' . $buttontext . '" id="raptorize-' . $bID . '" class="raptorize">';
} ?>
<?php    if(!$c->isEditmode()){//if it isn't editmode show the javascript?>
<script type="text/javascript">
		$(window).load(function() {
		<?php    if($entrance == 'click') { //if the entrance is click we have to hook it up to the button
			echo '	$(\'#raptorize-' . $bID . '\').raptorize({';
		 } else {
			echo '	$(\'body\').raptorize({';//if not then we use the body tag
		 } ?>

				enterOn : "<?php    echo $entrance ?>",
				<?php    if($entrance == 'timer') {//only if the entrance is time then we add that option ?>

				delayTime : "<?php    echo $time ?>",
				<?php    } ?>

				img : "<?php    echo $url->getBlockTypeAssetsURL($bt);?>/raptor.png",<?php    //paths to all the files ?>

				mp3 : "<?php    echo $url->getBlockTypeAssetsURL($bt);?>/raptor-sound.mp3",
				ogg : "<?php    echo $url->getBlockTypeAssetsURL($bt);?>/raptor-sound.ogg"
			});

		});
</script>
<?php    } ?>
