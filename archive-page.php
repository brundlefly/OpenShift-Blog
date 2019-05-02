<?php
/*
Template Name: Archive Page
*/
get_header(); ?>

<div id="post-content">

		<h1 class="entry-title">Archive</h1>
		
		<?php get_search_form(); ?>

		<br><br>
		
		<ul>
			 <?php wp_list_categories(); ?>
		</ul>

</div>
		

<?php get_sidebar(); ?>
<?php get_footer(); ?>