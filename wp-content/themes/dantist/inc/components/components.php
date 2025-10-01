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