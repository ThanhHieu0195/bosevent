<?php

namespace includes\classes;

use includes\interfaces\HelperInterface;

class Helper implements HelperInterface {

	public function init() {
		// TODO: Implement init() method.
	}

	public function getPathTemplate($name) {
		return $template = \includes\Bootstrap::getPath() . '/templates/' . $name . '.php';
	}

	public function render( $_file_, $_params_ = [] ) {
		$_obInitialLevel_ = ob_get_level();
		ob_start();
		ob_implicit_flush( false );
		extract( $_params_, EXTR_OVERWRITE );
		try {
			include $_file_;
			$result = ob_get_clean();

			return $result;
		} catch ( \Exception $e ) {
			while ( ob_get_level() > $_obInitialLevel_ ) {
				if ( ! ob_end_clean() ) {
					ob_clean();
				}
			}
			throw $e;
		} catch ( \Throwable $e ) {
			while ( ob_get_level() > $_obInitialLevel_ ) {
				if ( ! ob_end_clean() ) {
					ob_clean();
				}
			}
			throw $e;
		}
	}

	public function minifyHtml($html) {
		return preg_replace(['/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s'],['>','<','\\1'], $html);
	}

	public function checkOnePage($post_id='') {
		if ( empty($post_id) ) {
			$post_id = get_the_ID();
		}
		$type = get_post_meta($post_id, 'type', true);
		if ($type == \includes\classes\Constants::TYPE_ONEPAGE) {
			return true;
		}
		return false;
	}

	public function getCategory($post_id, $taxonomy) {
		$categories = get_the_terms( $post_id, $taxonomy);
		$cat = array();
		if ( !empty($categories) ) {
			$cat = $categories[0];
		}
		return $cat;
	}
}