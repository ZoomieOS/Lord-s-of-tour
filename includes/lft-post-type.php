<?php

require_once plugin_dir_path(__FILE__) . 'lft-taxonomy.php';

add_action( 'init', 'lft_hotel_post_type' );

function lft_hotel_post_type() {

    register_post_type('hotel', array(
        'label'               => 'Рабочие отели',
        'labels'              => array(
            'name'          => 'Отели',
            'singular_name' => 'Отель',
            'menu_name'     => 'Рабочие отели',
            'all_items'     => 'Все отели',
            'add_new'       => 'Добавить отель',
            'add_new_item'  => 'Добавить новый отель',
            'edit'          => 'Редактировать',
            'edit_item'     => 'Редактировать отел',
            'new_item'      => 'Новый отель',
        ),
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'rest_base'           => '',
        'show_in_menu'        => true,
        'exclude_from_search' => false,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        'hierarchical'        => false,
        'rewrite'             => array( 'slug'=>'hotel', 'with_front'=>false, 'pages'=>false, 'feeds'=>false, 'feed'=>false ),
        'has_archive'         => 'hotel',
        'query_var'           => true,
        'supports'            => array( 'title', 'editor' ),
    ) );
};


add_action('init', 'lft_tour_post_type');

function lft_tour_post_type()
{

    // Add custom post type -- tour

    register_post_type('tour', array(
        'label' => 'Туры',
        'labels' => array(
            'name' => 'Туры',
            'singular_name' => 'Туры',
            'menu_name' => 'Туры',
            'all_items' => 'Все туры',
            'add_new' => 'Добавить тур',
            'add_new_item' => 'Добавить новый тур',
            'edit' => 'Редактировать',
            'edit_item' => 'Редактировать тур',
            'new_item' => 'Новый тур',
        ),
        'description' => '',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'rest_base' => '',
        'show_in_menu' => true,
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'tour', 'with_front' => false, 'pages' => false, 'feeds' => false, 'feed' => false),
        'has_archive' => 'hotel',
        'query_var' => true,
        'supports' => array('title', 'editor'),
        'taxonomies' => array('lft_food', 'lft_numbers', 'lft_transport', 'lft_country_tours', 'lft_month'),
    ));

}

add_action ( 'init', 'lft_parsing_post_type' );

function lft_parsing_post_type() {

    register_post_type('parsing', array(
        'label'               => 'Парсинг',
        'labels'              => array(
            'name'          => 'Парсинг',
            'singular_name' => 'Парсинг',
            'menu_name'     => 'Парсинг' ,
            'all_items'     => 'Все парсинги',
            'add_new'       => 'Добавить парсинг',
            'add_new_item'  => 'Добавить новый парсинг',
            'edit'          => 'Редактировать',
            'edit_item'     => 'Редактировать парсинги',
            'new_item'      => 'Новый парсинг',
        ),
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'rest_base'           => '',
        'show_in_menu'        => true,
        'exclude_from_search' => false,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        'hierarchical'        => false,
        'rewrite'             => array( 'slug'=>'parsing', 'with_front'=>false, 'pages'=>false, 'feeds'=>false, 'feed'=>false ),
        'has_archive'         => 'hotel',
        'query_var'           => true,
        'supports'            => array( 'title', 'editor' ),
    ) );
}
