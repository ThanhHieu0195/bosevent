<?php
/**
 * @var $post_id integer
 */

$gallery = get_field('site4_gallery', $post_id);
?>
<div class="pp-scrollable section section-4">
	<div class="scroll-wrap">
		<div class="scrollable-content">
			<div class="vertical-centred">
				<div class="boxed boxed-inner">
					<!--<div class="vertical-title text-dark hidden-xs hidden-sm"><span>Partners</span></div>-->
					<div class="boxed">
						<div class="container">
							<div class="intro overflow-hidden">
								<div class="row">
									<div class="col-md-12">
										<h2 class="text-red"><?php echo esc_html__('Đối tác của chúng tôi', 'dm') ?></h2>
										<div class="row row-partners">
                                            <?php foreach ($gallery as $img): ?>
											<div class="col-partner col-sm-4 col-md-3">
												<img alt="" src="<?php echo esc_url($img['url']) ?>">
											</div>
                                            <?php endforeach; ?>
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