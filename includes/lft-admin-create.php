<?php
require "/var/www/html/balkanintour.welcomebot.ru/blog/lft-admin-parsing.php";

foreach ($data as $value) {
    foreach ($data as $v) {
		
        $end = join(',', $v) . "\n";
        file_put_contents('file1.txt', $end . "\n", FILE_APPEND);

        $hotelTitle = $v["Hotel"];
        $foodBoard = $v["Board"];
        $accomodation = $v["Accomodation"];
        $priceHotel = $v["Price"];
        $monthTour = $v["Month"];
        $TourDate = $v["TourDate"];
		$night = $v["Nights"];
		
		// $post_data = array(
        //     'post_title'    => $hotelTitle,
        //     'post_content'  => $hotelTitle,
        //     'post_status'   => 'publish',
        //     'post_author'   => 1,
        //     'post_type' => 'tour'
        // );

        // $post_id = wp_insert_post( $post_data );

        // if( is_wp_error($post_id) ){
        //     echo $post_id->get_error_message();
        // }
        // else {
        //     update_post_meta($post_id, 'cost_value_key', $priceHotel);
        //     update_post_meta($post_id, 'hotel_value_key', $hotel);
        //     update_post_meta($post_id, 'lft_night_field', $night);
        // };

        // wp_insert_term( $foodBoard, 'lftfood', array(
        //     'description' => $foodBoard,
        //     'parent'      => 0,
        //     'slug'        => $foodBoard,
        // ) );

        // wp_insert_term( $accomodation, 'lftmonth', array(
        //     'description' => $accomodation,
        //     'parent'      => 0,
        //     'slug'        => $accomodation,
        // ) );
    }
}

?>