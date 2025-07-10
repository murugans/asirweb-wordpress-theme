<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<button class="dark-mode-toggle"><i class="fas fa-moon"></i></button>
<header class="site-header">
  <div class="container">
    <div class="logo">
      <a href="<?php echo home_url(); ?>">AsirWeb</a>
    </div>
    <nav class="main-nav">
      <?php wp_nav_menu(['theme_location' => 'primary']); ?>
    </nav>
  </div>
</header>