<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bosevent
 */
$path_template_url = get_template_directory_uri();
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<div class="page-content wp-table">
					<div class="tab-cell-m">
						<div class="robot-404">
							<img src="<?php echo $path_template_url ?>/assets/images/robocop.svg" alt="" class="nimg">
						</div>
						<div class="error-title f--900">404</div>
						<h1 class="error-stitle"><?= translateText('error404/title') ?></h1>
						<p class="error-des"><?= translateText('error404/description') ?></p>
						<a href="<?= get_home_url() ?>" title="<?= translateText('error404/button_description') ?>" class="error-btn nbutton color--1 nsize--b txt--up"><?= translateText('error404/button_description') ?></a>
					</div><!-- .page-content -->
				</div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->


