<?php
/**
 * @var $post_id integer
 * @var $post WP_Post
 * @var $cat WP_Term
 */

$gallery = get_field( 'site3_gallery', $post_id );
$maxPost = \includes\classes\Constants::MAX_PROJECT;
if ( $maxPost > count( $gallery ) ) {
	$maxPost = count( $gallery );
}

$posts = get_posts( array(
	'post_type'   => 'project',
	'numberposts' => $maxPost,
	'post_status' => 'publish'
) );
?>

<div class="pp-scrollable text-white section section-3">
    <div class="scroll-wrap">
        <div class="bg-changer">
			<?php for ( $i = 0; $i < count( $posts ); $i ++ ): $thumnail = $gallery[ $i ]; ?>
                <div class="section-bg" style="background-image:url(<?php echo esc_url( $thumnail['url'] ); ?>)"></div>
			<?php endfor; ?>
        </div>
        <div class="scrollable-content">
            <div class="vertical-centred">
                <div class="boxed boxed-inner">
                    <!--<div class="vertical-title hidden-xs hidden-sm"><span>our works</span></div>-->
                    <div class="boxed">
                        <div class="container">
                            <div class="intro">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="text-red"><?php echo esc_html__( 'Dự án mới nhất', 'dm' ) ?></h2>
                                        <div class="row-project-box row">
											<?php foreach ( $posts as $post ): ?>
												<?php
												$cat_name = '';
												$cat      = \includes\Bootstrap::bootstrap()->helper->getCategory( $post->ID, 'cat-project' );
												if ( ! empty( $cat ) ) {
													$cat_name = $cat->name;
												}
												?>
                                                <div class="col-project-box col-sm-6 col-md-4 col-lg-3">
                                                    <a href="" class="project-box">
                                                        <div class="project-box-inner">
                                                            <h5><?php echo $post->post_title ?></h5>
                                                            <div class="project-category"><?php echo esc_html( $cat_name ) ?></div>
                                                        </div>
                                                    </a>
                                                </div>
											<?php endforeach; ?>
                                        </div>
                                        <div class="col-md-12">
                                            <a href="<?php echo get_home_url() . '/project' ?>"
                                               class="pull-right h5 link-arrow text-white"><?php echo esc_html__( 'Xem
												tất cả dự án', 'dm' ) ?> <i class="icon icon-chevron-right"></i></a>
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