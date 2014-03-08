<?php 

	/* 
		Template Name: cat query
	*/

get_header(); ?>

<div class="content">
	<div class="inner-content wrap">
		  <?php
		      //list terms in a given taxonomy 
		  	  $taxonomy = 'potato-category';
		      $tax_terms = get_terms($taxonomy);
		    ?>
		    <ul>
		    <?php
		      // runs through all Potato Categories and echoes to a li element
		      foreach ($tax_terms as $tax_term) {
		        echo '<li><a href="#' . $tax_term->slug . '" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name .'</a></li>';
		      }
		    ?>
		    </ul>
		    <?php
		      // query for each of the categories
		      foreach ($tax_terms as $tax_term) {

		        // grab the slug 
		        $tax_slug = $tax_term->slug;

		        // enclose everything in a div
		        echo '<div id="'.$tax_slug.'" >';

		        // args for post type and category, based on the singular term of this foreach
		        $args = array(
		            'post_type' => 'post',
		            'category_name' => $tax_slug,
		            'posts_per_page' => -1
		          );
		        $query = new WP_Query($args);

		        // run the scoop query for this particular $tax_slug
		        if( $query->have_posts() ) : 

		          // for each grouping, create an unordered list which will also go inside the div you're creating. guess you don't need both.
		          echo '<ul>';

		          while( $query->have_posts() ) : $query->the_post(); 

		            // can change output however you want, this just goes with a <ul><li> deal
		            echo '<li>';
		            echo  '<p><a href="'. get_permalink() . '"> '. get_the_title() . '</a></p>';
		            echo '</li>';

		          endwhile;

		          // close that <ul>
		          echo '</ul>'; 

		        endif;

		        // close that div
		        echo '</div>';
		      }
		    ?>
	</div>
</div>

<?php get_footer(); ?>
