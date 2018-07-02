<?php
/** @var  $post_id integer */
$post_next = get_next_post();
$post_prev = get_previous_post();
$posts     = array();
if ( ! empty( $post_prev ) ) {
	$posts[] = $post_prev;
}
$posts[] = get_post( $post_id );
if ( ! empty( $post_next ) ) {
	$posts[] = $post_next;
}
?>

<section class="related-posts">
    <h6 class="related-post-title"><?php echo esc_html__( 'Bài viết liên quan', 'dm' ) ?></h6>
    <div class="news-grid row">
		<?php foreach ( $posts as $p ): ?>
			<?php
			$thumnail_url = get_the_post_thumbnail_url($p->ID);
			$post_title = $p->post_title;
			$post_excerpt = $p->post_excerpt;
			$permalink = get_permalink($p->ID);
			$date_format = get_option('date_format', 'Y-m-d');
			$date = date($date_format, strtotime($p->post_modified));
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
                            <p class="news-description"><?php esc_html($post_excerpt) ?></p>
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
</section>