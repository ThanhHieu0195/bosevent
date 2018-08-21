<?php
namespace includes\classes;

Class Constants {
	const TYPE_ONEPAGE = 'onepage';
	const MAX_PROJECT = 8;
	const MAX_POST = 9;
	const HOME_SESSIONS = array(1, 2, 3, 4, 5, 6);
	const MAPP_TEMPLATE = [
	    '' => 'home',
	    'vi/' => 'home',
	    'blogs' => 'blogs',
	    'vi/blogs' => 'blogs',

        //
        'wordpress/' => 'home',
        'wordpress/vi/' => 'home',
        'wordpress/en/' => 'home',
        'wordpress/blogs' => 'blogs',
        'wordpress/en/blogs' => 'blogs',
    	
    	'~simplet1/wordpress/' => 'home',
        '~simplet1/wordpress/vi/' => 'home',
        '~simplet1/wordpress/en/' => 'home',
        '~simplet1/wordpress/blogs' => 'blogs',
        '~simplet1/wordpress/en/blogs' => 'blogs',
    ];

	const SLUG_TO_KEY = [
        'en/blogs' => 'blogs'
    ];

	const MAPPING_TITLE = [
        'blogs' => 'Blogs'
    ];
}