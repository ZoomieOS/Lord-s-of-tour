<?php

add_action ( 'init', 'lft_tour_taxonomy');

function lft_tour_taxonomy(){

    register_taxonomy('lft_food', array('lft'), array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x( 'Питание',
                'taxonomy general name' ),
            'singular_name' => _x( 'Питание', 'taxonomy singular name' ),
            'search_items' => __( 'Найти Питание' ),
            'all_items' => __( 'Все Питание' ),
            // 'parent_item' => __( 'Питание' ), // родительская таксономия
            // 'parent_item_colon' => __( 'Родительский Питание:' ),
            // 'edit_item' => __( 'Редактировать Питание' ),
            'update_item' => __( 'Обновить Питание' ),
            'add_new_item' => __( 'Добавить новое Питание' ),
            'new_item_name' => __( 'Название нового Питание' ),
            'menu_name' => __( 'Питание' ),
            'rewrite' => array( 'slug' => 'lftfood'),
            'with_front' => false,
            'hierarchical' => true
        ),

    ) );

    register_taxonomy('lft_country_tours', array('lft'), array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x( 'Страны и курорты',
                'taxonomy general name' ),
            'singular_name' => _x( 'Страны', 'taxonomy singular name' ),
            'search_items' => __( 'Найти страну' ),
            'all_items' => __( 'Все страны' ),
            'parent_item' => __( 'Страна' ), // родительская таксономия
            'parent_item_colon' => __( 'Родительская категория:' ),
            'edit_item' => __( 'Редактировать Страну' ),
            'update_item' => __( 'Обновить страны' ),
            'add_new_item' => __( 'Добавить новыую страну' ),
            'new_item_name' => __( 'Название новой страны' ),
            'menu_name' => __( 'Страны и курорты' ),
            'rewrite' => array( 'slug' => 'lftcountry'),
            'with_front' => false,
            'hierarchical' => true
        ),

    ) );


    register_taxonomy('lft_month', array('lft'), array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x( 'Месяцы',
                'taxonomy general name' ),
            'singular_name' => _x( 'Месяцы', 'taxonomy singular name' ),
            'search_items' => __( 'Найти месяц' ),
            'all_items' => __( 'Все месяцы' ),
            // 'parent_item' => __( 'Питание' ), // родительская таксономия
            // 'parent_item_colon' => __( 'Родительский Питание:' ),
            // 'edit_item' => __( 'Редактировать Питание' ),
            'update_item' => __( 'Обновить месяцы' ),
            'add_new_item' => __( 'Добавить новый месяц' ),
            'new_item_name' => __( 'Название нового месяца' ),
            'menu_name' => __( 'Месяцы' ),
            'rewrite' => array( 'slug' => 'lftmonth'),
            'with_front' => false,
            'hierarchical' => true
        ),

    ) );

    register_taxonomy('lft_numbers', array('lft'), array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x( 'Номера',
                'taxonomy general name' ),
            'singular_name' => _x( 'Номера', 'taxonomy singular name' ),
            'search_items' => __( 'Найти номер' ),
            'all_items' => __( 'Все номера' ),
            // 'parent_item' => __( 'Питание' ), // родительская таксономия
            // 'parent_item_colon' => __( 'Родительский Питание:' ),
            // 'edit_item' => __( 'Редактировать Питание' ),
            'update_item' => __( 'Обновить номера' ),
            'add_new_item' => __( 'Добавить новый номер' ),
            'new_item_name' => __( 'Название нового номера' ),
            'menu_name' => __( 'Номера' ),
            'rewrite' => array( 'slug' => 'lftmonth'),
            'with_front' => false,
            'hierarchical' => true
        ),

    ) );

    register_taxonomy('lft_transport', array('lft'), array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x( 'Транспорт',
                'taxonomy general name' ),
            'singular_name' => _x( 'Транспорт', 'taxonomy singular name' ),
            'search_items' => __( 'Найти транспорт' ),
            'all_items' => __( 'Все транспорты' ),
            // 'parent_item' => __( 'Питание' ), // родительская таксономия
            // 'parent_item_colon' => __( 'Родительский Питание:' ),
            // 'edit_item' => __( 'Редактировать Питание' ),
            'update_item' => __( 'Обновить транспорты' ),
            'add_new_item' => __( 'Добавить новый транспорт' ),
            'new_item_name' => __( 'Название нового транспорта' ),
            'menu_name' => __( 'Транспорт' ),
            'rewrite' => array( 'slug' => 'lfttransport'),
            'with_front' => false,
            'hierarchical' => true
        ),

    ));
}
