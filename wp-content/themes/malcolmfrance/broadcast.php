<?php  /* Template Name: Broadcast Page Template */  get_header(); ?>
<?php get_header(); ?>
<main role="main" class="main-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part('breadcrumb'); ?>
	<div class="page-content" itemscope itemtype="http://schema.org/NewsArticle">
		<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="https://google.com/article"/>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="title-highlight"><span>Actualité</span></h2>
			<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
			<div class="row post-meta">
				<div class="col-sm-6">
					<span class="edit">
						<i class="fa fa-cog" aria-hidden="true"></i>
						<?php edit_post_link(); ?>
					</span>
				</div>
				<div class="col-sm-6 text-right">
					<span class="comments"><i class="fa fa-commenting-o"></i> <a href="#disqus_thread" class="scroll-to" title="Voir les commentaires"><span class="disqus-comment-count" data-disqus-identifier="<?php the_permalink(); ?>">0 commentaire</span></a></span>
				</div>
			</div><!-- /post-meta end -->
			<?php if( !have_rows('mf_broadcasts') ) : ?>
			<p class="introduction" itemprop="description"><?php malcolmfrance_excerpt('malcolmfrance_index'); ?></p>
			<?php endif; ?>
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
			<div class="hidden" <?php if( have_rows('mf_broadcasts') ) : ?>class="hidden"<?php else : ?>class="illustration"<?php endif; ?> itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
				<img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php echo get_post(get_post_thumbnail_id())->post_title; ?>" class="img-responsive" />
				<span class="copyright">&copy; <?php echo get_post(get_post_thumbnail_id())->_wp_attachment_image_alt; ?></span>
				<meta itemprop="url" content="<?php echo the_post_thumbnail_url(); ?>">
				<meta itemprop="width" content="2000">
				<meta itemprop="height" content="1125">
			</div>
			<meta itemprop="datePublished" content="<?php the_time('c'); ?>"/>
			<meta itemprop="dateModified" content="<?php the_modified_time('c'); ?>"/>
			<?php if( !have_rows('mf_broadcasts') ) : ?><div class="legend"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></div><?php endif; ?>
			<?php endif; ?>
			<div class="share">
				<h5 class="title">Partager</h5>
				<div class="addthis addthis_sharing_toolbox"></div>
			</div>
			<?php the_content(); // Dynamic Content ?>
			<?php if( have_rows('mf_broadcasts') ) : ?>
			<section class="broadcasts">
				<div class="table-responsive">
					<table class="table table-hover table-condensed">
						<thead>
							<tr>
								<th>Date &amp; heure</th>
								<th>Épisode</th>
								<th class="text-center">Chaîne</th>
							</tr>
						</thead>
						<tbody>
							<?php while( have_rows('mf_broadcasts') ): the_row();
								$date = get_sub_field('mf_broadcasts_date', false, false);
								$date = new DateTime($date);
								$episode = get_sub_field('mf_broadcasts_episode');
								$channel = get_sub_field('mf_broadcasts_channel');
							?>
							<tr itemscope="" itemtype="http://schema.org/Event">
								<td>
									<meta itemprop="startDate" content="<?php echo $date->format('c'); ?>">
									<?php echo $date->format('l j F Y G:i'); ?>
								</td>
								<td>
									<?php foreach( $episode as $ep ): ?>
									<a href="<?php echo get_permalink( $ep->ID ); ?>" title="<?php echo get_the_title( $ep->ID ); ?>" itemprop="url">
										<span itemprop="name"><?php echo get_the_title( $ep->ID ); ?></span>
									</a>
									<?php endforeach; ?>
								</td>
								<td class="channel" itemprop="location" itemscope="" itemtype="http://schema.org/Place">
									<span class="hidden" itemprop="name">Malcolm</span>
									<span itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
										<span itemprop="addressLocality"><img src="<?php echo get_template_directory_uri(); ?>/img/logo/<?php echo $channel; ?>.svg" alt="" width="24" /></span>
										<span class="hidden" itemprop="addressRegion">FRANCE</span>
									</span>
								</td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</section>
			<?php endif; ?>
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
			<?php comments_template(); ?>
		</article>
		<?php endwhile; ?>
		<?php endif; ?>
	</div><!-- /page-content -->
</main><!-- /main-content end -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>