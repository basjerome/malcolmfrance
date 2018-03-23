<?php get_header(); ?>
<main role="main" class="main-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="page-content" itemscope itemtype="http://schema.org/NewsArticle">
		<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="https://google.com/article"/>
		<?php get_template_part('breadcrumb'); ?>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="title-highlight"><span>Actualité</span></h2>
			<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
			<div class="row post-meta">
				<div class="col-sm-6">
					<span class="author" itemprop="author" itemscope itemtype="https://schema.org/Person">
						<i class="fa fa-pencil"></i>
						<?php
							$values = get_field( 'mf_authors' );
							if ( $values ) {
							  $editors = array();
							  foreach ( $values as $value ) {
							    $link = get_author_posts_url( $value['ID'] ); //get the url
							    $nicename = $value['nickname'];
							    $editors[] = sprintf( '<a href="%s" title="">%s</a>', $link, $nicename ); //create a link for each author
							  }
							  echo 'Par ' . implode( ' &amp; ', $editors );
							}
						?>
					</span>
					<span class="edit">
						<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
					</span>
				</div>
				<div class="col-sm-6 text-right">
					<span class="date"><i class="fa fa-calendar"></i> <?php the_time('l j F Y'); ?></span>
					<span class="hour"><i class="fa fa-clock-o"></i> <?php the_time('g'); ?>H<?php the_time('i'); ?></span>
					<span class="comments"><i class="fa fa-commenting-o"></i> <a href="#disqus_thread" class="scroll-to" title="Voir les commentaires"><span class="disqus-comment-count" data-disqus-identifier="<?php the_permalink(); ?>">0 commentaire</span></a></span>
				</div>
			</div><!-- /post-meta end -->
			<?php if( !have_rows('mf_broadcasts') ) : ?>
			<p class="introduction" itemprop="description"><?php malcolmfrance_excerpt('malcolmfrance_index'); ?></p>
			<?php endif; ?>
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
			<div <?php if( have_rows('mf_broadcasts') ) : ?>class="hidden"<?php else : ?>class="illustration"<?php endif; ?> itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
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
								$date = get_sub_field('mf_broadcasts_date');
								$episode = get_sub_field('mf_broadcasts_episode');
								$channel = get_sub_field('mf_broadcasts_channel');
							?>
							<tr itemscope="" itemtype="http://schema.org/Event">
								<td>
									<meta itemprop="startDate" content="<?php echo $date; ?>">
									<?php echo $date; ?>
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
			<?php
				$tags = wp_get_post_terms( get_queried_object_id(), 'post_tag', ['fields' => 'ids'] );
				$args = [
					'post__not_in'        => array( get_queried_object_id() ),
					'posts_per_page'      => 3,
					'ignore_sticky_posts' => 1,
					'orderby'             => 'rand',
					'tax_query' => [
						[
							'taxonomy' => 'post_tag',
							'terms'    => $tags
						]
					]
				];
				$my_query = new wp_query( $args );
				if( $my_query->have_posts() ) :
			?>
			<section class="similar-items">
				<h4 class="section-title"><span>Sur le même sujet</span></h4>
				<?php the_tags( __( 'Mots clés', 'malcolmfrance' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
				<div class="row">
					<?php
						while( $my_query->have_posts() ) :
						$my_query->the_post();
					?>
					<article class="col-md-4">
						<a href="<?php the_permalink()?>" class="clearfix" title="<?php the_title(); ?>">
							<span class="img"><img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-responsive" /></span>
							<span class="post-title"><?php the_title(); ?></span>
						</a>
					</article>
					<?php
						endwhile;
						wp_reset_postdata();
					?>
				</div>
			</section><!-- /similar-items end -->
			<?php endif; ?>
			<?php comments_template(); ?>
		</article>
		<?php endwhile; ?>
		<?php endif; ?>
	</div><!-- /page-content -->
</main><!-- /main-content end -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>