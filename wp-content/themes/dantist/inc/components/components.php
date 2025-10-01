<?php
function the_custom_buttons( $buttons, $css_class = '' ): void {
	if ( ! $buttons ) {
		return;
	}
	foreach ( $buttons as $button ):
		$button_css_class = $button['button_type'] . ' ' . $css_class;
		?>
        <a href="<?php echo esc_url( $button['button_link'] ) ?>" class="<?php echo esc_html( $button_css_class ) ?>">
			<?php echo esc_html( $button['button_text'] ) ?>
        </a>
	<?php endforeach;
}

function the_case_preview( $id = false ): void {
	$id = $id ?: get_the_ID();
	if ( ! $gallery = get_field( 'gallery', $id ) ) {
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
}

function the_review( $id = false ): void {
	$id         = $id ?: get_the_ID();
	$title      = get_the_title( $id );
	$content    = get_content_by_id( $id );
	$rating     = get_field( 'rating', $id ) ?: 5;
	$resource   = get_field( 'resource', $id );
	$first_char = mb_substr( $title, 0, 1 );
	?>
    <div class="review">
        <div class="review-head">
            <div class="review-user">
                <div class="review-user__avatar"><?php echo $first_char ?></div>
                <div class="review-user__container">
                    <div class="review-user__name">
						<?php echo esc_html( $title ) ?>
                    </div>
					<?php the_rating( $rating ) ?>
                </div>
            </div>
			<?php if ( $resource ): ?>
                <div class="review__resource">
                    <img src="<?php echo esc_url( $resource ) ?>" class="scale-on-hover" alt="">
                </div>
			<?php endif; ?>
        </div>
        <div class="review__text">
			<?php echo $content ?>
        </div>
    </div>
	<?php
}

function the_rating( $rating = 5 ): void {
	$image = _i( 'star' );
	?>
    <div class="rating review__rating">
		<?php for ( $a = 1; $a <= 5; $a ++ ) {
			$css_class = $a <= $rating ? 'active' : '';
			?>
            <span class="<?php echo $css_class ?>"><img src="<?php echo $image; ?>" class="" alt=""></span>
			<?php
		} ?>
    </div>
	<?php
}