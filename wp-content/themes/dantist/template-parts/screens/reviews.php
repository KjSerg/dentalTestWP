<?php
$reviews_query = $args['query'];
?>
<section class="section reviews-section section-padding" style="background-color: #F4EFED;">
	<div class="container">
		<div class="title reviews-section__title">
			<?php echo $args['title']; ?>
		</div>
	</div>
	<div class="reviews-list">
		<?php if ($reviews_query->have_posts()): ?>
			<?php while ($reviews_query->have_posts()): $reviews_query->the_post(); ?>
				<div>
					<?php get_template_part( 'template-parts/review' );  ?>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</div>
</section>