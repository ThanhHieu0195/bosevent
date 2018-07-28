<?php
get_header('bosevent');
$path_template_url = get_template_directory_uri();
?>
<?php
// render all file folder home
$dir_path = dirname(__FILE__);
foreach (glob($dir_path . "/home/*.php") as $filename)
{
    echo \includes\Bootstrap::bootstrap()->helper->render($filename, [
            'path_template_url' => $path_template_url

    ]);
}
?>
<?php get_footer('bosevent'); ?>