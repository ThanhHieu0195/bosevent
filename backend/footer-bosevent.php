<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bosevent
 */
$path_template_url = get_template_directory_uri();
?>

	</div><!-- #content -->
<!-- 07. Change Language -->
<div class="nchange-lang">
    <ul>
        <li class="nitem inlineb-m">
            <a onclick="language.events.changeLanguage('vi')">
                <img src="<?php echo $path_template_url ?>/assets/images/vietnam.svg" alt="" class="nimg flag-lang">
            </a>
        </li>
        <li class="nitem inlineb-m">
            <a onclick="language.events.changeLanguage('en')">
                <img src="<?php echo $path_template_url ?>/assets/images/united-kingdom.svg" alt="" class="nimg flag-lang">
            </a>
        </li>
    </ul>
</div>
<!-- 07. End of Change Language -->

<!-- 08. Back To Top -->
<div class="nbacktotop">
    <img src="<?php echo $path_template_url ?>/assets/images/rocket.svg" alt="" class="nimg rocket">
</div>
    <footer>
    <div class="ncontainer lh--19">
        <ul class="wp-inlineb nfooter txt--c">
            <li class="item inlineb-t txt--l">
                <h5 class="nfooter__title heading-h5 cl--white"><?= translateText('footer/description/info/title') ?></h5>
                <p class="f--13 cl--white1">
		   	 <?= translateText('footer/description/info/description') ?>
                </p>
            </li>
            <li class="item inlineb-t txt--l">
                <h5 class="nfooter__title heading-h5 cl--white txt--cap"><?= translateText('footer/description/address/title') ?></h5>
                <p class="f--13 cl--white1">
                    <?= translateText('footer/description/address/description') ?>
                </p>
            </li>
            <li class="item inlineb-t txt--l">
                <h5 class="nfooter__title heading-h5 cl--white txt--cap"><?= translateText('footer/description/contact/title') ?></h5>
                <ul>
                    <li class="mb--5">
                        <a href="mailto:bearonsky.events@gmail.com" title="bearonsky.events@gmail.com" class="f--13 cl--white1">bearonsky.events@gmail.com</a>
                    </li>
                </ul>
                <ul class="nfooter__social wp-inlineb">
                    <li class="nitem inlineb-m">
                        <a href="https://www.facebook.com/bearonsky.events" title="Facebook" target="_blank">
                            <img src="<?php echo $path_template_url ?>/assets/images/facebook.svg" alt="" class="nimg nicon nfacebook">
                        </a>
                    </li>
                    <li class="nitem inlineb-m">
                        <a href="" title="Youtube" target="_blank">
                            <img src="<?php echo $path_template_url ?>/assets/images/youtube.svg" alt="" class="nimg nicon nyoutube">
                        </a>
                    </li>
                    <li class="nitem inlineb-m">
                        <a href="" title="Instagram" target="_blank">
                            <img src="<?php echo $path_template_url ?>/assets/images/instagram.svg" alt="" class="nimg nicon ninstagram">
                        </a>
                    </li>
                </ul>
            </li>
            <li class="item inlineb-t txt--l">
                <h5 class="nfooter__title heading-h5 cl--white txt--cap"><?= translateText('footer/description/hotline/title') ?></h5>
                <p class="f--13 cl--white mb--10">
                    <span class="cl--white"><?= translateText('footer/description/hotline/name_staff_01') ?></span>
                    <br />
                    <a href="tel:841697738979" class="cl--white1">(+84) 169 7738979</a>
                </p>
                <p class="f--13 cl--white">
                    <span class="cl--white"><?= translateText('footer/description/hotline/name_staff_02') ?></span>
                    <br />
                     <a href="tel:84906131296" class="cl--white1">(+84) 906 131296</a>
                </p>
            </li>
        </ul>
    </div>
    <div id="home_url" data-url="<?= get_home_url() ?>"></div>

</footer>

</div><!-- #page -->

<?php wp_footer(); ?>
<script>
    $(function () {
        $('.nlist-blog').slick({
            centerMode: true,
            centerPadding: '200px',
            slidesToShow: 1,
            slidesToScroll: 3,
            arrows: true,
            speed: 1000,
            responsive: [{
                breakpoint: '1024px',
                settings: {
                    centerMode: false,
                    centerPadding: '0',
                }
            }, {
                breakpoint: 768,
                settings: {
                    centerMode: true,
                    centerPadding: '50px',
                }
            }, {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                }
            }]
        });
        $("#start-date").datepicker();
	  $("#end-date").datepicker();
	  var heightWpAdminBar = $('#wpadminbar').height(),
		    headerElement = $('.nheader'),
		    windowWidth = $(window).width();
	$(window).on('resize', function () {
		if (windowWidth <= 782) {
			headerElement.css({
				'margin-top': heightWpAdminBar - 1  + 'px'
			})
		} 
	})
    })
</script>
</body>
</html>
