<?php
get_header('bosevent');
$path_template_url = get_template_directory_uri();
$page = get_page_by_title('home');
$pageID = get_option('page_on_front');
if (!empty($pageID)) {
    $page = get_post($pageID);
}
?>
<?php
// render all file folder home
$dir_path = dirname(__FILE__);
foreach (glob($dir_path . "/home/*.php") as $filename)
{
    echo \includes\Bootstrap::bootstrap()->helper->render($filename, [
        'path_template_url' => $path_template_url,
        'page' => $page

    ]);
}
?>
<?php get_footer('bosevent'); ?>