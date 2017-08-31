<?php 
	  $authors = [];
      $args = array(
        'blog_id'      => $GLOBALS['blog_id'],
        'role'         => 'author',
        'orderby' => 'display_name',

       ); 
       $the_users = get_users( $args ); 
       foreach ( $the_users as $author ) {
         $authors[$author->user_email] = array(
            'userEmail' => $author->user_email, 

          ); 
       }
?>