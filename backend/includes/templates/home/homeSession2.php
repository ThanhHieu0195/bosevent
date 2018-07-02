<?php
/**
 * @var $post_id integer
 * @var $thumnail string
 * @var $title string
 * @var $description string
 */

$title = get_field('site2_title', $post_id);
$description = get_field('site2_description', $post_id);
$thumnail = get_field('site2_thumnail', $post_id);
?>
<div class="pp-scrollable section section-2">
	<div class="scroll-wrap">
		<div class="scrollable-content">
			<div class="vertical-centred">
				<div class="boxed boxed-inner">
					<div class="boxed">
						<div class="container">
							<div class="intro">
								<div class="row">
									<div class="col-sx-5 col-sm-5 col-md-5 col-lg-5">
										<h2 class="title-page text-blue"><?php echo $title ?></h2>
										<?php echo apply_filters('the_content', $description) ?>
									</div>
									<div class="col-md-6 col-lg-5 col-md-offset-1 col-lg-offset-2">
										<div class="dots-image-2">
											<img alt="" class="img-responsive" src="<?php echo esc_url($thumnail) ?>">
                                            <div class="dots"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>