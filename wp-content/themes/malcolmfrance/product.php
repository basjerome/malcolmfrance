<?php  /* Template Name: Product Page Template */  get_header(); ?>
<main role="main" class="main-content">
	<?php get_template_part('breadcrumb'); ?>
	<div class="page-content">
		<h2 class="title-highlight"><span><?php echo get_the_title( $post->post_parent ); ?></span></h2>
		<div class="row post-meta">
			<div class="col-sm-6">
				<span class="edit">
					<?php edit_post_link( __( 'Edit', 'malcolmfrance' ), '<i class="fa fa-cog" aria-hidden="true"></i> ', '', null, '' ); ?>
				</span>
			</div>
		</div><!-- /post-meta end -->
		<div itemscope="" itemtype="http://schema.org/Product">
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12 pull-right">
					<h1 class="page-title"><?php the_title(); ?></h1>
				</div>
				<div class="clearfix visible-xs visible-sm"></div>
				<div class="col-md-6">
					<?php if( have_rows('mf_product_carousel') ) : ?>
					<div class="owl-container">
						<button class="expand" type="button"><i class="fa fa-expand"></i></button>
						<div id="slideshow" class="owl-carousel">
							<?php while( have_rows('mf_product_carousel') ): the_row();
								$img = get_sub_field('mf_product_image');
							?>
							<div class="item">
								<div class="illustration">
									<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['title']; ?>" itemprop="image" />
									<span class="copyright">&copy; 20th Century Fox</span>
								</div>
							</div>
							<?php endwhile; ?>
						</div>
						<div id="thumbnail" class="owl-carousel">
							<?php while( have_rows('mf_product_carousel') ): the_row();
								$img = get_sub_field('mf_product_image');
							?>
							<div class="item"><img src="<?php echo $img['url']; ?>" alt="<?php echo $img['title']; ?>" class="img-responsive" /></div>
							<?php endwhile; ?>
						</div>
					</div><!-- /owl-container -->
					<?php endif; ?>
				</div>
				<div class="col-md-6">
					<?php if( have_rows('mf_product_details') ) : ?>
					<ul>
						<?php while( have_rows('mf_product_details') ): the_row();
							$title = get_sub_field('mf_product_details_title');
						?>
						<li>
							<strong><?php echo $title; ?> :</strong>
							<?php if( have_rows('mf_product_details_list') ) : ?>
							<?php
								$rowCount = count( get_field('mf_product_details_list') );
								$i = 1;
								while( have_rows('mf_product_details_list') ): the_row();
								$name = get_sub_field('mf_product_details_name');
								$url = get_sub_field('mf_product_details_link');
							?>
							<?php if( $url ) : ?><a href="<?php echo $url; ?>" title="<?php echo $name; ?>"><?php endif; ?><?php echo $name; ?><?php if( $url ) : ?></a><?php endif; ?><?php if($i < $rowCount): ?>,<?php endif; ?>
							<?php
								$i++;
								endwhile;
							?>
							<?php endif; ?>
						</li>
						<?php endwhile; ?>
					</ul>
					<?php endif; ?>
					<?php if( get_field('mf_product_price') ): ?>
					<h3 class="section-title"><span>Prix de vente conseillé</span></h3>
					<div class="price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
						<?php while( have_rows('mf_product_price') ): the_row();
							$units = get_sub_field('mf_product_units');
							$cents = get_sub_field('mf_product_cents');
						?>
						<meta itemprop="priceCurrency" content="EUR">
						<span itemprop="price"><?php echo $units; ?>€<span><?php echo $cents; ?></span></span>
						<?php endwhile; ?>
					</div>
					<?php endif; ?>
					<p>
						<?php if( get_field('mf_product_amazon') ): ?>
						<a href="<?php the_field('mf_product_amazon'); ?>" class="btn btn-yellow btn-block" target="_blank" title="<?php the_title(); ?>">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							Acheter sur <i class="icon-amazon">amazon</i>
						</a>
						<?php endif; ?>
						<?php if( get_field('mf_product_fnac') ): ?>
						<a href="<?php the_field('mf_product_fnac'); ?>" class="btn btn-yellow btn-block" target="_blank" title="<?php the_title(); ?>">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							Acheter sur <i class="icon-fnac">fnac</i>
						</a>
						<?php endif; ?>
					</p>
				</div>
			</div><!-- /row -->
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h3 class="section-title"><span>Description du produit</span></h3>
				<?php the_content(); ?>
			</article>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php if( get_field('mf_product_video') ): ?>
			<section class="trailer">
				<h3 class="section-title"><span>Bande annonce</span></h3>
				<div class="embed-responsive embed-responsive-16by9">
					<?php the_field('mf_product_video'); ?>
				</div>
			</section>
			<?php endif; ?>
			<?php if( have_rows('mf_product_content') ) : ?>
			<h3 class="section-title"><span>Contenu</span></h3>
			<ul>
				<?php while( have_rows('mf_product_content') ): the_row();
					$title = get_sub_field('mf_product_content_title');
				?>
				<li>
					<?php echo $title; ?>
					<?php if( have_rows('mf_product_content_list') ) : ?>
					<ul>
						<?php while( have_rows('mf_product_content_list') ): the_row();
							$text = get_sub_field('mf_product_content_text');
						?>
						<li><?php echo $text; ?></li>
						<?php endwhile; ?>
					</ul>
					<?php endif; ?>
				</li>
				<?php endwhile; ?>
			</ul>
			<?php endif; ?>
			<?php if( have_rows('mf_product_card') ) : ?>
			<h3 class="section-title"><span>Détails techniques</span></h3>
				<?php while( have_rows('mf_product_card') ): the_row();
					$title = get_sub_field('mf_product_card_title');
					$text = get_sub_field('mf_product_card_text');
				?>
				<dl class="row">
					<dt class="col-sm-5 col-md-4 col-lg-3"><?php echo $title; ?></dt>
					<dd class="col-sm-7 col-md-8 col-lg-9"><?php echo $text; ?></dd>
				</dl>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
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
		<section class="similar-items">
			<h4 class="section-title"><span>Produits similaires</span></h4>
			<div class="row">
				<?php
					while( $my_query->have_posts() ) :
					$my_query->the_post();
				?>
				<article class="col-md-4">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<span class="img"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-responsive"></span>
						<span class="post-title"><?php the_title(); ?></span>
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
	</div><!-- /page-content -->
</main><!--/ main-content end -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>