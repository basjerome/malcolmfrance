<?php /* Template Name: Episode Page Template */ get_header(); ?>
<main class="main-content" role="main" itemscope="" itemtype="http://schema.org/Review">
	<?php get_template_part('breadcrumb'); ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<h2 class="title-highlight"><span><?php echo get_the_title( $post->post_parent ); ?>, épisode 8</span></h2>
	<h1 class="page-title" itemprop="itemReviewed" itemscope="" itemtype="http://schema.org/Restaurant"><span itemprop="name">&laquo; <?php the_title(); ?> &raquo;</span></h1>
	<div class="row post-meta">
		<div class="col-sm-6">
			<span class="edit">
				<?php edit_post_link( __( 'Edit', 'malcolmfrance' ), '<i class="fa fa-cog" aria-hidden="true"></i> ', '', null, '' ); ?>
			</span>
		</div>
	</div><!-- /post-meta end -->

	<div class="row">
		<div class="col-sm-6">
			<div class="share">
				<h5 class="title">Partager</h5>
				<div class="addthis addthis_sharing_toolbox"></div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="rating" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
				<h5 class="title">Note</h5>
				<span class="hidden" itemprop="ratingValue">3.5</span>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-half-o current"></i>
				<i class="fa fa-star-o"></i>
			</div>
		</div>
	</div>

	<span class="hidden" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
		<span itemprop="name">Malcolm France</span>
	</span>

	<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
	<div class="hidden" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
		<img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php echo get_post(get_post_thumbnail_id())->post_title; ?>" />
		<meta itemprop="url" content="<?php echo the_post_thumbnail_url(); ?>">
		<meta itemprop="width" content="2000">
		<meta itemprop="height" content="1125">
	</div>
	<?php endif; ?>

	<?php if( get_field('mf_episode_images') ): ?>
	<div class="owl-container">
		<button class="expand" type="button"><i class="fa fa-expand"></i></button>
		<div id="slideshow" class="owl-carousel">
			<?php while( have_rows('mf_episode_images') ): the_row();
				$img = get_sub_field('mf_episode_image');
			?>
			<div class="item">
				<div class="illustration">
					<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['title']; ?>" class="img-responsive" />
					<span class="copyright">&copy; <?php echo $img['alt']; ?></span>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
		<div id="thumbnail" class="owl-carousel">
			<?php while( have_rows('mf_episode_images') ): the_row();
				$img = get_sub_field('mf_episode_image');
			?>
			<div class="item"><img src="<?php echo $img['url']; ?>" alt="<?php echo $img['title']; ?>" class="img-responsive" /></div>
			<?php endwhile; ?>
		</div>
	</div>
	<?php endif; ?>

	<section class="technical-sheet">
		<dl class="row">
			<dt class="col-sm-5 col-md-4 col-lg-3">Titre</dt>
			<?php if( get_field('mf_episode_title') ): ?>
			<dd class="col-sm-7 col-md-8 col-md-9"><?php the_field('mf_episode_title'); ?></dd>
			<?php endif; ?>
			<dd class="col-sm-7 col-sm-offset-5 col-md-8 col-md-offset-4 col-lg-9 col-lg-offset-3"><?php the_title(); ?></dd>
		</dl>

		<dl class="row">
			<?php if( get_field('mf_episode_number') ): ?>
			<dt class="col-sm-5 col-md-4 col-lg-3">Numéro</dt>
			<dd class="col-sm-7 col-md-8 col-lg-9"><?php the_field('mf_episode_number'); ?> (<?php echo str_replace("Saison ","",get_the_title( $post->post_parent )); ?>.<?php if( get_field('mf_episode_number') < 10) : ?>0<?php endif; ?><?php the_field('mf_episode_number'); ?>)</dd>
			<?php endif; ?>
			<?php if( get_field('mf_episode_production_code') ): ?>
			<dt class="col-sm-5 col-md-4 col-lg-3">Code de production</dt>
			<dd class="col-sm-7 col-md-8 col-lg-9"><?php the_field('mf_episode_production_code'); ?></dd>
			<?php endif; ?>
		</dl>

		<?php if( get_field('mf_episode_first_broadcast') ): ?>
		<dl class="row">
			<dt class="col-sm-5 col-md-4 col-lg-3">Première diffusion</dt>
			<dd class="col-sm-7 col-md-8 col-lg-9">
				<?php while( have_rows('mf_episode_first_broadcast') ): the_row();
					$date = get_sub_field('mf_episode_first_broadcast_date');
					$country = get_sub_field('mf_episode_first_broadcast_country');
				?>
				<div><?php echo $date; ?> <?php echo $country; ?></div>
				<?php endwhile; ?>
			</dd>
		</dl>
		<?php endif; ?>

		<?php if( get_field('mf_episode_scenario') ): ?>
		<dl class="row">
			<dt class="col-sm-5 col-md-4 col-lg-3">Scénario</dt>
			<dd class="col-sm-7 col-md-8 col-lg-9">
				<?php while( have_rows('mf_episode_scenario') ): the_row();
					$scriptwriter = get_sub_field('mf_episode_scriptwriter');
				?>
				<div><?php echo $scriptwriter; ?></div>
				<?php endwhile; ?>
			</dd>
		</dl>
		<?php endif; ?>

		<?php if( get_field('mf_episode_production') ): ?>
		<dl class="row">
			<dt class="col-sm-5 col-md-4 col-lg-3">Réalisation</dt>
			<dd class="col-sm-7 col-md-8 col-lg-9">
				<?php while( have_rows('mf_episode_production') ): the_row();
					$director = get_sub_field('mf_episode_director');
				?>
				<div itemprop="author" itemscope="" itemtype="http://schema.org/Person"><?php echo $director; ?></div>
				<?php endwhile; ?>
			</dd>
		</dl>
		<?php endif; ?>

		<?php if( get_field('mf_episode_characters') ): ?>
		<dl class="row">
			<dt class="col-sm-5 col-md-4 col-lg-3">Personnages</dt>
			<dd class="col-sm-7 col-md-8 col-lg-9">
				<a href="#" title="">Craig Lamar Traylor (Stevie)</a>, <a href="#" title="">Kyle Sullivan (Dabney)</a>, <a href="#" title="">Evan Matthew Cohen (Lloyd)</a>, <a href="#" title="">Will Jennings (Kyle)</a>, <a href="#" title="">Beth Grant (Dorene)</a>, <a href="#" title="">Katherine Ellis (Jody)</a>, <a href="#" title="">Jerry Lambert (Dave)</a>, <a href="#" title="">Mark Rickard (frère de Kyle)</a>, <a href="#" title="">Lianne Pattison (femme)</a>
			</dd>
		</dl>
		<?php endif; ?>
	</section>

	<section class="summary">
		<h3 class="section-title"><span>Résumé</span></h3>
		<?php if( get_field('mf_episode_introductory') ): ?>
		<p><strong class="label">Scène d'introduction</strong> <?php the_field('mf_episode_introductory'); ?></p>
		<?php endif; ?>
		<?php if( get_field('mf_episode_excerpt') ): ?>
		<p itemprop="reviewBody"><?php the_field('mf_episode_excerpt'); ?></p>
		<?php endif; ?>
	</section>

	<div itemprop="publisher" itemscope="" itemtype="http://schema.org/Organization">
		<meta itemprop="name" content="Malcolm France">
	</div>

	<section class="intrigues">
		<h3 class="section-title"><span>Détail des intrigues</span></h3>
		<dl>

			<dt>
				<a href="#intrigue-01" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="intrigue-01">
					<span class="label"><i class="fa fa-arrow-circle-o-down"></i> Scène d'intro</span> Qui de Lois ou Hal sacrifiera sa grasse matinée pour calmer les enfants ?
				</a>
			</dt>
			<dd class="collapse" id="intrigue-01">
				Au petit matin, réveillés par les cris des enfants, Hal et Lois font tous les deux semblant de dormir pour ne pas avoir à intervenir. Hal cède finalement mais exige que Lois soit nue quand il reviendra, condition que Lois accepte sans broncher…
			</dd>

			<dt>
				<a href="#intrigue-02" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="intrigue-02">
					<span class="label"><i class="fa fa-arrow-circle-o-down"></i> Situation</span> Le pique-nique des têtes d'ampoule
				</a>
			</dt>
			<dd class="collapse" id="intrigue-02">
				A son grand désespoir, Malcolm doit emmener toute sa famille au pique-nique organisé par Caroline Miller en l’honneur des têtes d’ampoules…
			</dd>

			<dt>
				<a href="#intrigue-03" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="intrigue-03">
					<span class="label"><i class="fa fa-arrow-circle-o-down"></i> Intrigue 1</span> Le numéro de calcul mental de Malcolm au cirque des petits génies
				</a>
			</dt>
			<dd class="collapse" id="intrigue-03">
				Malcolm cherche tous les prétextes pour ne pas avoir à présenter son numéro, par peur de la réaction de sa famille…
			</dd>

			<dt>
				<a href="#intrigue-04" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="intrigue-04">
					<span class="label"><i class="fa fa-arrow-circle-o-down"></i> Intrigue 2</span> Lois contre la mère de Dabney
				</a>
			</dt>
			<dd class="collapse" id="intrigue-04">
				Lois se fait une ennemie en la personne de la mère de Dabney qui se comporte en vrai tyran vis-à-vis des autres parents d’élèves…
			</dd>

			<dt>
				<a href="#intrigue-05" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="intrigue-05">
					<span class="label"><i class="fa fa-arrow-circle-o-down"></i> Intrigue 3</span> Hal et le barbecue
				</a>
			</dt>
			<dd class="collapse" id="intrigue-05">
				Hal se charge du barbecue et néglige le dégoût des têtes d’ampoule pour la viande…
			</dd>

			<dt>
				<a href="#intrigue-06" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="intrigue-06">
					<span class="label"><i class="fa fa-arrow-circle-o-down"></i> Intrigue 4</span> Reese le prédateur à la chasse aux têtes d’ampoule
				</a>
			</dt>
			<dd class="collapse" id="intrigue-06">
				Reese, tel un prédateur, part à la chasse de son gibier favori, les têtes d’ampoule, mais il se heurte à un obstacle de taille : le grand frère de Kyle...
			</dd>

			<dt>
				<a href="#intrigue-07" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="intrigue-07">
					<span class="label"><i class="fa fa-arrow-circle-o-down"></i> Intrigue 5</span> Francis et son histoire d’amour en accéléré avec une fille (Judy)
				</a>
			</dt>
			<dd class="collapse" id="intrigue-07">
				Francis noue une relation amoureuse aussi éphémère que complexe avec une fille rencontrée le jour même…
			</dd>

		</dl>
	</section>

	<?php if( get_field('mf_episode_anecdotes') ): ?>
	<section class="anecdotes">
		<h3 class="section-title"><span>Anecdotes</span></h3>
		<ul>
			<?php while( have_rows('mf_episode_anecdotes') ): the_row();
				$anecdote = get_sub_field('mf_episode_anecdote');
			?>
			<li><?php echo $anecdote; ?></li>
			<?php endwhile; ?>
		</ul>
	</section>
	<?php endif; ?>

	<?php if( get_field('mf_episode_replicas') ): ?>
	<section class="quotes">
		<h3 class="section-title"><span>Répliques cultes</span></h3>
		<ul>
			<?php while( have_rows('mf_episode_replicas') ): the_row();
				$line = get_sub_field('mf_episode_replicas_line');
			?>
			<li>
				<ul>
					<?php while( have_rows('mf_episode_replicas_line') ): the_row();
						$character = get_sub_field('mf_episode_replicas_character');
						$dialogue = get_sub_field('mf_episode_replicas_dialogue');
					?>
					<li><strong><?php echo $character; ?></strong> : <?php echo $dialogue; ?></li>
					<?php endwhile; ?>
				</ul>
			</li>
			<?php endwhile; ?>
		</ul>
	</section>
	<?php endif; ?>

	<section class="videos">
		<h3 class="section-title"><span>Extraits vidéos</span></h3>
		<div class="row">
			<div class="col-xs-6 col-md-4">
				<a href="#" title="Titre de lextrait vidéo">
					<i class="fa fa-play-circle-o"></i>
					<span>Titre de lextrait vidéo</span>
					<img src="<?php echo get_template_directory_uri(); ?>/img/page/default.jpg" alt="" class="img-responsive">
				</a>
			</div>
			<div class="col-xs-6 col-md-4">
				<a href="#" title="Titre de lextrait vidéo">
					<i class="fa fa-play-circle-o"></i>
					<span>Titre de lextrait vidéo</span>
					<img src="<?php echo get_template_directory_uri(); ?>/img/page/default.jpg" alt="" class="img-responsive">
				</a>
			</div>
			<div class="col-xs-6 col-md-4">
				<a href="#" title="Titre de lextrait vidéo">
					<i class="fa fa-play-circle-o"></i>
					<span>Titre de lextrait vidéo</span>
					<img src="<?php echo get_template_directory_uri(); ?>/img/page/default.jpg" alt="" class="img-responsive">
				</a>
			</div>
		</div>
	</section>

	<?php if( get_field('mf_episode_gifs') ): ?>
	<section class="gifs">
		<h3 class="section-title"><span>Gifs</span></h3>
		<div class="row">
			<?php while( have_rows('mf_episode_gifs') ): the_row();
				$gif = get_sub_field('mf_episode_gif');
			?>
			<div class="col-xs-6 col-md-4">
				<div class="embed-responsive embed-responsive-16by9">
					<a href="https://giphy.com/gifs/<?php echo $gif; ?>" target="_blank" title=""><img src="https://i.giphy.com/media/<?php echo $gif; ?>/giphy.webp" alt="" class="img-responsive" /></a>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</section>
	<?php endif; ?>

	<?php if( get_field('mf_episode_music') ): ?>
	<section class="music">
		<h3 class="section-title"><span>Musiques</span></h3>
		<ul>
			<?php while( have_rows('mf_episode_music') ): the_row();
				$track = get_sub_field('mf_episode_music_track');
				$scene = get_sub_field('mf_episode_music_scene');
			?>
			<li>
				<ul>
					<li>
						<span class="label">Musique</span> <?php echo $track; ?>
					</li>
					<li>
						<span class="label">Scène</span> <?php echo $scene; ?>
					</li>
				</ul>
			</li>
			<?php endwhile; ?>
		</ul>
	</section>
	<?php endif; ?>

	<?php if( get_field('mf_episode_errors') ): ?>
	<section class="errors">
		<h3 class="section-title"><span>Erreurs &amp; Faux raccords</span></h3>
		<ul>
			<?php while( have_rows('mf_episode_errors') ): the_row();
				$timecode = get_sub_field('mf_episode_errors_timecode');
				$description = get_sub_field('mf_episode_errors_description');
			?>
			<li>
				<span class="label"><?php echo $timecode; ?></span> <?php echo $description; ?>
			</li>
			<?php endwhile; ?>
		</ul>
	</section>
	<?php endif; ?>

	<section class="next-episode">
		<div class="row">
			<div class="col-xs-6 col-md-4">
				<a href="#" title="">
					<span class="img">
						<span class="title">
							Saison 1, épisode 7<br>
							« La petite évasion »
						</span>
						<img src="http://malcolm-france.com/images/episodes/107.jpg" alt="" class="img-responsive">
					</span>
					<span class="btn">
						<i class="arrow-left"></i>
						Épisode précédent
					</span>
				</a>
			</div>
			<div class="col-xs-6 col-md-4 col-md-offset-4">
				<a href="#" title="">
					<span class="img">
						<span class="title">
							Saison 1, épisode 9<br>
							« Ma mère, ce héros »
						</span>
						<img src="http://malcolm-france.com/images/episodes/109.jpg" alt="" class="img-responsive">
					</span>
					<span class="btn">
						Épisode suivant
						<i class="arrow-right"></i>
					</span>
				</a>
			</div>
		</div>
	</section>

	<div class="share">
		<h5 class="title">Partager</h5>
		<div class="addthis addthis_sharing_toolbox"></div>
	</div>

	<div class="ad text-center">
		<script async="" src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- Pub responsive -->
		<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6780914486364604" data-ad-slot="5719271218" data-ad-format="auto"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>

	<?php comments_template(); ?>
	<?php endwhile; ?>
	<?php endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>