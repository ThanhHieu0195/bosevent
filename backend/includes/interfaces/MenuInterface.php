<?php
namespace includes\interfaces;

abstract class MenuInterface {
	static $list_menu = array();

    private $configs;
    private $attributes;
    private $prefix = 'prefix_menu';

    public static function className()
    {
        return get_called_class();
    }

    public function __get($name)
    {
        if ( key_exists($name, $this->configs) ) {
            return $this->configs[$name];
        }

        if ( $this->checkAtrribute($name) ) {
            return $this->getAttribute($name);
        }

        return null;
    }

    public static function getInstance() {
        $class = self::className();
        if ( !in_array($class, self::$list_menu) ) {
            /** @var  $menu_item MenuInterface */
            $menu_item = new $class();
            $menu_item->configs = $menu_item->getConfigs();
            $menu_item->attributes = $menu_item->getAttributes();
            self::$list_menu[$class] = $menu_item;
        }
        return self::$list_menu[$class];
    }

	public function registerMenu() {
        add_menu_page($this->page_title, $this->menu_title, $this->capability, $this->menu_slug, [$this, 'callBackFunc'], $this->icon_url, $this->position);
    }

	public function getAttributes() {
        return array();
    }

    public function getConfigs() {
        return array(
            'page_title' => '',
            'menu_title' => '',
            'capability' => '',
            'menu_slug' => '',
            'icon_url' => '',
            'position' => '',
        );
    }
	public function callBackFunc() {
        return '';
    }

	public function saveAttribute($name, $value) {
    	if ( $this->checkAtrribute($name) ) {
		    update_option($this->prefix . $name, $value);
	    }
	}

	public function getAttribute($name) {
		return get_option($this->prefix . $name, '');
	}

	public function checkAtrribute($name) {
		if ( key_exists($name, $this->attributes) ) {
			return true;
		}
		return false;
	}

}