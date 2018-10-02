<?php
namespace includes\classes;

Class Constants {
	const TYPE_ONEPAGE = 'onepage';
	const MAX_PROJECT = 8;
	const MAX_POST = 9;
    const DEFAULT_SLUG = 'wordpress/';

    const MAPP_TEMPLATE = [
	    self::DEFAULT_SLUG . '' => 'home',
        self::DEFAULT_SLUG . 'vi/' => 'home',
        self::DEFAULT_SLUG . 'blogs/' => 'blogs',
        self::DEFAULT_SLUG . 'vi/blogs/' => 'blogs',
    ];
}