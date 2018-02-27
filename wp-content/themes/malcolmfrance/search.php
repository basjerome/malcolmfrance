<?php get_header(); ?>
<main role="main"  class="main-content">
	<?php get_template_part('breadcrumb'); ?>
	<h2 class="title-highlight"><span>Recherche</span></h2>
	<h1 class="page-title" itemprop="headline"><?php echo sprintf( __( 'Résultats pour votre recherche ', 'malcolmfrance' ), $wp_query->found_posts ); echo '"'; echo get_search_query(); echo '"'; ?></h1>
	<section class="items">
		<h3 class="section-title"><span><?php echo sprintf( __( 'Résultats (%s)', 'malcolmfrance' ), $wp_query->found_posts ); ?></span></h3>
		<?php get_template_part('loop'); ?>
	</section>
	<?php get_template_part('pagination'); ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>