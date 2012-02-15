<?php      
defined('C5_EXECUTE') or die(_("Access Denied."));

/**
*
* Raptorize Package.
* @author Michael Krasnow <mnkras@gmail.com>
* @author c5Rockstars <hello@c5rockstars.com>
* @link http://www.c5rockstars.com
* @license http://creativecommons.org/licenses/by/3.0/ CC 3.0 Unported
*
*/

class RaptorizePackage extends Package {

	protected $pkgHandle = 'raptorize';
	protected $appVersionRequired = '5.4.0';
	protected $pkgVersion = '1.0.2';
	
	public function getPackageDescription() {
		return t("Totally pointless amazing block.<br />Brought to you by http://c5rockstars.com!");
	}
	
	public function getPackageName() {
		return t("Raptorize");
	}
	
	public function install() {
		$pkg = parent::install();
		
		BlockType::installBlockTypeFromPackage('raptor', $pkg);	
	}
}