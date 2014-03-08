<?php get_header(); ?>

<div class="content">
	<div class="inner-content wrap">
		<ul>
			<?php query_posts( $query_string . '&cat=19' ); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<li><?php the_title(); ?></li>

			<?php endwhile; endif; ?>

		</ul>
	</div>
</div>

<?php get_footer(); ?>
