<?php 
class Links extends DataObjectDecorator {	
	public static $label = 'Show as link';
	function extraStatics() {
		return array(
			'db' => array(
				'ShowAsLink' => 'Boolean'
			)
		);
	}
	function updateCMSFields(&$fields){
		$fields->addFieldToTab('Root.Behaviour',
			new CheckboxField('ShowAsLink',self::$label), 'ShowInSearch'
		);
		return $fields;
	}
	public function setLabel($label) {
		self::$label = $label;
	}
	public function getLinks() {
		$links = DataObject::get(
			$class_name = 'Page',
			$where = 'ShowAsLink = 1'
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