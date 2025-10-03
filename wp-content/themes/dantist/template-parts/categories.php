<?php
$categories = get_terms( [
	'hide_empty' => false,
	'taxonomy'   => 'categories'
] );
if ( ! $categories ) {
	return;
}
$site_url = site_url();
?>
<ul class="gallery-categories">
	<li class="gallery-categories__item">
		<a href="<?php echo esc_url( $site_url ) ?>" class="gallery-categories__link active">All</a>
	</li>
	<?php foreach ( $categories as $category ):
		?>
		<li class="gallery-categories__item">
			<a href="<?php echo esc_url( site_url( '?case-category=' . $category->slug ) ) ?>"
			   class="gallery-categories__link ">
				<?php echo esc_html( $category->name ) ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>