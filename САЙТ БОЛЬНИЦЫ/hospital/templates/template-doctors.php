<?php
/**
 * Template Name: Страница врачей
 */

get_header();
?>

<div class="hospital-container">
    <h1><?php the_title(); ?></h1>
    
    <div class="departments-filter">
        <h2>Фильтр по отделениям</h2>
        <?php
        $departments = get_terms(array(
            'taxonomy' => 'department',
            'hide_empty' => true,
        ));
        
        if ($departments) {
            echo '<ul>';
            foreach ($departments as $department) {
                echo '<li><a href="' . get_term_link($department) . '">' . $department->name . '</a></li>';
            }
            echo '</ul>';
        }
        ?>
    </div>
    
    <div class="doctors-list">
        <?php
        $args = array(
            'post_type' => 'doctor',
            'posts_per_page' => -1,
        );
        
        $doctors = new WP_Query($args);
        
        if ($doctors->have_posts()) {
            while ($doctors->have_posts()) {
                $doctors->the_post();
                ?>
                <div class="doctor-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="doctor-image">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="doctor-info">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        
                        <?php
                        $specializations = get_the_terms(get_the_ID(), 'specialization');
                        if ($specializations && !is_wp_error($specializations)) {
                            echo '<p class="specializations">';
                            $spec_list = array();
                            foreach ($specializations as $spec) {
                                $spec_list[] = $spec->name;
                            }
                            echo implode(', ', $spec_list);
                            echo '</p>';
                        }
                        ?>
                        
                        <div class="doctor-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <a href="<?php the_permalink(); ?>" class="doctor-link">Подробнее</a>
                    </div>
                </div>
                <?php
            }
            wp_reset_postdata();
        } else {
            echo '<p>Врачи не найдены.</p>';
        }
        ?>
    </div>
</div>

<?php
get_footer();
