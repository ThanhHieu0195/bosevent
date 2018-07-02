<?php
namespace includes\classes;

use includes\interfaces\HookInterface;
class Hook implements HookInterface{
	const VERSION = '1.0';
	public function init() {
		$this->registerAction();
		$this->registerFilter();
		$this->registerAsset();
	}
	public function registerAction() {
		// TODO: Implement registerAction() method.
		add_action('add_meta_boxes', [$this, 'addOtherOption']);
		add_action('wp_ajax_admin_ajax', [$this, 'excuteAjax']);
		add_action('init', [$this, 'registerPostType']);
		add_action('admin_menu', [$this, 'registerMenu']);
	}

	public function registerFilter() {
		// TODO: Implement registerFilter() method.
	}

	public function registerAsset() {
		add_action('wp_enqueue_scripts', [$this, 'addStyles']);
		add_action('wp_enqueue_scripts', [$this, 'addScripts']);
		add_action('admin_enqueue_scripts', [$this, 'addScriptsAdmin']);
	}

	public function addStyles() {
		$path = get_template_directory_uri();
		$styles = array(
			'bootstrap' => 'assets/css/bootstrap.css',
			'font-awesome' => 'assets/css/font-awesome.min.css',
			'goolgleapi-font' => 'assets/css/goolgleapi.font.css',
			'style' => 'assets/css/style.css'
		);
		foreach ($styles as $style) {
			wp_enqueue_style($style, $path .'/'. $style, array(), self::VERSION);
		}
	}

	public function addScripts() {
		$path = get_template_directory_uri();
		$scripts = array(
//			'jquery' => 'assets/js/jquery.min.js',
			'animsition' =>'assets/js/animsition.min.js',
			'bootstrap' => 'assets/js/bootstrap.min.js',
			'smoothscroll' => 'assets/js/smoothscroll.js',
			'validate' => 'assets/js/jquery.validate.min.js',
			'wow' => 'assets/js/wow.min.js',
			'stellar' => 'assets/js/jquery.stellar.min.js',
			'owl' => 'assets/js/owl.carousel.min.js',
			'pagepiling' => 'assets/js/jquery.pagepiling.js',
			'map-api' => 'assets/js/map.api.js',
			'gmap' => 'assets/js/gmap.js',
			'scripts' => 'assets/js/scripts.js'
		);
		foreach ($scripts as $script) {
			wp_enqueue_script($script, $path .'/'. $script, array('jquery'), self::VERSION, true);
		}
	}

	public function addScriptsAdmin() {
		$path = get_template_directory_uri();
		$scripts = array(
			'admin-js' =>'assets/js/admin.js',
		);
		foreach ($scripts as $script) {
			wp_enqueue_script($script, $path .'/'. $script, array('jquery'), self::VERSION, true);
		}
    }

	public function addOtherOption() {
		add_meta_box(
			'other-option', // id, used as the html id att
			__( 'Options Other' ), // meta box title, like "Page Attributes"
			[$this, 'renderOtherOption'], // callback function, spits out the content
			'page', // post type or page. We'll add this to pages only
			'side', // context (where on the screen
			'low' // priority, where should this go in the context?
		);
	}

	public function renderOtherOption() {
	    $post_id = get_the_ID();
	    $onepage = get_post_meta($post_id, 'type', true);
	    $keyOnePage = \includes\classes\Constants::TYPE_ONEPAGE;
	    ?>
        <select name="type" id="type">
            <option value=""> -- Default --</option>
            <option value="onepage" <?php echo $onepage==$keyOnePage ? 'selected' : '' ?>>-- One Page --</option>
        </select>
		<?php
	}

	public function excuteAjax() {
	    if ( isset($_POST['step']) ) {
	        switch ($_POST['step']) {
                case 'save_attributes_page':
	                $post_id = $_POST['post_id'];
	                $name = $_POST['name'];
	                $value = $_POST['value'];
	                echo update_post_meta($post_id, $name, $value);
                    break;

            }
        }
	    die;
    }

    public function registerPostType() {
	    \includes\classes\ProjectPostType::getInstance();
	    \includes\classes\ProjectCategory::getInstance();
    }

    public function registerMenu() {
	    $configs = \includes\classes\ConfigMenu::getInstance();
        $configs->registerMenu();
    }
}