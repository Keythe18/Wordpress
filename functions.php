<?php

remove_filter('term_description', 'wpautop');
add_theme_support ('title-tag');
add_theme_support ('post-thumbnails', array('post', 'infos_cpt', 'slides' ));

function register_nav() { register_nav_menus (array(
    'header-menu'  => __('Header Menu'), 
    'footer-menu' => __('Footer Menu')
)); } 

add_action( 'init', 'register_nav' );

function sanitize_pagination($content) {
    $content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $content);
    return $content;
}

add_action('navigation_markup_template', 'sanitize_pagination');

function KeyTheme1_widgets_init() {
    register_sidebar( array(
    'name' => __( 'Texte intro', 'KeyTheme1' ),
    'id' => 'intro',
    'description'   => __( 'Editer intro', 'KeyTheme1' ),
    'before_widget' => '<article class="clearfix" id="intro">',
    'after_widget'  => '</article>',
    'before_title'  => '<h1 class="text-right">',
    'after_title'   => '</h1>',
) ); }

add_action ('widgets_init', 'KeyTheme1_widgets_init');

function more_contact(){$user_contactmethods = array(
    'facebook'    => __('Page Facebook'), 
    'twitter'     => __('Page Twitter'), 
    'instagram'   => __('Page Instagram'),
); return $user_contactmethods; }
add_filter( 'user_contactmethods', 'more_contact' );

function slides_custom_post_type() {
    $labels = array(
        'name' => _x( 'Slides',
        'Post Type General Name'),
        'singular_name' => _x( 'Slide', 'Post Type Singular Name'),
        'menu_name' => __( 'Slides'),
        'all_items' => __( 'Tous les slides'),
        'view_item' => __( 'Voir le slide'),
        'add_new_item' => __( 'Ajouter un slide'),
        'edit_item' => __( 'Editer le slide'),
        'update_item' => __( 'Modifier le slide'),
        'search_items' => __( 'Rechercher un slide'),
        'featured_image' => __( 'Slide'),
        'set_featured_image' => __( 'Selectionner un slide'),
        'remove_featured_image' => __( 'Supprimer le slide'),
        'use_featured_image' => __( 'Utiliser le slide'));
    $args = array(
        'label' => __( 'Slides'),
        'description' => __( 'Description des slides'),
        'labels' => $labels, 'public' => true,
        'supports' => array( 'title', 'thumbnail' ),
        'menu_position' => 7,
        'menu_icon' =>'dashicons-groups', );

register_post_type ('slides', $args ); } add_action( 'init', 'slides_custom_post_type', 0);

register_taxonomy('infos', 'infos_cpt', array(
    'rewrite' => array( 'slug' => 'infos', 'with_front' => false,),
    'public' => true,
    'hierarchical' => true, 
    'show_admin_column' => true,
    'label' => __('Catégories Infos'),
));

register_post_type('infos_cpt', 
    array(
        'rewrite' => array(
            'slug' => 'infos/%infos%', 
            'with_front' => false),
        'has_archive' => 'infos', 
        'public' => true, 
        'supports' => array( 
            'title', 
            'editor', 
            'thumbnail', 
            'excerpt' ), 
        'label' => __( 'Infos'), 
        'menu_position' => 6, 
        'menu_icon' =>'dashicons-megaphone', 
        'show_admin_column' => true, 
));

function taxonomy_permalinks( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'infos_cpt' ){
        $terms = wp_get_object_terms( $post->ID, 'infos' );
        if( $terms ){ 
            return str_replace( '%infos%' , $terms[0]->slug , $post_link ); } } 
        return $post_link; }

add_filter( 'post_type_link', 'taxonomy_permalinks', 1, 2 );

register_taxonomy( 'commerces', 'commerces_cpt', array(
    'rewrite' => array( 'slug' => 'commerces', 'with_front' => false,), 
    'public' => true, 
    'hierarchical' => true, 
    'show_admin_column' => true,
    'label' => __('Categories commerces'),
));
register_post_type('commerces_cpt', array(
    'rewrite' => array('slug' => 'commerces/%commerces%', 'with_front' => false),
    'has_archive' => 'commerces',
    'public' => true,
    'supports' => array( 'editor' , 'title', 'custom-fields' , 'thumbnail' , 'excerpt' , 'author' ),
    'label' => __( 'Commerces'),
    'menu_position' => 7,
    'menu_icon' =>'dashicons-store',
    'show_admin_column' => true,
));

function commerces_permalinks( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'commerces_cpt' ){
        $terms = wp_get_object_terms( $post->ID, 'commerces' );
        if( $terms ){ 
            return str_replace( '%commerces%' , $terms[0]->slug , $post_link ); } } 
        return $post_link; }

add_filter( 'post_type_link', 'commerces_permalinks', 1, 2 );