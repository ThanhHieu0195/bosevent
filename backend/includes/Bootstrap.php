<?php
namespace includes;
$dir_path = dirname(__FILE__);
foreach (glob($dir_path . "/interfaces/*.php") as $filename)
{
    include $filename;
}

foreach (glob($dir_path. "/classes/*.php") as $filename)
{
    include $filename;
}

/**
 * @property \includes\classes\Helper $helper
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
