<?php      	
	defined('C5_EXECUTE') or die(_("Access Denied."));	
	class RaptorBlockController extends BlockController {

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
	}

?>