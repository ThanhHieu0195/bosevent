<?php
namespace includes\classes;

class ProjectPostType extends PostType {
	static $class = 'ProjectPostType';
	public function getName() {
		return 'project';
	}

	public function getConfigs() {
		$name = $this->getName();
		$labels = array(
			'name'               => _x( 'Project', 'post type general name', 'dm' ),
			'singular_name'      => _x( 'Project', 'post type singular name', 'dm' ),
			'menu_name'          => _x( 'Projects', 'admin menu', 'dm' ),
			'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'dm' ),
			'add_new'            => _x( 'Add New', 'book', 'dm' ),
			'add_new_item'       => __( 'Add New Project', 'dm' ),
			'new_item'           => __( 'New Project', 'dm' ),
			'edit_item'          => __( 'Edit Project', 'dm' ),
			'view_item'          => __( 'View Project', 'dm' ),
			'all_items'          => __( 'All Projects', 'dm' ),
			'search_items'       => __( 'Search Projects', 'dm' ),
			'parent_item_colon'  => __( 'Parent Projects:', 'dm' ),
			'not_found'          => __( 'No projects found.', 'dm' ),
			'not_found_in_trash' => __( 'No projects found in Trash.', 'dm' )
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'dm' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => $name ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		);
		
		return array_merge(parent::getConfigs(), $args); // TODO: Change the autogenerated stub
	}
}