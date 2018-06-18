	<aside class="sidebar" role="complementary">
		<section class="actu">
			<h4 class="title"><span>L'actu récente</span></h4>
			<?php
				$the_query = new WP_Query( array(
					'category_name' => 'actualites',
					'posts_per_page' => 4,
				));
			?>
			<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<article>
						<a href="<?php the_permalink(); ?>" class="clearfix" title="<?php the_title(); ?>">
							<span class="img-container"><span class="img"><img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-responsive" /></span></span>
							<span class="date"><?php the_time('l j F Y'); ?></span>
							<span class="post-title"><?php the_title(); ?></span>
						</a>
					</article>
				<?php endwhile; ?>
			<?php endif; ?>
			<br />
			<p class="text-center"><a href="<?php echo home_url(); ?>/category/actualites/" class="btn btn-yellow"><i class="fas fa-plus-circle"></i> Toute l'actu</a></p>
		</section>
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
		<section class="broadcasts">
			<h4 class="title"><span>Diffusions</span></h4>
			<?php
				$i= 0;
				if( have_rows('mf_broadcasts', 652) ) :
			?>
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<thead>
						<tr>
							<th>Date &amp; heure</th>
							<th>Épisode</th>
							<th class="text-right">Chaîne</th>
						</tr>
					</thead>
					<tbody>
						<?php while( have_rows('mf_broadcasts', 652) ): the_row();
              				$currentDate = date( 'l j F Y G:i', current_time( 'timestamp', 1 ) );
							$strtotimecurrentDate = strtotime($currentDate);
              				$date = get_sub_field('mf_broadcasts_date', false, false);
							$date = new DateTime($date);
							$dateformatstring = "l j F Y G:i";
							$unixtimestamp = strtotime(get_sub_field('mf_broadcasts_date', false, false));
              				$strtotimedate = strtotime($date->format('l j F Y G:i'));
							$episode = get_sub_field('mf_broadcasts_episode');
              				$channel = get_sub_field('mf_broadcasts_channel');
						?>
						<?php if( $i < 5 && $strtotimecurrentDate < $strtotimedate ) : ?>
						<tr itemscope="" itemtype="http://schema.org/Event">
							<td>
								<meta itemprop="startDate" content="<?php echo $date->format('c'); ?>">
								<?php echo date_i18n($dateformatstring, $unixtimestamp); ?>
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
						<?php $i++; endif; ?>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
			<?php else: ?>
			<div class="clearfix">
				<img src="<?php echo get_template_directory_uri(); ?>/img/bkg/broadcasts.png" alt="" class="img-responsive">
				<p>Aucune diffusion sur les chaînes de télévision française pour le moment.</p>
            </div>
			<?php endif; ?>
			<div class="text-center">
				<a href="<?php echo home_url(); ?>/diffusions/" class="btn btn-yellow" title="Diffusions Malcolm"><i class="fas fa-tv"></i> Toutes les diffusions</a>
			</div>
		</section>
		<section class="shop">
			<h4 class="title"><span>Boutique</span></h4>
			<a href="#" class="clearfix" title="Malcolm : l'intégrale de la saison 1 &Eacute;dition POP-UP">
				<img src="http://ecx.images-amazon.com/images/I/81fc4Ah74rL._SY679_.jpg" alt="Malcolm : l'intégrale de la saison 1 &Eacute;dition POP-UP" class="img-responsive" />
				<span class="product-name">Malcolm : l'intégrale de la saison 1 &Eacute;dition POP-UP</span>
				<span class="product-price">29,99 €</span>
			</a>
			<div class="text-center">
				<a href="shop.html" class="btn btn-yellow" title="Boutique Malcolm"><i class="fas fa-shopping-cart"></i> Toute la boutique</a>
			</div>
		</section>
		<section class="social-networks text-center">
			<h4 class="title"><span>Réseaux sociaux</span></h4>
			<div class="fb-page" data-href="https://www.facebook.com/malcolmfrance" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/malcolmfrance"><a href="https://www.facebook.com/malcolmfrance">Malcolm France</a></blockquote></div></div>
		</section>
		<section class="ad text-center">
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
		</section>
	</aside><!-- /sidebar end -->
</div><!-- /clearfix end -->