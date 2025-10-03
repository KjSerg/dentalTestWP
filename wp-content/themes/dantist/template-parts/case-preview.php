<?php
if ( ! $gallery = get_field( 'gallery' ) ) {
	return;
}
?>
    <div class="gallery-item">
        <a href="<?php echo esc_url( $gallery[0] ) ?>" data-fancybox class="gallery-item__image">
            <img loading="lazy" src="<?php echo esc_url( $gallery[0] ) ?>"
                 class="cover scale-on-hover"
                 alt="">
        </a>
        <a href="<?php echo esc_url( $gallery[1] ) ?>" data-fancybox class="gallery-item__image">
            <img loading="lazy" src="<?php echo esc_url( $gallery[1] ) ?>"
                 class="cover scale-on-hover"
                 alt="">
        </a>
    </div>
<?php