<?php
/**
 * @package  OpenEyes-OphMiCdarecord
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

?>

<?php $this->renderPartial('//print/event', array(
	'hide_modified' => @$hide_modified,
	'hide_created' => @$hide_created
));?>
