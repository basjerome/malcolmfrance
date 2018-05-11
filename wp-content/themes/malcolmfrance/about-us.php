<?php  /* Template Name: About Us Page Template */  get_header(); ?>
<main role="main" class="main-content">
	<?php get_template_part('breadcrumb'); ?>
	<div class="page-content">
		<h2 class="title-highlight"><span><?php echo get_the_title( $post->post_parent ); ?></span></h2>
		<h1 class="page-title"><?php the_title(); ?></h1>
		<div class="row post-meta">
			<div class="col-sm-6">
				<span class="edit">
					<?php edit_post_link( __( 'Edit', 'malcolmfrance' ), '<i class="fas fa-cog" aria-hidden="true"></i> ', '', null, '' ); ?>
				</span>
			</div>
		</div><!-- /post-meta end -->
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
			<div class="illustration" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
				<img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php echo get_post(get_post_thumbnail_id())->post_title; ?>" class="img-responsive" />
				<span class="copyright">&copy; <?php echo get_post(get_post_thumbnail_id())->_wp_attachment_image_alt; ?></span>
				<meta itemprop="url" content="<?php echo the_post_thumbnail_url(); ?>">
				<meta itemprop="width" content="2000">
				<meta itemprop="height" content="1125">
			</div>
			<div class="legend"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></div>
			<?php endif; ?>
			<section class="history">
				<?php the_content(); ?>
			</section>
			<?php if( have_rows('mf_website') ) : ?>
			<section class="website">
				<h3 class="section-title"><span>Versions du site</span></h3>
				<div class="row text-center">
					<?php while( have_rows('mf_website') ): the_row();
						$screenshot = get_sub_field('mf_screenshot');
						$version = get_sub_field('mf_version');
						$online = get_sub_field('mf_online');
					?>
					<div class="col-md-4">
						<img src="<?php echo $screenshot['url']; ?>" alt="Malcolm France version <?php echo $version; ?>" class="img-responsive">
						<div class="legend">
							Version <?php echo $version; ?><br />
							<?php echo $online; ?>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</section>
			<?php endif; ?>
			<?php if( have_rows('mf_trombinoscope') || have_rows('mf_authors_list') ) : ?>
			<section class="team">
				<?php if( have_rows('mf_trombinoscope') ) : ?>
				<h3 class="section-title"><span>L'équipe</span></h3>
				<div class="mosaic clearfix">
					<?php while( have_rows('mf_trombinoscope') ): the_row();
						$lastname = get_sub_field('mf_member_lastname');
						$firstname = get_sub_field('mf_member_firstname');
						$picture = get_sub_field('mf_member_picture');
					?>
					<a href="#" title="<?php echo $firstname; ?> <?php echo $lastname; ?>" data-toggle="tooltip" data-placement="top">
						<img src="<?php echo $picture['url']; ?>" alt="<?php echo $firstname; ?> <?php echo $lastname; ?>" class="img-responsive" />
					</a>
					<?php endwhile; ?>
				</div><!-- /mosaic -->
				<?php endif; ?>
				<?php if( have_rows('mf_credits') ) : ?>
				<div class="credits">
					<?php while( have_rows('mf_credits') ): the_row();
						$office = get_sub_field('mf_office');
					?>
					<dl class="row">
					 	<dt class="col-md-6 job"><?php echo $office; ?></dt>
					 	<dd class="col-md-6 name">
					 		<?php while( have_rows('mf_member') ): the_row();
								$lastname = get_sub_field('mf_lastname');
								$firstname = get_sub_field('mf_firstname');
							?>
					 		<a href="#" title=""><?php echo $firstname; ?> <?php echo $lastname; ?></a><br />
					 		<?php endwhile; ?>
						</dd>
					</dl>
					<?php endwhile; ?>
				</div><!-- /credits -->
				<?php endif; ?>
			</section>
			<?php endif; ?>
		</article>
		<?php endwhile; ?>
		<?php endif; ?>
	</div><!-- /page-content -->
</main><!--/ main-content end -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
