<?php if (have_rows('statikus_cikkek')) { ?>

<div class="masodik_4_cikk pb80">
	<div class="shell">
		<?php while (have_rows('statikus_cikkek') ) : the_row();

	$statikus_cikk_kategoria=get_sub_field('statikus_cikk_kategoria');
	$statikus_cikk=get_sub_field('statikus_cikk');

	$statikus_cikk_kategoria_szin=get_sub_field('statikus_cikk_kategoria_szin');

	// Ha nincs kiválasztva cikk

	if (!$statikus_cikk) {
	
		$statikus_cikk_cim=get_sub_field('statikus_cikk_cim');
		$statikus_cikk_url=get_sub_field('statikus_cikk_url');	
	
	} else {

		$statikus_cikk_cim=get_the_title($statikus_cikk[0]);
		$statikus_cikk_url=get_permalink($statikus_cikk[0]);

	}

	// Ha nincs kiválasztva kategória

	if (!$statikus_cikk_kategoria) {
		$statikus_cikk_kategoria_nev=get_sub_field('statikus_cikk_kategoria_nev');
		$statikus_cikk_kategoria_url=get_sub_field('statikus_cikk_kategoria_url');

	} else {

		$statikus_cikk_kategoria_url=get_category_link($statikus_cikk_kategoria);
		$statikus_cikk_kategoria_nev=get_cat_name($statikus_cikk_kategoria);

	}

		?><article class="n25 ib vt mb40">
			<div class="inner pr50">
				<a href="<?php echo $statikus_cikk_kategoria_url; ?>" class="the_category mb30 bl <?php echo $statikus_cikk_kategoria_szin; ?>"><?php echo $statikus_cikk_kategoria_nev; ?></a>
				<h3 class="the_title ttn"><a href="<?php echo $statikus_cikk_url; ?>" class="kszoveg cdarkgrey lh200"><?php echo $statikus_cikk_cim; ?></a></h3>
			</div>
		</article><?php endwhile; ?>
	</div>
</div>

<?php } ?>