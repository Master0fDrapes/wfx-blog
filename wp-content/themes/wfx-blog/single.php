<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package theme_name
 */

get_header();
$t_options = get_option('tp_opt');
global $gdir;
?>

  <section class="blog_details_area">
    <div class="container sm_container ">
      <div class="blog_content_area">

        <div class="col-12 col-lg-11 mx-auto">
          <img src="<?php echo get_field('banner_image_desktop', get_the_ID()); ?>" class="hide_for_sm w-100 blog-banner-img">
          <img src="<?php echo get_field('banner_image_mobile', get_the_ID()); ?>/img/sm_blog_img.png" class="hide_for_lg sm_blg_img blog-banner-img">
        </div>

        <div class="col-lg-8 col-12 mx-auto">

					<div class="blog_content_details">

						<div class="content_side_spacing">
							<h1><?php echo get_the_title(); ?></h1>
							<p class="posting_info">12 min read • <?php echo get_the_date('jS, M Y') ?></p>
						</div>

						<?php if( have_rows('blog_details') ): ?>
							<?php while( have_rows('blog_details') ): the_row(); ?>

								<?php if( get_row_layout() == 'blg_heading_n_content' ): ?>
									<div class="content_side_spacing">

										<h5 class="subheadings_content"><?php echo get_sub_field('heading'); ?></h5>
										<?php if(get_sub_field('show_image')): ?>
											<img src="<?php echo get_sub_field('contentImage'); ?>" class="blog_inner_pages">
										<?php endif; ?>

										<div class="px-md-0 px-2">
											<?php foreach (get_sub_field('textContent') as $value) : ?>
												<p class="blog-content"><?php echo $value['textContentMainText'] ?></p>
											<?php endforeach; ?>
										</div>

									</div>

								<?php elseif( get_row_layout() == 'blg_hero' ): ?>
									<?php $fileurl = get_sub_field('hero_cta_link'); ?>
									<div class="blog_content_ads" style="background: url('<?php echo get_sub_field('background_image') ?>');">
										<h2><?php echo get_sub_field('hero_heading'); ?></h2>
										<?php if ($fileurl){ ?>
											<a href="<?php echo esc_url(site_url('?acf_file=' . urlencode($fileurl))); ?>" class="btn book_demo_btn blog_d_ads bdbtuon"><?php echo get_sub_field('hero_cta_text'); ?></a>
										<?php } ?>
										<?php if ($fileurl) { $file_key = 'download_count_' . md5($fileurl); $count = get_option($file_key, 0); ?><p class="mb-0"><?php echo $count; ?> People Downloaded</p> <?php } ?>
									</div>

								<?php elseif( get_row_layout() == 'content_only' ): ?>
									<div class="px-md-0 px-2">
										<?php if (get_sub_field('only_content')) { ?>
											<p class="blog-content"><?php echo get_sub_field('only_content'); ?></p>
										<?php } ?>
									</div>

								<?php elseif( get_row_layout() == 'download_with_form' ): ?>
									<div class="innerblog_wallpaper mb-5" style="background: url('<?php echo get_sub_field('background_image') ?>')">
										<div class="content_unerblog_ad">
											<h2><?php echo get_sub_field('heading_for_section') ?></h2>
											<div class="paper_form_area">
												<div class="row blog_inner_form_main">
													<div class="col-lg-6 col-md-6 col-12">
														<div class="blog_inner_form text-center ">
															<?php
																$cfId = get_sub_field('add_contact_form_id');
																if (class_exists('WPCF7_ContactForm')) {
																	$form = WPCF7_ContactForm::get_instance($cfId);
																	echo $form->form_html();
																}
															?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

								<?php elseif( get_row_layout() == 'subscription_form' ): ?>
									<div class="subscribe_newsletter" style="background: url(<?php echo get_sub_field('background_image')?>);">
										<h4 class="bn_h5"><?php echo get_sub_field('top_heading') ?></h4>
										<h2 class="bn_h2"><?php echo get_sub_field('main_heading') ?></h2>
										<div class="blog_inner_form text-center">

											<div class="row">
												<div class="col-lg-3 col-md-3 col-12"></div>
												<div class="col-lg-6 col-md-6 col-12">
													<?php
														$cfId = get_sub_field('add_form_code');
														if (class_exists('WPCF7_ContactForm')) {
															$form = WPCF7_ContactForm::get_instance($cfId);
															echo $form->form_html();
														}
													?>
												</div>
												<div class="col-lg-3 col-md-3 col-12"></div>
											</div>

										</div>
									</div>
								<?php endif; ?>

							<?php endwhile; ?>
						<?php endif; ?>

					</div>

          <div class="post_footer_area  ">
						<?php if (get_field('social_media_share',get_the_ID())) : ?>
							<div class="social_media_sharing">
								<span class="sharing_lable">Share article:</span>
								<a href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink();?>&text=<?php echo get_the_title();?>" class="sharing_links"><img src="<?php echo $gdir; ?>/img/x.svg"></a>
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink();?>" class="sharing_links"><img src="<?php echo $gdir; ?>/img/fbb.svg"></a>
								<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink();?>" class="sharing_links"><img src="<?php echo $gdir; ?>/img/linked.svg"></a>
								<a href="#" class="sharing_links"><img src="<?php echo $gdir; ?>/img/copy.svg"></a>
							</div>
						<?php endif; ?>
            <!-- About Admin Area -->
					<?php $authorID = get_field('blog_author_card'); ?>
						<?php if($authorID){?>
							<?php foreach($authorID as $author){ ?>
								<div class="bpost_admin_area">
									<div class="row">
										<div class="col-lg-2 col-md-2 col-2 p-0 d-md-block d-none">
											<img src="<?php echo get_the_post_thumbnail_url($author->ID); ?>" class="writer_admin">
										</div>
										<div class="col-lg-10 col-md-10 col-12 p-0">
											<div class=" d-md-none d-flex">
												<div>
													<img src="<?php echo get_the_post_thumbnail_url($author->ID); ?>" class="writer_admin">
												</div>

											</div>
											<div class="write_adming_details">

												<h5><?php echo get_the_title($author->ID); ?></h5>
												<h6><?php get_field('author_designation',$author->ID) ?></h6>
												<?php echo get_post_field('post_content', $author->ID); ?>
												<div class="social_media_sharing">
													<span class="sharing_lable">Author Social Media:</span>
													<a href="<?php echo get_field('twitter_x',$author->ID) ?>" class="sharing_links"><img src="<?php echo $gdir; ?>/img/x.svg"></a>
													<a href="<?php echo get_field('facebook',$author->ID) ?>" class="sharing_links"><img src="<?php echo $gdir; ?>/img/fbb.svg"></a>
													<a href="<?php echo get_field('linkedin',$author->ID) ?>" class="sharing_links"><img src="<?php echo $gdir; ?>/img/linked.svg"></a>
												</div>

											</div>
										</div>
									</div>
								</div>
							<?php	} ?>
						<?php	} ?>


          </div>

        </div>
      </div>
    </div>
  </section>


<?php
get_footer();
