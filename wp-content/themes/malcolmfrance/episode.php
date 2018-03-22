<?php /* Template Name: Episode Page Template */ get_header(); ?>
<main class="main-content" role="main" itemscope="" itemtype="http://schema.org/Review">
	<?php get_template_part('breadcrumb'); ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<h2 class="title-highlight"><span><?php echo get_the_title( $post->post_parent ); ?>, épisode 8</span></h2>
	<h1 class="page-title" itemprop="itemReviewed" itemscope="" itemtype="http://schema.org/Restaurant"><span itemprop="name">&laquo; <?php the_title(); ?> &raquo;</span></h1>
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
				<i class="fa fa-cog" aria-hidden="true"></i>
				<?php edit_post_link(); ?>
			</span>
		</div>
		<div class="col-sm-6 text-right">
			<span class="date"><i class="fa fa-calendar"></i> <?php the_time('l j F Y'); ?></span>
			<span class="hour"><i class="fa fa-clock-o"></i> <?php the_time('g'); ?>H<?php the_time('i'); ?></span>
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

	<div class="owl-container">
		<button class="expand" type="button"><i class="fa fa-expand"></i></button>
		<div id="slideshow" class="owl-carousel">
			<div class="item">
				<div class="illustration">
					<img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" class="img-responsive" />
					<span class="copyright">&copy; 20th Century Fox</span>
				</div>
			</div>
			<div class="item">
				<div class="illustration">
					<img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" class="img-responsive" />
					<span class="copyright">&copy; 20th Century Fox</span>
				</div>
			</div>
			<div class="item">
				<div class="illustration">
					<img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" class="img-responsive" />
					<span class="copyright">&copy; 20th Century Fox</span>
				</div>
			</div>
			<div class="item">
				<div class="illustration">
					<img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" class="img-responsive" />
					<span class="copyright">&copy; 20th Century Fox</span>
				</div>
			</div>
			<div class="item">
				<div class="illustration">
					<img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" class="img-responsive" />
					<span class="copyright">&copy; 20th Century Fox</span>
				</div>
			</div>
			<div class="item">
				<div class="illustration">
					<img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" class="img-responsive" />
					<span class="copyright">&copy; 20th Century Fox</span>
				</div>
			</div>
		</div>
		<div id="thumbnail" class="owl-carousel">
			<div class="item"><img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" class="img-responsive" /></div>
			<div class="item"><img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" class="img-responsive" /></div>
			<div class="item"><img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" class="img-responsive" /></div>
			<div class="item"><img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" class="img-responsive" /></div>
			<div class="item"><img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" class="img-responsive" /></div>
			<div class="item"><img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" class="img-responsive" /></div>
		</div>
	</div>

	<section class="technical-sheet">
		<dl class="row">
			<dt class="col-sm-5 col-md-4 col-lg-3">Titre</dt>
			<dd class="col-sm-7 col-md-8 col-md-9">Krelboyne Picnic</dd>
			<dd class="col-sm-7 col-sm-offset-5 col-md-8 col-md-offset-4 col-lg-9 col-lg-offset-3">Panique au pique-nique</dd>
		</dl>

		<dl class="row">
			<dt class="col-sm-5 col-md-4 col-lg-3">Numéro</dt>
			<dd class="col-sm-7 col-md-8 col-lg-9">8 (1.08)</dd>
			<dt class="col-sm-5 col-md-4 col-lg-3">Code de production</dt>
			<dd class="col-sm-7 col-md-8 col-lg-9">06-99-109</dd>
		</dl>

		<dl class="row">
			<dt class="col-sm-5 col-md-4 col-lg-3">Première diffusion</dt>
			<dd class="col-sm-7 col-md-8 col-lg-9">12 mars 2000</dd>
			<dd class="col-sm-7 col-sm-offset-5 col-md-8 col-md-offset-4 col-lg-9 col-lg-offset-3">02 janvier 2002</dd>
		</dl>

		<dl class="row">
			<dt class="col-sm-5 col-md-4 col-lg-3">Scénario</dt>
			<dd class="col-sm-7 col-md-8 col-lg-9">Michael Glouberman</dd>
			<dd class="col-sm-7 col-sm-offset-5 col-md-8 col-md-offset-4 col-lg-9 col-lg-offset-3">Andrew Orenstein</dd>
		</dl>

		<dl class="row">
			<dt class="col-sm-5 col-md-4 col-lg-3">Réalisation</dt>
			<dd class="col-sm-7 col-md-8 col-lg-9" itemprop="author" itemscope="" itemtype="http://schema.org/Person">Todd Holland</dd>
		</dl>

		<dl class="row">
			<dt class="col-sm-5 col-md-4 col-lg-3">Personnages</dt>
			<dd class="col-sm-7 col-md-8 col-lg-9"><a href="#" title="">Craig Lamar Traylor (Stevie)</a>, <a href="#" title="">Kyle Sullivan (Dabney)</a>, <a href="#" title="">Evan Matthew Cohen (Lloyd)</a>, <a href="#" title="">Will Jennings (Kyle)</a>, <a href="#" title="">Beth Grant (Dorene)</a>, <a href="#" title="">Katherine Ellis (Jody)</a>, <a href="#" title="">Jerry Lambert (Dave)</a>, <a href="#" title="">Mark Rickard (frère de Kyle)</a>, <a href="#" title="">Lianne Pattison (femme)</a></dd>
		</dl>
	</section>

	<section class="summary">
		<h3 class="section-title"><span>Résumé</span></h3>
		<p><strong class="label">Scène d'introduction</strong> <a href="#" title="">Lois</a> et <a href="#" title="">Hal</a> dorment paisiblement dans leur lit. Mais ils sont rapidement perturbés par les garçons qui comme à leur habitude font des bêtises. Cependant, aucun des deux parents n'est visiblement décidé à aller calmer les esprits, jusqu'à ce que <strong>Hal</strong> craque. En contrepartie, il exige à Lois d'être nue à son retour !</p>
		<p itemprop="reviewBody">La classe de <a href="#" title="">Malcolm</a> organise un grand pique-nique auquel est convié toute les familles des "<em>Têtes d'ampoule</em>", au grand dam de <strong>Malcolm</strong> qui n'est pas enclin à faire son numéro. <a href="#" title="">Francis</a>, à la maison pour le week-end, lui promet de l'aider à s'échapper.<br>
			Sur place, <strong>Lois</strong> rencontre <a href="#" title="">Dorene</a>, la présidente de l'association des parents d'élèves et la mère de <a href="#" title="">Dabney</a>. Très vite, son caractère autoritaire exaspère <strong>Lois</strong> et encourage les autres mères à se rebeller contre la dame.<br>
			Pendant ce temps, <strong>Francis</strong> fait la connaissance d'une jeune fille et engage avec elle une relation express, condamnant <strong>Malcolm</strong> à rester et à faire son numéro. Il décide de s'occuper en manipulant quelques produits chimiques.<br>
			De son côté, <a href="#" title="">Reese</a> part à la chasse aux "<em>Têtes d'ampoule</em>", constatant qu'il y a du "<em>gibier</em>" ! Mais le grand frère de l'une d'entre elles vient compromettre vient compromettre la traque qui avait bien commencée.<br>
			Enfin, <strong>Hal</strong> décide de participer à la préparation du repas en s'improvisant cuisinier du barbecue, avec l'aide de <a href="#" title="">Dewey</a>. Mais il n'a pas prévu que la majorité des "<em>Têtes d'ampoule</em>" sont allergiques à la viande…</p>
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

	<section class="anecdotes">
		<h3 class="section-title"><span>Anecdotes</span></h3>
		<ul>
			<li>Cet épisode marque la première apparition de <strong>Dabney</strong> et <strong>Lloyd</strong>, deux "<em>Têtes d’ampoule</em>".</li>
			<li>Une scène coupée au montage montre <strong>Kyle</strong> faire comme les autres "<em>Têtes d'ampoule</em>" son numéro pathétique sur scène. Le numéro terminé, on entend une seule personne applaudir, qui n'est pas <strong>Caroline</strong> son institutrice comme elle l'avait fait avec <strong>Dabney</strong>, mais <strong>Reese</strong>, menacé par le grand frère de <strong>Kyle</strong>.</li>
			<li>À la fin de l'épisode, on peut deviner <strong>Francis</strong> faire un doigt d'honneur. Aux États-Unis, ce geste est banni et systématiquement censuré des programmes. Même ceux d'<em>Eminem</em> ou des acteurs de <em>Jackass</em> sont floutés ou cachés. Dans cet épisode, le geste de <strong>Francis</strong> est ainsi suggéré, camouflé par la casquette de <strong>Dewey</strong>.</li>
		</ul>
	</section>

	<section class="quotes">
		<h3 class="section-title"><span>Répliques cultes</span></h3>
		<ul>

			<li>
				<ul>
					<li><strong>Hal</strong> : T’as intérêt à être toute nue quand je reviendrais.</li>
					<li><strong>Lois</strong> : D’accord.</li>
				</ul>
			</li>

			<li>
				<ul>
					<li><strong>Francis</strong> : Pourquoi il faut que je vienne au fait ?</li>
					<li><strong>Lois</strong> : Parce que c’est une fête familiale, Francis, et que tu fais partie de la famille.</li>
					<li><strong>Francis</strong> : Ah, oui, c’est vrai. J’ai un peu tendance à l’oublier à force de vivre à l’autre bout du pays dans mon école militaire.</li>
				</ul>
			</li>

			<li>
				<ul>
					<li><strong>Reese</strong> : Un tout petit groupe de "Têtes d’ampoule" s’est écarté du reste du troupeau sans s’en rendre compte. Se retrouvant sans défense, ils deviennent des proies faciles pour les prédateurs. Ils sentent le danger, mais il est trop tard. Leur hésitation sera fatale.</li>
				</ul>
			</li>

			<li>
				<ul>
					<li><strong>Dorene</strong> : Il semblerait que votre Malcolm possède un drôle de vocabulaire.</li>
					<li><strong>Lois</strong> : Oh, il s’arrête pas. C’est bla bla bla, bla bla bla, à longueur de temps.</li>
					<li><strong>Dorene</strong> : Oui, enfin, ce n’est pas de ce vocabulaire là dont je parlais. Il a apprit à quelques camarades de classe le mot qui commence par un M.</li>
					<li><strong>Lois</strong> : Par un M ?</li>
					<li><strong>Dorene</strong> : Il l’a sûrement entendu prononcé par quelqu’un dans la rue. Pas chez lui.</li>
					<li><strong>Lois</strong> : Ouais, eh ben, je te dis M, vielle cloche.</li>
				</ul>
			</li>

			<li>
				<ul>
					<li><strong>Homme</strong> : Il me faut deux hot-dogs.</li>
					<li><strong>Hal</strong> : C’est parti, mon Dewey !</li>
				</ul>
			</li>

			<li>
				<ul>
					<li><strong>Malcolm</strong> : Vous savez, dans de mauvaises mains, tous ces produits font une boule puante de première. Elles sont assez mauvaises pour ça !</li>
				</ul>
			</li>

			<li>
				<ul>
					<li><strong>Malcolm</strong> : Ok. La différence entre une boule puante et une bombe chimique de première catégorie est apparemment de trois goûtes de sulfure tétra oxydé. Je vais faire un procès à ce site Internet.</li>
				</ul>
			</li>

			<li>
				<ul>
					<li><strong>Dewey</strong> : Est-ce que Malcolm est un robot ?</li>
					<li><strong>Hal</strong> : Non, fiston. Il est seulement intelligent. Vraiment, vraiment, vraiment intelligent. Mais, vraiment.</li>
				</ul>
			</li>

		</ul>
	</section>

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

	<section class="gifs">
		<h3 class="section-title"><span>Gifs</span></h3>
		<div class="row">
			<div class="col-xs-6 col-md-4">
				<div class="embed-responsive embed-responsive-16by9">
					<img src="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-francis-01.jpg" alt="" class="img-responsive" data-static="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-francis-01.jpg" data-animated="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-francis-01.gif">
				</div>
			</div>
			<div class="col-xs-6 col-md-4">
				<div class="embed-responsive embed-responsive-16by9">
					<img src="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-francis-02.jpg" alt="" class="img-responsive" data-static="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-francis-02.jpg" data-animated="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-francis-02.gif">
				</div>
			</div>
			<div class="col-xs-6 col-md-4">
				<div class="embed-responsive embed-responsive-16by9">
					<img src="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-francis-03.jpg" alt="" class="img-responsive" data-static="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-francis-03.jpg" data-animated="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-francis-03.gif">
				</div>
			</div>
			<div class="col-xs-6 col-md-4">
				<div class="embed-responsive embed-responsive-16by9">
					<img src="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-dewey-01.jpg" alt="" class="img-responsive" data-static="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-dewey-01.jpg" data-animated="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-dewey-01.gif">
				</div>
			</div>
			<div class="col-xs-6 col-md-4">
				<div class="embed-responsive embed-responsive-16by9">
					<img src="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-hal-01.jpg" alt="" class="img-responsive" data-static="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-hal-01.jpg" data-animated="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-hal-01.gif">
				</div>
			</div>
			<div class="col-xs-6 col-md-4">
				<div class="embed-responsive embed-responsive-16by9">
					<img src="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-hal-02.jpg" alt="" class="img-responsive" data-static="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-hal-02.jpg" data-animated="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-hal-02.gif">
				</div>
			</div>
			<div class="col-xs-6 col-md-4">
				<div class="embed-responsive embed-responsive-16by9">
					<img src="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-enfants-01.jpg" alt="" class="img-responsive" data-static="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-enfants-01.jpg" data-animated="<?php echo get_template_directory_uri(); ?>/img/gif/s01e08-enfants-01.gif">
				</div>
			</div>
		</div>
	</section>

	<section class="music">
		<h3 class="section-title"><span>Musiques</span></h3>
		<ul>
			<li>
				<ul>
					<li>
						<span class="label">Musique</span> "Nice Is Good, Mean Is Bad" - They Might Be Giants (Instrumental)
					</li>
					<li>
						<span class="label">Scène</span> Caroline rencontre toute la famille de Malcolm.
					</li>
				</ul>
			</li>
			<li>
				<ul>
					<li>
						<span class="label">Musique</span> "Monster" - They Might Be Giants
					</li>
					<li>
						<span class="label">Scène</span> Une panique totale a lieu ! Lois sème le trouble entre les mères de famille, Hal empoisonne les enfants, et Malcolm provoque une réaction chimique.
					</li>
				</ul>
			</li>
		</ul>
	</section>

	<section class="errors">
		<h3 class="section-title"><span>Erreurs &amp; Faux raccords</span></h3>
		<ul>
			<li>
				<span class="label">01 min 10 s</span> Le badge que pose Malcolm à côté des tubes à essai de Stevie change de position lorsque ce dernier fait demi-tour avec son fauteuil.
			</li>
			<li>
				<span class="label">01 min 10 s</span> Quand Hal montre la viande dans sa glacière, les saucisses sont à droite et les steacks à gauche. Mais lorsque Dewey prend un steack pour son père, c'est l'inverse.
			</li>
			<li>
				<span class="label">01 min 10 s</span> Malcolm apporte un hamburger à Caroline, et celle-ci le mange aux trois quarts. Quand Malcolm s'apprête à partir, le hamburger est à peine entamé.
			</li>
			<li>
				<span class="label">01 min 10 s</span> Quand Stevie prépare son projet, son fauteuil roulant est accroché à la table. Puis, la corde disparaît.
			</li>
			<li>
				<span class="label">01 min 10 s</span> Dans 2.25 – "Souvenirs, souvenirs" (Flashback), on apprend que Lois est allergique aux cacahuètes. Mais dans cet épisode, elle a préparé des cookies qui en contiennent.
			</li>
			<li>
				<span class="label">01 min 10 s</span> On peut apercevoir plusieurs cadreurs pendant l'épisode. Quand les têtes d'ampoule attendent à la table, un cadreur est sous la table. Après l'explosion, l'un d'entre eux court après Malcolm.
			</li>
		</ul>
	</section>

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