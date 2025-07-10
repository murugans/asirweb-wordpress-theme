<section class="clientele" data-aos="fade-up">
  <div class="container">
    <h2>Trusted By</h2>
    <div class="client-logos">
      <?php
        $clients = new WP_Query([
          'post_type' => 'client',
          'posts_per_page' => -1
        ]);
        while ($clients->have_posts()) : $clients->the_post();
          if (has_post_thumbnail()) {
            the_post_thumbnail('thumbnail', ['alt' => get_the_title()]);
          }
        endwhile; wp_reset_postdata();
      ?>
    </div>
  </div>
</section>