<?php
/*
 * Plugin Name: Lord Of Tour's
 * Plugin URI: https://balkanin.by/
 * Description: Парсинг туров и их отображение
 * Version: 1.0.1
 * Author: Олег Борейко
 * Author URI: //github.com/ZoomieOS
 * License: GPLv2 or later
 */


require_once plugin_dir_path(__FILE__) . 'includes/lft-core.php';
require_once plugin_dir_path(__FILE__) . 'includes/lft-admin.php';

require_once plugin_dir_path(__FILE__) . 'includes/lft-parse.php';
function lft_js_includer() {

  // Conditional Logic
  wp_register_script('lft_conditional_logic', plugins_url('js/lft_conditional_logic.js', __FILE__));
  wp_enqueue_script('lft_conditional_logic');
  wp_localize_script( 'lft_conditional_logic', 'ajaxurl', admin_url('admin-ajax.php') );
  
}
add_action( 'admin_enqueue_scripts', 'lft_js_includer' ); // Подключение JS-скриптов в админке
add_action( 'wp_enqueue_scripts', 'lft_js_includer' ); // Подключение JS-скриптов в фронтэнде
