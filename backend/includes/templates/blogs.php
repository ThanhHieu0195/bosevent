<?php
get_header('bosevent-blog');
$dir_path = dirname(__FILE__);
$path_template_url = get_template_directory_uri();
$list_posts = [];

// get all cats
$all_cats = get_categories();
// get new posts
$new_posts = get_posts();
$page_title = translateText('blogs/title/page-blogs');
//
if (isset($_GET['slug'])) {
    $name = $_GET['slug'];
    $post = get_page_by_path($name, OBJECT, 'post');
    $list_posts[] = $post;
    $page_title = $post->post_title;
} else if (isset($_GET['cat'])){
    $page_title = translateText('blogs/title/page-cat');
    $slug = $_GET['cat'];
    $cat = get_term_by('slug', $slug, 'category');
    $list_posts = get_posts([
            'category' => isset($cat->term_id) ? $cat->term_id : ''
    ]);
    $all_cats = [];
    if (!empty($cat)) {
        $all_cats = [$cat];
    }
} else {
    $list_posts = $new_posts;
}

// get recent posts
$cat_ids = [];
if (count($list_posts) > 0) {
    $cat_ids = wp_get_post_categories(array_values($list_posts)[0]->ID);
}
$cats = [];
$recent_posts = [];
if (count($cat_ids) > 0) {
    $recent_posts = wp_get_recent_posts([
        'category' => $cat_ids[0]
    ], ARRAY_N);
}
?>
    <div class="banner-title txt--c" style="background-image: url(<?= $path_template_url ?>/assets/images/blog/banner-blog.jpg)">
        <div class="banner-title__inner">
            <?= $page_title ?>
        </div>
    </div>
    <div class="npage-content">
        <div class="ncontainer">
            <div class="wp-inlineb sidebar">
                <div class="sidebar__left item inlineb-t">
                    <div class="categories-mb txt--c"><?= translateText('blogs/session/cat') ?></div>
                    <div class="inner categories-mb__sub cus-bg">
                        <?=  \includes\Bootstrap::bootstrap()->helper->render($dir_path . '/blog/article-cat.php', ['cats' => $all_cats, 'path_template_url' => $path_template_url]); ?>
                        <?=  \includes\Bootstrap::bootstrap()->helper->render($dir_path . '/blog/article-post.php', ['posts' => $new_posts, 'title' => translateText('blogs/title/popular'),'path_template_url' => $path_template_url]); ?>
                        <?=  \includes\Bootstrap::bootstrap()->helper->render($dir_path . '/blog/article-post.php', ['posts' => $recent_posts, 'title' => translateText('blogs/title/recent'), 'path_template_url' => $path_template_url]); ?>
                    </div>
                </div>
                <div class="sidebar__right item inlineb-t">
                    <div class="inner  cus-bg">
                        <?php foreach ($list_posts as $post): ?>
                        <?=  \includes\Bootstrap::bootstrap()->helper->render($dir_path . '/blog/article.php', ['post_id' => $post->ID, 'path_template_url' => $path_template_url]); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer('bosevent'); ?>