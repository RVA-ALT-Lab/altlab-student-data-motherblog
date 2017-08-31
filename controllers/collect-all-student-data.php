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

         		$author = get_the_author_meta('user_email'); 

         		array_push($authors[$author]['posts'], get_the_title() ); 

         		//We need to get the author email so we know where they go in the hash
         		//Then we need to loop through the categories each time through the loop the 
         		//add that post to the right array that stores the different assignment options 


         		$post_categories = get_the_category(); 

         		$new_post = array(
         			'title' => get_the_title(), 
         			'permalink' => get_the_permalink()
         			)
         		
         		foreach($post_categories as $cat){
         			$name = $cat->to_array()['category_nicename']; 

         			switch($name){
         				case 'dailyart': 
         					array_push($authors[$author]['dailyArt'], $new_post );
         					break;
         				case 'finalproject':
         					array_push($authors[$author]['finalProject'], $new_post ); 
         					break;
         				case 'makingactivity': 
         					array_push($authors[$author]['makingActivity'], $new_post );
         					break;
         				case 'weeklypost': 
         					array_push($authors[$author]['weeklyPost'], $new_post );
         					break;			

         			}


         		} 

         	}

         }

         wp_reset_query(); 

?>