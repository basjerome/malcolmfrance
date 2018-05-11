<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="<?php malcolmfrance_excerpt('malcolmfrance_index'); ?>">
		<meta name="author" content="Malcolm France">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icon/favicon.png" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icon/favicon.png" rel="apple-touch-icon-precomposed">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<link href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/css/owl.theme.css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/css/owl.transitions.css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/css/twentytwenty.css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/css/main.min.css" rel="stylesheet">
		<!-- /Facebook -->
		<meta property="og:site_name" content="malcolm-france.com">
		<meta property="fb:app_id" content="654248557947123">
		<?php if ( get_field('mf_share_title') ): ?>
		<meta property="og:title" content="<?php the_field('mf_share_title'); ?>">
		<?php else: ?>
		<meta property="og:title" content="<?php wp_title(''); ?>">
		<?php endif; ?>
		<?php if ( get_field('mf_extract') ): ?>
		<meta property="og:description" content="<?php the_field('mf_extract'); ?>">
		<?php else: ?>
		<meta property="og:description" content="<?php malcolmfrance_excerpt('malcolmfrance_index'); ?>">
		<?php endif; ?>
		<!--meta property="og:url" content=""-->
		<?php $shareImage = get_field('mf_share_img'); if ( get_field('mf_share_img') ): ?>
		<meta property="og:image" content="<?php echo $shareImage['url']; ?>">
		<?php else: ?>
		<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/page/default.jpg">
		<?php endif; ?>
		<meta property="og:type" content="website">
		<!-- /Twitter -->
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@malcolmfrance">
		<meta name="twitter:creator" content="@malcolmfrance">
		<?php if ( get_field('mf_share_title') ): ?>
		<meta name="twitter:title" content="<?php the_field('mf_share_title'); ?>">
		<?php else: ?>
		<meta name="twitter:title" content="<?php wp_title(''); ?>">
		<?php endif; ?>
		<?php if ( get_field('mf_extract') ): ?>
		<meta name="twitter:description" content="<?php the_field('mf_extract'); ?>">
		<?php else: ?>
		<meta name="twitter:description" content="<?php malcolmfrance_excerpt('malcolmfrance_index'); ?>">
		<?php endif; ?>
		<?php $shareImage = get_field('mf_share_img'); if ( get_field('mf_share_img') ): ?>
		<meta name="twitter:image" content="<?php echo $shareImage['url']; ?>">
		<?php else: ?>
		<meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/img/page/default.jpg">
		<?php endif; ?>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="<?php echo get_template_directory_uri(); ?>/js/ie10-viewport-bug-workaround.js" type="text/javascript"></script>
		<!-- Malcolm France shim and Respond.js IE8 support of Malcolm France elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/malcolmfranceshiv/3.7.2/malcolmfranceshiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script>
			// conditionizr.com
			// configure environment tests
			conditionizr.config({
				assets: '<?php echo get_template_directory_uri(); ?>',
				tests: {}
			});
		</script>
	</head>
	<body <?php body_class(); ?>>
	  <div id="fb-root"></div>
	  <script>(function(d, s, id) {
	    var js, fjs = d.getElementsByTagName(s)[0];
	    if (d.getElementById(id)) return;
	    js = d.createElement(s); js.id = id;
	    js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5&appId=654248557947123";
	    fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));</script>
	  <header class="main-header" role="banner">
	    <div class="container">
	      <div class="character lois"></div>
	      <div class="character dewey"></div>
	      <div class="character malcolm"></div>
	      <div class="character reese"></div>
	      <div class="character francis"></div>
	      <div class="character hal"></div>
	    </div>
	    <div class="main-navbar">
	      <div class="container">
	        <a href="<?php echo home_url(); ?>" class="logo" title="Accueil Malcolm France"><span>M<span class="text-hide">alcolm France</span></span></a>
	        <button class="btn-burger closed">
	          <span></span>
	          <svg x="0" y="0" width="54px" height="54px" viewBox="0 0 54 54">
	            <circle cx="27" cy="27" r="26"></circle>
	          </svg>
	        </button>
	        <nav role="navigation">
						<?php malcolmfrance_nav(); ?>
					</nav>
	      </div><!-- /container -->
	    </div><!-- /navbar -->
	  </header>
	  <div class="container">
	    <div class="main-container">
	      <div class="main-banner text-center">
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
	      <div class="clearfix">