<?php
/**
 * Template Name: Events
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php get_header();?>

<?php if ( have_posts() ): ?>

<?php while ( have_posts() ) : the_post(); ?>
    <div class="container">
		<div class="row md-bottom">
		   <div class="col-md-8 col-md-offset-2 text-center">
		      <h1 class="category-title"><?php the_title(); ?></h1>
		      <h5 class="category-description"><?php the_content(); ?></h5>
		   </div>
		</div>
	</div>
<?php endwhile; ?>

<?php endif; ?>
	
    <div class="container">
       <div class="row md-bottom">
	      <div class="col-sm-12">
	         <hr/>
	         <h3 class="section-title">Upcoming Events</h3>
	      </div>
       </div>
    </div>
	
	<div class="container">
		<div class="row md-bottom">
		<?php

			$events_query = hca_get_upcoming_events_query();
			if( $events_query->have_posts() ) {
				while( $events_query->have_posts() ){
					$events_query->the_post();
					get_template_part('templates/event');
				}
			}
	
		?>
		</div>
	</div>
	
	<div class="container">
       <div class="row md-bottom">
	      <div class="col-sm-12">
	         <hr/>
	         <h3 class="section-title">Past Events</h3>
	      </div>
       </div>
    </div>
	
	<div class="container">
		<div class="row md-bottom">
		<?php

			$events_query = hca_get_past_events_query();
			if( $events_query->have_posts() ) {
				while( $events_query->have_posts() ){
					$events_query->the_post();
					get_template_part('templates/event');
				}
			}
	
		?>
		</div>
	</div>

<?php get_footer();?>