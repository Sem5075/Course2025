<?php
// Подключение родительских стилей
add_action('wp_enqueue_scripts', 'hospital_theme_enqueue_styles');
function hospital_theme_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('hospital-style', get_stylesheet_directory_uri() . '/css/hospital.css');
}

// Инициализация темы
add_action('after_setup_theme', 'hospital_theme_setup');
function hospital_theme_setup() {
    // Регистрация меню
    register_nav_menus(array(
        'primary' => __('Основное меню', 'hospital-theme'),
        'footer' => __('Меню в подвале', 'hospital-theme')
    ));

    // Поддержка миниатюр
    add_theme_support('post-thumbnails');
}

// Регистрация пользовательских типов записей и таксономий
require_once get_stylesheet_directory() . '/inc/custom-post-types.php';
require_once get_stylesheet_directory() . '/inc/custom-taxonomies.php';
