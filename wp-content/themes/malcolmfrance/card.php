<?php  /* Template Name: Card Page Template */  get_header(); ?>
<main role="main" class="main-content">
	<?php get_template_part('breadcrumb'); ?>
	<div class="page-content">
		<h2 class="title-highlight">
			<span>
			<?php
				if (is_page()) {
					$myAncestors = get_post_ancestors($post);
					if ($myAncestors) {
						$myAncestors = array_reverse($myAncestors);
						foreach ($myAncestors as $crumb) {
							echo get_the_title($crumb);
						}
					}
				}
			?>
			</span>
		</h2>
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
			<?php the_field('mf_card'); ?>
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
			<?php the_content(); ?>
		</article>
		<?php endwhile; ?>
		<?php endif; ?>
	</div><!-- /page-content -->
</main><!--/ main-content end -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
