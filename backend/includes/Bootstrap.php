<?php
namespace includes;
use includes\classes\ConfigMenu;
use includes\classes\Helper;
use includes\classes\Hook;

include 'interfaces/ManagementInterface.php';
include 'interfaces/HookInterface.php';
include 'interfaces/HelperInterface.php';
include 'interfaces/PostTypeInterface.php';
include 'interfaces/MenuInterface.php';
include 'classes/Hook.php';
include 'classes/Helper.php';
include 'classes/Constants.php';
include 'classes/PostType.php';
include 'classes/TaxonomyType.php';
include 'classes/ProjectPostType.php';
include 'classes/ProjectCategory.php';
include 'classes/ConfigMenu.php';

/**
 * @property Helper $helper
 * @property Hook $hook
 * @property ConfigMenu $configs
 */
class Bootstrap implements interfaces\ManagementInterface {
	/**
	 * @var
	 */
	static $bootstrap;
	public $helper;
	public $hook;
	//public $configs;

	public static function init() {
		if ( empty(self::$bootstrap) ) {
			self::$bootstrap = new Bootstrap();
			self::$bootstrap->registerHook();
			self::$bootstrap->registerHelper();
			//self::$bootstrap->configs = \includes\classes\ConfigMenu::getInstance();
		}
	}


	/**
	 * @return Bootstrap
	 */
	public static function bootstrap() {
		return self::$bootstrap;
	}

	public static function getPath() {
		return dirname(__FILE__);
	}

	public function registerHook() {
		$hook = new \includes\classes\Hook();
		$hook->init();
		$this->hook = $hook;
	}

	public function registerHelper() {
		$helper = new \includes\classes\Helper();
		$helper->init();
		$this->helper = $helper;
	}
}
\includes\Bootstrap::init();
