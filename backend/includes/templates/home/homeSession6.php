<div class="pp-scrollable section section-6">
	<div class="scroll-wrap">
		<div class="scrollable-content">
			<div class="vertical-centred">
				<div class="boxed boxed-inner">
					<!--<div class="vertical-title text-dark hidden-xs hidden-sm"><span>contact</span></div>-->
					<div class="boxed">
						<div class="container">
							<div class="intro overflow-hidden">
								<div class="row">
									<div class="col-md-12">
										<h2 class="text-red"><?php echo esc_html__('Liên hệ với chúng tôi', 'dm') ?></h2>
										<div id="map" class="map-2"></div>
                                        <?php
                                        $template = \includes\Bootstrap::bootstrap()->helper->getPathTemplate('home/contact');
                                        echo \includes\Bootstrap::bootstrap()->helper->render($template);
                                        ?>
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