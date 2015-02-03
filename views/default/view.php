<?php
/**
 * @package OpenEyes-OphMiCdarecord
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
?>

<?php
if ($this->checkPrintAccess()) {
	$this->event_actions[] = EventAction::button('Print', 'print',null,array('class'=>'small button'));
}
$this->beginContent('//patient/event_container');
$this->moduleNameCssClass.=" highlight-fields";
?>

<?php if ($this->event->delete_pending) {?>
	<div class="alert-box alert with-icon">
		This event is pending deletion and has been locked.
	</div>
<?php }?>

<?php $this->renderOpenElements($this->action->id); ?>

<?php $this->endContent(); ?>
