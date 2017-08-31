<?php 
	  $authors = [];
      $args = array(
        'blog_id'      => $GLOBALS['blog_id'],
        'role'         => 'subscriber',
        'orderby' => 'display_name',

       ); 
       $the_users = get_users( $args ); 
       foreach ( $the_users as $author ) {
         $authors[$author->user_email] = array(
            'userEmail' => $author->user_email,
            'posts' => [], 
            'dailyArt' => [], 
            'finalProject' => [], 
            'makingActivity' => [], 
            'weeklyPost' => [] 
          ); 
       }

       	$args = array(
            'posts_per_page'   => -1,
            'post_type'   => 'post',       
          );

          // query
         $WP_query = new WP_Query( $args );

         if( $WP_query->have_posts() ){
         	while ( $WP_query->have_posts() ){

         		$WP_query->the_post(); 

         		$post_categories = get_the_category(); 
         		var_dump($post_categories); 

         	}

         }

         wp_reset_query(); 


?>