<?php 

	/* 
		Template Name: cat query
	*/

get_header(); ?>

<div class="content">
	<div class="inner-content wrap">
		  <?php

		      $main_query = new WP_Query(array(
		          'posts_per_page' => 9,
		          // needs to be id for c__n_i
		          'category__not_in' => array( 1210, 1213 ),
		          'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
		      ));

		      $paged = get_query_var('paged');

		        if ( $main_query->have_posts() ) : $i = 0;
		          while ( $main_query->have_posts() ) : $main_query->the_post(); ?>

		          <?php if( $i == 0 && $paged == 0 ) { ?>
		            <div class="large-8 columns">
		            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-thumb'); ?></a>
		            <p class="date-meta"><i class="fa fa-pencil-square-o"></i> <?php the_time("F j, Y"); ?>&nbsp;&nbsp;&nbsp;&nbsp; By: <?php the_author(); ?>&nbsp;&nbsp;&nbsp;&nbsp; <span>Posted In: <?php $category = get_the_category(); echo $category[0]->cat_name; ?></span></p>
		            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		            <?php the_excerpt(); ?>
		          </div>  
		        <?php } ?>
		        <!-- end larger article -->
		        <!-- start smaller two -->
		        <?php if( $i == 1 && $paged == 0 ) { ?>
		          <div class="large-4 two-small last columns">
		            <div>
		              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-thumb'); ?></a>
		              <span class="date"><?php the_time("F j, Y"); ?></span>
		              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		            </div>
		        <?php } ?>
		        <?php if( $i == 2 && $paged == 0 ) { ?>
		            <div>
		              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-thumb'); ?></a>
		              <span class="date"><?php the_time("F j, Y"); ?></span>
		              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		            </div>
		          </div>
		          <!-- <div class="clear"></div> -->
		        <?php } ?>
		        <?php if( $i > 2 && $paged == 0 ) { ?>
		          <div class="large-6 columns">
		            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-thumb'); ?></a>
		            <span class="date"><?php the_time("F j, Y"); ?></span>
		            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		            <?php the_excerpt(); ?>
		          </div>
		        <?php } ?>
		        <?php if( $i >=0 && $paged != 0 ) { ?>
		          <div class="large-6 columns">
		            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-thumb'); ?></a>
		            <span class="date"><?php the_time("F j, Y"); ?></span>
		            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		            <?php the_excerpt(); ?>
		          </div>
		        <?php } ?>
		        <?php if( $i > 2 && $i%2 == 0 && $paged == 0) { ?>
		          <div class="clear"></div>
		        <?php } ?>
		        <?php if( $i > 0 && $i%2 == 1 && $paged != 0) { ?>
		          <div class="clear"></div>
		        <?php } ?>
		        <?php $i++; ?>
		      <?php endwhile; ?>
		      <!-- end of the loop -->

		    <div class="clear"></div>
		    
		    <!-- pagination here -->

		    

		    <div class="pagination">
		    <?php
		    $big = 999999999; // need an unlikely integer

		    echo paginate_links( array(
		      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		      'format' => '?paged=%#%',
		      'current' => max( 1, get_query_var('paged') ),
		      'total' => $main_query->max_num_pages,
		      'prev_text'    => __('&laquo'),
		      'next_text'    => __('&raquo;')
		    ) );
		    ?>
		    </div>

		    <!-- pagination here -->
	</div>
</div>

<?php get_footer(); ?>
