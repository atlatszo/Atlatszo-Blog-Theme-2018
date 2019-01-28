<?php get_header();?>

<main class="home cat">
	
	<?php

	$blog_fooldal_leiras=get_field('blog_fooldal_leiras', 'option');
	if (!$blog_fooldal_leiras) {$blog_fooldal_leiras=get_bloginfo('description');}
	$oldalsavban_megjeleno_nev=get_field('oldalsavban_megjeleno_nev', 'option');
	if (!$oldalsavban_megjeleno_nev) {$oldalsavban_megjeleno_nev=get_bloginfo('name');}

	$blog_fooldal_kep=get_field('blog_fooldal_kep', 'option');
	$blog_fooldal_kep_url=$blog_fooldal_kep['url'];

	if (!$blog_fooldal_kep) {
		$blog_fooldal_kep_url=get_bloginfo('template_url')."/i/general-header-large.png";
	}
	?>

	<style>
		.the_category_box:before {content:"";opacity:1;background-image:url('<?php echo $blog_fooldal_kep_url; ?>');background-size:100%;background-repeat:no-repeat;background-position:right;top: 0;left: 0;bottom: 0;right: 0;position: absolute;z-index:0;}
	</style>

	<div class="the_category_box blgrey blogheader_home cat_image_true pr bl intro pt100 bbsgrey3">
		<div class="inner n9 pr">
			<div class="shell">
				<h1 class="cat_title tax_title mb30"><a href="<?php echo get_bloginfo('url'); ?>" class="the_category cat_linkbox fs25px"><?php echo $oldalsavban_megjeleno_nev; ?></a></h1>
				<h2 class="category-description fs32px cdarkgrey kszoveg ttn n50 lh160"><?php echo $blog_fooldal_leiras; ?></h2>
			</div>
		</div>
	</div>

	<?php if ( have_posts() ) : ?>

	<div class="cat_posts">
		<div class="shell">

		<?php while ( have_posts() ) : the_post();
			$excerpt=get_the_excerpt();
			$excerpt=str_replace('&nbsp; ', '', $excerpt);
			$the_cat=get_the_category();
		?><article class="the_post n100 bbsgrey3 pt50 bl item-<?php echo $i;?>">
			<div class="inner n9">
				<?php if ($the_cat) { ?><a href="<?php echo get_category_link(get_first_cat_id()); ?>" class="the_category mb20 bl"><?php echo get_first_cat_name();?></a><?php } ?>
				<h3 class="the_title ttn mb40"><a href="<?php echo get_permalink();?>" class="cdarkgrey fs48px"><?php the_title();?></a></h3>
				
				<?php if (has_post_thumbnail()) { ?>
					<div class="img100 the_featimage n33 ib"><a href="<?php echo get_permalink();?>" class="fade bl"><?php the_post_thumbnail('small_169', array('class' => 'pr30')); ?></a></div><div class="the_text mb30 n66 ib vt">
						<div class="the_excerpt kszoveg cdarkgrey lh140 fs20px ls05 mb30"><?php echo $excerpt; ?></div>
						<?php include('author_box.php');?>
					</div>
				<?php } else { ?>
					<div class="the_excerpt kszoveg cdarkgrey lh140 fs20px ls05 mb30"><?php echo $excerpt; ?></div>
					<?php include('author_box.php');?>
				<?php } ?>

			</div>
		</article><?php endwhile; ?>

		</div>
	</div>

	<?php if (function_exists("pagination")) {pagination($wp_query->max_num_pages);} ?>

	<?php else: ?>

		<p><?php _e('Elnézést, de nincs találat.'); ?></p>

	<?php endif; ?>

</main>
<?php get_footer();?>