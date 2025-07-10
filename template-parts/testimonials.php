<section class="testimonials" data-aos="fade-up">
  <div class="container">
    <h2>What Our Clients Say</h2>
    <div class="testimonial-slider">
      <?php
        $testimonials = new WP_Query([
          'post_type' => 'testimonial',
          'posts_per_page' => 3
        ]);
        while ($testimonials->have_posts()) : $testimonials->the_post();
      ?>
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
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section