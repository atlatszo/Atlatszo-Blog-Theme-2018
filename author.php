<?php get_header(); ?>

<main class="cat">
<div class="shell">
	
	<?php
	$userdata = get_userdatabylogin(get_query_var('author_name'));
	$user_id=$userdata->ID;
	$user_email=$userdata->user_email;

	/*$fname = get_the_author_meta('first_name', $user_id);
	$lname = get_the_author_meta('last_name', $user_id);
	$fullname=$lname." ".$fname;
	if (!$lname && !$fname) {$fullname=get_query_var('author_name');}*/

	$fullname=nl2br(get_the_author_meta('nickname'), $user_id);
	$user_custom_photo=get_field('impresszum_kep', 'user_'.$user_id);
	$titulus=get_the_author_meta('description', $user_id);

	if ($user_custom_photo) {
		$userphoto_url=$user_custom_photo['sizes']['square_medium'];
	} else {
		$userphoto_url=get_avatar_url($user_id, array( 'size'=> 300, 'default'=>'404' ));
		if (@getimagesize($userphoto_url)) {
		} else {
			$userphoto_url=get_bloginfo('template_url')."/i/user_icon.jpg"; // no photo
		}
	}

	$szerzoi_doboz_szovege=get_field('szerzoi_doboz_szovege', 'user_'.$user_id);
	
	?>

	<div class="the_author_box intro pt20 bbsgrey3 mb40">
		<div class="inner n9">
		<div class="the_author_box plr50">
			<div class="author_head mb20">
				<div class="author_name ib mr20 vm"><h1 class="author_title mb10"><a href="#" class="the_category cat_linkbox"><?php echo $fullname; ?></a></h1></div><a href="mailto:<?php echo $user_email;?>" class="author_email ib vm"><img src="<?php echo get_bloginfo('template_url');?>/i/email.svg" alt="<?php echo $fullname; ?>" width="25" height="20" /></a>
			</div>
			<div class="author_foot">
				<div class="author_image ib vt n33 img100 pr30"><img src="<?php echo $userphoto_url; ?>" alt="<?php echo $fullname; ?>" /></div><div class="author_description ib n66 fs18px fbold kszoveg lh200"><?php echo $szerzoi_doboz_szovege; ?></div>
			</div>
		</div>
		</div>
	</div>

	<?php if ( have_posts() ) { ?>

	<div class="cat_posts">

		<?php while ( have_posts() ) : the_post();
			$excerpt=get_the_excerpt();
			$excerpt=str_replace('&nbsp;', '', $excerpt);
			$megadott_szerzo=get_post_meta(get_the_ID(), 'szerzo_kivalasztasa', true);
			$the_cat=get_the_category();

			//echo "megadott szerző: ".$megadott_szerzo."<br>";
			//echo "aktuális szerző: ".$user_id."<br>";
			if ($megadott_szerzo && $megadott_szerzo!=$user_id) {} else {
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
		</article><?php } endwhile; ?>

	</div>

	
	<?php if (function_exists("pagination")) {pagination($wp_query->max_num_pages);} ?>
	

	<?php } elseif (isset($_GET['w']) && isset($_GET['w'])!=0) { ?>
	
	<div class="cat_posts">

		<?php
			//echo "external user id: ".$_GET['w']."<br>";
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			$subscriber_args=array(
				'posts_per_page' => -1,
				'paged' => $paged,
				'meta_key'     => 'szerzo_kivalasztasa',
				'meta_value'   => $_GET['w'],
				'compare' => '='
			);
			$the_query_subscriber = new WP_Query($subscriber_args);
			?>
			<?php while ($the_query_subscriber->have_posts() ) : $the_query_subscriber->the_post();
				$excerpt=get_the_excerpt();
				$excerpt=str_replace('&nbsp;', '', $excerpt);
			?><article class="the_post n100 bbsgrey3 pt50 bl item-<?php echo $i;?>">
				<div class="inner n9">
					<a href="<?php echo get_category_link(get_first_cat_id()); ?>" class="the_category mb20 bl"><?php echo get_first_cat_name();?></a>
					<h3 class="the_title ttn mb40"><a href="<?php echo get_permalink();?>" class="cdarkgrey fs48px"><?php the_title();?></a></h3>
					
					<?php if (has_post_thumbnail()) { ?>
						<div class="img100 the_featimage n33 ib"><a href="<?php echo get_permalink();?>" class="fade bl"><?php the_post_thumbnail('small_169', array('class' => 'pr30')); ?></a></div><div class="the_text mb30 n66 ib vt">
							<div class="the_excerpt kszoveg cdarkgrey lh140 fs20px ls05 mb30"><?php echo $excerpt; ?></div>
							<?php
							$author_id=$_GET['w'];
							include('author_box_external.php');
							?>
						</div>
					<?php } else { ?>
						<div class="the_excerpt kszoveg cdarkgrey lh140 fs20px ls05 mb30"><?php echo $excerpt; ?></div>
							<?php
							$author_id=$_GET['w'];
							include('author_box_external.php');
							?>
					<?php } ?>

				</div>
			</article><?php endwhile; wp_reset_postdata(); ?>

	</div>
	
	<?php if (function_exists("pagination")) {pagination($the_query_subscriber->max_num_pages);} ?>

	<?php } else { ?>

		<h1 class="ac pt40 mb40"><?php _e('Elnézést, de ettől a szerzőtől nem találtunk cikket.', 'atlatszo'); ?></h1>

	<?php } ?>

</div>
</main>
<?php get_footer();?>