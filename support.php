<?php
/*
Template name: Tamogatoi oldal
*/
get_header();
if (have_posts()) : while (have_posts()) : the_post(); ?>

<main class="page support">
<div class="shell">

	<div class="the_intro n100 mt40 mb40">
		<div class="n9">
			<img src="<?php bloginfo('template_url'); ?>/i/heart-red.svg" width="27" height="24" class="bl mb30 love" alt="heart" />
			<h1 class="the_title post_title fs48px ttn cwhite mb60 ls1 pr40"><?php the_title(); ?></h1>
			<aside class="share n25 ib vt"><div class="inner pr30"><?php include('share.php'); ?></div></aside><div class="the_excerpt n75 ib vt fs18px kszoveg lh200"><?php the_excerpt(); ?></div>
		</div>
	</div>

	<div class="tamogatoi in_content bdgrey bbsgrey3 mb40">
		<?php include('tamogatoi-2.php'); ?>
	</div>

	<div class="tamogatoi tamogatoi-lista bbsgrey3 mb40">
		<?php
		//include('tamogatoi-lista.php');
		?>
		<div class="n100 tamogatoi lista pt30 pr">
			<div class="n9">

				<ul class="tamogatoi_opciok minus0 n100 bl">

		<?php
		$b=1;
		//include('tamogatoi-lista.php');
				
		$tamogatas_utolso_blokk=get_field('tamogatas_utolso_blokk');
		$utolso_blokk_cime=get_field('utolso_blokk_cime');
		$utolso_blokk_leirasa=get_field('utolso_blokk_leirasa');
		$blokk_mailchimp_shortcode=get_field('blokk_mailchimp_shortcode');

		if (have_rows('tamogatas_tipusa')) {
			while (have_rows('tamogatas_tipusa') ) : the_row();

				$tamogatas_neve=get_sub_field('tamogatas_neve');
				$tamogatas_url=get_sub_field('tamogatas_url');
				$tamogatas_url_cel=get_sub_field('tamogatas_url_cel');
				$tamogatas_leirasa=get_sub_field('tamogatas_leirasa');
				if (!$tamogatas_url || $tamogatas_url=="") {$tamogatas_class="nolink";} else {$tamogatas_class="";}

		?><li class="cwhite col ib vt n25 plr10 mb40">
			<?php if ($tamogatas_class=="nolink") { ?>
						<h4 class="mb20"><a href="<?php echo $tamogatas_url; ?>" class="ac bred cwhite fblack p20 bl fs15px ls1 <?php echo $tamogatas_class;?>" target="<?php echo $tamogatas_url_cel; ?>"><?php echo $tamogatas_neve; ?></a></h4>
			<?php } else {?>
						<h4 class="mb20"><span class="ac bred cwhite fblack p20 bl fs15px ls1 nolink"><?php echo $tamogatas_neve; ?></span></h4>			
			<?php } ?>
						<div class="fs18px kszoveg lh200"><p><?php echo $tamogatas_leirasa; ?></p></div>
					</li><?php $b++; ?><?php endwhile; ?>
			<?php }
			if ($tamogatas_utolso_blokk=="igen") {
			?>

					<li class="cwhite col fr n40 plr10 mb40">
						<h4 class="mb20 fs15px ac blred p20"><span class="o70 cwhite ls0"><?php echo $utolso_blokk_cime; ?></span></h4>
						<?php echo do_shortcode($blokk_mailchimp_shortcode); ?>
						<div class="fs18px kszoveg newsletter-description"><p><?php echo $utolso_blokk_leirasa; ?></p></div>
					</li>

					<li class="cl"></li>

				</ul>

				<div class="cl"></div>
			
			<?php } ?>

			</div>
		</div>
	</div>

	<div class="the_content n9">
		<div class="inner n75 fr kszoveg">
			<?php the_content(); ?>
		</div>
	</div>



</div>
</main>

<?php endwhile; endif; ?>
<?php get_footer(); ?>