<?php 

	/* 
		Template Name: WPDB
	*/

get_header(); ?>

<div class="content">
	<div class="inner-content wrap">
		<ul>
		  <?php
		    $mytitles = $wpdb->get_results("
		    SELECT $wpdb->posts.*
		    FROM $wpdb->posts
		    INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id)
		    INNER JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
		    WHERE 1=1
		    AND $wpdb->term_taxonomy.taxonomy = 'category'
		    AND $wpdb->term_taxonomy.term_id IN ('19')
		    AND $wpdb->posts.post_type = 'post'
		    AND ($wpdb->posts.post_status = 'publish')
		    GROUP BY $wpdb->posts.ID
		    ORDER BY UCASE(LEFT($wpdb->posts.post_title, LOCATE(' - ',$wpdb->posts.post_title))) ASC, $wpdb->posts.post_date ASC");
		    
		    foreach($mytitles as $post) {
		      setup_postdata($post);
		      echo '<li>' . the_title() . '</li>';
		    } 
		  ?>

		</ul>
	</div>
</div>

<?php get_footer(); ?>
