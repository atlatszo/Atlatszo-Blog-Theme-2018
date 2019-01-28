<!DOCTYPE html>
<html dir="ltr" <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<?php
	$oldal_neve_oldalsav=get_field('oldalsavban_megjeleno_nev', 'option');
	if ($oldal_neve_oldalsav) {
		$oldal_neve=$oldal_neve_oldalsav;
	} else {
		$oldal_neve=get_bloginfo('name');
	}

	if (is_front_page() || is_home()) {
		$oldal_neve_kiir=$oldal_neve;
	} else {
		$oldal_neve_kiir=wp_title('', false)." | ".$oldal_neve;
		$oldal_neve_kiir=str_replace('  ', '', $oldal_neve_kiir);
	}
	?>
	<title><?php echo $oldal_neve_kiir; ?></title>
	
	<?php wp_head(); ?>

	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url')?>/i/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url')?>/i/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url')?>/i/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php bloginfo('template_url')?>/i/favicon/site.webmanifest">
	<link rel="mask-icon" href="<?php bloginfo('template_url')?>/i/favicon/safari-pinned-tab.svg" color="#ff0000">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_url')?>/i/favicon/favicon-32x32.png">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<meta property="fb:app_id" content="985094288330865" />

	<link type="text/css" rel="stylesheet" href="//fast.fonts.net/cssapi/fa08d7fc-a105-4d0b-9bf9-31208bc42ecc.css"/>
	<link href="https://fonts.googleapis.com/css?family=PT+Serif:400,700&amp;subset=latin-ext" rel="stylesheet">
	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="screen, projection" />
	
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/j/fa/css/fa-svg-with-js.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/responsive.css" type="text/css" media="screen" />

	<?php
	$blogurl=get_bloginfo('url');
	$blogurl=str_replace('https://', '', $blogurl);
	$blogurl=str_replace('/', '', $blogurl);
	if ($blogurl=="blog.atlatszo.hu") { ?>

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/atlatszoblog.css" type="text/css" media="screen" />

	<?php } ?>

	<script src="<?php bloginfo('template_url'); ?>/j/jquery.1.12.4.min.js"></script>
	<script defer src="<?php bloginfo('template_url'); ?>/j/fa/js/fontawesome-all.min.js"></script>

	<?php if (is_front_page() || is_home()) { ?>

		<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
		<meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>" />
		<meta property="og:title" content="<?php echo get_bloginfo('name'); ?>" />
		<meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />
		<meta name="description" content="<?php echo $returned_excerpt; ?>" />
		<meta property="og:image" content="<?php echo get_bloginfo('template_url')?>/i/atlatszo-logo-900x360.jpg" />
		<meta property="og:image:width" content="900" />
		<meta property="og:image:height" content="360" />
		<meta property="og:type" content="website" />

		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@atlatszo">
		<meta name="twitter:title" content="<?php echo get_bloginfo('name'); ?>">
		<meta name="twitter:description" content="<?php echo get_bloginfo('description'); ?>" >
		<meta name="i:image16_9" content="<?php echo get_bloginfo('template_url')?>/i/atlatszo-logo-900x360.jpg" />
		<meta name="twitter:image" content="<?php echo get_bloginfo('template_url')?>/i/atlatszo-logo-900x360.jpg">
		<meta name="twitter:image:src" content="<?php echo get_bloginfo('template_url')?>/i/atlatszo-logo-900x360.jpg">

	<?php } else {

		$this_post=get_post();
		$text = get_post_field( 'post_content', $this_post);
  		$generated_excerpt = wp_trim_words( $text, 55 );
  		$returned_excerpt=apply_filters( 'get_the_excerpt', $generated_excerpt, $post );
  		$returned_excerpt=str_replace('&nbsp;', '', $returned_excerpt);
  		$returned_excerpt=str_replace('&hellip;', '', $returned_excerpt);
  		

        if (has_post_thumbnail()) {
        	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
        	$featured_img_url_169 = get_the_post_thumbnail_url(get_the_ID(),'small_169');
		} else {
			$featured_img_url=get_bloginfo('template_url')."/i/atlatszo-logo-900x360.jpg";
		}
		$photo_size = getimagesize($featured_img_url);
		$feat_image_width=$photo_size[0];
		$feat_image_height=$photo_size[1];

		?>

		<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
		<meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>" />
		<meta property="og:title" content="<?php echo get_the_title(); ?>" />
		<meta property="og:description" content="<?php echo $returned_excerpt; ?>" />
		<meta name="description" content="<?php echo $returned_excerpt; ?>" />
		<meta property="og:image" content="<?php echo $featured_img_url; ?>" />
		<meta property="og:image:url" content="<?php echo $featured_img_url; ?>" />
		<meta property="og:image:width" content="<?php echo $feat_image_width; ?>" />
		<meta property="og:image:height" content="<?php echo $feat_image_height; ?>" />
		<meta property="og:type" content="article" />

		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:site" content="@atlatszo" />
		<meta name="twitter:title" content="<?php echo get_the_title(); ?>" />
		<meta name="twitter:description" content="<?php echo $returned_excerpt; ?>" />
		<meta name="i:image16_9" content="<?php echo $featured_img_url_169; ?>" />
		<meta name="twitter:image" content="<?php echo $featured_img_url; ?>" />
		<meta name="twitter:image:src" content="<?php echo $featured_img_url; ?>" />

	<?php } ?>

</head>

<body <?php body_class(); ?>>

<?php

	$html = file_get_contents("https://dummy.atlatszo.hu/mainmenu.html");
    $dom = new DOMDocument('1.0');
    $dom->loadHTML($html);
    $element = $dom->getElementById('header');
    $mainmenu_html = $element->C14N();
    echo $mainmenu_html;

//include('headermain.php');
?>

	<?php
	$blog_fejlec_leiras=get_field('blog_fejlec_leiras', 'option');
	$blog_fooldal_leiras=get_field('blog_fooldal_leiras', 'option');
	$oldalsavban_megjeleno_nev=get_field('oldalsavban_megjeleno_nev', 'option');
	if (!$oldalsavban_megjeleno_nev) {$oldalsavban_megjeleno_nev=get_bloginfo('name');}

	if (!$blog_fejlec_leiras && !$blog_fooldal_leiras) {
		$blog_fejlec_leiras=get_bloginfo('description');
	} else {
		$blog_fejlec_leiras=$blog_fooldal_leiras;
	}

	$blog_fejlec_kep=get_field('blog_fejlec_kep', 'option');
	$blog_fejlec_kep_url=$blog_fejlec_kep['url'];
	if (!$blog_fejlec_kep_url) {
		$blog_fejlec_kep_url=get_bloginfo('template_url')."/i/general-header-small.png";
	}

	?>

<style>
.blogheader .outer:before {content:"";opacity:1;background-image:url('<?php echo $blog_fejlec_kep_url; ?>');background-size:cover;background-repeat:no-repeat;background-position:center;top: 0;left: 0;bottom: 0;right: 0;position: absolute;z-index:0;}
</style>

<div class="blogheader blgrey">
	<div class="outer n9 pr bl">
	<div class="inner pt20 pr">
		<div class="n100 ib ac">
			<div class="the_blogname ib vm"><h1 class="fs25px ib"><a class="bred cwhite fs25px ttu p10 ib fblack" href="<?php echo get_bloginfo('url'); ?>"><?php echo $oldalsavban_megjeleno_nev; ?></a></h1></div>
		</div>
	</div>
	</div>
</div>

<form method="get" id="the_searchform" class="dn pf r0 t0 z9 h100 n100" action="<?php bloginfo('home'); ?>/">

	<div class="n9 vam">
		<a href="#" id="close_the_search" class="searchingclose ma ac n50 bl cle pb40"><img src="<?php echo get_bloginfo('template_url'); ?>/i/close-white.svg" width="30" height="30" class="bl ac ma" alt="Bezárás"/></a>

		<div class="n50 ma p15 search_fields">
			<input type="text" value="Keresés..." onblur="if(this.value=='') this.value='Keresés...';" onfocus="if(this.value=='Keresés...') this.value='';" name="s" id="sd" class="search_keyword bl p20 n100 mb15"/>
			<input type="submit" class="gosearch fblack button p20 ac bl vm cwhite bred ttu n100" id="ssubd" value="Keresés" />
		</div>

	</div>
</form>