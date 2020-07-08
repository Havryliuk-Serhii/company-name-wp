<?php
/**
 *Template Name: Home Page
 */
get_header();
?>
<!-- Hero slider -->
<?php $slider = new WP_Query(array('post_type' => 'slider', 'posts_per_page'=> 3,'order' => 'ASC')) ?>
<div class="hero-slider owl-carousel owl-theme">
	<?php if ( $slider->have_posts() ) : 
			while ( $slider->have_posts() ) : $slider->the_post(); ?>
		<article class="slide" <?php echo twentytwenty_thumbnail(); ?>>
			<div class="container">
				<div class="carousel-caption">
					<h1><?php the_title(); ?></h1>
					<p><?php the_content(); ?></p>
				</div>
			</div>
		</article>
	    <?php endwhile;
	        	endif; 
	    	wp_reset_postdata();
	?>             
</div>
<!-- Services -->	
<div class="services">
	<div class="container">
		<?php
			$post_service = new WP_Query(
				array(
					'post_type' => 'services',
					'posts_per_page' => 4,
					'order' => 'ASC'
			));
			if ($post_service ->have_posts() ) : 
             	while ($post_service->have_posts() ) :
             	 		$post_service->the_post();
        	?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('service-item'); ?>>
				<div class="service-img">
					<?php the_post_thumbnail(); ?>					
				</div>
				<h2 class="item-title"><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</article>
		<?php endwhile;
				endif;
            wp_reset_query();
        ?>   
	</div>
</div>
<!-- Portfolio -->
<div class="portfolio">
	<div class="container">
		<h3 class="section-title"><?php the_field('porfolio_title') ?></h3>
	</div>
	<div class="container">	
		<div class="portfolio-slider owl-carousel owl-theme">
			<?php  $portfolio_slider = new WP_Query( array('post_type' => 'portfolio','posts_per_page' => 4, 'order' => 'ASC') );
					if($portfolio_slider->have_posts()) :
						while ( $portfolio_slider->have_posts()) :
							$portfolio_slider->the_post();
			?>
			<article class="portfolio-item">
				<?php the_post_thumbnail(); ?>
				<a href="<?php the_permalink() ?>" class="overlay"></a>
				<div class="overlay-content">
					<div class="overlay-link">
						<i class="fas fa-plus"></i>
					</div>
				</div>	
				<div class="portfolio-caption">
					<h4 class="portfolio-title"><?php the_title(); ?></h4>
				</div>
			</article>
			<?php endwhile;
					endif;
					wp_reset_query();
			?>
		</div>
	</div>		
</div>
<!-- Blog -->
<div class="news">
	<div class="container">
		<h2 class="section-title"><?php the_field('news_title') ?></h2>
	</div>
	<div class="container">	
		<?php
			$posts_blog = new WP_Query(array('cat'->ID, 'posts_per_page' => 1));
			if ($posts_blog->have_posts() ) : 
             		while ($posts_blog->have_posts() ) : $posts_blog->the_post();
        ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('post-article'); ?>>
			<?php the_post_thumbnail(); 
			$tags = get_the_tags($post->ID);
			if ($tags && count($tags)): ?>
				<div class="tags-info">
					<?php foreach ($tags as $tag) { ?>
						<span><?php echo $tag->name; ?></span>
					<?php } ?>					
				</div>
				<div class="tag-wrapper"></div>
			<?php endif; ?>

			<div class="post-body">
				<h4 class="post-title"><?php the_title(); ?></h4>
				<?php the_content(); ?>
			</div>
		</article>	
		<?php endwhile;
				endif;
            wp_reset_query();
        ?>    					
	</div>
</div>	
<?php get_footer();