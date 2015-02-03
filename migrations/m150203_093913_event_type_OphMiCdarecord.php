<?php 
/**
 * @package  OpenEyes-OphMiCdarecord
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

class m150203_093913_event_type_OphMiCdarecord extends CDbMigration
{
	public function up()
	{
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphMiCdarecord'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Miscellaneous'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphMiCdarecord', 'name' => 'CDARecord','event_group_id' => $group['id']));
		}
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphMiCdarecord'))->queryRow();

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Document',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Document','class_name' => 'OEModule\\OphMiCdarecord\\models\\Element_OphMiCdarecord_Document', 'event_type_id' => $event_type['id'], 'display_order' => 1, 'required' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Document'))->queryRow();



		$this->createTable('et_ophmicdarecord_document', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'cda' => 'text DEFAULT \'\'',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'deleted' => 'tinyint(1) unsigned not null',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophmicdarecord_document_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophmicdarecord_document_cui_fk` (`created_user_id`)',
				'KEY `et_ophmicdarecord_document_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophmicdarecord_document_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophmicdarecord_document_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophmicdarecord_document_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		$this->createTable('et_ophmicdarecord_document_version', array(
				'id' => 'int(10) unsigned NOT NULL',
				'event_id' => 'int(10) unsigned NOT NULL',
				'cda' => 'text DEFAULT \'\'', // cda
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'deleted' => 'tinyint(1) unsigned not null',
				'version_date' => "datetime NOT NULL DEFAULT '1900-01-01 00:00:00'",
				'version_id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'PRIMARY KEY (`version_id`)',
				'KEY `acv_et_ophmicdarecord_document_lmui_fk` (`last_modified_user_id`)',
				'KEY `acv_et_ophmicdarecord_document_cui_fk` (`created_user_id`)',
				'KEY `acv_et_ophmicdarecord_document_ev_fk` (`event_id`)',
				'KEY `et_ophmicdarecord_document_aid_fk` (`id`)',
				'CONSTRAINT `acv_et_ophmicdarecord_document_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `acv_et_ophmicdarecord_document_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `acv_et_ophmicdarecord_document_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophmicdarecord_document_aid_fk` FOREIGN KEY (`id`) REFERENCES `et_ophmicdarecord_document` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

	}

	public function down()
	{
		$this->dropTable('et_ophmicdarecord_document_version');
		$this->dropTable('et_ophmicdarecord_document');

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphMiCdarecord'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		$this->delete('element_type', 'event_type_id='.$event_type['id']);
		$this->delete('event_type', 'id='.$event_type['id']);
	}
}
