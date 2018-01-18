<?php /* Template Name: Home Page Template */ get_header(); ?>
<main role="main" class="main-content">
  <?php the_content(); ?>
  <div class="carousel-container">
    <div id="mainCarousel" class="owl-carousel">
      <div class="item">
        <div class="content">
          <h3 class="subtitle"><span>Audiences</span></h3>
          <h2 class="title"><span>Déprogrammé</span></h2>
        </div>
        <ul class="parallax" id="parallax-0"
            data-calibrate-x="false"
            data-calibrate-y="true"
            data-invert-x="false"
            data-invert-y="true"
            data-limit-x="false"
            data-limit-y="10"
            data-scalar-x="7"
            data-scalar-y="0"
            data-origin-x="0.0"
            data-origin-y="0.0">
          <li class="layer" data-depth="0.10">
            <img src="<?php echo get_template_directory_uri(); ?>/img/test/slide-02-bkg.jpg" alt="" class="img-responsive" />
          </li>
          <li class="layer" data-depth="0.20">
            <img src="<?php echo get_template_directory_uri(); ?>/img/test/slide-02-bkg.png" alt="" class="img-responsive" />
          </li>
          <li class="layer" data-depth="0.40" data-invert-y="false">
            <img src="<?php echo get_template_directory_uri(); ?>/img/test/slide-02-m6.png" alt="" class="img-responsive" />
          </li>
          <li class="layer" data-depth="0.60">
            <img src="<?php echo get_template_directory_uri(); ?>/img/test/slide-02-malcolm.png" alt="" class="img-responsive" />
          </li>
        </ul>
      </div>
      <div class="item">
        <div class="content">
          <h3 class="subtitle"><span>Boutique</span></h3>
          <h2 class="title"><span>Découvrez le nouveau<br />coffret collector</span></h2>
        </div>
        <ul class="parallax" id="parallax-1"
            data-calibrate-x="false"
            data-calibrate-y="true"
            data-invert-x="false"
            data-invert-y="true"
            data-limit-x="false"
            data-limit-y="10"
            data-scalar-x="7"
            data-scalar-y="0"
            data-origin-x="0.0"
            data-origin-y="0.0">
          <li class="layer" data-depth="0.60">
            <img src="<?php echo get_template_directory_uri(); ?>/img/test/slide-01-stevie.png" alt="" class="img-responsive" />
          </li>
          <li class="layer" data-depth="0.20">
            <img src="<?php echo get_template_directory_uri(); ?>/img/test/slide-01-malcolm.png" alt="" class="img-responsive" />
          </li>
          <li class="layer" data-depth="0.40">
            <img src="<?php echo get_template_directory_uri(); ?>/img/test/slide-01-logo.png" alt="" class="img-responsive" />
          </li>
        </ul>
      </div>
    </div>
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
                    <i class="fa fa-play-circle-o"></i>
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
                      <span class="date"><i class="fa fa-calendar"></i> <?php the_time('l j F Y'); ?></span>
                      <span class="hour"><i class="fa fa-clock-o"></i> <?php the_time('g'); ?>H<?php the_time('i'); ?></span>
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
                  <i class="fa fa-play-circle-o"></i>
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
                  <span class="date"><i class="fa fa-calendar"></i> <?php the_time('l j F Y'); ?></span>
                  <span class="hour"><i class="fa fa-clock-o"></i> <?php the_time('g'); ?>H<?php the_time('i'); ?></span>
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
      <a href="<?php echo esc_url( $category_link ); ?>" class="btn btn-yellow" title=""><i class="fa fa-plus-circle" aria-hidden="true"></i> Plus d'articles</a>
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
          <a href="#" class="btn btn-yellow" title=""><i class="fa fa-plus-circle" aria-hidden="true"></i> Toutes les répliques cultes</a>
        </div>
      </section>
      <section class="gifs">
        <h2 class="title-highlight"><span>Gifs</span></h2>
        <div class="embed-responsive embed-responsive-16by9">
          <img src="img/gif/s01e08-dewey-01.gif" alt="" class="img-responsive" data-static="img/gif/s01e08-dewey-01.gif" data-animated="img/gif/s01e08-dewey-01.gif">
        </div>
        <div class="share">
          <h5 class="title">Partager</h5>
          <div class="addthis addthis_sharing_toolbox" data-url="http://malcolm-france.com/v3/site/img/gif/s01e08-dewey-01.gif" data-title="Gif Malcolm | Dewey vs nain de jardin"></div>
        </div>
        <div class="text-center">
          <a href="#" class="btn btn-yellow" title=""><i class="fa fa-plus-circle" aria-hidden="true"></i> Tous les gifs</a>
        </div>
      </section>
    </div>
    <section class="broadcasts col-md-6 col-table-cell clearfix">
      <h2 class="title-highlight"><span>Diffusion télé</span></h2>
      <h3 class="subtitle">Jeudi 1er septembre 2016</h3>
      <div class="table-responsive">
        <table class="table table-hover table-condensed">
          <tbody>
            <tr>
              <td class="hour">12h50</td>
              <td><a href="#" title="" >1.01 – "Je ne suis pas un monstre"</a></td>
              <td class="channel">W9</td>
            </tr>
            <tr>
              <td class="hour">13h20</td>
              <td><a href="#" title="">1.02 – "Alerte rouge"</a></td>
              <td class="channel">W9</td>
            </tr>
            <tr>
              <td class="hour">13h50</td>
              <td><a href="#" title="">1.03 – "Seuls à la maison"</a></td>
              <td class="channel">W9</td>
            </tr>
            <tr>
              <td class="hour">14h20</td>
              <td><a href="#" title="">1.04 – "Honte"</a></td>
              <td class="channel">W9</td>
            </tr>
            <tr>
              <td class="hour">14h50</td>
              <td><a href="#" title="">1.07 – "La petite évasion"</a></td>
              <td class="channel">W9</td>
            </tr>
            <tr>
              <td class="hour">15h20</td>
              <td><a href="#" title="">1.08 – "Panique au pique-nique"</a></td>
              <td class="channel">W9</td>
            </tr>
            <tr>
              <td class="hour">15h45</td>
              <td><a href="#" title="">1.09 – "Ma mère, ce héros"</a></td>
              <td class="channel">W9</td>
            </tr>
            <tr>
              <td class="hour">16h15</td>
              <td><a href="#" title="">2.02 – "Il n'y a pas d'heure pour Halloween"</a></td>
              <td class="channel">W9</td>
            </tr>
          </tbody>
        </table>
      </div>
      <h3 class="subtitle">Vendredi 2 septembre 2016</h3>
      <div class="table-responsive">
        <table class="table table-hover table-condensed">
          <tbody>
            <tr>
              <td class="hour">12h50</td>
              <td><a href="#" title="" >2.03 – "Joyeux anniversaire Loïs"</a></td>
              <td class="channel">W9</td>
            </tr>
            <tr>
              <td class="hour">13h20</td>
              <td><a href="#" title="">2.04 – "Dîner en ville"</a></td>
              <td class="channel">W9</td>
            </tr>
            <tr>
              <td class="hour">13h50</td>
              <td><a href="#" title="">2.05 – "Faites vos jeux"</a></td>
              <td class="channel">W9</td>
            </tr>
            <tr>
              <td class="hour">14h20</td>
              <td><a href="#" title="">2.06 – "Le congrès"</a></td>
              <td class="channel">W9</td>
            </tr>
            <tr>
              <td class="hour">14h50</td>
              <td><a href="#" title="">2.07 – "Attaque à main armée"</a></td>
              <td class="channel">W9</td>
            </tr>
            <tr>
              <td class="hour">15h20</td>
              <td><a href="#" title="">2.08 – "Panique au pique-nique"</a></td>
              <td class="channel">W9</td>
            </tr>
            <tr>
              <td class="hour">15h45</td>
              <td><a href="#" title="">2.09 – "Thérapie"</a></td>
              <td class="channel">W9</td>
            </tr>
            <tr>
              <td class="hour">16h15</td>
              <td><a href="#" title="">3.01 – "Tout le monde sur le pont"</a></td>
              <td class="channel">W9</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="text-center">
        <a href="#" class="btn btn-yellow" title=""><i class="fa fa-plus-circle" aria-hidden="true"></i> Toutes les diffusions</a>
      </div>
    </section>
  </div><!-- /row -->
  <section class="tv-area">
    <div class="row">
      <div class="col-lg-5 col-md-5 col-left">
        <h2 class="title"><span>Le coin télé</span></h2>
      </div>
      <div class="col-lg-7 col-md-7 col-right">
        <a href="#" title="">
          <span class="img-container">
            <i class="fa fa-play-circle-o"></i>
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
              <i class="fa fa-play-circle-o"></i>
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
              <i class="fa fa-play-circle-o"></i>
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
              <i class="fa fa-play-circle-o"></i>
              <img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" class="img-responsive" />
            </span>
            <span class="content">
              <span class="category"><span>Extrait</span></span>
              <span class="title">Titre de l'extrait numéro 3</span>
            </span>
          </a>
        </article>
        <div class="text-center">
          <a href="#" class="btn btn-yellow" title=""><i class="fa fa-plus-circle" aria-hidden="true"></i> Toutes les vidéos</a>
        </div>
      </div><!-- /col-left -->
    </div><!-- /row -->
  </section>
  <section class="other">
    <h2 class="title-highlight"><span>Mate ça !</span></h2>
    <div class="row">
      <div class="col-sm-3">
        <article>
          <a href="#" class="grid" title="">
            <span class="content">
              <span class="category"><span>Dossier</span></span>
              <span class="title">Lorem ipsum dolor sit amet</span>
              <span class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque nulla doloremque mollitia, eaque recusandae quod, cupiditate molestias assumenda sapiente beatae voluptatum.</span>
            </span>
            <span class="img-container">
              <span class="img">
                <img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" />
              </span>
            </span>
          </a>
        </article>
      </div>
      <div class="col-sm-6">
        <article>
          <a href="#" class="grid grid-large" title="">
            <span class="content">
              <span class="category"><span>Dossier</span></span>
              <span class="title">Lorem ipsum dolor sit amet</span>
              <span class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque nulla doloremque mollitia, eaque recusandae quod, cupiditate molestias assumenda sapiente beatae voluptatum.</span>
            </span>
            <span class="img-container">
              <span class="img">
                <img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" />
              </span>
            </span>
          </a>
        </article>
      </div>
      <div class="clearfix visible-xs"></div>
      <div class="col-sm-3">
        <article>
          <a href="#" class="grid" title="">
            <span class="content">
              <span class="category"><span>Dossier</span></span>
              <span class="title">Lorem ipsum dolor sit amet</span>
              <span class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque nulla doloremque mollitia, eaque recusandae quod, cupiditate molestias assumenda sapiente beatae voluptatum.</span>
            </span>
            <span class="img-container">
              <span class="img">
                <img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" />
              </span>
            </span>
          </a>
        </article>
      </div>
      <div class="col-sm-6">
        <article>
          <a href="#" class="grid grid-large" title="">
            <span class="content">
              <span class="category"><span>Dossier</span></span>
              <span class="title">Lorem ipsum dolor sit amet</span>
              <span class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque nulla doloremque mollitia, eaque recusandae quod, cupiditate molestias assumenda sapiente beatae voluptatum.</span>
            </span>
            <span class="img-container">
              <span class="img">
                <img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" />
              </span>
            </span>
          </a>
        </article>
      </div>
      <div class="clearfix visible-xs"></div>
      <div class="col-sm-3">
        <article>
          <a href="#" class="grid" title="">
            <span class="content">
              <span class="category"><span>Dossier</span></span>
              <span class="title">Lorem ipsum dolor sit amet</span>
              <span class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque nulla doloremque mollitia, eaque recusandae quod, cupiditate molestias assumenda sapiente beatae voluptatum.</span>
            </span>
            <span class="img-container">
              <span class="img">
                <img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" />
              </span>
            </span>
          </a>
        </article>
      </div>
      <div class="col-sm-3">
        <article>
          <a href="#" class="grid" title="">
            <span class="content">
              <span class="category"><span>Dossier</span></span>
              <span class="title">Lorem ipsum dolor sit amet</span>
              <span class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque nulla doloremque mollitia, eaque recusandae quod, cupiditate molestias assumenda sapiente beatae voluptatum.</span>
            </span>
            <span class="img-container">
              <span class="img">
                <img src="http://www.malcolm-france.com/v3/site/img/page/default.jpg" alt="" />
              </span>
            </span>
          </a>
        </article>
      </div>
    </div><!-- /row -->
  </section>
  <div class="row">
    <div class="col-md-8">
      <section class="social-networks">
        <h2 class="title-highlight"><span>La communauté des fans</span></h2>
        <div class="row">
          <div class="col-sm-6">
            <h3 class="title-highlight facebook"><a href="https://www.facebook.com/malcolmfrance" class="facebook" target="_blank" title="Rejoins-nous !" data-toggle="tooltip" data-placement="bottom" data-original-title="Malcolm France Facebook"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></h3>
            <div class="fb-page" data-href="https://www.facebook.com/malcolmfrance/" data-width="555" data-height="620" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><blockquote cite="https://www.facebook.com/malcolmfrance/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/malcolmfrance/">Malcolm France</a></blockquote></div>
          </div>
          <div class="col-sm-6">
            <h3 class="title-highlight twitter"><a href="https://twitter.com/malcolmfrance" class="twitter" target="_blank" title="Rejoins-nous !" data-toggle="tooltip" data-placement="bottom" data-original-title="Malcolm France Twitter"><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a></h3>
            <a class="twitter-timeline"  href="https://twitter.com/hashtag/Malcolm" data-widget-id="755721573009592320">Tweets sur #Malcolm</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          </div>
        </div><!-- /row -->
      </section>
    </div>
    <div class="col-md-4">
      <section class="shop">
        <h2 class="title-highlight"><span>La boutique</span></h2>
        <div id="shopCarousel" class="owl-carousel">
          <div class="item">
            <a href="shop.html" title="">
              <img src="https://images-na.ssl-images-amazon.com/images/I/71g8jTodGYL._SX522_.jpg" alt="" class="img-responsive" />
              <span class="title">Coffret Intégrale Malcolm, saisons 1 à 7</span>
              <span class="price">
                <span>97€<span>95</span></span>
              </span>
              <span href="shop.html" class="btn btn-yellow" title="">Je le veux !</span>
            </a>
          </div><!-- /item -->
          <div class="item">
            <a href="shop.html" title="">
              <img src="https://images-na.ssl-images-amazon.com/images/I/81wSd9dLJHL._SY679_.jpg" alt="" class="img-responsive" />
              <span class="title">Coffret Intégrale Malcolm, saisons 1 à 7</span>
              <span class="price">
                <span>97€<span>95</span></span>
              </span>
              <span href="shop.html" class="btn btn-yellow" title="">Je le veux !</span>
            </a>
          </div><!-- /item -->
          <div class="item">
            <a href="shop.html" title="">
              <img src="https://images-na.ssl-images-amazon.com/images/I/71g8jTodGYL._SX522_.jpg" alt="" class="img-responsive" />
              <span class="title">Coffret Intégrale Malcolm, saisons 1 à 7</span>
              <span class="price">
                <span>97€<span>95</span></span>
              </span>
              <span href="shop.html" class="btn btn-yellow" title="">Je le veux !</span>
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