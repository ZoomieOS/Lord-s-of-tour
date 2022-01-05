<?php
require_once( dirname(__FILE__) . '/wp-load.php' );
require_once( dirname(__FILE__) . '/wp-admin/includes/admin.php');

$data = json_decode(file_get_contents('php://input'),true);

foreach ($data as $value) {
    foreach ($data as $v) {
		
        $end = join(',', $v) . "\n";
        file_put_contents('file1.txt', $end . "\n", FILE_APPEND);

        $hotelTitle = ucfirst(strtolower($v["Hotel"]));
        $foodBoard = $v["Board"];
        $city = $v["City"];
        $accomodation = $v["Accomodation"];
        $priceHotel = $v["Price"];
        $monthTour = $v["Month"];
        $TourDate = $v["TourDate"];
        $night = $v["Nights"];
        
        switch($foodBoard) {
            case 'AI':
            $$foodBoard = 'Всё включено';
            break;

            case '24 HOURS AI':
            $foodBoard = 'Ультра всё включено';
            break;

            case 'HB':
            $foodBoard = 'Полупансион';
            break;

            case 'BB':
            $foodBoard = 'Завтрак';
            break;

            case 'FB':
            $foodBoard = 'Полный пансион';
            break;
        }

        if($accomodation === '1 (18+)') {
            $accomodation = 'Одноместный';
        }


        switch($monthTour) {
            case '01':
            $monthTour = 'Январь';
            break;
            case '02':
            $monthTour = 'Февраль';
            break;
            case '03':
            $monthTour = 'Март';
            break;
            case '04':
            $monthTour = 'Апрель';
            break;
            case '05':
            $monthTour = 'Май';
            break;
            case '06':
            $monthTour = 'Июнь';
            break;
            case '07':
            $monthTour = 'Июль';
            break;
            case  '08':
            $monthTour = 'Август';
            break;
            case '09':
            $monthTour = 'Сентябрь';
            break;
            case '10':
            $monthTour = 'Октябрь';
            break;
            case '11':
            $monthTour = 'Ноябрь';
            break;
            case '12':
            $monthTour = 'Декабрь';
            break;
        }
        
		$post_data = array(
            'post_title'    => $hotelTitle,
            'post_content'  => $hotelTitle,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type' => 'tour'
        );

        $post_id = wp_insert_post( $post_data );
        

        if( is_wp_error($post_id) ){
            echo $post_id->get_error_message();
        }
        else {
            update_post_meta($post_id, 'cost_value_key', $priceHotel);
            update_post_meta($post_id, 'hotel_value_key', $hotelTitle);
            update_post_meta($post_id, 'lft_night_field', $night);
            update_post_meta($post_id, 'city_value_key', $city);
            update_post_meta($post_id, 'lft_data_field', $TourDate);  
            wp_set_object_terms( $post_id, $foodBoard, 'lft_food', true );   
            wp_set_object_terms( $post_id, $accomodation, 'lft_numbers', true );
            wp_set_object_terms( $post_id, 'Авиа', 'lft_transport', true ); 
            wp_set_object_terms( $post_id, $monthTour, 'lft_month', true ); 
            wp_set_object_terms( $post_id, $city, 'lft_country_tours', false );
        };
        
    }
}


?>
