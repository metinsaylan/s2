<?php 

get_header(); 

if( have_posts() ): 
	the_post();
	the_content();
else: 
	get_template_part( '404' );
endif;

get_footer(); 
