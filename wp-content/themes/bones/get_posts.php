<?php 

	/* 
		Template Name: get_posts
	*/

get_header(); ?>

<div class="content">
	<div class="inner-content wrap">
		<ul>
		  <?php

			  $args = array( 'category' => 19, 'posts_per_page' => 10 );

			  $myposts = get_posts( $args );
			  foreach ( $myposts as $post ) : setup_postdata( $post ); 
			    
			    echo '<li>' . the_title() . '</li>'; 
			  
			  endforeach; 

		  ?>

		</ul>
	</div>
</div>

<?php get_footer(); ?>
