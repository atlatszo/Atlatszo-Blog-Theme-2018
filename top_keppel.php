<?php
if ($top_sztori_cikk) {
	$args_top_keppel=array('p' => $top_sztori_cikk[0]);
} else {
	$args_top_keppel=array('posts_per_page' => 1);
}

	$the_query_top_keppel = new WP_Query($args_top_keppel);
	while ($the_query_top_keppel->have_posts()) : $the_query_top_keppel->the_post();

?>

<div class="top_keppel pb80">
	<div class="shell">
		<div class="img100 the_featimage n33 ib desktoponly"><a href="<?php echo get_permalink();?>" class="fade bl"><?php the_post_thumbnail('small_169', array('class' => 'pr30')); ?></a></div><div class="n50 ib vt">
			<a href="<?php echo get_category_link(get_first_cat_id()); ?>" class="the_category cat_linkbox"><?php echo get_first_cat_name();?></a>
			<h2 class="the_title pt30 ttn fs48px"><a href="<?php echo get_permalink();?>" class="cdarkgrey"><?php the_title();?></a></h2>
			<div class="img100 the_featimage bl mobileonly mb20"><?php the_post_thumbnail('small_169', array('class' => 'pr30')); ?></div>
			<?php include('author_box.php');?>
		</div>
	</div>
</div>

<?php endwhile; wp_reset_postdata(); ?>
