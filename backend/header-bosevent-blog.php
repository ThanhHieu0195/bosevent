<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bosevent
 */
$path_template_url = get_template_directory_uri();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="blog-page">
    <!-- Header -->
    <header class="nheader no-fix wp-inlineb">
        <div class="ncontainer">
            <div class="nheader__wrap">
                <div class="nheader__left inlineb-m">
                    <a href="<?= get_home_url() ?>">
                        <img src="<?= $path_template_url ?>/assets/images/bosevent-logo.png" alt="BosEvent" class="nimg">
                    </a>
                </div>
                <div class="nheader__hamburger_wrap visi-1024">
                    <div class="nheader__hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="nheader__right inlineb-m">
                    <ul class="nheader__right-menu">
                        <li class="item">
                            <a href="<?= get_home_url() ?>#bos-about" title="About Us"><?= translateText('menu/about/title') ?></a>
                        </li>
                        <li class="item">
                            <a href="<?= get_home_url() ?>#bos-services" title="Services"><?= translateText('menu/service/title') ?></a>
                        </li>
                        <li class="item">
                            <a href="<?= get_home_url() ?>#bos-blog" title="Blog"><?= translateText('menu/blog/title') ?></a>
                        </li>
                        <li class="item">
                            <a href="<?= get_home_url() ?>#bos-event" title="Event Callendar"><?= translateText('menu/event/title') ?></a>
                        </li>
                        <!-- <li class="item">
                            <a href="" title="Contact">Contact</a>
                        </li> -->
                    </ul>
                </div>

            </div>
        </div>
    </header>
