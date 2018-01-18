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
		</section>
		<section class="poll">
			<h4 class="title"><span>Sondage</span></h4>
			<p>Êtes-vous fan de la série Malcolm ?</p>
			<ul>
				<li><label><input name="poll" type="radio"> Yes</label></li>
				<li><label><input name="poll" type="radio"> No</label></li>
				<li><label><input name="poll" type="radio"> Maybe</label></li>
				<li><label><input name="poll" type="radio"> I don't know</label></li>
				<li><label><input name="poll" type="radio"> Can you repeat the question ?</label></li>
			</ul>
			<p class="text-center">
				<a href="#" class="btn btn-yellow" title="Sondage Malcolm">Voter</a>
			</p>
		</section>
		<section class="poll">
			<h4 class="title"><span>Sondage</span></h4>
			<p>Êtes-vous fan de la série Malcolm ?</p>
			<div class="progress">
				<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="84" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
					<span>84% Yes</span>
				</div>
			</div>
			<div class="progress">
				<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 1%">
					<span>1% No</span>
				</div>
			</div>
			<div class="progress">
				<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 1%">
					<span>1% Maybe</span>
				</div>
			</div>
			<div class="progress">
				<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 1%">
					<span>1% I don't know</span>
				</div>
			</div>
			<div class="progress">
				<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="13" aria-valuemin="0" aria-valuemax="100" style="width: 13%">
					<span>13% Can you repeat the question ?</span>
				</div>
			</div>
			<p class="text-center">
				<a href="#" class="btn btn-yellow" title="Sondage Malcolm">Tous les sondages</a>
			</p>
		</section>
		<section class="broadcasts">
			<h4 class="title"><span>Diffusions</span></h4>
			<div class="clearfix">
				<img src="img/bkg/broadcasts.png" alt="" class="img-responsive" />
				<p>Aucune diffusion sur les chaînes de télévision française pour le moment.</p>
			</div>
			<div class="text-center">
				<a href="#" class="btn btn-yellow" title="Diffusions Malcolm">Toutes les diffusions</a>
			</div>
		</section>
		<section class="broadcasts">
			<h4 class="title"><span>Diffusions</span></h4>
			<h4 class="subtitle">Jeudi 7 septembre 2017</h4>
			<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th class="text-center">Heure</th>
						<th>Épisode</th>
						<th class="text-center">Chaîne</th>
					</tr>
				</thead>
				<tbody>
					<tr itemscope="" itemtype="http://schema.org/Event">
						<td class="hour">12h50</td>
						<td><a href="#" title="" itemprop="url"><span itemprop="name">1.01 – "Je ne suis pas un monstre"</span></a></td>
						<td class="channel" itemprop="location" itemscope="" itemtype="http://schema.org/Place">
							<span class="hidden" itemprop="name">Malcolm</span>
							<span itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
								<span itemprop="addressLocality">W9</span>
								<span class="hidden" itemprop="addressRegion">FRANCE</span>
							</span>
						</td>
					</tr>
					<tr itemscope="" itemtype="http://schema.org/Event">
						<td class="hour">13h20</td>
						<td><a href="#" title="" itemprop="url"><span itemprop="name">1.02 – "Alerte rouge"</span></a></td>
						<td class="channel" itemprop="location" itemscope="" itemtype="http://schema.org/Place">
							<span class="hidden" itemprop="name">Malcolm</span>
							<span itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
								<span itemprop="addressLocality">W9</span>
								<span class="hidden" itemprop="addressRegion">FRANCE</span>
							</span>
						</td>
					</tr>
					<tr>
						<td class="hour">13h50</td>
						<td><a href="#" title="" itemprop="url">1.03 – "Seuls à la maison"</a></td>
						<td class="channel">W9</td>
					</tr>
					<tr>
						<td class="hour">14h20</td>
						<td><a href="#" title="" itemprop="url">1.04 – "Honte"</a></td>
						<td class="channel">W9</td>
					</tr>
					<tr>
						<td class="hour">14h50</td>
						<td><a href="#" title="" itemprop="url">1.07 – "La petite évasion"</a></td>
						<td class="channel">W9</td>
					</tr>
				</tbody>
			</table>
			<div class="text-center">
				<a href="#" class="btn btn-yellow" title="Diffusions Malcolm">Toutes les diffusions</a>
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
				<a href="shop.html" class="btn btn-yellow" title="Boutique Malcolm">Toute la boutique</a>
			</div>
		</section>
		<section class="social-networks">
			<h4 class="title"><span>Réseaux sociaux</span></h4>
			<div class="fb-page" data-href="https://www.facebook.com/malcolmfrance" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/malcolmfrance"><a href="https://www.facebook.com/malcolmfrance">Malcolm France</a></blockquote></div></div>
			<hr />
			<a class="twitter-timeline" href="https://twitter.com/malcolmfrance" data-widget-id="656469249389645824">Tweets de @malcolmfrance</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
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
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
	</aside><!-- /sidebar end -->
</div><!-- /clearfix end -->