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
	private function getMessageXSLT() {
		$xsl = new \DOMDocument();
		
		error_reporting(-1);
		/*
		$xsl->substituteEntities = true;
		$xml = file_get_contents(Yii::getPathOfAlias('application.modules.'.$this->getModule()->name.'.xsl') . "/cda.xsl");
		$xml = str_replace("&", "&amp;", $xml);
		$xsl->loadXML($xml);
		*/
		$xsl->load(Yii::getPathOfAlias('application.modules.'.$this->getModule()->name.'.xsl') . "/cda.xsl");
	
		$proc = new \XSLTProcessor();
		
		$proc->importStylesheet($xsl);
		$proc->substituteEntities = false;
		return $proc;
	}
	
	public function getHTMLCDA($element) {
		
		$xml = $element->getCdaDOM();
	
		return $this->getMessageXSLT()->transformToXML($xml);
	}
}
