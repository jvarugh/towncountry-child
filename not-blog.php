<?php 
/*
Template Name: TC Blog
*/

get_header();

echo '<p>test</p>';

if ( have_posts() ) : while ( have_posts() ) : the_post(); 

endwhile; else: echo'<p>sorry</p>';

endif;

get_footer();

 ?>