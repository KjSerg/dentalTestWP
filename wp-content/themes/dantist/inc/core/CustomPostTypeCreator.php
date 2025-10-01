<?php

namespace Dantist\Core;
class CustomPostTypeCreator {
	public function __construct() {
		add_action( 'init', [ $this, 'register_gallery_type' ] );
		add_action( 'init', [ $this, 'register_reviews_type' ] );
	}

	public function register_reviews_type(): void {
		$labels = array(
			'name'                  => _x( 'Reviews', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'review', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => _x( 'Reviews', 'Admin Menu text', 'text_domain' ),
			'name_admin_bar'        => _x( 'review', 'Add New on Toolbar', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'add_new_item'          => __( 'Add New review', 'text_domain' ),
			'new_item'              => __( 'New review', 'text_domain' ),
			'edit_item'             => __( 'Edit review', 'text_domain' ),
			'view_item'             => __( 'View review', 'text_domain' ),
			'all_items'             => __( 'All Reviews', 'text_domain' ),
			'search_items'          => __( 'Search Reviews', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Reviews:', 'text_domain' ),
			'not_found'             => __( 'No Reviews found.', 'text_domain' ),
			'not_found_in_trash'    => __( 'No Reviews found in Trash.', 'text_domain' ),
			'featured_image'        => _x( 'review Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'text_domain' ),
			'set_featured_image'    => _x( 'Set review image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'text_domain' ),
			'remove_featured_image' => _x( 'Remove review image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'text_domain' ),
			'use_featured_image'    => _x( 'Use as review image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'text_domain' ),
			'archives'              => _x( 'review Archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'text_domain' ),
			'insert_into_item'      => _x( 'Insert into review', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'text_domain' ),
			'uploaded_to_this_item' => _x( 'Uploaded to this review', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'text_domain' ),
			'filter_items_list'     => _x( 'Filter Reviews list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'text_domain' ),
			'items_list_navigation' => _x( 'Reviews list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'text_domain' ),
			'items_list'            => _x( 'Reviews list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'text_domain' ),
		);
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'Reviews' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
			'show_in_rest'       => true,
		);
		register_post_type( 'review', $args );
	}

	public function register_gallery_type(): void {
		$labels = array(
			'name'                  => _x( 'Cases', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Case', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => _x( 'Cases', 'Admin Menu text', 'text_domain' ),
			'name_admin_bar'        => _x( 'Case', 'Add New on Toolbar', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'add_new_item'          => __( 'Add New Case', 'text_domain' ),
			'new_item'              => __( 'New Case', 'text_domain' ),
			'edit_item'             => __( 'Edit Case', 'text_domain' ),
			'view_item'             => __( 'View Case', 'text_domain' ),
			'all_items'             => __( 'All Cases', 'text_domain' ),
			'search_items'          => __( 'Search Cases', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Cases:', 'text_domain' ),
			'not_found'             => __( 'No Cases found.', 'text_domain' ),
			'not_found_in_trash'    => __( 'No Cases found in Trash.', 'text_domain' ),
			'featured_image'        => _x( 'Case Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'text_domain' ),
			'set_featured_image'    => _x( 'Set Case image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'text_domain' ),
			'remove_featured_image' => _x( 'Remove Case image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'text_domain' ),
			'use_featured_image'    => _x( 'Use as Case image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'text_domain' ),
			'archives'              => _x( 'Case Archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'text_domain' ),
			'insert_into_item'      => _x( 'Insert into Case', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'text_domain' ),
			'uploaded_to_this_item' => _x( 'Uploaded to this Case', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'text_domain' ),
			'filter_items_list'     => _x( 'Filter Cases list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'text_domain' ),
			'items_list_navigation' => _x( 'Cases list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'text_domain' ),
			'items_list'            => _x( 'Cases list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'text_domain' ),
		);
		$args   = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'Cases' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'author', 'thumbnail' ),
			'show_in_rest'       => true,
		);
		register_post_type( 'case', $args );
	}
}

new CustomPostTypeCreator();