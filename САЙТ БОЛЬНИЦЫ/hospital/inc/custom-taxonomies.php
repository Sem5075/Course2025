<?php
// Таксономия "Отделения" для врачей
add_action('init', 'register_departments_taxonomy');
function register_departments_taxonomy() {
    $labels = array(
        'name' => 'Отделения',
        'singular_name' => 'Отделение',
        'search_items' => 'Искать отделения',
        'all_items' => 'Все отделения',
        'parent_item' => 'Родительское отделение',
        'parent_item_colon' => 'Родительское отделение:',
        'edit_item' => 'Редактировать отделение',
        'update_item' => 'Обновить отделение',
        'add_new_item' => 'Добавить новое отделение',
        'new_item_name' => 'Новое название отделения',
        'menu_name' => 'Отделения'
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'department'),
    );

    register_taxonomy('department', array('doctor'), $args);
}

// Таксономия "Специализации" для врачей
add_action('init', 'register_specializations_taxonomy');
function register_specializations_taxonomy() {
    $labels = array(
        'name' => 'Специализации',
        'singular_name' => 'Специализация',
        'search_items' => 'Искать специализации',
        'all_items' => 'Все специализации',
        'edit_item' => 'Редактировать специализацию',
        'update_item' => 'Обновить специализацию',
        'add_new_item' => 'Добавить новую специализацию',
        'new_item_name' => 'Новое название специализации',
        'menu_name' => 'Специализации'
    );

    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'specialization'),
    );

    register_taxonomy('specialization', array('doctor'), $args);
}
