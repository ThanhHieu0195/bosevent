<?php
/**
 * @var $posts Array
 */
?>
<aside class="nwidget nwidget-popular">
    <div class="nwidget__title"><?= $title ?></div>
    <ul class="nwidget__list popular-post">
        <?php
        foreach ($posts as $post):
            $thumnail_url = get_the_post_thumbnail_url($post->ID);
            ?>
            <li class="item clear-f">
                <div class="img-wrap">
                    <a href="<?= \includes\Bootstrap::bootstrap()->helper->getLinkBlogDetail($post->ID) ?>">
                        <img src="<?= esc_url($thumnail_url) ?>" alt="<?= $post->post_title ?>" class="nimg nratio--img">
                    </a>
                </div>
                <div class="img-info">
                    <a href="<?= \includes\Bootstrap::bootstrap()->helper->getLinkBlogDetail($post->ID) ?>" class="item__title" title="<?= $post->post_title ?>"><?= $post->post_title ?></a>
                    <span class="ndate"><?= get_the_date(get_option('data_format'),$post->ID) ?></span>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</aside>