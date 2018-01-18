<?php get_header(); ?>
<main role="main" class="main-content">
	<?php get_template_part('breadcrumb'); ?>
	<h1 class="title-highlight"><span><h1><?php _e( 'Articles', 'malcolmfrance' ); ?></h1></span></h1>
	<section class="items">
		<?php get_template_part('loop'); ?>
	</section><!-- /items end -->
	<?php get_template_part('pagination'); ?>
</main><!--/ main-content end -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>