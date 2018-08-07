<?php
/**
 * @var $post_id integer
 */
$cat_ids = wp_get_post_categories($post_id);
$cats = [];
if (count($cat_ids) > 0) {
    for ($i=0; $i<count($cat_ids); $i++) {
        $cat = get_the_category_by_ID($cat_ids[$i]);
        $cats[] = $cat;
    }
}
?>
<article class="postpopular detail">
    <div class="postpopular__img">
        <a href="<?= \includes\Bootstrap::bootstrap()->helper->getLinkBlogDetail($post_id) ?>">
            <img src="<?= get_the_post_thumbnail_url($post_id) ?>" alt="<?= get_the_title($post_id) ?>" class="nimg nratio--img">
        </a>
    </div>
    <div class="postpopular-header">
        <h2 class="postpopular__title">
            <a href="<?= \includes\Bootstrap::bootstrap()->helper->getLinkBlogDetail($post_id) ?>"><?= get_the_title($post_id) ?></a>
        </h2>
        <ul class="postpopular__meta wp-inlineb">
            <li class="item inlineb-t">
                <img src="<?= $path_template_url ?>/assets/images/calendar.svg" alt="Calendar" class="nimg icon-meta">
                <span class="text-meta"><?= get_the_date(\includes\Bootstrap::bootstrap()->language->format, $post_id) ?></span>
            </li>
            <li class="item inlineb-t">
                <img src="<?= $path_template_url ?>/assets/images/tags.svg" alt="Tags" class="nimgs icon-meta">
                <span class="text-meta"><?= implode(', ', $cats) ?></span>
            </li>
        </ul>
    </div>
    <div class="postpopular__content">
        <?= apply_filters('the_content', get_post_field('post_content', $post_id)) ?>
    </div>
</article>
