<?php
/**
 * @var $event Object
 */
$author = get_field('event_author', $event->ID, '');
$event_start = get_field('event_start', $event->ID, '');

$y = substr($event_start, 0, 4);
$m = substr($event_start, 4, 2);
$d = substr($event_start, 6, 2);

$event_start = \includes\Bootstrap::bootstrap()->language->format;
$event_start = str_replace('dd', $d, $event_start);
$event_start = str_replace('mm', $m, $event_start);
$event_start = str_replace('yyyy', $y, $event_start);

$event_time_start = get_field('event_time_start', $event->ID, '');
$event_time_end = get_field('event_time_end', $event->ID, '');
$event_author = get_field('event_author', $event->ID, '');
$event_location = get_field('event_location', $event->ID, '');
$avt = get_the_post_thumbnail_url($event->ID);
$tags = wp_get_post_tags($event->ID);
?>
<div class="item nevent__schedule-info wp-inlineb">
    <div class="inner-item inner-pane">
        <div class="nevent__schedule-info__thumb inlineb-m">
            <img src="<?= $avt ?>" alt="Vu Nguyen Minh Tri" class="nimg nratio--img">
        </div>
        <div class="nevent__schedule-info__content inlineb-m">
            <div class="time f--14">
                <i class="time-date"><?= "${event_start}" ?></i>
            </div>
            <div class="event-title f--25 f--900"><?= $event->post_title ?></div>
            <div class="person f--12 lh--12">By
                <span class="f--500 cl--grayblack"><?= $author ?></span>
            </div>
        </div>
    </div>
    <div class="inner-item inner-content">
        <div class="nevent__schedule-info__content-inner">
            <div class="inner">
                <div class="time-start f--14">
			    <?= translateText('event_session/item/time_start') ?>:
                    <span class="f--600"><?= "${event_time_start} - ${event_time_end}" ?></span>
                </div>
                <div class="description f--14">
                    <?= $event->post_content?>
                </div>
                <ul class="nlist-tag">
                    <?php foreach ($tags as $tag): ?>
                        <li class="item inlineb-t">
                            <span class="f--12 f--600 txt--up"><?=  $tag->name ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="nlocation">
                    <div class="where f--14 txt--up f--600"><?= translateText('event_session/item/location') ?></div>
                    <div class="address txt--cap f--13"><?= $event_location ?></div>
                </div>
            </div>

            <br class="nclear" />
        </div>
    </div>
</div>
