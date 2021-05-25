<?php
/**
 * Custom Post Type.
 * 
 * @since   2.0.0
 * @author  Tyler Johnson
 */
class adsCPT {

    /**
     * Construct.
     */
    public function __construct() {

        // Load post type. 
        add_action( 'init', [ $this, 'cpt' ], 0 );

        // Remove Yoast.
        add_action( 'add_meta_boxes', [ $this, 'remove_yoast' ], 100 );

    }

    /**
     * Register post type.
     */
    public function cpt() {

        // Set labels. 
        $labels = [
            'name'                  => _x( 'Ads', 'Post Type General Name', 'adsklicked' ),
            'singular_name'         => _x( 'Ad', 'Post Type Singular Name', 'adsklicked' ),
            'menu_name'             => __( 'Ads', 'adsklicked' ),
            'name_admin_bar'        => __( 'Ad', 'adsklicked' ),
            'archives'              => __( 'Ad Archives', 'adsklicked' ),
            'attributes'            => __( 'Ad Attributes', 'adsklicked' ),
            'parent_item_colon'     => __( 'Parent Ad:', 'adsklicked' ),
            'all_items'             => __( 'All Ads', 'adsklicked' ),
            'add_new_item'          => __( 'Add New Ad', 'adsklicked' ),
            'add_new'               => __( 'Add New', 'adsklicked' ),
            'new_item'              => __( 'New Ad', 'adsklicked' ),
            'edit_item'             => __( 'Edit Ad', 'adsklicked' ),
            'update_item'           => __( 'Update Ad', 'adsklicked' ),
            'view_item'             => __( 'View Ad', 'adsklicked' ),
            'view_items'            => __( 'View Ads', 'adsklicked' ),
            'search_items'          => __( 'Search Ad', 'adsklicked' ),
            'not_found'             => __( 'Not found', 'adsklicked' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'adsklicked' ),
            'featured_image'        => __( 'Ad Image', 'adsklicked' ),
            'set_featured_image'    => __( 'Set ad image', 'adsklicked' ),
            'remove_featured_image' => __( 'Remove ad image', 'adsklicked' ),
            'use_featured_image'    => __( 'Use as ad image', 'adsklicked' ),
            'insert_into_item'      => __( 'Insert into ad', 'adsklicked' ),
            'uploaded_to_this_item' => __( 'Uploaded to this ad', 'adsklicked' ),
            'items_list'            => __( 'Ads list', 'adsklicked' ),
            'items_list_navigation' => __( 'Ads list navigation', 'adsklicked' ),
            'filter_items_list'     => __( 'Filter ads list', 'adsklicked' ),
        ];

        // Set args.
        $args = [
            'label'                 => __( 'Ad', 'adsklicked' ),
            'description'           => __( 'Storage for Klicked ads used across the Klicked Network.', 'adsklicked' ),
            'labels'                => $labels,
            'supports'              => [ 'title', 'thumbnail' ],
            'taxonomies'            => [],
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-analytics',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        ];

        // Register.
        register_post_type( 'klicked_ad', $args );

    }

    /**
     * Remove Yoast.
     */
    public function remove_yoast() {

        // Remove.
        remove_meta_box( 'wpseo_meta', 'klicked_ad', 'normal' );

    }

}
new adsCPT;