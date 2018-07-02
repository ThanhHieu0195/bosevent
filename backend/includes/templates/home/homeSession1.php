<?php
/**
 * @var $post_id integer
 * @var $url string
 * @var $title string
 * @var $description string
 */

$title = get_field('site1_title', $post_id);
$description = get_field('site1_description', $post_id);
$url = get_field('site1_video', $post_id);
?>
<div class="pp-scrollable text-white section section-1">
	<div class="scroll-wrap section-noscroll">
		<div class="section-bg section-video">
			<div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src="<?php echo esc_url($url) ?>" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
		<div class="scrollable-content">
			<div class="vertical-centred">
				<div class="boxed boxed-inner">
					<div class="boxed">
						<div class="container">
							<div class="intro">
								<div class="row">
									<div class="col-md-9 col-lg-7">
										<p class="subtitle-top"><?php echo $title ?></p>
										<h1 class="display-2 text-blue"><?php echo $description ?></h1>
										<div class="hr-bottom"></div>
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