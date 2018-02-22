<!doctype html>
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
		<link href="<?php echo get_template_directory_uri(); ?>/css/main.css" rel="stylesheet">
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
		<script>
			// conditionizr.com
			// configure environment tests
			conditionizr.config({
				assets: '<?php echo get_template_directory_uri(); ?>',
				tests: {}
			});
		</script>
	</head>
	<?php
		$var = array(
			'1' => array('1', '', 'Et voilà,<br /> à force de courir<br /> derrière un ballon,<br /> vous vous êtes perdu !'), 
			'2' => array('2', 'alternative', 'Pas la peine de<br /> demander votre chemin<br /> à un épouvantail...<br /> Vous êtes perdu !'),
			'3' => array('3', '', 'Et voilà,<br /> à force de courir<br /> derrière un ballon,<br /> vous vous êtes perdu !')
		);
		$model = array_rand($var);
	?>
	<body <?php body_class( $var[$model][1] ); ?>>
		<header>
			<a href="<?php echo home_url(); ?>" class="logo" title="Accueil Malcolm France">M<span class="text-hide">alcolm France</span></a>
		</header>
		<div class="content">
			<p><?php echo $var[$model][2]; ?></p>
			<div class="button">
				<a href="<?php echo home_url(); ?>" class="btn btn-yellow" title="Accueil Malcolm France">Retourner à l'accueil</a>
			</div>
			<div class="link">
				<a href="#" class="" title="" data-toggle="modal" data-target="#errorReporting">Vous n'arrivez toujours pas à afficher la page <i class="fa fa-question-circle"></i></a>
			</div>
			<div class="video-controls">
				<button class="play" type="button">
					<i class="fa fa-pause"></i>
				</button>
				<button class="mute" type="button">
					<i class="fa fa-volume-off"></i>
				</button>
			</div>
		</div>
		<video id="video" autoplay muted>
			<source src="<?php echo get_template_directory_uri(); ?>/video/404-<?php echo $var[$model][0]; ?>.webm" type="video/webm">
			<source src="<?php echo get_template_directory_uri(); ?>/video/404-<?php echo $var[$model][0]; ?>.mp4" type="video/mp4">
		</video>
		<footer>
			<p>Copyright &copy; 2003-<?php echo date('Y'); ?> <span>-</span> Malcolm France <span>-</span> Tous droits réservés</p>
		</footer>
		<div class="modal fade" id="errorReporting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Cafter une erreur sur le site</h4>
					</div>
					<div class="modal-body">
						<?php echo do_shortcode('[contact-form-7 id="644" title="404"]'); ?>
					</div>
				</div>
			</div>
		</div><!-- /modal -->
		<script src="<?php echo get_template_directory_uri(); ?>/js/enquire.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/functions.js" type="text/javascript"></script>
	</body>
</html>