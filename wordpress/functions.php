<?php 
function add_theme_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_register_style('base', get_template_directory_uri() . '/css/base.css', array(), 1, 'all');
    wp_enqueue_style('base');

    wp_enqueue_style('google-fonts-lato', '//fonts.googleapis.com/css?family=Lato:300,400,700&display=swap&subset=latin-ext');
    wp_enqueue_style('google-fonts-sengwick', '//fonts.googleapis.com/css?family=Sedgwick+Ave&display=swap&subset=latin-ext');
    wp_enqueue_style('cdnCssSwiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.css');


    wp_enqueue_script('ajax', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js');
    wp_enqueue_script('swiperCdnJs', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.js');
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/nav.js', array (), 1.1, true);
    wp_enqueue_script('smootscroll', 'https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15.0/dist/smooth-scroll.polyfills.min.js');
    wp_enqueue_script('swiper', 'https://unpkg.com/swiper/js/swiper.min.js');

  }
  add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );



?>
