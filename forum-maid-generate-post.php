<?php 
    $numberofposts = 4;
    $author_id = 1;
//    $content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do aliqua.";

    $name = array('Jack Doe', 'Shay Harper', 'Jae Parker', 'Alex Hayfried');
    $rand_name = array_rand($name, 1);
    $number_small = mt_rand(1,10);
    $number_big = mt_rand(20,50);
    $speak = array('no', 'little', 'good');
    $rand_speak = array_rand($speak, 1);
    $gender = array('M', 'F');
    $rand_gender = array_rand($gender, 1);
    $stay = array('yes', 'no');
    $rand_stay = array_rand($stay, 1);
    $email = array('abc@gmail.com', 'maid@gmail.com', 'kforum@gmail.com', 'applicant@yahoo.com');
    $rand_email = array_rand($name, 1);
    $start = strtotime("1985-01-01");
    $end =  strtotime("1994-12-31");
    $randomDate = date("Y-m-d H:i:s", rand($start, $end));

    $category = get_category_by_slug( 'maid'  );
    $categories  = $category->cat_ID;

    for($i=0; $i < $numberofposts; $i++) {  
        $title = "Maid Applicant ". $i;
//        di("Title: $title<br>");
        // $post_title = get_page_by_title( $title );
        // var_dump($post_title->ID);
            // if( is_null($post_title) ) {
               // echo "if";
            $post_id = wp_insert_post(
                array(
                    'post_title'    => $title,
//                    'post_content'  => $content,
                    'post_status'   => 'publish',
                    'post_date'     => date('Y-m-d H:i:s'),
                    'post_author'   => wp_get_current_user()->ID,
//                    'post_category' => $categories
                    'post_category' => [ $categories ]
                    )
                );
            // if(isset($post_id)){
                // di("REACHED");   
                add_post_meta($post_id, 'name', $name[$rand_name] . " - B $i");
                add_post_meta($post_id, 'no_of_children', $number_small);
                add_post_meta($post_id, 'year_of_experience', $number_small);
                add_post_meta($post_id, 'age', $number_big);
                add_post_meta($post_id, 'korean_speak', $speak[$rand_speak]);
                add_post_meta($post_id, 'english_speak', $speak[$rand_speak]);
                add_post_meta($post_id, 'stay_in', $stay[$rand_stay]);
                add_post_meta($post_id, 'gender', $gender[$rand_gender]);
                add_post_meta($post_id, 'email', $email[$rand_email]);
                add_post_meta($post_id, 'birthday', $randomDate);
                // }
            // }
    }

