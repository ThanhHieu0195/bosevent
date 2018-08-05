<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/23/18
 * Time: 12:08 AM
 */

namespace includes\classes;

use includes\interfaces\ShortcodeInterface;

class Shortcode implements ShortcodeInterface
{
    public $shortcode = 'shortcode';
    public $default_values = [];
    public $attributes = [];
    public $full_attrs = false;
    public function register()
    {
        // TODO: Implement register() method.
        add_shortcode($this->shortcode, [$this, 'render']);
    }

    public function render($attrs)
    {
        // TODO: Implement render() method.
        if (!$this->full_attrs) {
            $attrs = shortcode_atts($this->attributes, $attrs, $this->shortcode );
        }
        $view = $this->getPathView($this->shortcode);
        return \includes\Bootstrap::bootstrap()->helper->render($view, ['params' => $attrs]);
    }

    public function getPathView($filename='') {
        $path_view = \includes\Bootstrap::getPath();
        return $path_view . '/shortcodes/templates/' . $filename . '.php';
    }
}