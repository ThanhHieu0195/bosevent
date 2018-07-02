<?php
/**
 * @var $post_id integer
 */
$services = get_field('services', $post_id);
?>

<?php foreach ($services as $service): ?>
    <?php echo \includes\Bootstrap::bootstrap()->helper->minifyHtml($service['content']) ?>
<?php endforeach; ?>
