<?php

function housing_enqueue() {
	wp_enqueue_style( 'housingyo', get_stylesheet_directory_uri() . '/css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'housing_enqueue' );

	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================
	
	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
	
	======================================================================================================================== */

	add_theme_support('post-thumbnails');
	
	// register_nav_menus(array('primary' => 'Primary Navigation'));

	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */



	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}
	
	function hca_print_tag_list() {
	  $tags = get_terms('post_tag',array());
	
	  foreach( $tags as $tag ) {
	    $term_link = esc_url( get_term_link( $tag ) );
	    echo '<li>'.$tag->name.'</li>';
	  }
	 
	}
	
	/**
	* 
	* Register the navigation menus for the site.
	* 
	*/
	function housingcourtanswers_register_nav_menus() {
		register_nav_menu( 'main', 'Main Menu' );
		register_nav_menu( 'footer', 'Footer Menu' );
	}
	add_action( 'after_setup_theme', 'housingcourtanswers_register_nav_menus' );	
	
	
	/**
	 * 
	 * Adds 'Read More' button to the excerpt.
	 * 
	 */
	function new_excerpt_more( $more ) {
		global $post;
		$text = 'Read More';
		return '...<br/><a class="btn btn-default read-more-button" role="button" href="'. get_permalink( get_the_ID() ) . '">'.$text.'</a>';
	}
	add_filter( 'excerpt_more', 'new_excerpt_more' );
	
	
	function custom_excerpt_length( $length ) {
		return 90;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	
	
	
	function hca_custom_post_types() {
	
		// Events
		$event_labels = array(
			'name' => 'Events',
			'singular_name' => 'Event',
			'add_new_item' => 'Add New Event',
			'edit_item' => 'Edit Event',
			'new_item' => 'New Event',
			'view_item' => 'View Event',
			'search_items' => 'Search Events',
			'not_found' => 'No Events Found',
			'not_found_in_trash' => 'No Events Found In Trash'
		);
		$event_args = array(
			'public' => true,
			'label' => 'Events',
			'labels' => $event_labels,
			'menu_icon' => 'dashicons-calendar-alt',
			'exclude_from_search' => false,
			'taxonomies' => array('category', 'post_tag'),
			'supports' => array('title','editor','comments','excerpt','revisions')
		);
		register_post_type( 'event', $event_args );
	
	
		// News
		$news_labels = array(
			'name' => 'News',
			'singular_name' => 'News Post',
			'add_new_item' => 'Add New Post',
			'edit_item' => 'Edit Post',
			'new_item' => 'New Post',
			'view_item' => 'View Post',
			'search_items' => 'Search News',
			'not_found' => 'No News Found',
			'not_found_in_trash' => 'No News Found In Trash'
		);
		$news_args = array(
			'public' => true,
			'label' => 'News',
			'menu_icon' => 'dashicons-media-text',
			'exclude_from_search' => false,
			'labels' => $news_labels,
			'taxonomies' => array('category', 'post_tag'),
			'supports' => array('title','editor','comments','excerpt','revisions')
		);
		register_post_type( 'news', $news_args );
		
		// Resources & Links
		$resource_labels = array(
			'name' => 'Resources & Links',
			'singular_name' => 'Link Post',
			'add_new_item' => 'Add New Link Post',
			'edit_item' => 'Edit Link Post',
			'new_item' => 'New Link Post',
			'view_item' => 'View Link Post',
			'search_items' => 'Search Links',
			'not_found' => 'No Links Found',
			'not_found_in_trash' => 'No Links Found In Trash'
		);
		$resource_args = array(
			'public' => true,
			'label' => 'Links',
			'menu_icon' => 'dashicons-admin-links',
			'exclude_from_search' => false,
			'labels' => $resource_labels,
			'supports' => array('title','editor','comments','excerpt','revisions')
		);
		register_post_type( 'resource', $resource_args );
		
	}
	
	add_action( 'init', 'hca_custom_post_types' );
	
	
	
	/**
	 * Upcoming events query
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	
	function hca_get_upcoming_events_query() {
	$current_timestamp = time();

	$args = array(
		'post_type' => array('event'),
		'posts_per_page' => -1,
		'meta_key' => 'start_date',
		'meta_compare' => '>=',
		'meta_value' => $current_timestamp,
		'orderby' => 'meta_value_num',
		'order' => 'DESC'
	);

	$upcoming_events_query = new WP_Query( $args );

	return $upcoming_events_query;
    }
    
    function hca_get_past_events_query() {
	$current_timestamp = time();

	$args = array(
		'post_type' => array('event'),
		'posts_per_page' => -1,
		'meta_key' => 'end_date',
		'meta_compare' => '<',
		'meta_value' => $current_timestamp,
		'orderby' => 'meta_value_num',
		'order' => 'DESC'
	);

	$past_events_query = new WP_Query( $args );

	return $past_events_query;
    }
    
    function hca_get_news_query() {
	$current_timestamp = time();

	$args = array(
		'post_type' => array('news'),
		'posts_per_page' => -1,
		'order' => 'DESC'
	);

	$news_query = new WP_Query( $args );

	return $news_query;
    }
    
    function hca_get_recent_news_query() {
	$current_timestamp = time();

	$args = array(
		'post_type' => array('news'),
		'posts_per_page' => 3,
		'order' => 'DESC'
	);

	$recent_news_query = new WP_Query( $args );

	return $recent_news_query;
    }
    
    function hca_get_resources_query() {

	$args = array(
		'post_type' => array('resource'),
		'posts_per_page' => -1,
		'order' => 'ASC'
	);

	$resource_query = new WP_Query( $args );

	return $resource_query;
    }
    
    
    
    
    
    /* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
    
    function hca_search_more_posts_button( $args, $search_query ) {
	  $default_args = array(
	    'see_all_text' => 'See all posts',
	    'no_items_found' => 'No posts found',
	    'found_posts' => 0,
	    'num_posts_to_display' => 4,
	    'post_type' => 'post'
	  );
	
	  $current_uri = get_search_link( $search_query );
	
	  $args = wp_parse_args( $args, $default_args );
	
	  if( $args['found_posts'] === 0 ) {
	    echo '<div class="row"><div class="col-md-12 text-center"><p>'.$args['no_items_found'].'</p></div></div>';
	  }
	  elseif( $args['num_posts_to_display'] !== -1 && $args['found_posts'] > $args['num_posts_to_display'] ) {
	    $url = remove_query_arg( 'js-post-type', $current_uri );
	    $url = esc_url( add_query_arg( 'js-post-type', $args['post_type'], $url ) );
	
	    echo '<div class="row"><div class="col-md-12 text-center see-more"><a href="' . $url . '" class="btn btn-large btn-primary text-uppercase">';
	    echo $args['see_all_text'];
	    echo '</a></div></div>';
	  }
	}
	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}