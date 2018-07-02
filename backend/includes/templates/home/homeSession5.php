<?php
/**
 * @var $post_id integer
 * @var $post WP_Post
 */

$posts = get_posts( array(
	'post_type'   => 'post',
	'post_status' => 'publish',
	'numberposts' => 3
) );
$img = get_field( 'site5_thumnail', $post_id );
?>
<div class="pp-scrollable section section-5">
    <div class="scroll-wrap">
        <div class="section-bg"
             style="background-image:url(<?php echo isset( $img->url ) ? $img->url : '' ?>);"></div>
        <div class="scrollable-content">
            <div class="vertical-centred">
                <div class="boxed boxed-inner">
                    <!--<div class="vertical-title hidden-xs hidden-sm"><span>testimonials</span></div>-->
                    <div class="boxed">
                        <div class="container">
                            <div class="intro overflow-hidden">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="text-red">Tin tức</h2>
                                        <div class="row row-news">
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
                                                        <img alt="<?php echo esc_attr(str_replace(' ', '-', $post_title)) ?>" src="<?php echo esc_url($thumnail_url) ?>">
                                                        <div class="news-hover">
                                                            <div class="hover-border">
                                                                <div></div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="time"><?php echo esc_html($date) ?></div>
                                                                <h3 class="news-title"><?php echo esc_html($post_title) ?></h3>
                                                                <p class="news-description"><?php echo esc_html($post_excerpt) ?></p>
                                                            </div>
                                                            <a class="read-more" href="<?php echo esc_url($permalink) ?>"><?php echo esc_html__('Xem chi tiết', 'dm') ?>  &gt;</a>
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
                                            <div class="col-md-12">
                                                <a href="<?php echo get_home_url() . '/news' ?>"
                                                   class="pull-right h5 link-arrow text-white"><?php echo esc_html__( 'Xem
													tất cả tin tức', 'dm' ) ?> <i
                                                            class="icon icon-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>