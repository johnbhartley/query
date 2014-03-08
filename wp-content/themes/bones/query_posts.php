<?php 

	/* 
		Template Name: query_posts
	*/

get_header(); ?>

<div class="content">
	<div class="inner-content wrap">
		<ul>
		  	<?php query_posts( 'cat=19&posts_per_page=10' ); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<li><?php the_title(); ?></li>

			<?php endwhile; endif; ?>

		</ul>
	</div>
</div>

<?php get_footer(); ?>
