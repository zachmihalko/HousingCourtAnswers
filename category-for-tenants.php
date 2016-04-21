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
	   <div class="col-md-9" role="main">
	      <div class="category-page-section">
	        <?php 
			$query = new WP_Query( array( 'name' => 'introduction-for-tenants' ) );
			?>
			<span class="anchor" id="introduction"></span>
			<hr/>
			<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
			<h3 class="section-title"><?php the_title(); ?></h3>
			<?php the_content(); ?>
		  </div>
		  <?php endwhile;?>
		  <?php wp_reset_postdata(); ?>
		  
		  <div class="category-page-section">
		    <span class="anchor" id="court"></span>
		    <hr/>
		    <h3 class="section-title"><?php echo get_cat_name(6);?></h3>
		    <h6 class="section-description"><?php echo category_description(6); ?></h6>
		    
		    <?php 
		    $category_id = get_cat_ID( 'Non-Payment Case — Getting sued for back rent' );
			$category_link = get_category_link( $category_id );
			?>
			<div class="post-category-section">
			<h5 class="small-title"><a href="<?php echo esc_url( $category_link ); ?>"><?php echo get_cat_name(7);?></a></h5>
			<?php echo category_description(7); ?>
				<a class="btn btn-default end-button" role="button" href="<?php echo esc_url( $category_link ); ?>">More On Non-Payment Cases</a>
			</div>
			
			<?php 
		    $category_id = get_cat_ID( 'How can I get help to pay my back rent?' );
			$category_link = get_category_link( $category_id );
			?>
			<div class="post-category-section">
			<h5 class="small-title"><a href="<?php echo esc_url( $category_link ); ?>"><?php echo get_cat_name(8);?></a></h5>
			<?php echo category_description(8); ?>
			<a class="btn btn-default end-button" role="button" href="<?php echo esc_url( $category_link ); ?>">More On Rent Arrears</a>
			</div>
			
			<?php 
		    $category_id = get_cat_ID( 'Holdover Case — Private Dwellings' );
			$category_link = get_category_link( $category_id );
			?>
			<div class="post-category-section">
			<h5 class="small-title"><a href="<?php echo esc_url( $category_link ); ?>"><?php echo get_cat_name(9);?></a></h5>
			<?php echo category_description(9); ?>
			<a class="btn btn-default end-button" role="button" href="<?php echo esc_url( $category_link ); ?>">More On Holdover Cases</a>
			</div>
			
			<?php 
		    $category_id = get_cat_ID( 'What happens at court?' );
			$category_link = get_category_link( $category_id );
			?>
			<div class="post-category-section">
			<h5 class="small-title"><a href="<?php echo esc_url( $category_link ); ?>"><?php echo get_cat_name(12);?></a></h5>
			<?php echo category_description(12); ?>
			<a class="btn btn-default end-button" role="button" href="<?php echo esc_url( $category_link ); ?>">More On The Court Process</a>
			</div>
		  </div>
		   
		  <div class="category-page-section">
		    <?php 
			$args = array('cat'=>'5','-2', 'posts_per_page'=>3, 'order'=>'DESC');
			$query = new WP_Query($args);
			?>
			<span class="anchor" id="repairs"></span>
			<hr/>
			<h3 class="section-title"><?php echo get_cat_name(5);?></h3>
			<h6 class="section-description"><?php echo category_description(5); ?></h6>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				         <article class="post-category-section">
							<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_content(); ?>	
			             </article>
			    <?php endwhile;?>
				<?php 
			    $category_id = get_cat_ID( 'I need repairs in my apartment' );
				$category_link = get_category_link( $category_id );
				?>
			   <a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-default end-button" role="button">More On HP Actions</a>
		   </div>
		   
		   <div class="category-page-section">
		    <?php 
			$args = array('cat'=>'148','-2', 'posts_per_page'=>2, 'order'=>'ASC');
			$query = new WP_Query($args);
			?>
			<span class="anchor" id="stipulations"></span>
			<hr/>
			<h3 class="section-title"><?php echo get_cat_name(148);?></h3>
			<h6 class="section-description"><?php echo category_description(148); ?></h6>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				         <article class="post-category-section">
							<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_content(); ?>	
			             </article>
			    <?php endwhile;?>
				<?php 
			    $category_id = get_cat_ID( 'Stipulations' );
				$category_link = get_category_link( $category_id );
				?>
			   <a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-default end-button" role="button">More On Stipulations</a>
		   </div>
		   
		   <div class="category-page-section">
		    <?php 
			$args = array('cat'=>'149','-2', 'posts_per_page'=>2, 'order'=>'DESC');
			$query = new WP_Query($args);
			?>
			<span class="anchor" id="evictions"></span>
			<hr/>
			<h3 class="section-title"><?php echo get_cat_name(149);?></h3>
			<h6 class="section-description"><?php echo category_description(149); ?></h6>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				         <article class="post-category-section">
							<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_content(); ?>	
			             </article>
			    <?php endwhile;?>
				<?php 
			    $category_id = get_cat_ID( 'What will happen during an eviction?' );
				$category_link = get_category_link( $category_id );
				?>
			   <a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-default end-button" role="button">More On Evictions</a>
		   </div>
		   
		   <div class="category-page-section">
		    <?php 
			$args = array('cat'=>'150','-2', 'posts_per_page'=>2, 'order'=>'DESC');
			$query = new WP_Query($args);
			?>
			<span class="anchor" id="order-to-show-cause"></span>
			<hr/>
			<h3 class="section-title"><?php echo get_cat_name(150);?></h3>
			<h6 class="section-description"><?php echo category_description(150); ?></h6>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				         <article class="post-category-section">
							<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_content(); ?>	
			             </article>
			    <?php endwhile;?>
				<?php 
			    $category_id = get_cat_ID( 'How can I stop an eviction?' );
				$category_link = get_category_link( $category_id );
				?>
			   <a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-default end-button" role="button">More On Stopping Evictions</a>
		   </div>
		   
		   <div class="category-page-section">
		    <?php 
			$args = array('cat'=>'151','-2', 'posts_per_page'=>2, 'order'=>'DESC');
			$query = new WP_Query($args);
			?>
			<span class="anchor" id="judgements-tenant-screening-and-credit-reports"></span>
			<hr/>
			<h3 class="section-title"><?php echo get_cat_name(151);?></h3>
			<h6 class="section-description"><?php echo category_description(151); ?></h6>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				         <article class="post-category-section">
							<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_content(); ?>	
			             </article>
			    <?php endwhile;?>
				<?php 
			    $category_id = get_cat_ID( 'Judgements, Tenant Screening Reports and Credit Reports' );
				$category_link = get_category_link( $category_id );
				?>
			   <a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-default end-button" role="button">More On Judgements, Tenant & Credit Report</a>
		    </div>
		    
		    <div class="category-page-section">
		    <?php 
			$query = new WP_Query( array( 'post__in' => array( 383 ) ) );
			?>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				         <span class="anchor" id="<?php echo( basename(get_permalink()) ); ?>"></span>
			             <hr/>
			             <h3 class="section-title"><?php the_title(); ?></h3>
						 <div class="post-content"><?php the_content(); ?></div>
			    <?php endwhile;?>
		   <?php wp_reset_query(); ?>
		   </div>
		   
		    <div class="category-page-section">
		    <?php 
			$query = new WP_Query( array( 'post__in' => array( 390 ) ) );
			?>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				         <span class="anchor" id="<?php echo( basename(get_permalink()) ); ?>"></span>
			             <hr/>
			             <h3 class="section-title"><?php the_title(); ?></h3>
						 <div class="post-content"><?php the_content(); ?></div>
			    <?php endwhile;?>
		   <?php wp_reset_query(); ?>
		   </div>
		   
		   <div class="category-page-section">
		    <?php 
			$args = array('cat'=>'155','-2', 'posts_per_page'=>2, 'order'=>'DESC');
			$query = new WP_Query($args);
			?>
			<span class="anchor" id="roommate-issues"></span>
			<hr/>
			<h3 class="section-title"><?php echo get_cat_name(155);?></h3>
			<h6 class="section-description"><?php echo category_description(155); ?></h6>
				<?php while($query->have_posts()): $query->the_post();?>
				<?php $postid = get_the_ID(); ?>
				         <article class="post-category-section">
							<h5 class="small-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php the_content(); ?>	
			             </article>
			    <?php endwhile;?>
		    </div>
		  
		</div>
		
		
		<div id="scroll-spy" class="col-md-3" role="complementary">
			  <ul id="nav" class="sub-nav nav hidden-xs hidden-sm" data-spy="affix" data-offset-top="227" data-offset-bottom="748">              
					<li>
					  <a href="#introduction">Introduction</a>
					</li>
					<li>
					  <a href="#court"><?php echo get_cat_name(6);?></a>
					</li>
					<li>
					  <a href="#repairs"><?php echo get_cat_name(5);?></a>
					</li>
					<li>
					  <a href="#stipulations"><?php echo get_cat_name(148);?></a>
					</li>
					<li>
					  <a href="#evictions"><?php echo get_cat_name(149);?></a>
					</li>
					<li>
					  <a href="#order-to-show-cause"><?php echo get_cat_name(150);?></a>
					</li>
					<li>
					  <a href="#judgements-tenant-screening-and-credit-reports"><?php echo get_cat_name(151);?></a>
					</li>
					<li>
					  <a href="#things-to-know"><?php echo get_the_title('383'); ?></a>
					</li>
					<li>
					  <a href="#apartment-type"><?php echo get_the_title('390'); ?></a>
					</li>
					<li>
					  <a href="#roommate-issues"><?php echo get_cat_name(155);?></a>
					</li>
			  </ul>
        </div>
	</div>
</div>

<?php get_footer();?>