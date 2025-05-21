<?php
// Пользовательский тип записи "Врачи"
add_action('init', 'register_doctors_post_type');
function register_doctors_post_type() {
    $labels = array(
        'name' => 'Врачи',
        'singular_name' => 'Врач',
        'menu_name' => 'Врачи',
        'all_items' => 'Все врачи',
        'add_new' => 'Добавить нового',
        'add_new_item' => 'Добавить нового врача',
        'edit_item' => 'Редактировать врача',
        'new_item' => 'Новый врач',
        'view_item' => 'Просмотреть врача',
        'search_items' => 'Искать врачей',
        'not_found' => 'Врачей не найдено',
        'not_found_in_trash' => 'Врачей в корзине не найдено'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-businessperson',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'doctors'),
    );

    register_post_type('doctor', $args);
}

// Пользовательский тип записи "Услуги"
add_action('init', 'register_services_post_type');
function register_services_post_type() {
    $labels = array(
        'name' => 'Услуги',
        'singular_name' => 'Услуга',
        'menu_name' => 'Услуги',
        'all_items' => 'Все услуги',
        'add_new' => 'Добавить новую',
        'add_new_item' => 'Добавить новую услугу',
        'edit_item' => 'Редактировать услугу',
        'new_item' => 'Новая услуга',
        'view_item' => 'Просмотреть услугу',
        'search_items' => 'Искать услуги',
        'not_found' => 'Услуг не найдено',
        'not_found_in_trash' => 'Услуг в корзине не найдено'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-heart',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'services'),
    );

    register_post_type('service', $args);
}
