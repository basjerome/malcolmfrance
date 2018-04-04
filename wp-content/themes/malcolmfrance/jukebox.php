<?php /* Template Name: Jukebox Page Template */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="author" content="Malcolm France">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icon/favicon.png" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icon/favicon.png" rel="apple-touch-icon-precomposed">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/css/main.min.css" rel="stylesheet">
		<!-- /Facebook -->
		<meta property="og:site_name" content="malcolm-france.com">
		<meta property="fb:app_id" content="654248557947123">
		<meta property="og:title" content="<?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?>">
		<meta property="og:description" content="<?php bloginfo('description'); ?>">
		<!--meta property="og:url" content=""-->
		<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/page/default.jpg">
		<meta property="og:type" content="website">
		<!-- /Twitter -->
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@malcolmfrance">
		<meta name="twitter:creator" content="@malcolmfrance">
		<meta name="twitter:title" content="<?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?>">
		<meta name="twitter:description" content="<?php bloginfo('description'); ?>">
		<meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/img/page/default.jpg">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="js/ie10-viewport-bug-workaround.js" type="text/javascript"></script>
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
		<header>
			<a href="<?php echo home_url(); ?>" class="logo" title="Accueil Malcolm France">M<span class="text-hide">alcolm France</span></a>
			<h1 class="title-page"><span class="blink">Juke</span><span class="glow">bo</span><span class="blink">x</span></h1>
		</header>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_content(); ?>
		</article>
		<?php endwhile; ?>
		<?php endif; ?>
		<footer>
			<p>Copyright &copy; 2003-<?php echo date('Y'); ?> <span>-</span> Malcolm France <span>-</span> Tous droits réservés</p>
		</footer>
		<script src="<?php echo get_template_directory_uri(); ?>/js/enquire.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/functions.js" type="text/javascript"></script>
	</body>
</html>