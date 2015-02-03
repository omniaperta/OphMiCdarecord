<?php
/**
 * @package  OpenEyes-OphMiCdarecord
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

?>

<?php
$this->beginContent('//patient/event_container');?>

<div id="delete_event">
	<h3>Delete event</h3>
	<div class="alert-box alert with-icon">
		<strong>WARNING: This will permanently delete the event and remove it from view.<br><br>THIS ACTION CANNOT BE UNDONE.</strong>
	</div>
	<?php $this->displayErrors($errors)?>
	<div style="width:300px; margin-bottom: 0.6em;">
		<p>Reason for deletion:</p>
		<?php echo CHtml::textArea('delete_reason','')?>
	</div>
	<p>
		<strong>Are you sure you want to proceed?</strong>
	</p>
	<?php
		echo CHtml::form(array('Default/delete/'.$this->event->id), 'post', array('id' => 'deleteForm'));
		echo CHtml::hiddenField('event_id', $this->event->id);
	?>
	<button type="submit" class="warning" id="et_deleteevent" name="et_deleteevent">
		Delete event
	</button>
	<button type="submit" class="secondary" id="et_canceldelete" name="et_canceldelete">
		Cancel
	</button>
	<img class="loader" src="<?php echo Yii::app()->assetManager->createUrl('img/ajax-loader.gif')?>" alt="loading..." style="display: none;" />
	<?php echo CHtml::endForm()?>
</div>

<?php $this->endContent()?>