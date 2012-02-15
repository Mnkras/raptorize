<?php   
defined('C5_EXECUTE') or die(_("Access Denied."));

$controller->entrance = 'konami-code';
$controller->time = '5000';
$controller->buttontext = 'Rawr!!';

$this->inc('/form.php', array('controller'=>$controller)); //include the form.php file and pass the defaults
?>
