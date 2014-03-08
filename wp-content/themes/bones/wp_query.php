<?php 

	/* 
		Template Name: WP_Query
	*/

get_header(); ?>

<div class="content">
	<div class="inner-content wrap">
		<ul>
		  <?php
		    $args = array(
		        'posts_per_page' => 10,
		        'cat' => 19
		      );
		    
		    $query = new WP_Query( $args );
		    if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post() ?>

		    <li><?php the_title(); ?></li>

		  <?php endwhile; endif; ?>

		</ul>
	</div>
</div>

<?php get_footer(); ?>
