<?php
/**
 * @var $post_id integer
 * @var $block_title string
 */

$thumnail_url = get_the_post_thumbnail_url($post_id);
?>
<div class="text-white section-1">
	<div class="scroll-wrap">
		<div class="section-bg"
		     style="background-image:url(<?php echo esc_url($thumnail_url) ?>);"></div>
		<div class="scrollable-content">
			<div class="vertical-centred">
				<div class="boxed boxed-inner">
					<!--<div class="vertical-title hidden-xs hidden-sm"><span>Introduce</span></div>-->
					<div class="boxed">
						<div class="container">
							<div class="intro">
								<?php echo \includes\Bootstrap::bootstrap()->helper->minifyHtml($block_title) ?>
								<div class="hr-bottom"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>