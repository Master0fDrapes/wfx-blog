<?php
	/**
	 * The main template file
	 *
	 * This is the most generic template file in a WordPress theme
	 * and one of the two required files for a theme (the other being style.css).
	 * It is used to display a page when nothing more specific matches a query.
	 * E.g., it puts together the home page when no home.php file exists.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package theme_name
	 */

	get_header();
	$t_options = get_option( 'tp_opt' );
	global $gdir;
?>
	<?php
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 1,
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'category',
					'terms' => 'featured-blog',
					'field' => 'slug',
					'operator' => 'IN',
				),
			)
		);
		$query = new WP_Query($args);
	?>

	<?php if($query->have_posts()) : ?>
		<?php while($query->have_posts()) : $query->the_post();?>
			<section class="blog_header_area hide_for_sm">
				<div class="container">
					<div class="b_header_content">
						<div class="row">
							<div class="col-lg-6">
								<div class="b_content">
									<h6><?php echo getTermsNameInArray(get_the_ID(), 'category')[0];  ?></h6>
									<h1><?php echo get_the_title(get_the_ID()); ?></h1>
									<p><?php echo get_the_excerpt(get_the_ID()); ?></p>
									<a href="<?php echo get_the_permalink(get_the_ID()); ?>" class="btn demo_btn demo_sm_btn px-5">Read More</a>
								</div>
							</div>
							<div class="col-lg-6">
								<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" class="w-100" alt="<?php echo get_the_title(get_the_ID()); ?>">
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php endwhile; wp_reset_query(); ?>
	<?php endif ?>

	<section class="blog_posts_area">
		<div class="container">
			<h2 class="blog_page_heading">All Blogs</h2>

			<div class="blog_tab_buttons">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="blog_tab_btns d-flex justify-content-center">
							<button class="active" data-tab="all"><span>All</span></button>
							<?php $categories = get_categories();
								foreach ($categories as $category) { ?>
									<button class="filter-btn" data-category="<?php echo $category->term_id; ?>">
										<span><?php echo $category->name; ?></span>
									</button>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>

			<div class="blog_posts_cards">
				<div class="blog_rows">
					<?php
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => 1,
							'order' => 'ASC',
						);
						$query = new WP_Query($args);
					?>
					<!-- Blog Card -->
					<div class="post">
						<div class="blog-content" id="post-container">
							<?php if($query->have_posts()) : ?>
								<?php while($query->have_posts()) : $query->the_post(); ?>
									<div class="col-lg-4 col-md-6 mb-4 c-mb-20">
										<div class="card blog_cards">
											<img src="<?php echo get_the_post_thumbnail_url() ?>" class="card-img-top" alt="" loading="lazy">
											<div class="card-body">
												<h5 class="card-title blog_titles"><?php echo get_the_title(); ?></h5>
												<p class="blog_description"><?php echo get_the_excerpt(); ?></p>
												<a href="<?php echo get_the_permalink(); ?>" class="link blog_link">Read More</a>
											</div>
										</div>
									</div>
								<?php endwhile; wp_reset_postdata(); ?>
							<?php endif; ?>
						</div>
					</div>
					<!-- Blog Card Ends -->
				</div>
				<!-- Load More Button -->
				<?php if ($query->max_num_pages > 1) : ?>
					<div class="text-center mt-4">
						<button id="load-more" data-max-pages="<?php echo $query->max_num_pages; ?>" class="trans_csa_button read_moresm_btn load_articles">Load More Articles</button>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="subscribe_area">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-lg-4 text-end">
					<img src="<?php echo $gdir; ?>/img/subscribe_img.png" class="img-fluid hide_for_sm" alt="Subscribe to WFX">
				</div>
				<div class="col-lg-8">
					<h2 class="subs_heading">Get the latest on fashion tech! Subscribe to our newsletter</h2>
					<p class="sub_pera">By subscribing to WFX's newsletter, you can expect to receive:</p>
					<form class="d-md-flex">
						<input type="email" name="subs_email" placeholder="Business Email" class="subs_email_input" required>
						<button class="btn subs_btn mb-md-0">Subscribe</button>
					</form>
				</div>
			</div>
		</div>
	</section>

<?php
	get_footer();
