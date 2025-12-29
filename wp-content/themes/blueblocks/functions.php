<?php
/**
 * Enqueue styles & scripts
 */
function blueblocks_enqueue_assets() {

  // Tailwind CDN
  wp_enqueue_script(
    'tailwind',
    'https://cdn.tailwindcss.com?plugins=forms,typography',
    [],
    null,
    false
  );

  // Google Fonts
  wp_enqueue_style(
    'jakarta-font',
    'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap'
  );

  // Material Icons
  wp_enqueue_style(
    'material-icons',
    'https://fonts.googleapis.com/icon?family=Material+Icons+Round'
  );

  // Custom CSS
  wp_enqueue_style(
    'blueblocks-custom',
    get_template_directory_uri() . '/assets/css/custom.css',
    [],
    null
  );

  // Theme style.css (required)
  wp_enqueue_style(
    'blueblocks-style',
    get_stylesheet_uri()
  );

  // Custom JS
  wp_enqueue_script(
    'blueblocks-js',
    get_template_directory_uri() . '/assets/js/main.js',
    [],
    null,
    true
  );
}
add_action('wp_enqueue_scripts', 'blueblocks_enqueue_assets');


/**
 * Theme supports
 */
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('title-tag');


/**
 * Register Menus
 */
register_nav_menus([

  // Header
  'primary_menu'       => 'Primary Menu',

  // Footer
  'footer_quick'       => 'Footer – Quick Links',
  'footer_programs'    => 'Footer – Programs',
  'footer_innovations' => 'Footer – Innovations',
  'footer_others'      => 'Footer – Others',

]);


/**
 * Newsletter form handler
 */
add_action('admin_post_nopriv_blueblocks_newsletter', 'blueblocks_handle_newsletter');
add_action('admin_post_blueblocks_newsletter', 'blueblocks_handle_newsletter');

function blueblocks_handle_newsletter() {

  if (empty($_POST['email']) || !is_email($_POST['email'])) {
    wp_redirect(home_url());
    exit;
  }

  $email = sanitize_email($_POST['email']);

  wp_mail(
    get_option('admin_email'),
    'New Newsletter Subscription',
    'New subscriber email: ' . $email
  );

  wp_redirect(home_url('?subscribed=1'));
  exit;
}


/**
 * Dynamic Social Links (Customizer)
 */
add_action('customize_register', function ($wp_customize) {

  // Footer Image
$wp_customize->add_setting('blueblocks_footer_image', [
  'sanitize_callback' => 'esc_url_raw',
]);

$wp_customize->add_control(
  new WP_Customize_Image_Control(
    $wp_customize,
    'blueblocks_footer_image',
    [
      'label'   => 'Footer Left Image',
      'section' => 'title_tagline',
    ]
  )
);


  // SOCIAL LINKS SECTION
  $wp_customize->add_section('blueblocks_social_section', [
    'title'    => 'Footer Social Links',
    'priority' => 35,
  ]);

  $wp_customize->add_setting('blueblocks_social_links', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);

  $wp_customize->add_control('blueblocks_social_links', [
    'label'       => 'Social Links (one per line)',
    'description' =>
      "Format:\nLabel | URL\n\nExample:\nInstagram | https://instagram.com/blueblocks\nWhatsApp | https://wa.me/919000955050\nX | https://x.com/blueblocks\nTelegram | https://t.me/blueblocks",
    'section'     => 'blueblocks_social_section',
    'type'        => 'textarea',
  ]);


  // CONTACT INFO SECTION
  $wp_customize->add_section('blueblocks_contact_section', [
    'title'    => 'Footer Contact Info',
    'priority' => 36,
  ]);

  // Phone 1
  $wp_customize->add_setting('blueblocks_phone_1', [
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('blueblocks_phone_1', [
    'label'   => 'Primary Phone Number',
    'section' => 'blueblocks_contact_section',
    'type'    => 'text',
  ]);

  // Phone 2
  $wp_customize->add_setting('blueblocks_phone_2', [
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('blueblocks_phone_2', [
    'label'   => 'Secondary Phone Number',
    'section' => 'blueblocks_contact_section',
    'type'    => 'text',
  ]);

  // Email
  $wp_customize->add_setting('blueblocks_contact_email', [
    'sanitize_callback' => 'sanitize_email',
  ]);
  $wp_customize->add_control('blueblocks_contact_email', [
    'label'   => 'Contact Email',
    'section' => 'blueblocks_contact_section',
    'type'    => 'email',
  ]);

});




/**
 * Experience Section – Customizer
 */
add_action('customize_register', function ($wp_customize) {

  // SECTION
  $wp_customize->add_section('blueblocks_experience_section', [
    'title'    => 'Experience Section',
    'priority' => 40,
  ]);

  // TITLE
  $wp_customize->add_setting('experience_title', [
    'default' => 'Experience Learning the Blue Blocks Way.',
    'sanitize_callback' => 'sanitize_text_field',
  ]);

  $wp_customize->add_control('experience_title', [
    'label'   => 'Main Title',
    'section' => 'blueblocks_experience_section',
    'type'    => 'text',
  ]);

  // SUBTEXT
  $wp_customize->add_setting('experience_subtext', [
    'default' => 'Book Admission Workshop!',
    'sanitize_callback' => 'sanitize_text_field',
  ]);

  $wp_customize->add_control('experience_subtext', [
    'label'   => 'Sub Text',
    'section' => 'blueblocks_experience_section',
    'type'    => 'text',
  ]);

  // BUTTON TEXT
  $wp_customize->add_setting('experience_btn_text', [
    'default' => 'Book Admission Workshop',
    'sanitize_callback' => 'sanitize_text_field',
  ]);

  $wp_customize->add_control('experience_btn_text', [
    'label'   => 'Button Text',
    'section' => 'blueblocks_experience_section',
    'type'    => 'text',
  ]);

  // BUTTON LINK
  $wp_customize->add_setting('experience_btn_link', [
    'default' => '#',
    'sanitize_callback' => 'esc_url_raw',
  ]);

  $wp_customize->add_control('experience_btn_link', [
    'label'   => 'Button URL',
    'section' => 'blueblocks_experience_section',
    'type'    => 'url',
  ]);

  // RIGHT IMAGE
  $wp_customize->add_setting('experience_image', [
    'sanitize_callback' => 'esc_url_raw',
  ]);

  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'experience_image',
      [
        'label'   => 'Right Side Image',
        'section' => 'blueblocks_experience_section',
      ]
    )
  );

  // PARTNER LOGOS (Textarea)
  $wp_customize->add_setting('experience_logos', [
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);

  $wp_customize->add_control('experience_logos', [
    'label'       => 'Partner Logos (one per line)',
    'description' => "Format:\nImage URL | Alt Text",
    'section'     => 'blueblocks_experience_section',
    'type'        => 'textarea',
  ]);

});


/**
 * FAQ / Accordion (Customizer)
 */
add_action('customize_register', function ($wp_customize) {

  // Section
  $wp_customize->add_section('blueblocks_faq_section', [
    'title'    => 'FAQ Section',
    'priority' => 40,
  ]);

  // Setting
  $wp_customize->add_setting('blueblocks_faq_items', [
    'default'           => '',
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);

  // Control
  $wp_customize->add_control('blueblocks_faq_items', [
    'label'       => 'FAQ Items',
    'description' =>
      "Format:\nQuestion | Answer\n\nExample:\nWhen can I start my course? | You can start immediately after purchase.\nDo you provide certificates? | Yes, certificates are provided after completion.",
    'section'     => 'blueblocks_faq_section',
    'type'        => 'textarea',
  ]);
});


/**
 * Insights Section Header (Customizer)
 */
add_action('customize_register', function ($wp_customize) {

  // Section
  $wp_customize->add_section('blueblocks_insights_section', [
    'title'    => 'Insights Section',
    'priority' => 41,
  ]);

  // Highlight word (Insights)
  $wp_customize->add_setting('insights_highlight', [
    'default'           => 'Insights',
    'sanitize_callback' => 'sanitize_text_field',
  ]);

  $wp_customize->add_control('insights_highlight', [
    'label'   => 'Highlighted Word',
    'section' => 'blueblocks_insights_section',
    'type'    => 'text',
  ]);

  // Main heading text
  $wp_customize->add_setting('insights_heading', [
    'default'           => "for Parents, Educators,\nand Thinkers.",
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);

  $wp_customize->add_control('insights_heading', [
    'label'       => 'Heading Text',
    'description' => "Use line breaks for new lines",
    'section'     => 'blueblocks_insights_section',
    'type'        => 'textarea',
  ]);
});


/**
 * Testimonials Section (Customizer)
 */
add_action('customize_register', function ($wp_customize) {

  // Section
  $wp_customize->add_section('blueblocks_testimonials', [
    'title'    => 'Testimonials Section',
    'priority' => 45,
  ]);

  // Badge
  $wp_customize->add_setting('testimonial_badge', [
    'default' => 'Testimonials',
    'sanitize_callback' => 'sanitize_text_field',
  ]);

  $wp_customize->add_control('testimonial_badge', [
    'label'   => 'Badge Text',
    'section' => 'blueblocks_testimonials',
    'type'    => 'text',
  ]);

  // Heading
  $wp_customize->add_setting('testimonial_heading', [
    'default' => "Every Journey\nMatters.",
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);

  $wp_customize->add_control('testimonial_heading', [
    'label'   => 'Main Heading',
    'section' => 'blueblocks_testimonials',
    'type'    => 'textarea',
  ]);

  // Description
  $wp_customize->add_setting('testimonial_desc', [
    'default' => 'Every child learns through experience...',
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);

  $wp_customize->add_control('testimonial_desc', [
    'label'   => 'Description',
    'section' => 'blueblocks_testimonials',
    'type'    => 'textarea',
  ]);

  // Testimonials list
  $wp_customize->add_setting('testimonial_items', [
    'default' => '',
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);

  $wp_customize->add_control('testimonial_items', [
    'label'       => 'Testimonials',
    'description' =>
      "Format:\nName | Role | Image URL | Testimonial text\n\nExample:\nAmandeep Singh | Lead Organizer | https://site.com/img.jpg | We were facing major time pressure...",
    'section'     => 'blueblocks_testimonials',
    'type'        => 'textarea',
  ]);
});

//Flight Section Header
add_action('customize_register', function ($wp_customize) {

  $wp_customize->add_section('blueblocks_flight_header', [
    'title'    => 'Flight Section Header',
    'priority' => 30,
  ]);

  $fields = [
    'badge' => 'Badge Text',
    'line1' => 'Heading Line 1',
    'line2' => 'Heading Line 2',
  ];

  foreach ($fields as $key => $label) {
    $wp_customize->add_setting("flight_$key", [
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control("flight_$key", [
      'label'   => $label,
      'section' => 'blueblocks_flight_header',
      'type'    => 'text',
    ]);
  }
});


add_action('init', function () {
  register_post_type('flight_program', [
    'labels' => [
      'name' => 'Flight Programs',
      'singular_name' => 'Flight Program',
    ],
    'public' => true,
    'supports' => ['title', 'editor', 'thumbnail'],
    'menu_icon' => 'dashicons-airplane',
  ]);
});


add_action('add_meta_boxes', function () {
  add_meta_box(
    'flight_card_color',
    'Card Color',
    function ($post) {
      $value = get_post_meta($post->ID, '_flight_color', true);
      ?>
      <select name="flight_color" style="width:100%">
        <option value="blue" <?= selected($value, 'blue') ?>>Blue</option>
        <option value="orange" <?= selected($value, 'orange') ?>>Orange</option>
        <option value="darkblue" <?= selected($value, 'darkblue') ?>>Dark Blue</option>
        <option value="yellow" <?= selected($value, 'yellow') ?>>Yellow</option>
      </select>
      <?php
    },
    'flight_program'
  );
});

add_action('save_post', function ($post_id) {
  if (isset($_POST['flight_color'])) {
    update_post_meta($post_id, '_flight_color', sanitize_text_field($_POST['flight_color']));
  }
});


// Programs
add_action('customize_register', function ($wp_customize) {

  $wp_customize->add_section('blueblocks_programs_header', [
    'title' => 'Programs Section Header',
    'priority' => 32,
  ]);

  $fields = [
    'badge'   => 'Badge Text',
    'heading' => 'Main Heading',
    'highlight' => 'Highlighted Word',
  ];

  foreach ($fields as $key => $label) {
    $wp_customize->add_setting("programs_$key", [
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control("programs_$key", [
      'label' => $label,
      'section' => 'blueblocks_programs_header',
      'type' => 'text',
    ]);
  }
});


add_action('init', function () {

  register_post_type('bb_program', [
    'labels' => [
      'name' => 'Programs',
      'singular_name' => 'Program',
    ],
    'public' => true,
    'supports' => ['title', 'editor'],
    'menu_icon' => 'dashicons-welcome-learn-more',
  ]);

});

add_action('add_meta_boxes', function () {

  add_meta_box('bb_program_meta', 'Program Settings', function ($post) {

    $age   = get_post_meta($post->ID, '_bb_age', true);
    $color = get_post_meta($post->ID, '_bb_color', true);
    ?>

    <p>
      <label><strong>Age Label</strong></label><br>
      <input type="text" name="bb_age" value="<?= esc_attr($age) ?>" style="width:100%">
    </p>

    <p>
      <label><strong>Card Color</strong></label><br>
      <select name="bb_color" style="width:100%">
        <option value="yellow" <?= selected($color,'yellow') ?>>Yellow</option>
        <option value="cyan" <?= selected($color,'cyan') ?>>Cyan</option>
        <option value="indigo" <?= selected($color,'indigo') ?>>Indigo</option>
      </select>
    </p>

    <?php
  }, 'bb_program');
});

add_action('save_post', function ($post_id) {

  if (isset($_POST['bb_age'])) {
    update_post_meta($post_id, '_bb_age', sanitize_text_field($_POST['bb_age']));
  }

  if (isset($_POST['bb_color'])) {
    update_post_meta($post_id, '_bb_color', sanitize_text_field($_POST['bb_color']));
  }

});



// ===============================
// OUR SCHOOL – CUSTOMIZER
// ===============================
add_action('customize_register', function ($wp_customize) {

  $wp_customize->add_section('school_section', [
    'title'    => 'School Section',
    'priority' => 30,
  ]);

  // Badge
  $wp_customize->add_setting('school_badge', [
    'default' => 'Our School',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('school_badge', [
    'label'   => 'Badge Text',
    'section' => 'school_section',
  ]);

  // Heading
  $wp_customize->add_setting('school_heading', [
    'default' => "Where\nGuidance\nMeets Growth",
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);
  $wp_customize->add_control('school_heading', [
    'label'   => 'Main Heading (new line supported)',
    'type'    => 'textarea',
    'section' => 'school_section',
  ]);

  // Tabs JSON
  $wp_customize->add_setting('school_tabs', [
    'default' => wp_json_encode([
      [
        'key'   => 'team',
        'label' => 'OUR TEAM',
        'title' => 'Meet Our Team',
        'text'  => 'People behind our school.',
        'link'  => '#',
      ],
      [
        'key'   => 'admissions',
        'label' => 'ADMISSIONS',
        'title' => 'Admissions Process',
        'text'  => 'How to join our school.',
        'link'  => '#',
      ],
      [
        'key'   => 'campus',
        'label' => 'CAMPUSES',
        'title' => 'Our Campuses',
        'text'  => 'Learning environments across locations.',
        'link'  => '#',
      ],
    ]),
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);

  $wp_customize->add_control('school_tabs', [
    'label'       => 'Tabs Data (JSON)',
    'description' => "Format:\nkey, label, title, text, link",
    'type'        => 'textarea',
    'section'     => 'school_section',
  ]);
});


// ===============================
// SCRIPTS & TAILWIND
// ===============================
add_action('wp_enqueue_scripts', function () {

  // Tailwind CDN
  wp_enqueue_script(
    'tailwind-cdn',
    'https://cdn.tailwindcss.com',
    [],
    null,
    false
  );

  // Tailwind Config
  wp_add_inline_script(
    'tailwind-cdn',
    "tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            primary: '#4F86ED',
            'card-light': '#FFFFFF',
            'card-dark': '#1F2937'
          }
        }
      }
    };",
    'after'
  );

  // School Section JS
  $script_path = get_template_directory() . '/assets/js/school-section.js';

  wp_enqueue_script(
    'school-section',
    get_template_directory_uri() . '/assets/js/school-section.js',
    ['tailwind-cdn'], // 👈 dependency added
    file_exists($script_path) ? filemtime($script_path) : time(),
    true
  );

  wp_localize_script('school-section', 'SchoolData', [
    'badge'   => get_theme_mod('school_badge'),
    'heading' => get_theme_mod('school_heading'),
    'tabs'    => json_decode(get_theme_mod('school_tabs'), true),
  ]);
});



// hero section start here


/**
 * HERO SECTION – Customizer Settings
 */
add_action('customize_register', function ($wp_customize) {

  // SECTION
  $wp_customize->add_section('hero_section', [
    'title'    => 'Hero Section',
    'priority' => 20,
  ]);

  // BRAND
  $wp_customize->add_setting('hero_brand', [
    'default' => 'Blue Blocks',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('hero_brand', [
    'label'   => 'Brand Name',
    'section' => 'hero_section',
  ]);

  // NAV
  foreach (['about','programs','admissions'] as $nav) {
    $wp_customize->add_setting("nav_$nav", [
      'default' => ucfirst($nav),
      'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control("nav_$nav", [
      'label'   => ucfirst($nav).' Menu',
      'section' => 'hero_section',
    ]);
  }

  // HEADING
  $wp_customize->add_setting('hero_heading', [
    'default' => "Head.\nIn Harmony!",
    'sanitize_callback' => 'wp_kses_post',
  ]);
  $wp_customize->add_control('hero_heading', [
    'label'   => 'Hero Heading',
    'type'    => 'textarea',
    'section' => 'hero_section',
  ]);

  // DESCRIPTION
  $wp_customize->add_setting('hero_description', [
    'default' => 'Where authentic Montessori meets innovation, guiding children from curiosity to capability.',
    'sanitize_callback' => 'sanitize_textarea_field',
  ]);
  $wp_customize->add_control('hero_description', [
    'label'   => 'Hero Description',
    'type'    => 'textarea',
    'section' => 'hero_section',
  ]);

  // BUTTONS
  $buttons = [
    'btn1' => 'Watch Our Story',
    'btn2' => 'Book Admission Workshop'
  ];

  foreach ($buttons as $key => $label) {
    $wp_customize->add_setting("hero_{$key}_text", [
      'default' => $label,
      'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control("hero_{$key}_text", [
      'label'   => ucfirst($key).' Text',
      'section' => 'hero_section',
    ]);

    $wp_customize->add_setting("hero_{$key}_link", [
      'default' => '#',
      'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control("hero_{$key}_link", [
      'label'   => ucfirst($key).' Link',
      'section' => 'hero_section',
    ]);
  }

    // FLOATING IMAGES (SMALL ONLY)
  for ($i = 1; $i <= 4; $i++) {
    $wp_customize->add_setting("hero_img_$i", [
      'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control(
      $wp_customize,
      "hero_img_$i",
      [
        'label'   => "Floating Image $i",
        'section' => 'hero_section',
      ]
    ));
  }

  // ==========================
  // PHILOSOPHY IMAGES (COLLAGE)
  // ==========================
  for ($i = 1; $i <= 3; $i++) {
    $wp_customize->add_setting("philo_img_$i", [
      'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
        $wp_customize,
        "philo_img_$i",
        [
          'label'   => "Philosophy Image $i",
          'section' => 'hero_section',
        ]
      )
    );
  }

  



  // PHILOSOPHY
  $wp_customize->add_setting('philo_badge', [
    'default' => 'Philosophy',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('philo_badge', [
    'label' => 'Philosophy Badge',
    'section' => 'hero_section',
  ]);

  $wp_customize->add_setting('philo_heading', [
    'default' => "The Blue\nBlocks Way",
    'sanitize_callback' => 'wp_kses_post',
  ]);
  $wp_customize->add_control('philo_heading', [
    'label' => 'Philosophy Heading',
    'type'  => 'textarea',
    'section' => 'hero_section',
  ]);

  $wp_customize->add_setting('philo_text', [
    'default' => 'Every child learns through experience...',
    'sanitize_callback' => 'wp_kses_post',
  ]);
  $wp_customize->add_control('philo_text', [
    'label' => 'Philosophy Text',
    'type'  => 'textarea',
    'section' => 'hero_section',
  ]);

  $wp_customize->add_setting('philo_link_text', [
    'default' => 'Learn more about our methodology',
    'sanitize_callback' => 'sanitize_text_field',
  ]);
  $wp_customize->add_control('philo_link_text', [
    'label' => 'Philosophy CTA Text',
    'section' => 'hero_section',
  ]);

  $wp_customize->add_setting('philo_link', [
    'default' => '#',
    'sanitize_callback' => 'esc_url_raw',
  ]);
  $wp_customize->add_control('philo_link', [
    'label' => 'Philosophy CTA Link',
    'section' => 'hero_section',
  ]);
});
