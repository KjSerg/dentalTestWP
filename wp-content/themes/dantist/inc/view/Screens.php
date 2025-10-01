<?php

namespace Dantist\View;
class Screens {
	private mixed $screens;

	public function __construct( $screens ) {
		$this->screens = $screens;
	}

	public function render(): void {
		if ( ! $this->screens ) {
			return;
		}
		foreach ( $this->screens as $screen_index => $screen ) {
			if ( $screen['hide_screen'] ) {
				continue;
			}
			$acf_fc_layout = $screen['acf_fc_layout'] ?? '';
			switch ( $acf_fc_layout ) {
				case 'banner':
					$this->render_banner( $screen );
					break;
				case 'transformations':
					$this->render_cases( $screen );
					break;
				case 'reviews':
					$this->render_reviews( $screen );
					break;
			}
		}
	}

	private function render_banner( array $screen ): void {
		?>
        <section class="section head-section section-background-gradient">
            <div class="section__background">
                <img src="<?php echo esc_url( $screen['image'] ) ?>" class="cover" alt="">
            </div>
            <div class="container">
                <div data-aos="fade-right" class="head-section__title">
					<?php echo $screen['title']; ?>
                </div>
            </div>
        </section>
		<?php
	}

	private function render_cases( array $screen ): void {
		$query_args = CasesCatalog::get_query_args();
		$catalog    = new CasesCatalog( $query_args );
		?>
        <section class="section gallery-section section-padding">
            <div class="container">
                <div class="gallery-container">
                    <div class="title gallery__title">
						<?php echo $screen['title'] ?>
                    </div>
                    <div class="subtitle gallery__subtitle">
						<?php echo $screen['text'] ?>
                    </div>
					<?php $catalog->render_categories(); ?>
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
	}

	private function render_reviews( array $screen ): void {
		?>

        <section class="section reviews-section section-padding" style="background-color: #F4EFED;">
            <div class="container">
                <div class="title reviews-section__title">
					<?php echo $screen['title'] ?>
                </div>
            </div>
            <div class="reviews-list">
				<?php
				if ( $reviews = $screen['reviews'] ) {
					foreach ( $reviews as $review_id ) {
						if ( get_post( $review_id ) ) {
							echo ' <div>';
							the_review( $review_id );
							echo ' </div>';
						}
					}
				}
				?>
            </div>
        </section>
		<?php
	}
}