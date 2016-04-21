<?php
// The Template For the Front Page
?>
<?php get_header();?>

<?php
if( have_posts() ) {
	while( have_posts() ) {
		the_post();
	}
}


?>

<div class="front-page-section statement">
	<div class="container lg-top lg-bottom">
	    <div class="row">
		    <div class="col-sm-10 col-sm-offset-1">
		    <h3 class="statement text-center"><?php the_content(); ?></h3>
		    </div>
	    </div>
	</div>
</div>

<div class="front-page-section search lg-bottom">
	<div class="container">
	    <div class="row">
		    <div class="col-xs-12">
		        <form method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
				    <label for="s" class="sr-only">Search</label>
				    <div class="input-group">
				        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search Housing Court Answers', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search', 'label' ) ?>" autocomplete="off" />
				        <span class="input-group-btn">
				            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
				        </span>
				    </div> <!-- .input-group -->
				</form>
		    </div>
	    </div>
	</div>
</div>


<div class="front-page-section popular-search">
	<div class="container">
		<div class="row">
		    <div class="col-sm-12 text-center sm-bottom">
		    <span class="homepage-header">Popular Searches</span>
		    </div>
		    <div class="col-sm-12">
		    <?php while( has_sub_field('popular_searches') ): ?>
			    <a href="<?php the_sub_field('search_link'); ?>" class="btn btn-lg"><?php the_sub_field('search_title'); ?></a>
		    <?php endwhile; ?>
		    </div>
	    </div>
	</div>
</div>


<div class="front-page-section upcoming-events">
    <div class="container">
		<div class="row lg-top">
			<div class="col-sm-12 text-center">
			    <span class="homepage-header">Upcoming Events</span>
			</div>
		</div>
		<div class="row">
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
</div>


<div class="front-page-section featured-event">
	<div class="container">
		<div class="row">
		    <div class="col-xs-6">
		    Featured Event
		    </div>
		    <div class="col-xs-6">
		    </div>
	    </div>
	</div>
</div>

<div class="front-page-section recent-news">
    <div class="container">
		<div class="row lg-top">
			<div class="col-sm-12 text-center">
			    <span class="homepage-header">News & Campaigns</span>
			</div>
		</div>
		<div class="row">
		<?php

			$events_query = hca_get_recent_news_query();
			if( $events_query->have_posts() ) {
				while( $events_query->have_posts() ){
					$events_query->the_post();
					get_template_part('templates/news');
				}
			}
	
		?>
		</div>
    </div>
</div>

</section><!-- .site-content -->

<?php get_footer();?>