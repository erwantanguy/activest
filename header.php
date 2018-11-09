<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.png" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="google-site-verification" content="iWHTqh_BKPVDLFATd-maUO88Qt7vm1pehz5zfcJPQ3Q" />
                <meta name="google-site-verification" content="u9ZBKz_U73qHZF85GJSaF0QZ3-KWN542hOiMRg8F638" />
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<?php wp_head(); ?>
		<script>
        conditionizr.com
        //configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109156616-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-109156616-1');
		</script>


	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">

					<!-- logo -->
					<div class="logo all_logo">
						<a href="#nav-resp" class="respdisplay" id="button-resp"><span class="fa fa-bars"></span></a>
						<a href="<?php echo home_url(); ?>" class="logo-link">
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo Activ'Est Écopole Rennes Cesson-Sévigné Chantepie Zone Industrielle sud-est" class="logo-img">
						</a>
						<div class="logs">
							<a href="https://activ-est.fr/inscription/" class="log inscription_button">INSCRIPTION</a>
							<a href="https://activ-est.fr/connexion/" class="log compte">MON COMPTE</a>
						</div>
						
					</div>
					<!-- /logo -->
					<!-- nav -->
						<nav class="nav nav_perso" role="navigation">
							<?php html5blank_nav(); ?>
						</nav>
					<!-- /nav -->
			</header>
			<!-- /header -->
			
			<nav id="nav-resp">
				<?php html5blank_nav(); ?>
			</nav>
			
			
