<?php
$page = get_page_by_title('home');

/**
 * ABOUT
 */
$title = get_field('about_title', $page->ID, '');
$subtitle = get_field('about_subtitle', $page->ID, '');
$description = get_field('about_description', $page->ID, '');
$background_id = get_field('about_background', $page->ID, '');
$background_url = wp_get_attachment_image_url($background_id, 'full');
$arr = [
    'title' => $title,
    'subtitle' => $subtitle,
    'description' => $description,
    'background_url' => $background_url
];

$about_params = [];
foreach ($arr as $key => $value) {
    $about_params[] = $key . '="' . $value . '" ';
}

/**
 * TEAMS
 */

$teams = get_field('teams', $page->ID, []);
$teams_params = [];
$idx = 0;
foreach ($teams as $obj) {
    $arr = array_values($obj);
    $url = wp_get_attachment_image_url($arr[1], 'full');
    $teams_params[] = "name{$idx}=\"{$arr[0]}\" background{$idx}=\"{$url}\" position{$idx}=\"{$arr[2]}\"";
    $idx ++;
}

/**
 * FEATURES
 */

$title = get_field('feature_title', $page->ID, '');
$subtitle = get_field('feature_subtitle', $page->ID, '');
$description = get_field('feature_description', $page->ID, '');
$feature_items = get_field('feature_items', $page->ID, []);
$features_params = [];
$idx = 0;

$features_params[] = "title=\"{$title}\"";
$features_params[] = "subtitle=\"{$subtitle}\"";
$features_params[] = "description=\"{$description}\"";
foreach ($feature_items as $obj) {
    $arr = array_values($obj);
    $url = wp_get_attachment_image_url($arr[1], 'full');
    $features_params[] = "name{$idx}=\"{$arr[0]}\" background{$idx}=\"{$url}\" description{$idx}=\"{$arr[2]}\"";
    $idx ++;
}
?>
<div class="nsection nabout txt--c" id="bos-about">
    <?= do_shortcode('[about ' . implode($about_params, ' ') .']') ?>
    <?= do_shortcode('[teams ' . implode($teams_params, ' ') .']') ?>
    <?= do_shortcode('[features ' . implode($features_params, ' ') .']') ?>
</div>

