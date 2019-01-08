<?php

// Add the custom column to the post type -- replace ht_kb with your CPT slug
add_filter( 'manage_tour_posts_columns', 'lft_add_custom_column' );
function lft_add_custom_column( $columns ) {
    $columns['food'] = 'Питание';
    $columns['numbers'] = 'Тип номера';
    $columns['transport'] = 'Вид транспорта';
    $columns['city'] = 'Страна';
    $columns['month'] = 'Месяц';

    return $columns;
}


// Add the data to the custom column -- replace ht_kb with your CPT slug
add_action( 'manage_tour_posts_custom_column' , 'lft_add_custom_column_data', 10, 2 );
function lft_add_custom_column_data( $column, $post_id ) {
    switch ( $column ) {
        case 'food' :
        $cur_terms = get_the_terms( $post_id, 'lft_food' );
if( is_array( $cur_terms ) ){
	foreach( $cur_terms as $cur_term ){
		echo '<a href="'. get_term_link( (int)$cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a>';
	}
}
           break;

           case 'numbers' :
        $cur_terms = get_the_terms( $post_id, 'lft_numbers' );
if( is_array( $cur_terms ) ){
	foreach( $cur_terms as $cur_term ){
		echo '<a href="'. get_term_link( (int)$cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a>';
	}
}
           break;

           case 'transport' :
        $cur_terms = get_the_terms( $post_id, 'lft_transport' );
if( is_array( $cur_terms ) ){
	foreach( $cur_terms as $cur_term ){
		echo '<a href="'. get_term_link( (int)$cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a>';
	}
}
           break;

           case 'city' :
        $cur_terms = get_the_terms( $post_id, 'lft_country_tours' );
if( is_array( $cur_terms ) ){
	foreach( $cur_terms as $cur_term ){
		echo '<a href="'. get_term_link( (int)$cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a>';
	}
}
           break;

           case 'month' :
        $cur_terms = get_the_terms( $post_id, 'lft_month' );
if( is_array( $cur_terms ) ){
	foreach( $cur_terms as $cur_term ){
		echo '<a href="'. get_term_link( (int)$cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a>';
	}
}
           break;
    }
}

// Make the custom column sortable -- replace ht_kb with your CPT slug
add_filter( 'manage_edit-tour_sortable_columns', 'lft_add_custom_column_make_sortable' );
function lft_add_custom_column_make_sortable( $columns ) {
	$columns['food'] = 'Питание';
    $columns['numbers'] = 'Тип номера';
    $columns['transport'] = 'Вид транспорта';
    $columns['city'] = 'Страна';
    $columns['month'] = 'Месяц';
	return $columns;
}

// Add custom column sort request to post list page
add_action( 'load-edit.php', 'lft_add_custom_column_sort_request' );
function lft_add_custom_column_sort_request() {
	add_filter( 'request', 'lft_add_custom_column_do_sortable' );
}

// Handle the custom column sorting
function lft_add_custom_column_do_sortable( $vars ) {

	// check if post type is being viewed -- replace ht_kb with your CPT slug
	if ( isset( $vars['post_type'] ) && 'tour' == $vars['post_type'] ) {

		// check if sorting has been applied
		if ( isset( $vars['orderby'] ) && 'food' == $vars['orderby'] ) {

			// apply the sorting to the post list
			$vars = array_merge(
				$vars,
				array(
					'meta_key' => '_ht_kb_usefulness',
					'orderby' => 'meta_value_num'
				)
			);
		}
	}

	return $vars;
}