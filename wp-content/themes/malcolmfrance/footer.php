				</div><!-- /clearfix end -->
			</div><!-- /main-container end -->
		</div><!-- /container end -->
		<div class="container">
			<footer class="main-footer">
				<section class="social-networks">
					<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
				</section>
				<aside>
					<div class="row">
						<div class="col-sm-4 logo">
							<a href="<?php echo home_url(); ?>" title="Accueil Malcolm France">M<span class="text-hide">alcolm France</span></a>
						</div>
						<div class="col-sm-8">
							<?php malcolmfrance_footer_nav(); ?>
							<p>Copyright &copy; 2003-<?php echo date('Y'); ?> <span>-</span> Malcolm France <span>-</span> Tous droits réservés</p>
						</div>
					</div><!-- /row -->
				</aside>
			</footer>
		</div><!-- /container end -->
		<?php wp_footer(); ?>
	  <div class="alert alert-warning alert-dismissible alert-cookies" id="cookies-eu-banner" role="alert" style="display: none;">
	    <button class="close" id="cookies-eu-reject" type="button" data-dismiss="alert" aria-label="Close">
	      <span aria-hidden="true">×</span>
	    </button>
	    <div class="container">
	      <div class="media">
	        <div class="media-body">
	          En poursuivant votre navigation sur ce site, vous acceptez l'utilisation de cookies pour vous proposer des contenus et services adaptés à vos centres d'intérêts.
	          <a href="cms.html" id="cookies-eu-more" title="Mentions légales">En savoir plus</a>.
	        </div>
	          <div class="media-right media-middle">
	            <button class="btn btn-yellow media-object" id="cookies-eu-accept" type="submit" data-dismiss="alert" aria-label="Close">&Ccedil;a marche</button>
	          </div>
	      </div>
	    </div><!-- /container -->
	  </div><!-- /alert-cookies -->
	  <script src="<?php echo get_template_directory_uri(); ?>/js/cookies-eu-banner.js"></script>
	  <script>
	    new CookiesEuBanner(function(){});
	  </script>
	  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.event.move.js"></script>
	  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.twentytwenty.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/enquire.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/headroom.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/functions.js" type="text/javascript"></script>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52c098cc65f8011c" async="async"></script>
	  <script id="dsq-count-scr" src="//malcolm-france.disqus.com/count.js" async></script>
	</body>
</html>
