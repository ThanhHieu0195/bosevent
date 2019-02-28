<?php
$banner_title = get_field('banner_title', $page->ID, '');
$banner_description = get_field('banner_description', $page->ID, '');
$banner_galley = get_field('banner_background', $page->ID, []);
?>
<div class="bg-banner">
    <div class="wp-table">
        <div class="tab-cell-m txt--c bg-banner__inner">
            <div class="ncontainer">
                <h1 class=" bg-banner__title heading-h1 cl--white txt--up f--900">
                    <?= $banner_title ?>
                </h1>
                <p class="bg-banner__description cl--white"><?= $banner_description ?></p>
                <div class="bg-banner__btn txt--c">
                    <a href="javascript:void(0)" class="nbutton color--2 nsize--b f--500 txt--up" id="scroll-down"><?= translateText('banner/button/next_lesson') ?></a>
                </div>
            </div>
        </div>
    </div>
    <ul class="list-slide">
        <?php
        if (count($banner_galley) > 0) {
            foreach ($banner_galley as $gallery) {
                $url = wp_get_attachment_image_url($gallery, 'full');
                echo '<li class="list-slide__item">
                        <span class="list-slide__bg" style="background-image: url('.$url.')"></span>
                    </li>';
            }
        }
        ?>
    </ul>
    <div class="mouse">
        <div class="wheel"></div>
    </div>
</div>
