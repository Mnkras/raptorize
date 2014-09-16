<?php
namespace Concrete\Package\Raptorize;

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Block\BlockType\BlockType;

/**
*
* Raptorize Package.
* @author Michael Krasnow <mnkras@gmail.com>
* @license http://creativecommons.org/licenses/by/3.0/ CC 3.0 Unported
*
*/

class Controller extends \Concrete\Core\Package\Package {

	protected $pkgHandle = 'raptorize';
	protected $appVersionRequired = '5.7.0';
	protected $pkgVersion = '2.0';

	public function getPackageDescription() {
		return t("Totally pointless amazing block.");
	}

	public function getPackageName() {
		return t("Raptorize");
	}

	public function install() {
		$pkg = parent::install();

		BlockType::installBlockTypeFromPackage('raptor', $pkg);
	}
}
