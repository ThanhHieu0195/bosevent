<?php
/**
 * @var $post_id integer
 */
$gallery = get_field( 'parner_gallery', $post_id );
?>
<?php foreach ( $gallery as $i => $img ): ?>
    <div class="col-partner col-sm-5 col-md-4">
        <img src="<?php echo esc_url( $img['url'] ) ?>" alt="">
    </div>
<?php endforeach; ?>
