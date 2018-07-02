<?php
/**
 * @var $projects array
 * @var $project WP_Post
 */
?>

<?php if ( isset( $projects ) && ! empty( $projects ) ): ?>
	<?php foreach ( $projects as $project ): ?>
        <?php
        $thumnail_url = get_the_post_thumbnail_url($project->ID);
        $post_title = $project->post_title;
        $post_excerpt = $project->post_excerpt;
        $permalink = get_permalink($project->ID);
        ?>
        <div class="grid-item col-md-4">
            <div class="project-item item-shadow">
                <img alt="" class="img-responsive" src="<?php echo esc_url($thumnail_url) ?>" />
                <div class="project-hover">
                    <div class="project-hover-content">
                        <h3 class="project-title"><?php echo esc_html($post_title) ?></h3>
                        <p class="project-description"><?php echo $post_excerpt ?></p>
                    </div>
                </div>
                <a href="<?php echo esc_url($permalink) ?>" class="link-arrow"><?php echo esc_html__('Xem chi tiết', 'dm') ?> <i class="fa fa-angle-right"></i></a>
            </div>
        </div>
	<?php endforeach; ?>
<?php endif; ?>
