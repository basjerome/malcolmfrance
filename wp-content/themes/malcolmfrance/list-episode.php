<?php  /* Template Name: Episode List Page Template */  get_header(); ?>
<main role="main" class="main-content">
	<?php get_template_part('breadcrumb'); ?>
  <?php
    $current = $post->ID;
    $parent = $post->post_parent;
    $currentTitle = get_the_title();
    $parentTitle = get_the_title($parent);
  ?>
  <?php
    if ( $currentTitle === $parentTitle ) {
    	echo '<h1 class="title-highlight"><span>' . get_the_title() . '</span></h1>';
    } else {
    	echo '<h2 class="title-highlight"><span>' . get_the_title( $post->post_parent ) . '</span></h2>';
    	echo '<h1 class="page-title">' . get_the_title() . '</h1>';
    };
  ?>
	<div class="row post-meta">
		<div class="col-sm-6">
			<span class="edit">
				<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
			</span>
		</div>
	</div><!-- /post-meta end -->
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
			<div class="hidden" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
				<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
					<img src="<?php echo the_post_thumbnail_url(); ?>" />
					<meta itemprop="url" content="<?php the_permalink(); ?>">
					<meta itemprop="width" content="2000">
					<meta itemprop="height" content="1125">
				</div>
				<meta itemprop="name" content="<?php bloginfo('name'); ?>">
			</div>
			<meta itemprop="datePublished" content="<?php the_time('c'); ?>"/>
			<meta itemprop="dateModified" content="<?php the_modified_time('c'); ?>"/>
		<?php endif; ?>
		<?php the_content(); ?>
	</article>
	<?php endwhile; ?>
	<?php endif; ?>
	<?php
		global $post;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$ancestors = array();
		$ancestors = get_ancestors($post->ID,'page');
		$parent = (!empty($ancestors)) ? array_pop($ancestors) : $post->ID;
		if (!empty($parent)) {
		    $kids = new WP_Query(
		        array(
							'post_parent' => $post->ID,
							'post_type' => 'page',
							'orderby' => 'menu_order',
							'order' => 'ASC',
	            'ignore_sticky_posts' => true,
	            'paged' => $paged,
		        )
		    );
		    if ($kids->have_posts()) {
		    		echo '<section class="inserts">';
		    		echo '<div class="row">';
		        while ($kids->have_posts()) {
							$kids->the_post();
							$current = $post->ID;
							$parent = $post->post_parent;
							echo '<div class="col-sm-6">';
							echo '<a href="' . get_the_permalink() . '" class="clearfix" title="' . get_the_title() . '">';
							echo '<span class="content">';
							echo '<span class="number">';
							echo 'Épisode';
							echo '<span>';
							echo str_replace("Saison ","",get_the_title( $parent ));
							echo '.';
							if( get_field('mf_episode_number', $current) < 10) :
							echo '0';
							endif;
							echo the_field('mf_episode_number', $current);
							echo '</span>';
							echo '</span>';
							echo '<span class="title">&laquo;&nbsp;' . get_the_title() . '&nbsp;&raquo;</span>';
							echo '<span class="desc">';
							echo the_field('mf_extract');
							echo '</span>';
							echo '</span>';
							echo  get_the_post_thumbnail();
							echo '</a>';
							echo '</div>';
		        }
		        echo '</div><!-- /row -->';
		        echo '</section>';
		        if ( get_option('permalink_structure') ) {
		            $format = 'page/%#%';
		        } else {
		            $format = '&paged=%#%';
		        }
		        $args = array(
		            'base' => get_permalink( $post->post_parent ) . '%_%',
		            'format' => $format,
		            'current' => $paged,
		            'total' => $kids->max_num_pages,
				        'prev_text' => __('<i class="arrow-left"></i> Précédent'),
				        'next_text' => __('Suivant <i class="arrow-right"></i>'),
        				'type'      => 'list'
		        );
		        echo '<nav class="text-center">';
		        echo paginate_links( $args );
		        echo '</nav>';
		        wp_reset_postdata();
		    }
		}
	?>
</main><!--/ main-content end -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>