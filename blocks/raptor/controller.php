<?php
	namespace Concrete\Package\Raptorize\Block\Raptor;
	defined('C5_EXECUTE') or die("Access Denied.");

	use \Concrete\Core\Block\BlockController;
	use Page;
	use Loader;
	use BlockType;

	class Controller extends BlockController {

		protected $btInterfaceWidth = 300; //edit dialog width
		protected $btInterfaceHeight = 320; //edit dialog height
		protected $btTable = 'btRaptor'; //table name

		public function getBlockTypeDescription() {
			return t("A totally useless block that is terribly amusing.");//description
		}

		public function getBlockTypeName() {
			return t("Raptor");//name
		}

		public function save($args) {//save
			$args['entrance'] = ($args['entrance'] != '') ? $args['entrance'] : 'konami-code'; //click konami-code timer
			$args['time'] = ($args['time'] != '') ? $args['time'] : '5000'; //time in milliseconds
			$args['buttontext'] = ($args['buttontext'] != '') ? $args['buttontext'] : 'Rawr!!'; //Rawr!
			parent::save($args);
		}

		public function view() {
			$b = $this->getBlockObject();
			$btID = $b->getBlockTypeID();
			$bt = BlockType::getByID($btID);
			$c = Page::getCurrentPage();
			$url = Loader::helper('concrete/urls');

			if(!$c->isEditmode()) {//if it isn't editmode add the javascript
				ob_start();
				?>
				<script type="text/javascript">
						$(window).load(function() {
						<?php    if($this->entrance == 'click') { //if the entrance is click we have to hook it up to the button
							echo '	$(\'#raptorize-' . $this->bID . '\').raptorize({';
						} else {
							echo '	$(\'body\').raptorize({';//if not then we use the body tag
						} ?>

								enterOn : "<?php echo $this->entrance ?>",
								<?php if($this->entrance == 'timer') {//only if the entrance is time then we add that option ?>

								delayTime : "<?php echo $this->time ?>",
								<?php    } ?>

								img : "<?php    echo $url->getBlockTypeAssetsURL($bt);?>/raptor.png",<?php    //paths to all the files ?>

								mp3 : "<?php    echo $url->getBlockTypeAssetsURL($bt);?>/raptor-sound.mp3",
								ogg : "<?php    echo $url->getBlockTypeAssetsURL($bt);?>/raptor-sound.ogg"
							});

						});
				</script>
				<?php
				$buff = ob_get_contents();
				$this->addFooterItem($buff);
				ob_end_clean();
			}

		}

		public function showBlockView() {
			if($this->entrance == 'click') {
				return true;
			} else {
				return false;
			}
		}
	}
