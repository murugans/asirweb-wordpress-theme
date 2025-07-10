<?php
require get_template_directory() . '/includes/cpt.php';
require get_template_directory() . '/includes/acf-fields.php';

function asirweb_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    register_nav_menus([
        'primary' => __('Primary Menu', 'asirweb')
    ]);
}
add_action('after_setup_theme', 'asirweb_theme_setup');

function asirweb_styles() {
    wp_enqueue_style('asirweb-style', get_stylesheet_uri());
    wp_enqueue_script('asirweb-js', get_template_directory_uri() . '/assets/js/main.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'asirweb_styles');

// Elementor Support
function asirweb_elementor_support() {
    add_theme_support('elementor');
}
add_action('after_setup_theme', 'asirweb_elementor_support');

function asirweb_testimonials_shortcode() {
    ob_start();
    $testimonials = new WP_Query([
        'post_type' => 'testimonial',
        'posts_per_page' => 3
    ]);
    if ($testimonials->have_posts()) :
        echo '<div class="testimonial-slider">';
        while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
            <div class="testimonial">
                <p>“<?php the_content(); ?>”</p>
                <strong><?php the_field('client_name'); ?></strong> – <?php the_field('client_company'); ?>
                <div class="stars">
                    <?php
                    $rating = get_field('rating');
                    for ($i = 0; $i < $rating; $i++) {
                        echo '<i class="fas fa-star" style="color: gold;"></i>';
                    }
                    ?>
                </div>
            </div>
        <?php endwhile;
        echo '</div>';
    endif;
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('asirweb_testimonials', 'asirweb_testimonials_shortcode');

function asirweb_services_shortcode() {
    ob_start(); ?>
    <div class="service-grid">
        <div class="service-item">
            <i class="fas fa-bullhorn fa-3x" style="color: var(--primary-color);"></i>
            <h3>Digital Marketing</h3>
            <p>Boost your online presence with SEO, PPC, and social media strategies.</p>
        </div>
        <div class="service-item">
            <i class="fas fa-code fa-3x" style="color: var(--primary-color);"></i>
            <h3>Website Development</h3>
            <p>Custom, responsive websites built with modern technologies.</p>
        </div>
        <div class="service-item">
            <i class="fas fa-tools fa-3x" style="color: var(--primary-color);"></i>
            <h3>Website Maintenance</h3>
            <p>Keep your site secure, updated, and running smoothly.</p>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('asirweb_services', 'asirweb_services_shortcode');

function asirweb_clients_shortcode() {
    ob_start();
    $clients = new WP_Query([
        'post_type' => 'client',
        'posts_per_page' => -1
    ]);
    if ($clients->have_posts()) :
        echo '<div class="client-logos">';
        while ($clients->have_posts()) : $clients->the_post();
            if (has_post_thumbnail()) {
                echo '<div class="client-logo">' . get_the_post_thumbnail(get_the_ID(), 'medium') . '</div>';
            }
        endwhile;
        echo '</div>';
    endif;
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('asirweb_clients', 'asirweb_clients_shortcode');

function asirweb_portfolio_shortcode() {
    ob_start();
    $portfolio = new WP_Query([
        'post_type' => 'portfolio',
        'posts_per_page' => 6
    ]);
    if ($portfolio->have_posts()) :
        echo '<div class="portfolio-grid">';
        while ($portfolio->have_posts()) : $portfolio->the_post(); ?>
            <div class="portfolio-item">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium'); ?>
                    <h4><?php the_title(); ?></h4>
                </a>
            </div>
        <?php endwhile;
        echo '</div>';
    endif;
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('asirweb_portfolio', 'asirweb_portfolio_shortcode');

function asirweb_register_elementor_widgets($widgets_manager) {
    // Ensure the base file for widgets is loaded if it exists and is needed.
    // It seems like individual widget files are being loaded directly.
    // require_once get_template_directory() . '/includes/elementor-widgets.php';

    require_once get_template_directory() . '/includes/elementor-testimonial-widget.php';
    require_once get_template_directory() . '/includes/elementor-portfolio-widget.php';
    require_once get_template_directory() . '/includes/elementor-team-widget.php';

    $widgets_manager->register(new \AsirWeb_Testimonial_Widget());
    $widgets_manager->register(new \AsirWeb_Portfolio_Widget());
    $widgets_manager->register(new \AsirWeb_Team_Widget());
}
add_action('elementor/widgets/register', 'asirweb_register_elementor_widgets', 10, 1);

function asirweb_pricing_shortcode() {
    ob_start(); ?>
    <div class="pricing-table">
        <div class="plan">
            <h3>Basic</h3>
            <p class="price">$99/month</p>
            <ul>
                <li>Website Development</li>
                <li>Basic SEO</li>
                <li>Email Support</li>
            </ul>
            <a href="/contact" class="btn-primary">Get Started</a>
        </div>
        <div class="plan featured">
            <h3>Pro</h3>
            <p class="price">$199/month</p>
            <ul>
                <li>Everything in Basic</li>
                <li>Digital Marketing</li>
                <li>Priority Support</li>
            </ul>
            <a href="/contact" class="btn-primary">Get Started</a>
        </div>
        <div class="plan">
            <h3>Enterprise</h3>
            <p class="price">$399/month</p>
            <ul>
                <li>Everything in Pro</li>
                <li>Custom Development</li>
                <li>Dedicated Manager</li>
            </ul>
            <a href="/contact" class="btn-primary">Get Started</a>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('asirweb_pricing', 'asirweb_pricing_shortcode');