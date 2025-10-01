<?php

namespace Dantist\View;

use WP_Query;

class CasesCatalog {

	/**
	 * @var array|mixed
	 */
	private mixed $query_args;
	private WP_Query $posts;

	public function __construct( $query_args = [] ) {
		$this->query_args = $query_args;
		$this->posts      = new WP_Query( $query_args );
	}

	public function render_pagination(): void {
		$total_pages  = $this->get_max_num_pages();
		$current_page = $this->query_args['paged'] ?? 1;
		if ( $total_pages > 1 ) {

			$pagination_args = [
				'base'      => get_pagenum_link( 1 ) . '%_%', // Базовий URL, де %_% буде замінено на формат
				'format'    => 'page/%#%',                    // Формат для URL сторінки (для "красивих" посилань)
				'current'   => $current_page,                 // Поточна сторінка
				'total'     => $total_pages,                  // Загальна кількість сторінок
				'prev_text' => __( '' ), // Текст для посилання "назад"
				'next_text' => __( '' ), // Текст для посилання "вперед"
			];

			echo paginate_links( $pagination_args );
		}
	}

	public function get_max_num_pages(): int {
		return $this->posts->max_num_pages;
	}

	public function render_catalog(): void {
		$posts = $this->posts;
		if ( ! $posts->have_posts() ) {
			echo '<p style="width: 100%; text-align: center;">Not found</p>';

			return;
		}
		foreach ( $posts->posts as $post_id ) {
			the_case_preview( $post_id );
		}
	}

	public function render_categories(): void {
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
                       class="gallery-categories__link">
						<?php echo esc_html( $category->name ) ?>
                    </a>
                </li>
			<?php endforeach; ?>
        </ul>
		<?php
	}
}