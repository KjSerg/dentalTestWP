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
    if(!$gallery = get_field('gallery', $id)){
        return;
    }
    ?>
    <div class="gallery-item">
        <a href="<?php echo esc_url($gallery[0]) ?>" data-fancybox class="gallery-item__image">
            <img loading="lazy" src="<?php echo esc_url($gallery[0]) ?>"
                 class="cover scale-on-hover"
                 alt="">
        </a>
        <a href="<?php echo esc_url($gallery[1]) ?>" data-fancybox class="gallery-item__image">
            <img loading="lazy" src="<?php echo esc_url($gallery[1]) ?>"
                 class="cover scale-on-hover"
                 alt="">
        </a>
    </div>
    <?php
}