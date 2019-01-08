<?php
add_action('add_meta_boxes', 'lft_add_custom_box');
function lft_add_custom_box(){
    $screens = array( 'hotel');
    add_meta_box( 'lft_sectionid', 'External ID', 'lft_meta_box_callback', $screens );
}

function lft_meta_box_callback( $post, $meta ){
    $screens = $meta['args'];

    wp_nonce_field( plugin_basename(__FILE__), 'lft_noncename' );

    echo '<label for="lft_externalid_field">' . __("Введите ID", 'lft_textdomain' ) . '</label> ';
    echo '<input type="text" id= "lft_externalid_field" name="lft_externalid_field" value="' . get_post_meta( $post->ID, 'externalid_key', true ) . '" size="25" />';
}

add_action( 'save_post', 'lft_save_postdata' );
function lft_save_postdata( $post_id ) {

    if ( ! isset( $_POST['lft_externalid_field'] ) )
        return;


    if ( ! wp_verify_nonce( $_POST['lft_noncename'], plugin_basename(__FILE__) ) )
        return;

    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return;

    if( ! current_user_can( 'edit_post', $post_id ) )
        return;

    $externalId = sanitize_text_field( $_POST['lft_externalid_field'] );

    update_post_meta( $post_id, 'externalid_key', $externalId );
}



add_action('add_meta_boxes', 'lft_add_night_box');

function lft_add_night_box(){
    $screens = array( 'tour' );
    add_meta_box( 'lft_section_night', 'Ночей', 'lft_night_box_callback', $screens );
}

function lft_night_box_callback( $post, $meta ){
    $screens = $meta['args'];

    wp_nonce_field( plugin_basename(__FILE__), 'lft_noncename' );

    echo '<input type="text" id= "lft_night_field" name="lft_night_field" value="' . get_post_meta( $post->ID, 'lft_night_field', true ) . '" size="25" />';
}

add_action( 'save_post', 'lft_save_post_night' );
function lft_save_post_night( $post_id ) {

	if ( ! isset( $_POST['lft_night_field'] ) )
		return;


	if ( ! wp_verify_nonce( $_POST['lft_noncename'], plugin_basename(__FILE__) ) )
		return;

	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return;

	if( ! current_user_can( 'edit_post', $post_id ) )
		return;

	$nightField = sanitize_text_field( $_POST['lft_night_field'] );

	update_post_meta( $post_id, 'lft_night_field', $nightField );
}


add_action('add_meta_boxes', 'lft_add_data_box');

function lft_add_data_box(){
    $screens = array( 'tour' );
    add_meta_box( 'lft_sectionnight', 'Дата тура:', 'lft_data_box_callback', $screens );
}

function lft_data_box_callback( $post, $meta ){
    $screens = $meta['args'];

    wp_nonce_field( plugin_basename(__FILE__), 'lft_noncename' );

    echo '<input type="text" id= "lft_data_field" name="lft_data_field" value="' . get_post_meta( $post->ID, 'lft_data_field', true ) . '" size="25" />';
}

add_action( 'save_post', 'lft_save_post_data' );
function lft_save_post_data( $post_id ) {

	if ( ! isset( $_POST['lft_data_field'] ) )
		return;


	if ( ! wp_verify_nonce( $_POST['lft_noncename'], plugin_basename(__FILE__) ) )
		return;

	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return;

	if( ! current_user_can( 'edit_post', $post_id ) )
		return;

	$tourData = sanitize_text_field( $_POST['lft_data_field'] );

	update_post_meta( $post_id, 'lft_data_field', $tourData );
}

add_action('add_meta_boxes', 'lft_add_night_parsing');

function lft_add_night_parsing(){
    $screens = array( 'parsing' );
    add_meta_box( 'lft_section_night_pars', 'Ночей', 'lft_night_box_pars_callback', $screens );
}

function lft_night_box_pars_callback( $post, $meta ){
    $screens = $meta['args'];

    wp_nonce_field( plugin_basename(__FILE__), 'lft_noncename' );

    echo '<input type="text" id="lft_pars_night_field" name="lft_pars_night_field" value="' . get_post_meta( $post->ID, 'parsing_night_key', true ) . '" size="25" />';
}

add_action( 'save_post', 'lft_save_night_pars' );
function lft_save_night_pars( $post_id ) {

	if ( ! isset( $_POST['lft_pars_night_field'] ) )
		return;


	if ( ! wp_verify_nonce( $_POST['lft_noncename'], plugin_basename(__FILE__) ) )
		return;

	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return;

	if( ! current_user_can( 'edit_post', $post_id ) )
		return;

	$parsingNight = sanitize_text_field( $_POST['lft_pars_night_field'] );

	update_post_meta( $post_id, 'parsing_night_key', $parsingNight );
}

add_action('add_meta_boxes', 'lft_add_cost_box');

function lft_add_cost_box(){
    $screens = array( 'tour' );
    add_meta_box( 'lft_section_cost', 'Стоимость ', 'lft_cost_box_callback', $screens );
}

function lft_cost_box_callback( $post, $meta ){
    $screens = $meta['args'];

    wp_nonce_field( plugin_basename(__FILE__), 'lft_noncename' );

    echo '<input type="text" id= "lft_cost_field" name="lft_cost_field" value="' . get_post_meta( $post->ID, 'cost_value_key', true ) . '" size="25" />';
}

add_action( 'save_post', 'lft_save_cost' );

function lft_save_cost( $post_id ) {

	if ( ! isset( $_POST['lft_cost_field'] ) )
		return;


	if ( ! wp_verify_nonce( $_POST['lft_noncename'], plugin_basename(__FILE__) ) )
		return;

	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return;

	if( ! current_user_can( 'edit_post', $post_id ) )
		return;

	$costValue = sanitize_text_field( $_POST['lft_cost_field'] );

	update_post_meta( $post_id, 'cost_value_key', $costValue );
}

add_action('add_meta_boxes', 'lft_add_city_box');

function lft_add_city_box(){
    $screens = array( 'tour' );
    add_meta_box( 'lft_section_city', 'Страна', 'lft_city_box_callback', $screens );
}

function lft_city_box_callback( $post, $meta ){
    $screens = $meta['args'];

    wp_nonce_field( plugin_basename(__FILE__), 'lft_noncename' );

    echo '<input type="text" id= "lft_city_field" name="lft_city_field" value="' . get_post_meta( $post->ID, 'city_value_key', true ) . '" size="25" />';
}

add_action( 'save_post', 'lft_save_city' );

function lft_save_city( $post_id ) {

	if ( ! isset( $_POST['lft_city_field'] ) )
		return;


	if ( ! wp_verify_nonce( $_POST['lft_noncename'], plugin_basename(__FILE__) ) )
		return;

	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return;

	if( ! current_user_can( 'edit_post', $post_id ) )
		return;

	$cityValue = sanitize_text_field( $_POST['lft_city_field'] );

	update_post_meta( $post_id, 'city_value_key', $cityValue );
}


add_action('add_meta_boxes', 'lft_add_hotel_box');

function lft_add_hotel_box(){
    $screens = array( 'tour' );
    add_meta_box( 'lft_section_hotel', 'Отель ', 'lft_hotel_box_callback', $screens );
}

function lft_hotel_box_callback( $post, $meta ){
    $screens = $meta['args'];

    wp_nonce_field( plugin_basename(__FILE__), 'lft_noncename' );

    echo '<input type="text" id= "lft_hotel_field" name="lft_hotel_field" value="' . get_post_meta( $post->ID, 'hotel_value_key', true ) . '" size="25" />';

}

add_action( 'save_post', 'lft_save_hotel' );
function lft_save_hotel( $post_id ) {

	if ( ! isset( $_POST['lft_hotel_field'] ) )
		return;


	if ( ! wp_verify_nonce( $_POST['lft_noncename'], plugin_basename(__FILE__) ) )
		return;

	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return;

	if( ! current_user_can( 'edit_post', $post_id ) )
		return;

	$hotel = sanitize_text_field( $_POST['lft_hotel_field'] );

	update_post_meta( $post_id, 'hotel_value_key', $hotel );
};

add_action('add_meta_boxes', 'lft_add_month_box');

function lft_add_month_box(){
    $screens = array( 'parsing' );
    add_meta_box( 'lft_section_month', 'Даты: ', 'lft_month_box_callback', $screens );
}

function lft_month_box_callback( $post, $meta ){
    $screens = $meta['args'];

    wp_nonce_field( plugin_basename(__FILE__), 'lft_noncename' );

    echo ' C <input type="text" id= "lft_month_before_field" name="lft_month_before_field" value="' . get_post_meta( $post->ID, 'month_before_value_key', true ) . '" size="25" />';
    echo ' По<input type="text" id= "lft_after_before_field" name="lft_after_before_field" value="' . get_post_meta( $post->ID, 'month_after_value_key', true ) . '" size="25" />';
}

add_action( 'save_post', 'lft_save_month_after' );
function lft_save_month_after( $post_id ) {

	if ( ! isset( $_POST['lft_month_before_field'] ) )
		return;


	if ( ! wp_verify_nonce( $_POST['lft_noncename'], plugin_basename(__FILE__) ) )
		return;

	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return;

	if( ! current_user_can( 'edit_post', $post_id ) )
		return;

	$monthBefore = sanitize_text_field( $_POST['lft_month_before_field'] );

	update_post_meta( $post_id, 'month_before_value_key', $monthBefore );
};

add_action( 'save_post', 'lft_save_month_before' );
function lft_save_month_before( $post_id ) {

	if ( ! isset( $_POST['lft_after_before_field'] ) )
		return;


	if ( ! wp_verify_nonce( $_POST['lft_noncename'], plugin_basename(__FILE__) ) )
		return;

	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return;

	if( ! current_user_can( 'edit_post', $post_id ) )
		return;

	$monthAfter = sanitize_text_field( $_POST['lft_after_before_field'] );

	update_post_meta( $post_id, 'month_after_value_key', $monthAfter );
};


function lft_checkbox_meta() {
	add_meta_box(
		'lft-checkbox',
		__( 'Отели', 'undefined' ),
		'myplugin_inner_custom_box',
		'parsing',
		'normal',
		'default'
	);
}

add_action( 'add_meta_boxes', 'lft_checkbox_meta' );

function myplugin_inner_custom_box( $post ) {

    $checkfield = maybe_unserialize( get_post_meta($post->ID, "checkfield", true) );

    wp_nonce_field( 'save_quote_meta', 'custom_nonce' ); 

	$args = array(
		'numberposts' => 0,
		'post_type'   => 'hotel'
	);
	$hotels = get_posts($args);

    foreach ( $hotels as $page ) { ?>
        <input id="need_check" type="checkbox" name="checkfield[]" value="<?php echo $page->ID; ?>" <?php if ( in_array($page->ID, (array) $checkfield) ) { ?> checked <?php } ?>/> <label for="page_<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></label> <br>
<?php 
    } 
}

add_action( 'save_post', 'myplugin_meta_save', 10, 2 );


function myplugin_meta_save($post_id, $post)
{   
    if ( isset($_POST['checkfield']) ) { 

        update_post_meta($post_id, "checkfield", $_POST['checkfield'] );

    }
}