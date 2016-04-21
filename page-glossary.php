<?php
/**
 * Template Name: Glossary
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
	         <h3 class="section-title">Court Terms</h3>
	      </div>
       </div>
    </div>
	
	<div class="container">
		<div class="row md-bottom">
		<?php
			$args = array( 'hide_empty' => 0 );
			$i = 0;
			$terms = get_terms( 'post_tag', $args );
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			    $count = count( $terms );
			    $term_list = '<p class="my_term-archive">';
			    foreach ( $terms as $term ) {
			        echo '<div class="col-md-4"><a rel="tag" href="' . get_tag_link( $term ) . '">' . $term->name . '</a>';
			        echo '<p>'.$term->description .'</p></div>';
			        $i++;
			        
			        if($i==3){
						echo('</div><div class="row md-bottom">');//new row at 3rd post.
						$i = 0;
				    }  
			    }
			}			
		?>
		</div>
	</div>

<?php get_footer();?>