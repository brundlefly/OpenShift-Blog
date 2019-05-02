<?php
/*
Template Name: Category Archives
*/
get_header(); ?>

<div id="post-content">

	<h2>Category: <?php single_cat_title(); ?></h2>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<div class="meta">
			<?php the_time('F j, Y'); ?> | By <?php the_author_link(); ?> 
		</div>

		<?php the_excerpt(); ?>

	<?php endwhile; else : ?>
		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>

</div>
		

<?php get_sidebar(); ?>
<?php get_footer(); ?>