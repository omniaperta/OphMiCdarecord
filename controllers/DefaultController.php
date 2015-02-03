<?php
/**
 * @package  OpenEyes-OphMiCdarecord
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

namespace OEModule\OphMiCdarecord\controllers;
use Yii;
use \OEModule\OphMiCdarecord\models;


class DefaultController extends \BaseEventTypeController
{
	
	/**
	 * Returns the xslt processor for transforming CDA to HTML 
	 */
	private function getMessageXSLT() {
		$xsl = new \DOMDocument();
		
		error_reporting(-1);
		$xsl->load(Yii::getPathOfAlias('application.modules.'.$this->getModule()->name.'.xsl') . "/cda.xsl");
	
		$proc = new \XSLTProcessor();
		
		$proc->importStylesheet($xsl);
		$proc->substituteEntities = false;
		return $proc;
	}
	
	/**
	 * returns the CDA from the given element as an HTML document
	 * 
	 * @param Element_OphMiCdarecord_Document  $element
	 */
	public function getHTMLCDA(models\Element_OphMiCdarecord_Document $element) {
		
		$xml = $element->getCdaDOM();
	
		return utf8_encode($this->getMessageXSLT()->transformToXML($xml));
	}
}
