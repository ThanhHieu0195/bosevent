<?php
$page = get_page_by_title('home');
$title = get_field('title', $page->ID, '');
$subtitle = get_field('subtitle', $page->ID, '');
$description = get_field('description', $page->ID, '');
$background_id = get_field('background', $page->ID, '');
$background_url = wp_get_attachment_image_url($background_id, 'full');
$arr = [
    'title' => $title,
    'subtitle' => $subtitle,
    'description' => $description,
    'background_url' => $background_url
];

$params = [];
foreach ($arr as $key => $value) {
    $params[] = $key . '="' . $value . '" ';
}
echo do_shortcode('[about ' . implode($params, ' ') .']');
?>