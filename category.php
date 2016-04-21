<?php
/**
 * The template for displaying Category Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php get_header();?>

<?php
	// maybe print out the current category description and posts first and then exclude it from the loop?
$current_category = get_category( get_query_var( 'cat' ) );
$current_cat_id = $current_category->cat_ID;
$scroller_var = '';
echo "The current page category is: " . $current_cat_id . "<br/>";

$args = array(
	'type'                     => 'post',
	'child_of'                 => $current_cat_id,
	'parent'                   => '',
	'orderby'                  => 'slug',
	'order'                    => 'ASC',
	'hide_empty'               => 0,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'category',
	'pad_counts'               => false 

);
$categories = get_categories( $args );
$current_cat_count = count($categories);
echo "Number of Categories is: " . $current_cat_count . '<br/>';
if ($current_cat_count > 1 ) {
	foreach ( $categories as $category ) {
		// get all posts for each category as we loop through the categories
		echo '<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a><br/>';
		
		// concatenate each category link and slug into the scrollspy list variable
		$scroller_var .= '<li><a href="#'. $category->slug . '">'. $category->name . '</a></li>';		
	}
} else { ?>
		<?php if ( have_posts() ): ?>
			<h1 class="category-title"><?php echo single_cat_title( '', false ); ?></h1>
			<h5 class="category-description"><?php echo category_description(); ?></h5>
		<?php endif; ?>

<?php } ?>

<?php 
/**
$category->term_id
$category->name
$category->slug
$category->term_group
$category->term_taxonomy_id
$category->taxonomy
$category->description
$category->parent
$category->count
$category->cat_ID
$category->category_count
$category->category_description
$category->cat_name
$category->category_nicename
$category->category_parent	
	
*/

?>

<div id="scroll-spy" class="col-md-3" role="complementary">
   <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix" data-spy="affix" data-offset-top="227" data-offset-bottom="748">
	   <ul id="nav" class="sub-nav nav hidden-xs hidden-sm">
	   		<?php echo $scroller_var; ?>
	  </ul>
   </nav>
</div>



<?php if ( have_posts() ): ?>


<div class="top-section">
  <div class="container">
   <div class="row">
	   <div class="col-md-8">
			<?php if ( have_posts() ): ?>
			<h1 class="category-title"><?php echo single_cat_title( '', false ); ?></h1>
			<h5 class="category-description"><?php echo category_description(); ?></h5>
			<?php endif; ?>
	   </div>
	   <div id="hotline-callout" class="col-md-4">
			<span class="hotline-small-title">Housing Court Answers Hotline</span>
			</br>9 am to 5 pm
            </br>Tuesday — Thursday
            </br><a class="btn btn-default hotline-btn" role="button" href="">Call (212) 962-4795</a>
	  </div>
    </div>
  </div>
</div>


<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <hr/>
         <h3 class="section-title">Common Questions</h3>
      </div>
   </div>
</div>


<div class="container">
   <div class="row">
      <div class="col-sm-10" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
				<article>
					<h5 class="small-title"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h5>
					<div class="post-content"><?php the_content(); ?></div>
				</article>
		<?php endwhile; ?>
	   </div>
   </div>
</div>
		<?php else: ?>
<div class="top-section">
  <div class="container">
   <div class="row">
	   <div class="col-md-8">
			<h1 class="category-title"><?php echo single_cat_title( '', false ); ?></h1>
			<h5 class="category-description"><?php echo category_description(); ?></h5>
	   </div>
	   <div id="hotline-callout" class="col-md-4">
			<span class="hotline-small-title">Housing Court Answers Hotline</span>
			</br>9 am to 5 pm
            </br>Tuesday — Thursday
            </br><a class="btn btn-default hotline-btn" role="button" href="">Call (212) 962-4795</a>
	  </div>
    </div>
  </div>
</div>
		<?php endif; ?>

<?php get_footer();?>