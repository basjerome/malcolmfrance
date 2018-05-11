<?php  /* Template Name: Character Page Template */  get_header(); ?>
<main role="main" class="main-content">
	<?php get_template_part('breadcrumb'); ?>
	<div class="page-content">
		<h2 class="title-highlight"><span><?php echo get_the_title( $post->post_parent ); ?></span></h2>
		<h1 class="page-title"><?php the_title(); ?></h1>
		<div class="row post-meta">
			<div class="col-sm-6">
				<span class="edit">
					<?php edit_post_link( __( 'Edit', 'malcolmfrance' ), '<i class="fas fa-cog" aria-hidden="true"></i> ', '', null, '' ); ?>
				</span>
			</div>
		</div><!-- /post-meta end -->
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
			<div class="illustration" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
				<img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php echo get_post(get_post_thumbnail_id())->post_title; ?>" class="img-responsive" />
				<span class="copyright">&copy; <?php echo get_post(get_post_thumbnail_id())->_wp_attachment_image_alt; ?></span>
				<meta itemprop="url" content="<?php echo the_post_thumbnail_url(); ?>">
				<meta itemprop="width" content="2000">
				<meta itemprop="height" content="1125">
			</div>
			<div class="legend"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></div>
			<?php endif; ?>
			<h3 class="section-title"><span>Présentation</span></h3>
			<?php the_content(); ?>
		</article>
		<?php endwhile; ?>
		<?php endif; ?>
		<?php
			$tagName = get_the_title();
			$args = array(
				'posts_per_page' => 3,
				'order' => 'DESC',
				'orderby' => 'rand',
				'post_type' => 'video',
				'tag' => $tagName
			);
			$rel_query = new WP_Query( $args );
			if( $rel_query->have_posts() ) :
		?>
		<section class="videos">
			<h4 class="section-title"><span>Les scènes cultes avec <?php the_title(); ?></span></h4>
			<div class="row">
				<?php
					while ( $rel_query->have_posts() ) :
					$rel_query->the_post();
				?>
				<article class="col-md-4">
					<a href="<?php the_permalink()?>" title="<?php the_title(); ?>">
						<i class="far fa-play-circle"></i>
						<span><?php the_title(); ?></span>
						<img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-responsive">
					</a>
				</article>
				<?php
					endwhile;
				?>
			</div>
		</section>
		<hr />
		<?php
			endif;
			wp_reset_query();
		?>
		<h2 class="page-title"><?php the_field('mf_actor_firstname'); ?> <?php the_field('mf_actor_lastname'); ?></h2>
		<?php
			$actorImage = get_field('mf_actor_image');
			if( !empty($actorImage) ):
		?>
		<div class="illustration" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
			<img src="<?php echo $actorImage['url']; ?>" alt="<?php echo $actorImage['title']; ?>" class="img-responsive" />
			<span class="copyright">&copy; <?php echo $actorImage['alt']; ?></span>
			<meta itemprop="url" content="<?php echo the_post_thumbnail_url(); ?>">
			<meta itemprop="width" content="2000">
			<meta itemprop="height" content="1125">
		</div>
		<div class="legend"><?php echo $actorImage['caption']; ?></div>
		<?php endif; ?>
		<?php if( get_field('mf_actor_biography') ): ?>
		<section class="biography">
			<h3 class="section-title"><span>Biographie</span></h3>
			<?php the_field('mf_actor_biography'); ?>
		</section>
		<?php endif; ?>
		<?php if( get_field('mf_actor_social_networks') || get_field('mf_actor_address') ): ?>
		<section class="contact">
			<h3 class="section-title"><span>Contact</span></h3>
			<div class="row">
				<?php if( get_field('mf_actor_social_networks') ): ?>
				<div class="col-sm-6">
					<h4>Sur Internet</h4>
					<p>
						<?php while( have_rows('mf_actor_social_networks') ): the_row();
							$title = get_sub_field('mf_actor_social_networks_title');
							$url = get_sub_field('mf_actor_social_networks_url');
							$icon = get_sub_field('mf_actor_social_networks_icon');
						?>
						<a href="<?php echo $url; ?>" class="btn btn-yellow" target="_blank" title="<?php the_field('mf_actor_firstname'); ?> <?php the_field('mf_actor_lastname'); ?> sur <?php echo $title; ?>"><i class="fa fa-<?php echo $icon; ?>"></i></a>
						<?php endwhile; ?>
					</p>
				</div>
				<?php endif; ?>
				<?php if ( get_field('mf_actor_address') ): ?>
				<div class="col-sm-6">
					<h4>Par courrier</h4>
					<address>
						<?php the_field('mf_actor_address'); ?>
					</address>
					<p>
						<a href="javascript:void(0)" class="advice" title="" title="&Eacute;crire à <?php the_field('mf_actor_firstname'); ?> <?php the_field('mf_actor_lastname'); ?>" type="button" data-toggle="modal" data-target="#sendMail">Comment écrire à <?php the_field('mf_actor_firstname'); ?> <?php the_field('mf_actor_lastname'); ?> <i class="fa fa-question-circle"></i></a>
					</p>
				</div>
				<?php endif; ?>
			</div>
		</section>
		<?php endif; ?>
		<?php if( have_rows('mf_best_of') ) : ?>
		<section class="best-of">
			<h3 class="section-title"><span>Ses meilleurs rôles</span></h3>
			<div class="row text-center">
				<?php while( have_rows('mf_best_of') ): the_row();
					$poster = get_sub_field('mf_best_of_poster');
					$title = get_sub_field('mf_best_of_title');
					$role = get_sub_field('mf_best_of_role');
				?>
				<div class="col-sm-4">
					<img src="<?php echo $poster['url']; ?>" alt="<?php echo $title; ?>" class="img-responsive" />
					<h4 class="title"><?php echo $title; ?></h4>
					<h5 class="subtitle"><?php echo $role; ?></h5>
				</div>
				<?php endwhile; ?>
			</div>
		</section>
		<?php endif; ?>
		<?php if( have_rows('mf_filmography_actor') || have_rows('mf_filmography_director') || have_rows('mf_filmography_scriptwriter') ) : ?>
		<section class="filmography">
			<h2 class="section-title"><span>Filmographie</span></h2>
			<ul class="nav nav-tabs" role="tablist">
				<?php if( have_rows('mf_filmography_actor') ) : ?><li role="presentation" class="active"><a href="#actor" aria-controls="actor" role="tab" data-toggle="tab">Acteur</a></li><?php endif; ?>
				<?php if( have_rows('mf_filmography_director') ) : ?><li role="presentation"><a href="#director" aria-controls="director" role="tab" data-toggle="tab">Réalisateur</a></li><?php endif; ?>
				<?php if( have_rows('mf_filmography_scriptwriter') ) : ?><li role="presentation"><a href="#scriptwriter" aria-controls="scriptwriter" role="tab" data-toggle="tab">Scénariste</a></li><?php endif; ?>
			</ul>
			<div class="btn-group" role="group">
				<button class="btn btn-default" type="button"><i class="fa fa-ticket"></i> <span class="hidden-xs">Film</span></button>
				<button class="btn btn-default" type="button"><i class="fa fa-television"></i> <span class="hidden-xs">Série</span></button>
				<button class="btn btn-default" type="button"><i class="fa fa-film"></i> <span class="hidden-xs">Téléfilm</span></button>
				<button class="btn btn-default" type="button"><i class="fas fa-edit"></i> <span class="hidden-xs">Dessin animé</span></button>
				<button class="btn btn-default" type="button"><i class="fa fa-video-camera"></i> <span class="hidden-xs">Court-métrage</span></button>
				<button class="btn btn-default" type="button"><i class="fa fa-cube"></i> <span class="hidden-xs">Autre</span></button>
			</div>
			<div class="tab-content">
				<?php if( have_rows('mf_filmography_actor') ) : ?>
				<div class="table-responsive tab-pane fade in active" id="actor" role="tabpanel">
					<table class="table table-hover table-condensed">
						<thead>
							<tr>
								<th>Année</th>
								<th>Titre</th>
								<th>Rôle</th>
							</tr>
						</thead>
						<tbody>
							<?php while( have_rows('mf_filmography_actor') ): the_row();
								$year = get_sub_field('mf_filmography_actor_year');
								$title = get_sub_field('mf_filmography_actor_title');
								$link = get_sub_field('mf_filmography_actor_link');
								$icon = get_sub_field('mf_filmography_actor_icon');
								$role = get_sub_field('mf_filmography_actor_role');
							?>
							<tr>
								<td><?php echo $year; ?></td>
								<td>
									<i class="fa fa-<?php echo $icon; ?>"></i>
									<?php if( $link ): ?>
										<a href="<?php echo $link; ?>" target="_blank" data-toggle="tooltip" data-placement="right" title="<?php echo $title; ?>" data-original-title="+ d'infos sur">
									<?php endif; ?>
										<?php echo $title; ?>
									<?php if( $link ): ?>
									</a>
									<?php endif; ?>
									<?php if( have_rows('mf_filmography_actor_details') ) : ?>
									<ul>
										<?php while( have_rows('mf_filmography_actor_details') ): the_row();
											$details = get_sub_field('mf_filmography_episode_title');
										?>
										<li><?php echo $details; ?></li>
										<?php endwhile; ?>
									</ul>
									<?php endif; ?>
								</td>
								<td><?php echo $role; ?></td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<?php endif; ?>
				<?php if( have_rows('mf_filmography_director') ) : ?>
				<div class="table-responsive tab-pane fade" id="director" role="tabpanel">
					<table class="table table-hover table-condensed">
						<thead>
							<tr>
								<th>Année</th>
								<th>Titre</th>
							</tr>
						</thead>
						<tbody>
							<?php while( have_rows('mf_filmography_director') ): the_row();
								$year = get_sub_field('mf_filmography_director_year');
								$title = get_sub_field('mf_filmography_director_title');
								$details = get_sub_field('mf_filmography_director_details');
								$link = get_sub_field('mf_filmography_director_link');
								$icon = get_sub_field('mf_filmography_director_icon');
							?>
							<tr>
								<td><?php echo $year; ?></td>
								<td>
									<i class="fa fa-<?php echo $icon; ?>"></i>
									<?php if( $link ): ?>
										<a href="<?php echo $link; ?>" target="_blank" data-toggle="tooltip" data-placement="right" title="<?php echo $title; ?>" data-original-title="+ d'infos sur">
									<?php endif; ?>
										<?php echo $title; ?>
									<?php if( $link ): ?>
									</a>
									<?php endif; ?>
									<?php if( have_rows('mf_filmography_director_details') ) : ?>
									<ul>
										<?php while( have_rows('mf_filmography_director_details') ): the_row();
											$details = get_sub_field('mf_filmography_episode_title');
										?>
										<li><?php echo $details; ?></li>
										<?php endwhile; ?>
									</ul>
									<?php endif; ?>
								</td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<?php endif; ?>
				<?php if( have_rows('mf_filmography_scriptwriter') ) : ?>
				<div class="table-responsive tab-pane fade" id="scriptwriter" role="tabpanel">
					<table class="table table-hover table-condensed">
						<thead>
							<tr>
								<th>Année</th>
								<th>Titre</th>
							</tr>
						</thead>
						<tbody>
							<?php while( have_rows('mf_filmography_scriptwriter') ): the_row();
								$year = get_sub_field('mf_filmography_scriptwriter_year');
								$title = get_sub_field('mf_filmography_scriptwriter_title');
								$link = get_sub_field('mf_filmography_scriptwriter_link');
								$icon = get_sub_field('mf_filmography_scriptwriter_icon');
								?>
							<tr>
								<td><?php echo $year; ?></td>
								<td>
									<i class="fa fa-<?php echo $icon; ?>"></i>
									<?php if( $link ): ?>
										<a href="<?php echo $link; ?>" target="_blank" data-toggle="tooltip" data-placement="right" title="<?php echo $title; ?>" data-original-title="+ d'infos sur">
									<?php endif; ?>
										<?php echo $title; ?>
									<?php if( $link ): ?>
									</a>
									<?php endif; ?>
									<?php if( have_rows('mf_filmography_scriptwriter_details') ) : ?>
									<ul>
										<?php while( have_rows('mf_filmography_scriptwriter_details') ): the_row();
											$details = get_sub_field('mf_filmography_episode_title');
										?>
										<li><?php echo $details; ?></li>
										<?php endwhile; ?>
									</ul>
									<?php endif; ?>
								</td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<?php endif; ?>
			</div>
		</section>
		<?php endif; ?>
		<?php
			$firstname = get_field('mf_actor_firstname');
			$lastname = get_field('mf_actor_lastname');
			$name = $firstname . ' ' . $lastname;
			$tag = get_term_by('name', $name, 'post_tag');
			$tagID = $tag->term_id;
			$the_query = new WP_Query( array(
				'category_name' => 'actualites',
				'posts_per_page' => 3,
				'tag_id' => $tagID,
			));
			if ( $the_query->have_posts() ) :
		?>
		<section class="actuality">
			<h4 class="section-title"><span>L'actualité de <?php the_field('mf_actor_firstname'); ?> <?php the_field('mf_actor_lastname'); ?></span></h4>
			<div class="row">
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<article class="col-md-4">
						<a href="<?php the_permalink(); ?>" class="clearfix" title='<?php the_title(); ?>'>
							<span class="img"><img src="<?php echo the_post_thumbnail_url(); ?>" alt='<?php the_title(); ?>' class="img-responsive" /></span>
							<span class="post-title"><?php the_title(); ?></span>
						</a>
					</article>
					<?php endwhile; ?>
			</div>
			<div class="text-center">
				<a href="<?php echo get_tag_link($tagID); ?>" class="btn btn-yellow" title="Toute l'actu de <?php echo $name ?>">Toute l'actu de <?php echo $name ?></a>
			</div>
		</section><!-- /actuality end -->
		<?php endif; ?>
	</div><!-- /page-content-end -->
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
<div class="modal fade" id="sendMail" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Comment écrire à <?php echo $name ?> <i class="fa fa-question-circle"></i></h4>
			</div>
			<div class="modal-body">
				<p>Si vous souhaitez écrire à <?php echo $name ?>, voici quelques petits conseils :</p>
				<ul>
					<li>écrivez votre message en anglais,</li>
					<li>joingnez un coupon réponse,</li>
					<li><i class="fa fa-exclamation-triangle"></i> vous n'êtes pas assuré de recevoir de réponse en retour.</li>
				</ul>
			</div>
		</div>
	</div>
</div><!-- /modal -->