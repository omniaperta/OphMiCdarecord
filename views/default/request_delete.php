<?php
/**
 * @package  OpenEyes-OphMiCdarecord
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

 ?>
<?php $this->beginContent('//patient/event_container')?>

	<h2 class="event-title"><?php echo $this->event_type->name ?></h2>

	<?php echo CHtml::form(array('Default/requestDeletion/'.$this->event->id), 'post', array('id' => 'deleteForm'))?>	<div id="delete_event">
		<h3>Request event deletion</h3>
		<div class="alert-box issue with-icon">
			<strong>This will send a request to delete the event to an admin user.</strong>
		</div>
		<?php $this->displayErrors($errors)?>		<div style="width:300px; margin-bottom: 0.6em;">
			<p>Reason for deletion:</p>
			<?php echo CHtml::textArea('delete_reason','')?>		</div>
		<p>
			<strong>Are you sure you want to proceed?</strong>
		</p>
		<?php echo CHtml::hiddenField('event_id', $this->event->id)?>		<button type="submit" class="warning" id="et_deleteevent" name="et_deleteevent">
			Request deletion
		</button>
		<button type="submit" class="secondary" id="et_canceldelete" name="et_canceldelete">
			Cancel
		</button>
		<img class="loader" src="<?php echo Yii::app()->createUrl('img/ajax-loader.gif')?>" alt="loading..." style="display: none;" />
		<?php echo CHtml::endForm()?>	</div>

<?php $this->endContent() ?><script type="text/javascript">
	$('#delete_reason').focus();
</script>
