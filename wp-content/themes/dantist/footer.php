<?php
$assets = esc_url( get_template_directory_uri() . '/assets/' );
?>
</main>
</body>
<div class="preloader" style="">
    <img loading="lazy" src="<?php echo esc_attr( $assets . 'img/loading.gif' ); ?>" alt="loading.gif">
</div>
<?php wp_footer(); ?>

</html>