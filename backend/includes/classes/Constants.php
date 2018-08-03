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
	    
	    'wordpress/blogs' => 'blogs',
	    'wordpress/vi/blogs' => 'blogs',
	    
	    'blogs' => 'blogs',
	    'vi/blogs' => 'blogs',
    ];
}