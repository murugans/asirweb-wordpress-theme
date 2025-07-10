<?php
function asirweb_register_cpts() {
    register_post_type('portfolio', [
        'labels' => ['name' => 'Portfolio', 'singular_name' => 'Project'],
        'public' => true,
        'has_archive' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'rewrite' => ['slug' => 'portfolio'],
    ]);

    register_post_type('testimonial', [
        'labels' => ['name' => 'Testimonials', 'singular_name' => 'Testimonial'],
        'public' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);

    register_post_type('client', [
        'labels' => ['name' => 'Clients', 'singular_name' => 'Client'],
        'public' => true,
        'supports' => ['title', 'thumbnail'],
    ]);
}
add_action('init', 'asirweb_register_cpts');