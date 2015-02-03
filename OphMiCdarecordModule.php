<?php
/**
 * @package  OpenEyes-OphMiCdarecord
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

 /* The followings are the available columns in table:
 * @property string $moduleShortSuffix
 * @property string $controllerNamespace
 */

namespace OEModule\OphMiCdarecord;

class OphMiCdarecordModule extends \BaseEventTypeModule
{
	// this property is really only relevant to gii auto-generation, specifically
	// for updates to the module through gii
	public $moduleShortSuffix;

	public $controllerNamespace = '\OEModule\OphMiCdarecord\controllers';

	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'OphMiCdarecord.models.*',
			'OphMiCdarecord.components.*',
		));

		$this->moduleShortSuffix = "cdarecord";
	}

	public function beforeControllerAction($controller, $action)
	{
		if (parent::beforeControllerAction($controller, $action)) {
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		} else
			return false;
	}
}
