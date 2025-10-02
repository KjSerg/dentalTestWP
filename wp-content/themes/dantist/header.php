<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title(); ?></title>
	<?php wp_head(); ?>
</head>
<body>
<header class="header">
    <div class="container">
        <div class="header-container" data-aos="fade-down">
			<?php if ( $tel = get_field( 'tel', 'option' ) ): ?>
                <a href="<?php the_phone_link($tel); ?>" class="header-tel">
                <span class="icon header-tel__icon"><svg width="16" height="26" viewBox="0 0 16 26" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
<path d="M12.3363 25.5256H2.97646C1.33425 25.5256 -0.00195312 24.1895 -0.00195312 22.5472L-0.000956031 2.97822C-0.000956031 1.33601 1.33514 -0.00019455 2.97746 -0.00019455H12.3373C13.9795 -0.00019455 15.3157 1.3359 15.3157 2.97822V22.5483C15.3157 24.1905 13.9796 25.5267 12.3373 25.5267L12.3363 25.5256ZM2.97752 0.850872C1.80594 0.850872 0.85073 1.80608 0.85073 2.97767V22.5477C0.85073 23.7193 1.80594 24.6745 2.97752 24.6745H12.3373C13.5089 24.6745 14.4641 23.7193 14.4641 22.5477V2.97873C14.4641 1.80715 13.5089 0.851935 12.3373 0.851935H2.97752V0.850872Z"
      fill="#fff"/>
<path d="M10.6362 23.3985H4.68065C4.44633 23.3985 4.25488 23.207 4.25488 22.9727C4.25488 22.7384 4.44633 22.5469 4.68065 22.5469H10.6362C10.8705 22.5469 11.062 22.7384 11.062 22.9727C11.062 23.207 10.8705 23.3985 10.6362 23.3985Z"
      fill="#fff"/>
</svg>
</span>
                    <span class="header-tel__container">
                <span class="header-tel__title">Call us</span>
                <?php echo esc_html($tel) ?>
                </span>
                </a>
			<?php endif; ?>
			<?php if ( $logo = get_field( 'logo', 'option' ) ): ?>
                <a href="<?php echo site_url(); ?>" class="header__logo logo">
					<?php the_image( $logo ); ?>
                </a>
			<?php endif; ?>
			<?php if ( $buttons = get_field( 'buttons', 'option' ) ): ?>
                <div class="header-controls">
					<?php the_custom_buttons( $buttons, 'header__button' ); ?>
                </div>
			<?php endif; ?>
        </div>
    </div>
</header>
<main class="content">