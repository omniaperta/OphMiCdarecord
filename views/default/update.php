<?php
/**
 * @package  OpenEyes-OphMiCdarecord
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

?>

<?php
$this->beginContent('//patient/event_container', array());?>

<?php
$form = $this->beginWidget('BaseEventTypeCActiveForm', array(
	'id'=>'update-form',
	'enableAjaxValidation'=>false,
	'layoutColumns' => array(
		'label' => 2,
		'field' => 10
	)
));

// Event actions
$this->event_actions[] = EventAction::button('Save', 'save', array('level' => 'save'), array('form'=>'update-form'));

?>

<?php $this->displayErrors($errors)?>
<?php $this->renderOpenElements($this->action->id, $form)?>
<?php $this->displayErrors($errors, true)?>

<?php $this->endWidget()?>

<?php $this->endContent()?>
