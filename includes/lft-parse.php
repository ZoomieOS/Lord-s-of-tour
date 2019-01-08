<?php

function lft_parse_filter()
{?><div id ="parse_select"><select id="lft_parse_select"></select> <button class="btn" id="lets_parse"> Смотреть данные</button></div><?php }
add_shortcode('lft_parse_filter', 'lft_parse_filter');

add_action('wp_ajax_lft_query_posts', 'lft_query_posts');
add_action('wp_ajax_nopriv_lft_query_posts', 'lft_query_posts');
function lft_query_posts()
{

    $lft_posts = [];

    $query_args = array(
        'post_type' => array('parsing'),
        'post_status' => array('publish'),
    );

    $query_lft_posts = new WP_Query($query_args);

    if ($query_lft_posts->have_posts()) {

        while ($query_lft_posts->have_posts()) {
            $query_lft_posts->the_post();
            $lft_post_id = get_the_ID();
            $lft_post_title = get_the_title($lft_post_id);
            $lft_posts[$lft_post_id]['id'] = $lft_post_id;
            $lft_posts[$lft_post_id]['title'] = $lft_post_title;
        }
    }
    wp_reset_postdata();
    wp_send_json($lft_posts);

}

add_action('wp_ajax_get_lft_postdata', 'get_lft_postdata');
add_action('wp_ajax_nopriv_get_lft_postdata', 'get_lft_postdata');
function get_lft_postdata()
{
    if (isset($_POST['lft_id']) && !empty($_POST['lft_id'])) {

        $lft_post_data = [];
        $lft_id = intval($_POST['lft_id']);
        $parsing_night_key = get_post_meta($lft_id, 'parsing_night_key', true);
        $month_before_value_key = get_post_meta($lft_id, 'month_before_value_key', true);
        $month_after_value_key = get_post_meta($lft_id, 'month_after_value_key', true);
        $hotel_checkbox_key = get_post_meta($lft_id, 'checkfield', true);
        $lft_post_data['parsing_night_key'] = $parsing_night_key;
        $lft_post_data['month_before_value_key'] = $month_before_value_key;
		$lft_post_data['month_after_value_key'] = $month_after_value_key;
        foreach ($hotel_checkbox_key as $hotelid) {
			$externalid = get_post_meta($hotelid, 'externalid_key',true);
			
			$lft_post_data['checkfield'][] = $externalid;
			
        }
        wp_send_json($lft_post_data);
    }

// add_action( 'wp_ajax_set_check_status', 'set_check_status' );
    // function set_check_status($post_id,$check_status ){
    // if(isset($_POST['post_id']) && !empty($_POST['post_id'])){    $post_id = intval($_POST['post_id']); }else{wp_die();}
    //
    // $upd = update_post_meta( $post_id, 'lft_checkbox', $check_status);
    // if($upd){ wp_send_json($response = "состояние чекбокса обновлено успечно!");}else{    wp_send_json($response = "Чот не то.."); }
    // }
}
?>
