<?php
/*
Template Name: Search Results
*/
?><?php get_header(); ?>

<h2>Search Results For "<?php the_search_query(); ?>"</h2>

<div id="post-content">

	<?php 
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>20)); ?>
 
<?php if ( $wpb_all_query->have_posts() ) : ?>
 
<ul>
 
    <!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
    <!-- end of the loop -->
 
</ul>
     <div class="nav-previous alignleft"><?php previous_posts_link( 'Older posts' ); ?></div><div class="nav-next alignright"><?php next_posts_link( 'Newer posts' ); ?></div>
    <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>