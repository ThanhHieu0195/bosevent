<?php
namespace includes\classes;

use includes\interfaces\HookInterface;
use includes\classes\Shortcode;

class Hook implements HookInterface{
	const VERSION = '1.0';
	public function init() {
		$this->registerAction();
		$this->registerFilter();
        $this->registerAsset();
        $this->registerShortcodes();
	}
	public function registerAction() {
		// TODO: Implement registerAction() method.
		add_action('add_meta_boxes', [$this, 'addOtherOption']);
		add_action('wp_ajax_admin_ajax', [$this, 'excuteAjax']);
		add_action('init', [$this, 'registerPostType']);
		add_action('admin_menu', [$this, 'registerMenu']);
        add_filter( 'template_include', [$this, 'customTemplate']);
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
            'slick' => 'assets/lib/css/slick.css',
            'jquery-ui' => 'assets/lib/css/jquery-ui.css',
            'bosevent' => 'assets/css/bosevent.min.css'
		);
		foreach ($styles as $style) {
			wp_enqueue_style($style, $path .'/'. $style, array(), self::VERSION);
		}
	}

	public function addScripts() {
		$path = get_template_directory_uri();
		$scripts = array(
            'jquery-3' => 'assets/lib/js/jquery-3.3.1.min.js',
	        'slick' => 'assets/lib/js/slick.min.js',
	        'jquery-ui' => 'assets/lib/js/jquery-ui.min.js',
            'bosevent' => 'assets/js/bosevent.js'
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
	    exit(200);
    }

    public function registerPostType() {
    }

    public function registerMenu() {
    }

    public function customTemplate($template) {
	    $mapping = \includes\classes\Constants::MAPP_TEMPLATE;
	    $path = \includes\Bootstrap::getPath();
        $slug = \includes\Bootstrap::bootstrap()->helper->getSubUrl();
        if (array_key_exists($slug, $mapping)) {
            $slug = $mapping[$slug];
        }
        $path_file = $path . '/templates/'.$slug.'.php';
        if (file_exists($path_file)) {
            $template = $path_file;
        }
	    return $template;
    }

    public function registerShortcodes() {
        $dir_path = \includes\Bootstrap::getPath();
        foreach (glob($dir_path . "/shortcodes/classes/*.php") as $filename)
        {
            $class_name = \includes\Bootstrap::bootstrap()->helper->getClassByPath($filename);
            /**
             * @var $model Shortcode
             */
            $class_name = '\\includes\\shortcodes\\'.$class_name;
            $model = new $class_name();
            $model->register();
        }
    }
}