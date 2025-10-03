<?php
$title      = get_the_title(  );
$rating     = get_field( 'rating' ) ?: 5;
$resource   = get_field( 'resource' );
$first_char = mb_substr( $title, 0, 1 );
?>
	<div class="review">
		<div class="review-head">
			<div class="review-user">
				<div class="review-user__avatar"><?php echo $first_char ?></div>
				<div class="review-user__container">
					<div class="review-user__name">
						<?php echo wp_kses_post( $title ) ?>
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
			<?php the_content(); ?>
		</div>
	</div>
<?php