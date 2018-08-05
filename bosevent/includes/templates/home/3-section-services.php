<?php
$page = get_page_by_title('home');
$service_title = get_field('service_title', $page->ID, '');
$service_description = get_field('service_subtitle', $page->ID, '');
$service_items = get_field('service_items', $page->ID, []);
?>
<div class="nsection nservices" id="bos-services">
    <div class="ncontainer">
        <div class="nheading__wrap txt--c">
            <h5 class="nheading__wrap-h5 heading-h5 f--400 txt--up cl--black"><?= translateText('service_session/title/main') ?></h5>
            <h2 class="heading-h2 f--600 txt--cap lh--12 cl--black inlineb-t">
                <?= $service_title ?>
                <br />
                <?= $service_description ?>
                <div class="nline-title red-after"></div>
            </h2>
        </div>
        <ul class="nservices__wrap">
            <?php
            if (count($service_items) > 0):
            foreach ($service_items as $item): ?>
                <?php
                $arr = array_values($item);
                $title = $arr[0];
                $description = $arr[1];
                $background = wp_get_attachment_image_url($arr[2], 'full');
                $link = $arr[3];
                ?>
            <li class="item nservices__item">
                <div class="wp-table">
                    <div class="nservices__item-left tab-cell-m">
                        <img src="<?= $background ?>" alt="<?= $title ?>" class="nimg nratio--img">
                    </div>
                    <div class="nservices__item-right tab-cell-m">
                        <h1 class="nservices__item-heading f--900 txt--cap lh--12"><?= $title ?></h1>
                        <p class="nservices__item-des f--15 lh--15"><?= $description ?></p>
                        <div class="nservices__item-btn">
                            <a href="<?= $link ?>" class="nbutton color--1 nsize--b txt--up"><?= translateText('service_session/button/view_more') ?></a>
                        </div>
                    </div>
                </div>
            </li>
            <?php
            endforeach;
            endif;
            ?>
        </ul>
    </div>

</div>
