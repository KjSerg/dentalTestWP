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