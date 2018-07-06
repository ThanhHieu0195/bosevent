<?php
namespace includes\classes;

class TaxonomyType extends PostType {
	public function getObjectRelate() {
		return '';
	}

	public function registerPostType() {
		$name = $this->getName();
		$configs = $this->getConfigs();
		$object_name = $this->getObjectRelate();
		register_taxonomy($name, $object_name, $configs);
	}
}