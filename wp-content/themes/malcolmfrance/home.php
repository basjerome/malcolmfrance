<?php /* Template Name: Home Page Template */ get_header(); ?>
<main role="main" class="main-content">
  <?php the_content(); ?>
  <div class="carousel-container">
    <?php if( have_rows('mf_homepage_carousel') ): ?>
      <div id="mainCarousel" class="owl-carousel">
        <?php while( have_rows('mf_homepage_carousel') ): the_row();
          $image = get_sub_field('mf_homepage_carousel_img');
          $category = get_sub_field('mf_homepage_carousel_category');
          $title = get_sub_field('mf_homepage_carousel_title');
          $url = get_sub_field('mf_homepage_carousel_url');
        ?>
        <div class="item" style="background-image: url('<?php echo $image['url']; ?>');" onclick="location.href='<?php echo $url; ?>';">
          <div class="content">
            <h3 class="subtitle"><span><?php echo $category; ?></span></h3>
            <h2 class="title"><span><?php echo $title; ?></span></h2>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
  <section class="news">
    <h2 class="title-highlight"><span>L'actu récente</span></h2>
    <div class="row">
      <?php
         $the_query = new WP_Query( array(
          'category_name' => 'actualites',
          'posts_per_page' => 2,
         ));
      ?>
      <?php if ( $the_query->have_posts() ) : ?>
        <?php $a = 0; ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <?php $a++; ?>
          <div class="col-sm-6 col-md-12">
            <article class="clearfix <?php if($a == 1) { echo 'first'; } else { echo 'last'; } ?>">
              <a href="<?php the_permalink(); ?>" class="horizontal" title="">
                <span class="article-container">
                  <span class="img-container">
                  <?php
                    $icon = get_field('mf_post_icons');
                    if( $icon == 'Vidéo' ) { ?>
                    <i class="far fa-play-circle"></i>
                  <?php } elseif ( $icon == 'Diaporama' ) { ?>
                    <i class="fa fa-camera"></i>
                  <?php } ?>
                    <span class="img">
                      <img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                    </span>
                  </span>
                  <span class="col">
                    <span class="category"><span><?php the_field('mf_post_icons'); ?></span></span>
                    <span class="post-title"><?php the_title(); ?></span>
                    <span class="post-desc"><?php the_excerpt(); ?></span>
                    <span class="post-meta">
                      <span class="date"><i class="far fa-calendar-alt"></i> <?php the_time('l j F Y'); ?></span>
                      <span class="hour"><i class="far fa-clock"></i> <?php the_time('g'); ?>H<?php the_time('i'); ?></span>
                      <span class="comments"><i class="fa fa-commenting-o"></i> <span class="disqus-comment-count" data-disqus-identifier="<?php the_permalink(); ?>">0</span></span>
                    </span>
                  </span>
                </span><!-- /row -->
              </a>
            </article>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div><!-- /row -->
    <div class="row">
      <?php
         $the_query = new WP_Query( array(
          'category_name' => 'actualites',
          'posts_per_page' => 4,
          'offset' => 2,
         ));
      ?>
      <?php if ( $the_query->have_posts() ) : ?>
        <?php $a = 0; ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <?php $a++; ?>
          <div class="col-sm-6 col-md-3">
            <article>
              <a href="<?php the_permalink(); ?>" class="vertical" title="">
                <span class="img-container">
                <?php
                  $icon = get_field('mf_post_icons');
                  if( $icon == 'Vidéo' ) { ?>
                  <i class="far fa-play-circle"></i>
                <?php } elseif ( $icon == 'Diaporama' ) { ?>
                  <i class="fa fa-camera"></i>
                <?php } ?>
                  <span class="img">
                    <img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                  </span>
                </span>
                <span class="category"><span><?php the_field('mf_post_icons'); ?></span></span>
                <span class="post-title"><?php the_title(); ?></span>
                <span class="post-desc"><?php the_excerpt(); ?></span>
                <span class="post-meta">
                  <span class="date"><i class="far fa-calendar-alt"></i> <?php the_time('l j F Y'); ?></span>
                  <span class="hour"><i class="far fa-clock"></i> <?php the_time('g'); ?>H<?php the_time('i'); ?></span>
                  <span class="comments"><i class="fa fa-commenting-o"></i> <span class="disqus-comment-count" data-disqus-identifier="<?php the_permalink(); ?>">0</span></span>
                </span>
              </a>
            </article>
          </div>
          <?php if($a == 2) { echo '<div class="clearfix hidden-lg hidden-md"></div>'; } ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </div><!-- /row -->
    <?php
      $category_id = get_cat_ID('actualites');
      $category_link = get_category_link($category_id);
    ?>
    <div class="text-center">
      <a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-yellow" title=""><i class="fas fa-plus-circle" aria-hidden="true"></i> Plus d'articles</a>
    </div>
  </section>
  <div class="row row-table">
    <div class="col-md-6 col-table-cell">
      <section class="quotes">
        <h2 class="title-highlight"><span>Répliques cultes</span></h2>
        <blockquote class="wide">
          <ul>
            <li><strong>Hal</strong> : T’as intérêt à être toute nue quand je reviendrais.</li>
            <li><strong>Lois</strong> : D’accord.</li>
          </ul>
        </blockquote>
        <div class="origine">
          <ul>
            <li>Extrait de l'épisode</li>
            <li><a href="episode.html" title="">« Panique au pique-nique » (Saison 1, Épisode 8)</a></li>
          </ul>
        </div>
        <div class="share">
          <h5 class="title">Partager</h5>
          <div class="addthis addthis_sharing_toolbox" data-url="http://malcolm-france.com/v3/site/quote.html" data-title="« Panique au pique-nique » (Saison 1, Épisode 8)"></div>
        </div>
        <div class="text-center">
          <a href="#" class="btn btn-yellow" title=""><i class="fas fa-plus-circle" aria-hidden="true"></i> Toutes les répliques cultes</a>
        </div>
      </section>
      <section class="gifs">
        <h2 class="title-highlight"><span>Gifs</span></h2>
        <div class="embed-responsive embed-responsive-16by9">
          <img src="https://media0.giphy.com/media/13PZ0dKw1J3LzO/giphy.gif" alt="" class="img-responsive" data-static="https://media0.giphy.com/media/13PZ0dKw1J3LzO/giphy.gif" data-animated="https://media0.giphy.com/media/13PZ0dKw1J3LzO/giphy.gif">
        </div>
        <div class="share">
          <h5 class="title">Partager</h5>
          <div class="addthis addthis_sharing_toolbox" data-url="https://media0.giphy.com/media/13PZ0dKw1J3LzO/giphy.gif" data-title="Gif Malcolm | Dewey vs nain de jardin"></div>
        </div>
        <div class="text-center">
          <a href="#" class="btn btn-yellow" title=""><i class="fas fa-plus-circle" aria-hidden="true"></i> Tous les gifs</a>
        </div>
      </section>
    </div>
    <section class="broadcasts col-md-6 col-table-cell clearfix">
      <h2 class="title-highlight"><span>Diffusion télé</span></h2>
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
							<th class="text-center">Chaîne</th>
						</tr>
					</thead>
					<tbody>
            <?php while( have_rows('mf_broadcasts', 652) ): the_row();
              $currentDate = date( 'l j F Y G:i', current_time( 'timestamp', 1 ) );
              $strtotimecurrentDate = strtotime($currentDate);
              $date = get_sub_field('mf_broadcasts_date', false, false);
              $date = new DateTime($date);
              $strtotimedate = strtotime($date->format('l j F Y G:i'));
							$episode = get_sub_field('mf_broadcasts_episode');
              $channel = get_sub_field('mf_broadcasts_channel');
            ?>
            <?php if( $i < 5 && $strtotimecurrentDate < $strtotimedate ) : ?>
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
            <?php $i++; endif; ?>
						<?php endwhile; ?>
					</tbody>
				</table>
      </div>
      <?php endif; ?>
      <div class="text-center">
        <a href="<?php echo home_url(); ?>/diffusions/" class="btn btn-yellow" title="Voir toutes les diffusion télé de Malcolm"><i class="fas fa-tv" aria-hidden="true"></i> Toutes les diffusions</a>
      </div>
    </section>
  </div><!-- /row -->



  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
  <?php if( get_field('mf_homepage_videos') ): ?>
    <?php
      $posts = get_field('mf_homepage_videos');
      if( $posts ):
    ?>
    <?php foreach( $posts as $p ): ?>
      <?php /*
      <?php echo get_the_title( $p->post_parent ); ?>
      <?php echo get_the_title( $p->ID ); ?>
      <?php echo get_permalink( $p->ID ); ?>
      <?php echo get_the_post_thumbnail( $p->ID, '', array( 'class' => 'img-responsive' ) ); ?>
      */ ?>
    <?php endforeach; ?>
    <?php endif; ?>
  <section class="tv-area">
    <div class="row">
      <div class="col-lg-5 col-md-5 col-left">
        <h2 class="title"><span>Le coin télé</span></h2>
      </div>
      <div class="col-lg-7 col-md-7 col-right">
        <a href="#" title="">
          <span class="img-container">
            <i class="far fa-play-circle"></i>
            <span class="img">
              <img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" />
            </span>
            <span class="content">
              <span class="category"><span>Extrait</span></span>
              <span class="title">Candyman, la chanson !</span>
            </span>
          </span>
        </a>
      </div><!-- /col-right -->
      <div class="col-lg-5 col-md-5 col-left">
        <article>
          <a href="#" title="">
            <span class="img">
              <i class="far fa-play-circle"></i>
              <img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" class="img-responsive" />
            </span>
            <span class="content">
              <span class="category"><span>Extrait</span></span>
              <span class="title">Titre de l'extrait numéro 1</span>
            </span>
          </a>
        </article>
        <article>
          <a href="#" title="">
            <span class="img">
              <i class="far fa-play-circle"></i>
              <img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" class="img-responsive" />
            </span>
            <span class="content">
              <span class="category"><span>Extrait</span></span>
              <span class="title">Titre de l'extrait numéro 2</span>
            </span>
          </a>
        </article>
        <article>
          <a href="#" title="">
            <span class="img">
              <i class="far fa-play-circle"></i>
              <img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" class="img-responsive" />
            </span>
            <span class="content">
              <span class="category"><span>Extrait</span></span>
              <span class="title">Titre de l'extrait numéro 3</span>
            </span>
          </a>
        </article>
        <div class="text-center">
          <a href="#" class="btn btn-yellow" title=""><i class="fas fa-plus-circle" aria-hidden="true"></i> Toutes les vidéos</a>
        </div>
      </div><!-- /col-left -->
    </div><!-- /row -->
  </section>
  <?php endif; ?>
  <?php endwhile; ?>
  <?php endif; ?>



  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<?php if( get_field('mf_homepage_selection') ): $i=0; ?>
  <section class="other">
    <h2 class="title-highlight"><span>Mate ça !</span></h2>
    <div class="row">
			<?php
				$posts = get_field('mf_homepage_selection');
				if( $posts ):
			?>
			<?php foreach( $posts as $p ): $i++; ?>
      <div class="col-sm-<?php if( $i === 2 || $i === 4 ) : ?>6<?php else : ?>3<?php endif; ?>">
        <article>
          <a href="<?php echo get_permalink( $p->ID ); ?>" class="grid<?php if( $i === 2 || $i === 4 ) : ?> grid-large<?php endif; ?>" title="<?php echo get_the_title( $p->ID ); ?>">
            <span class="content">
              <span class="category"><span><?php echo get_the_title( $p->post_parent ); ?></span></span>
              <span class="title"><?php echo get_the_title( $p->ID ); ?></span>
              <span class="desc"><?php echo the_field('mf_extract', $p->ID); ?></span>
            </span>
            <span class="img-container">
              <span class="img">
              <?php echo get_the_post_thumbnail( $p->ID, '', array( 'class' => 'img-responsive' ) ); ?>
              </span>
            </span>
          </a>
        </article>
      </div>
			<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</section>
	<?php endif; ?>
  <?php endwhile; ?>
  <?php endif; ?>

  <div class="row">
    <div class="col-md-8">
      <section class="social-networks">
        <h2 class="title-highlight"><span>La communauté des fans</span></h2>
        <div class="row">
          <div class="col-sm-6">
            <h3 class="title-highlight facebook"><i class="fab fa-facebook-f"></i></h3>
            <div class="fb-page" data-href="https://www.facebook.com/malcolmfrance/" data-width="555" data-height="620" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><blockquote cite="https://www.facebook.com/malcolmfrance/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/malcolmfrance/">Malcolm France</a></blockquote></div>
            <div class="text-center"><a href="https://www.facebook.com/malcolmfrance" class="btn btn-yellow" target="_blank" title="Rejoins-nous !"><span><i class="fas fa-thumbs-up"></i> Nous rejoindre</span></a></div>
          </div>
          <div class="col-sm-6">
            <h3 class="title-highlight twitter"><i class="fab fa-twitter"></i></h3>
            <a class="twitter-timeline" href="https://twitter.com/hashtag/Malcolm" data-widget-id="978201833691926528">Tweets sur #Malcolm</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            <div class="text-center"><a href="https://twitter.com/malcolmfrance" class="btn btn-yellow" target="_blank" title="Rejoins-nous !"><span><i class="fas fa-thumbs-up"></i> Nous rejoindre</span></a></div>
          </div>
        </div><!-- /row -->
      </section>
    </div>
    <div class="col-md-4">
      <section class="shop">
        <h2 class="title-highlight"><span>La boutique</span></h2>
        <h3 class="title-highlight shop"><i class="fas fa-shopping-cart"></i></h3>
        <div id="shopCarousel" class="owl-carousel">
          <div class="item">
            <a href="/boutique/dvd-malcolm/" title="">
              <img src="https://images-na.ssl-images-amazon.com/images/I/71g8jTodGYL._SX522_.jpg" alt="" class="img-responsive" />
              <span class="title">Coffret Intégrale Malcolm, saisons 1 à 7</span>
              <span class="price">
                <span>97€<span>95</span></span>
              </span>
              <span class="btn btn-yellow"><i class="fas fa-shopping-cart"></i> Je le veux !</span>
            </a>
          </div><!-- /item -->
          <div class="item">
            <a href="/boutique/dvd-malcolm/" title="">
              <img src="https://images-na.ssl-images-amazon.com/images/I/81wSd9dLJHL._SY679_.jpg" alt="" class="img-responsive" />
              <span class="title">Coffret Intégrale Malcolm, saisons 1 à 7</span>
              <span class="price">
                <span>97€<span>95</span></span>
              </span>
              <span class="btn btn-yellow"><i class="fas fa-shopping-cart"></i> Je le veux !</span>
            </a>
          </div><!-- /item -->
          <div class="item">
            <a href="/boutique/dvd-malcolm/" title="">
              <img src="https://images-na.ssl-images-amazon.com/images/I/71g8jTodGYL._SX522_.jpg" alt="" class="img-responsive" />
              <span class="title">Coffret Intégrale Malcolm, saisons 1 à 7</span>
              <span class="price">
                <span>97€<span>95</span></span>
              </span>
              <span class="btn btn-yellow"><i class="fas fa-shopping-cart"></i> Je le veux !</span>
            </a>
          </div><!-- /item -->
        </div><!-- /owl-carousel -->
      </section>
    </div>
  </div><!-- /row -->
</main><!-- /main-content -->
<?php get_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/parallax.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {

    $('#mainCarousel, #shopCarousel').owlCarousel({
      singleItem  : true,
      slideSpeed  : 1000,
      stopOnHover : true,
      autoPlay    : true,
      navigation  : true,
      pagination  : true,
      addClassActive: true,
      autoHeight: false,
    });

    $('#mainCarousel .parallax').each(function( index ) {
      var scene = document.getElementById('parallax-' + index),
          parallax = new Parallax(scene);
    });

  });
</script>
