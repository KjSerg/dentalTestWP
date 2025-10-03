<?php
use Dantist\View\CasesCatalog;
$catalog    = new CasesCatalog();
?>
	<section class="section gallery-section section-padding">
		<div class="container">
			<div class="gallery-container">
				<div class="title gallery__title">
					<?php echo $args['title'] ?>
				</div>
				<div class="subtitle gallery__subtitle">
					<?php echo $args['text'] ?>
				</div>
				<?php get_template_part( 'template-parts/categories' ); ?>
				<div class="gallery-grid container-js">
					<?php $catalog->render_catalog(); ?>
				</div>
				<div class="pagination  pagination-js">
					<?php $catalog->render_pagination(); ?>
				</div>
			</div>
		</div>
	</section>
<?php
wp_reset_postdata();
wp_reset_query();