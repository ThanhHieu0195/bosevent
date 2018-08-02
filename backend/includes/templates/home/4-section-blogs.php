<?php
$posts = get_posts([
    'meta_query' => array(
        array(
            'key' => 'blog_feature',
            'value' => '1',
            'compare' => 'LIKE'
        )
    )
]);
?>
<div class="nsection nblog" id="bos-blog">
    <div class="nheading__wrap txt--c">
        <div class="ncontainer">
            <h5 class="nheading__wrap-h5 heading-h5 f--400 txt--up cl--black"><?= translate_i18n('Read from our blog') ?></h5>
            <h2 class="heading-h2 f--600 txt--cap lh--12 cl--black inlineb-t"><?= translate_i18n('Latest from blog') ?>
                <div class="nline-title "></div>
            </h2>
        </div>
    </div>
    <ul class="nlist-blog">
        <?php
        foreach ($posts as $post):
            $background = get_field('blog_background', $post->ID, '');
            $background_url = wp_get_attachment_image_url($background, 'full');
            ?>
            <li class="item">
                <div class="nlist-blog__img">
                    <img src="<?= esc_url($background_url) ?>" alt="" class="nimg nratio--img">
                </div>
                <div class="nlist-blog__info">
                    <h3 class="nlist-blog__info-title heading-h3 f--600 lh--11">
                        <a href="<?= \includes\Bootstrap::bootstrap()->helper->getLinkBlogDetail($post->ID) ?>" class="cl--white"><?= $post->post_title ?></a>
                    </h3>
                    <p class="nlist-blog__info-des font--14 cl--white"><?= $post->post_excerpt ?>
                    </p>
                </div>
            </li>
        <?php endforeach;?>
    </ul>
    <div class="ncontainer txt--c">
        <a href="<?= \includes\Bootstrap::bootstrap()->helper->getLinkBlog() ?>" class="nbutton color--1 nsize--b f--500 txt--up"><?= translate_i18n('more post') ?></a>
    </div>
</div>
