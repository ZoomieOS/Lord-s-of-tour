<?php


add_action( 'admin_menu', 'lft_plugin_link');

function lft_plugin_link() {
    add_menu_page(
        "Lord Of Tour's", // Название страниц (Title)
        "Lord Of Tour's", // Текст ссылки в меню
        'manage_options', // Требование к возможности видеть ссылку
        '/lord-of-tours/includes/lft-admin-opt.php' // 'slug' - файл отобразится по нажатию на ссылку
        );
    }
