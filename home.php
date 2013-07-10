<?php 

remove_action( 'genesis_loop', 'genesis_do_loop' ); // Remove default loop
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' ); // Set homepage width to FULL (optional can be removed)
add_action( 'genesis_loop', 'child_home_loop_helper' ); // Execute custom child loop
/**
 * Remove default loop. Execute child loop instead.
 *
 * @author Greg Rickaby
 * @since 1.0.0
 */
function child_home_loop_helper() { ?>



<?php 

if (is_front_page() ){

if ( dynamic_sidebar('home_slider') ) : 
else : 
?>
<div>
<?php //wp_youtubeplayer("http://www.youtube.com/watch?v=xA9q7E6Z8vE&list=PL2F8FCE3885A28365", "400", "400"); ?>
</div>
<?php endif; ?>

<?php
//Query to pull the 3 middle sections
query_posts('category_name=homemiddle&posts_per_page=3');
if(have_posts()) :
  while(have_posts()) :
    the_post();
    ?>
    <div class="tan-section" id="post-<?php the_ID(); ?>">
 
      <div class="entry">
      <?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<div class="custom-image">
        <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'home-thumb' ); } ?>
        <?php add_image_size( 'home-thumb', 250, 200, true ); ?> 
		</div>
        <div class="home-middle-title"><?php echo the_title(); ?></div>
      <?php  
	  endif;
      the_excerpt('Read More');
      ?>
      </div>
    </div>
    <?php
  endwhile;
endif;
// wp_reset_query(); ?>
<div class="clear"></div>
<div id="home-bottom-section">
	<div class="our-process">
	<?php 
		if ( dynamic_sidebar('home_bottom_left') ) : 
		else : 
		?>
    <?php endif; ?>
	</div>
<div id="featured-month-container">
<?php
//Query to pull the featured month post
query_posts('category_name=featuredmonth&posts_per_page=1');
if(have_posts()) :
  while(have_posts()) :
    the_post();
    ?>
    <div class="featured-month" id="post-<?php the_ID(); ?>">
 
      <div class="entry">
      <?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		
        <h2><span>FEATURED</span> MONTH</h2><?php get_the_category(); ?>
        <div class="divider"></div>
        
        <div id="featured-custom-image">
        <img src="<?php echo $image[0]; ?>">
		</div>  
         
      <?php 
	  echo '<div class="featured-title">'.get_the_title().'</div>'; 
	  endif;
      the_excerpt('Read More');
      ?>
      </div>
    </div>
    <?php
  endwhile;
endif;
wp_reset_query();
?>
</div><!--end #featured-month-->	
</div><!--end #home bottom section-->

<?php }
}
genesis();

?>

