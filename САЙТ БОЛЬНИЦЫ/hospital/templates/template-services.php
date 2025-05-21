<?php
/**
 * Template Name: Страница услуг
 */

get_header();
?>

<div class="hospital-container">
    <h1><?php the_title(); ?></h1>
    
    <div class="services-list">
        <?php
        $args = array(
            'post_type' => 'service',
            'posts_per_page' => -1,
        );
        
        $services = new WP_Query($args);
        
        if ($services->have_posts()) {
            while ($services->have_posts()) {
                $services->the_post();
                ?>
                <div class="service-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="service-image">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="service-info">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        
                        <div class="service-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <a href="<?php the_permalink(); ?>" class="service-link">Подробнее</a>
                    </div>
                </div>
                <?php
            }
            wp_reset_postdata();
        } else {
            echo '<p>Услуги не найдены.</p>';
        }
        ?>
    </div>
</div>

<?php
get_footer();
