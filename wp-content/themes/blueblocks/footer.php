<footer class="bg-background-light-footer dark:bg-background-dark min-h-screen flex items-center justify-center p-4 lg:p-10">

  <div class="max-w-[1440px] w-full mx-auto grid grid-cols-1 lg:grid-cols-12 gap-6">

    <!-- LEFT IMAGE -->
    <div class="lg:col-span-5 relative h-[500px] lg:h-auto rounded-2xl overflow-hidden group">
      <img
  src="<?php echo esc_url(
    get_theme_mod(
      'blueblocks_footer_image',
      get_template_directory_uri() . '/assets/images/footer-default.jpg'
    )
  ); ?>"
  alt="<?php bloginfo('name'); ?> Campus"
  class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
/>

      <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-60"></div>
    </div>

    <!-- RIGHT CONTENT -->
    <div class="lg:col-span-7 flex flex-col gap-6">

      <!-- NEWSLETTER + SOCIAL -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- NEWSLETTER -->
        <div class="bg-card-light dark:bg-card-dark rounded-2xl p-6 md:p-8 shadow-sm">
          <h2 class="text-xl md:text-2xl font-semibold text-gray-900 dark:text-white mb-6">
            Recognized Worldwide for Excellence.
          </h2>

          <form
            method="post"
            action="<?php echo esc_url(admin_url('admin-post.php')); ?>"
            class="relative flex items-center"
          >
            <input type="hidden" name="action" value="blueblocks_newsletter">
            <?php wp_nonce_field('blueblocks_newsletter', 'blueblocks_nonce'); ?>

            <input
              type="email"
              name="email"
              required
              placeholder="Enter Your E-mail"
              class="w-full bg-gray-100 dark:bg-[#3F3F46] rounded-xl py-3 pl-4 pr-32 text-gray-900 dark:text-white"
            />

            <button
              type="submit"
              class="absolute right-1.5 top-1.5 bottom-1.5 bg-white px-4 rounded-lg text-sm font-medium"
            >
              Submit <span class="material-icons text-sm">north_east</span>
            </button>
          </form>
        </div>

        <!-- SOCIAL LINKS (Dynamic) -->
        <div class="grid gap-4">
          <?php
          $socials_raw = get_theme_mod('blueblocks_social_links');
          if ($socials_raw) :
            $lines = explode("\n", $socials_raw);
            foreach ($lines as $line) :
              if (!str_contains($line, '|')) continue;
              [$label, $url] = array_map('trim', explode('|', $line, 2));
              if (!$label || !$url) continue;
          ?>
              <a
                href="<?php echo esc_url($url); ?>"
                target="_blank"
                rel="noopener"
                class="group bg-card-light dark:bg-card-dark rounded-xl px-6 py-4 flex justify-between items-center hover:bg-gray-50 dark:hover:bg-[#323238] transition"
              >
                <span><?php echo esc_html($label); ?></span>
                <span class="material-icons">north_east</span>
              </a>
          <?php
            endforeach;
          endif;
          ?>
        </div>

      </div>

      <!-- FOOTER MENUS + CONTACT INFO -->
<div class="bg-card-light dark:bg-card-dark rounded-2xl p-6 md:p-10 shadow-sm">

  <!-- MENUS GRID -->
  <div class="grid grid-cols-2 md:grid-cols-4 gap-y-8 gap-x-4">

    <div class="space-y-4">
      <h3 class="text-lg font-semibold">Quick Links</h3>
      <?php wp_nav_menu([
        'theme_location' => 'footer_quick',
        'container'      => false,
        'menu_class'     => 'space-y-2.5 text-sm',
        'fallback_cb'    => false,
      ]); ?>
    </div>

    <div class="space-y-4">
      <h3 class="text-lg font-semibold">Programs</h3>
      <?php wp_nav_menu([
        'theme_location' => 'footer_programs',
        'container'      => false,
        'menu_class'     => 'space-y-2.5 text-sm',
        'fallback_cb'    => false,
      ]); ?>
    </div>

    <div class="space-y-4">
      <h3 class="text-lg font-semibold">Innovations</h3>
      <?php wp_nav_menu([
        'theme_location' => 'footer_innovations',
        'container'      => false,
        'menu_class'     => 'space-y-2.5 text-sm',
        'fallback_cb'    => false,
      ]); ?>
    </div>

    <div class="space-y-4">
      <h3 class="text-lg font-semibold">Others</h3>
      <?php wp_nav_menu([
        'theme_location' => 'footer_others',
        'container'      => false,
        'menu_class'     => 'space-y-2.5 text-sm',
        'fallback_cb'    => false,
      ]); ?>
    </div>

  </div>

  <!-- DIVIDER -->
  <div class="my-6 h-px"></div>

  <!-- CONTACT INFO -->
  <div class="bg-gray-100 dark:bg-[#3F3F46] rounded-xl px-6 py-4
              flex flex-col md:flex-row justify-between items-center gap-4
              text-sm text-gray-600 dark:text-gray-300">

    <!-- PHONE -->
    <div class="flex items-center gap-2">
      <span class="material-icons text-base">call</span>

      <?php if ($p1 = get_theme_mod('blueblocks_phone_1')) : ?>
        <span><?php echo esc_html($p1); ?></span>
      <?php endif; ?>

      <?php if ($p2 = get_theme_mod('blueblocks_phone_2')) : ?>
        <span class="mx-1">•</span>
        <span><?php echo esc_html($p2); ?></span>
      <?php endif; ?>
    </div>

    <!-- EMAIL -->
    <?php if ($email = get_theme_mod('blueblocks_contact_email')) : ?>
      <div class="flex items-center gap-2">
        <span class="material-icons text-base">email</span>
        <a href="mailto:<?php echo esc_attr($email); ?>"
           class="hover:text-gray-900 dark:hover:text-white transition-colors">
          <?php echo esc_html($email); ?>
        </a>
      </div>
    <?php endif; ?>

  </div>

</div>

    </div>
  </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
