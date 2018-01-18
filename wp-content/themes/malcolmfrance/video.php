<?php  /* Template Name: Video Page Template */  get_header(); ?>
<main role="main" class="main-content" itemscope itemtype="http://schema.org/VideoObject">
	<?php get_template_part('breadcrumb'); ?>
	<div class="page-content">
		<h2 class="title-highlight"><span><?php echo get_the_title( $post->post_parent ); ?></span></h2>
		<h1 class="page-title"><?php the_title(); ?></h1>
		<div class="row post-meta">
			<div class="col-sm-6">
				<span class="edit">
					<i class="fa fa-cog" aria-hidden="true"></i>
					<?php edit_post_link(); ?>
				</span>
			</div>
		</div><!-- /post-meta end -->
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<div itemprop="video" itemscope itemtype="http://schema.org/VideoObject">
			<section class="video">
			  <meta itemprop="duration" content="T<?php the_field('mf_video_minutes'); ?>M<?php the_field('mf_video_secondes'); ?>S" />
			  <meta itemprop="thumbnailUrl" content="<?php echo the_post_thumbnail_url(); ?>" />
			  <meta itemprop="contentURL" content="<?php the_field('mf_video_src'); ?>" />
			  <meta itemprop="uploadDate" content="<?php the_time('c'); ?>" />
			  <meta itemprop="height" content="450" />
			  <meta itemprop="width" content="800" />
				<div class="embed-responsive embed-responsive-16by9">
					<?php the_field('mf_video_embed'); ?>
				</div>
			</section>
			<h1 class="page-title" itemprop="name"><?php the_title(); ?></h1>
			<h3 class="section-title"><span>Description</span></h3>
			<div itemprop="description"><?php the_content(); ?></div>
				<?php 
					$posts = get_field('mf_video_episode');
					if( $posts ):
				?>
				<section class="origine">
					<ul>
						<li>Extrait de l'épisode</li>
						<?php foreach( $posts as $post): ?>
						<?php setup_postdata($post); ?>
						<li>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">&laquo; <?php the_title(); ?> &raquo;</a>
						</li>
						<?php endforeach; ?>
					</ul>
				</section>
				<?php wp_reset_postdata(); ?>
				<?php endif; ?>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
		<section class="tags">
			<?php the_tags( __( 'Mots clés ', 'malcolmfrance' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
		</section>
		<div class="share">
			<h5 class="title">Partager</h5>
			<div class="addthis addthis_sharing_toolbox"></div>
		</div>
		<div class="ad text-center">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- Pub responsive -->
			<ins class="adsbygoogle"
					 style="display:block"
					 data-ad-client="ca-pub-6780914486364604"
					 data-ad-slot="5719271218"
					 data-ad-format="auto"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>
		<?php
			$orig_post = $post;
			global $post;
			$tags = wp_get_post_tags($post->ID);
			if ($tags) :
			$tag_ids = array();
			foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id; $args=array( 'post_type' => 'page', 'tag__in' => $tag_ids, 'post__not_in' => array($post->ID), 'posts_per_page'=> 3 );
			$my_query = new WP_Query( $args );
			if( $my_query->have_posts() ) :
		?>
		<section class="more-videos">
			<h4 class="section-title"><span>Plus de vidéos</span></h4>
			<div class="row">
				<?php
					while( $my_query->have_posts() ) :
					$my_query->the_post();
				?>
				<article class="col-md-4">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<i class="fa fa-play-circle-o"></i>
						<span><?php the_title(); ?></span>
					<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-responsive">
					</a>
				</article>
				<?php
					endwhile;
				?>
			</div>
		</section>
		<?php
			endif;
			endif;
			$post = $orig_post;
			wp_reset_query();
		?>
		<?php comments_template(); ?>
	</div><!-- /page-content -->
</main><!--/ main-content end -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>