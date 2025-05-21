<?php
/**
 * Главная страница
 */

get_header();
?>

<div class="hospital-hero">
    <div class="hospital-hero-content">
        <h1>Добро пожаловать в нашу больницу</h1>
        <p>Профессиональная медицинская помощь с заботой о каждом пациенте</p>
        <a href="/services" class="hero-button">Наши услуги</a>
    </div>
</div>

<div class="hospital-features">
    <div class="feature">
        <div class="feature-icon">🩺</div>
        <h3>Квалифицированные врачи</h3>
        <p>Наши специалисты с многолетним опытом работы</p>
    </div>
    
    <div class="feature">
        <div class="feature-icon">🏥</div>
        <h3>Современное оборудование</h3>
        <p>Используем последние достижения медицинской техники</p>
    </div>
    
    <div class="feature">
        <div class="feature-icon">❤️</div>
        <h3>Индивидуальный подход</h3>
        <p>Забота о комфорте и здоровье каждого пациента</p>
    </div>
</div>

<div class="hospital-doctors-preview">
    <h2>Наши врачи</h2>
    
    <div class="doctors-grid">
        <?php
        $args = array(
            'post_type' => 'doctor',
            'posts_per_page' => 4,
        );
        
        $doctors = new WP_Query($args);
        
        if ($doctors->have_posts()) {
            while ($doctors->have_posts()) {
                $doctors->the_post();
                ?>
                <div class="doctor-preview">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="doctor-preview-image">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                    <?php endif; ?>
                    <h4><?php the_title(); ?></h4>
                    <?php
                    $specializations = get_the_terms(get_the_ID(), 'specialization');
                    if ($specializations && !is_wp_error($specializations)) {
                        echo '<p>' . $specializations[0]->name . '</p>';
                    }
                    ?>
                </div>
                <?php
            }
            wp_reset_postdata();
        }
        ?>
    </div>
    
    <a href="/doctors" class="see-all-button">Все врачи</a>
</div>

<?php
get_footer();
