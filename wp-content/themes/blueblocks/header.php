<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script>
tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      fontFamily: {
        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
      },
      colors: {
        primary: "#4F86ED",
        "background-light": "#F9F1E6",
        "background-dark": "#111827",
        "card-blue": "#9ADBF3",
        "card-blue-dark": "#5A9AB5",
        "card-orange": "#FFBCA6",
        "card-orange-dark": "#CC836D",
        "card-darkblue": "#2E467D",
        "card-darkblue-dark": "#1A2A50",
        "card-yellow": "#FDECA6",
        "card-yellow-dark": "#C9B668",
      }
    }
  }
}
</script>

  <?php wp_head(); ?>
</head>

<body <?php body_class('bg-background-light dark:bg-background-dark text-gray-800 dark:text-gray-100 font-sans antialiased overflow-x-hidden'); ?>>

<!-- 🌈 Background SVG / Effects (GLOBAL) -->
<div class="fixed inset-0 z-0 opacity-80 dark:opacity-20 pointer-events-none">
  <!-- You can paste your SVG background here if you want it global -->
</div>

<!-- 🔝 HEADER / NAVBAR -->
<nav class="relative z-50 flex justify-between items-center px-6 py-6 max-w-7xl mx-auto">

  <!-- LOGO / SITE NAME -->
  <a href="<?php echo home_url(); ?>" class="font-display font-bold text-2xl tracking-tight text-gray-900 dark:text-white">
    <?php bloginfo('name'); ?>
  </a>

  <!-- MENU -->
  <?php
    wp_nav_menu([
      'theme_location' => 'primary_menu',
      'container'      => false,
      'menu_class'     => 'hidden md:flex space-x-6 text-sm font-medium',
      'fallback_cb'    => false,
    ]);
  ?>

</nav>
