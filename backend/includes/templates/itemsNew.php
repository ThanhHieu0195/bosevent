<?php
/**
 * @var $posts array
 * @var $post WP_Post
 */
?>
<div class="news-grid row">
	<?php foreach ( $posts as $post ): ?>
        <?php
		$thumnail_url = get_the_post_thumbnail_url($post->ID);
		$post_title = $post->post_title;
		$post_excerpt = $post->post_excerpt;
		$permalink = get_permalink($post->ID);
		$date_format = get_option('date_format', 'Y-m-d');
		$date = date($date_format, strtotime($post->post_modified));
        ?>
        <div class="row-news-col col-xs-4 col-sm-4">
            <div class="news-item">
                <img alt="" src="<?php echo esc_url($thumnail_url) ?>">
                <div class="news-hover">
                    <div class="hover-border">
                        <div></div>
                    </div>
                    <div class="content">
                        <div class="time"><?php echo esc_html($date) ?></div>
                        <h3 class="news-title"><?php echo esc_html($post_title) ?></h3>
                        <p class="news-description"><?php echo $post_excerpt ?></p>
                    </div>
                    <a class="read-more" href="<?php echo esc_url($permalink) ?>"><?php echo esc_html__('Xem chi tiết', 'dm') ?> &gt;</a>
                </div>
                <div class="news-not-hover">
                    <div class="content">
                        <h3 class="news-title"><?php echo esc_html($post_title) ?></h3>
                    </div>
                    <a class="read-more" href="<?php echo esc_url($permalink) ?>"><?php echo esc_html__('Xem chi tiết', 'dm') ?> &gt;</a>
                </div>
            </div>
        </div>
	<?php endforeach; ?>
</div>



