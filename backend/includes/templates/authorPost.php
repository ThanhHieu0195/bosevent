<?php
/**
 * @var $post_id integer
 * @var $post WP_Post
 */

$post = get_post($post_id);
$author = get_the_author_meta('display_name', $post->post_author);
$date = date(get_option('date_format', 'Y-m-d'), $post->post_modified);
?>
<div class="posted-on">
	<strong class="url fn n"><?php echo esc_html(ucfirst($author)) ?></strong>
	on <?php echo esc_html($date) ?>
</div>
