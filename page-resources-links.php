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
   <div class="top-section">
	  <div class="container">
	   <div class="row">
		   <div class="col-md-6">
				<h1 class="category-title"><?php the_title( '', false ); ?></h1>
				<h5 class="category-description">Online Resources for New York City Tenants and Housing Advocates.</h5>
		   </div>
		   <div id="resource-quote" class="col-md-4 col-md-offset-2">
				<span class="resource-quote">“Easily New York’s best online resource for New York landlord-tenant case law, statutes, secondary authority, and a great deal more law . . .”</span></br>
				<span class="quote-credit">– Gerald Lebovits, N.Y. Real Property Law Journal</span>
	            
		  </div>
	    </div>
	  </div>
	</div>
<?php endwhile; ?>
<?php endif; ?>
	
<div class="container">
	<div class="row md-bottom">
		<div class="col-md-9">
		<?php
			$scroller_var = '';
			$resource_query = hca_get_resources_query();
			if( $resource_query->have_posts() ) {
				while( $resource_query->have_posts() ){
					$resource_query->the_post();
					$post_slug = basename(get_permalink());
					$post_title = get_the_title();
					 ?>
					<article <?php post_class(); ?>>
						<span class="anchor" id="<?php echo( basename(get_permalink()) ); ?>"></span>
						<hr/>
						<h3 class="section-title"><?php the_title(); ?></h3>
						<div class="links-post-content"><?php the_content(); ?></div>
					</article>
					<?php $scroller_var .= '<li><a href="#'. $post_slug . '">'. $post_title . '</a></li>';	?>
	   <?php	}
			}
	
		?>
		</div>
		
		<div id="scroll-spy" class="col-md-3" role="complementary">
			  <ul id="nav" class="sub-nav nav hidden-xs hidden-sm" data-spy="affix" data-offset-top="250" data-offset-bottom="748">              
					<?php echo $scroller_var; ?>
			  </ul>
        </div>
	</div>
</div>

<?php get_footer();?>