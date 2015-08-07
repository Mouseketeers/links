<?php 
class Links extends DataExtension {	
	private static $label = 'Show as link';
	private static $db = array(
		'ShowAsLink' => 'Boolean'
	);
	public function UpdateSettingsFields($fields) {
		$fields->addFieldToTab('Root.Settings',
			new CheckboxField('ShowAsLink',self::$label),
			'ShowInSearch'
		);
		return $fields;
	}
	public function setLabel($label) {
		self::$label = $label;
	}
	public function getLinks() {
		$links = DataObject::get(
			$class_name = 'Page',
			$where = 'ShowAsLink = 1',
			$sort = 'Sort'
		);
		return $links;
	}
	public function LinkingMode() {
		if($this->owner->isCurrent()) {
			return 'current';
		} else {
			return 'link';
		}
	}
}