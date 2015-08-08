<?php
/**
 * @package LFSH
 */
?>
<!-- archive -->
<article id="post-<?php the_ID(); ?>" <?php post_class('col_2'); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</header><!-- .entry-header -->
		 

	<div class="entry-content col_6c">
		<?php the_content(); ?>
		<div>

				<?php 
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					  the_post_thumbnail();
					} 
					?>

		</div>	
		<p>
					
								<?php 
									$firm_address = get_post_custom_values('firm_address'); 
									$firm_city = get_post_custom_values('firm_city');
									$firm_state= get_post_custom_values('firm_state');
									$firm_url= get_post_custom_values('firm_url');
									$firm_phone= get_post_custom_values('firm_phone');
								?>	  
								
								<label data-firmaddress="<?php echo$firm_address[0]; ?>" class="firmMeta">
									<?php echo $firm_address[0]; ?>
								</label><br />
								<label data-firmcity="<?php echo$firm_city[0]; ?>" class="firmMeta">
									<?php echo $firm_city[0]; ?>
								</label>, 
								<label data-firmstate="<?php echo$firm_state[0]; ?>" class="firmMeta">
									<?php echo $firm_state[0]; ?>
								</label><br />
								<label><?php
									$zipcode = get_the_terms($post->ID, 'zip-code');
									$count=0;
									if ($zipcode) {
									foreach($zipcode as $zip) {
									$count++;
									if (1 == $count) {
									  echo $zip->name . ' ';
									}
									}
									}
									?></label><br>
								<label class="projecMeta">
									<a href="<?php echo $firm_url[0]; ?>" target="_blank" title="<?php echo $title; ?>">

										<?php 
											
											// in case scheme relative URI is passed, e.g., //www.google.com/
											$firm_url[0] = trim($firm_url[0], '/');

											// If scheme not included, prepend it
											if (!preg_match('#^http(s)?://#', $firm_url[0])) {
											$firm_url[0] = 'http://' . $firm_url[0];
											}

											$urlParts = parse_url($firm_url[0]);

											// remove www
											$cleanUrl = preg_replace('/^www\./', '', $urlParts['host']);

											
										echo $cleanUrl; ?></a>
								</label><br>
								<label data-firmphone="<?php echo$firm_phone[0]; ?>" class="firmMeta">
									<b><?php echo $firm_phone[0]; ?></b><br />
								</label>
							</p> 
		 
	</div><!-- .entry-content -->
	 
</article><!-- #post-## -->

