
<?php
/* 
Template Name: Front Page 
*/
get_header(); 
?>

<!-- ========================= -->
<body class="relative bg-background-light dark:bg-background-dark text-gray-800 dark:text-gray-100 font-sans antialiased overflow-x-hidden transition-colors duration-300">

<!-- 🌈 GLOBAL SVG BACKGROUND -->
<div class="global-bg fixed inset-0 -z-20 pointer-events-none">
  <svg class="w-full h-full" preserveAspectRatio="none" viewBox="0 0 1440 1600">
<defs>
<linearGradient id="grad1" x1="0%" x2="100%" y1="0%" y2="100%">
<stop offset="0%" style="stop-color:#fde68a;stop-opacity:1"></stop> 
<stop offset="100%" style="stop-color:#fcd34d;stop-opacity:1"></stop>
</linearGradient>
<linearGradient id="grad2" x1="0%" x2="100%" y1="0%" y2="100%">
<stop offset="0%" style="stop-color:#fca5a5;stop-opacity:1"></stop> 
<stop offset="100%" style="stop-color:#fdba74;stop-opacity:1"></stop>
</linearGradient>
<linearGradient id="grad3" x1="0%" x2="100%" y1="0%" y2="100%">
<stop offset="0%" style="stop-color:#7dd3fc;stop-opacity:1"></stop> 
<stop offset="100%" style="stop-color:#38bdf8;stop-opacity:1"></stop>
</linearGradient>
</defs>
<path d="M680,0 C680,400 500,600 200,1000 C100,1133 -100,1200 -200,1300 L-200,0 Z" fill="url(#grad1)" opacity="0.6"></path>
<path d="M780,0 C780,400 600,600 300,1000 C200,1133 0,1300 -100,1600 L200,1600 L680,0 Z" fill="url(#grad2)" opacity="0.6"></path>
<path d="M880,0 C880,400 700,600 400,1000 C300,1133 100,1300 0,1600 L1440,1600 L1440,0 Z" fill="url(#grad3)" opacity="0.6" style="display:none"></path> 
<path class="dark:fill-yellow-900/40" d="M600,0 Q650,400 350,800 T0,1400 L-100,1400 L-100,0 Z" fill="#fef08a"></path>
<path class="dark:fill-red-900/40" d="M720,0 Q770,400 470,800 T120,1400 L250,1400 Q600,800 900,400 T850,0 Z" fill="#fda4af" style="mix-blend-mode: multiply;"></path>
<path class="dark:fill-blue-900/40" d="M840,0 Q890,400 590,800 T240,1400 L370,1400 Q720,800 1020,400 T970,0 Z" fill="#7dd3fc" style="mix-blend-mode: multiply;"></path>
</svg>
</div>


<nav class="relative z-50 flex justify-between items-center px-6 py-6 max-w-7xl mx-auto">
  <div class="font-display font-bold text-2xl tracking-tight">
    <?php echo esc_html( get_theme_mod('hero_brand') ); ?>
  </div>

  <div class="hidden md:flex space-x-6">
    <a class="text-sm font-medium hover:text-primary" href="#"><?php echo esc_html(get_theme_mod('nav_about')); ?></a>
    <a class="text-sm font-medium hover:text-primary" href="#"><?php echo esc_html(get_theme_mod('nav_programs')); ?></a>
    <a class="text-sm font-medium hover:text-primary" href="#"><?php echo esc_html(get_theme_mod('nav_admissions')); ?></a>
  </div>
</nav>

<main class="relative z-10 max-w-7xl mx-auto px-4 pb-20 text-center">

  <?php
  // 👉 Floating image positions (each image gets a unique spot)
  $floating_positions = [
    1 => 'top-0 left-10 -rotate-6',
    2 => 'top-12 right-20 rotate-3',
    3 => 'top-72 left-0 rotate-12',
    4 => 'top-80 right-10 -rotate-6',
  ];

  for ($i = 1; $i <= 4; $i++):
    $img = get_theme_mod("hero_img_$i");
    if (!$img) continue;
  ?>
    <div
      class="hidden md:block absolute floating-card w-48
             <?php echo esc_attr($floating_positions[$i]); ?>"
      style="animation-delay: <?php echo ($i * 0.6); ?>s;"
    >
      <img
        src="<?php echo esc_url($img); ?>"
        alt="Floating Image <?php echo $i; ?>"
        class="rounded-lg shadow-xl border-4 border-white dark:border-gray-700
               transform hover:scale-105 transition duration-300"
      >
    </div>
  <?php endfor; ?>

  <!-- HERO CONTENT -->
  <div class="max-w-3xl mx-auto mt-24 relative z-20">

  <!-- HEADING -->
  <h1 class="text-6xl md:text-8xl font-display font-bold mb-6 leading-tight">
    <?php echo wp_kses_post( nl2br( get_theme_mod('hero_heading') ) ); ?>
  </h1>

  <!-- DESCRIPTION -->
  <p class="text-lg md:text-xl mb-10">
  <?php echo wp_kses_post( nl2br( get_theme_mod('hero_description') ) ); ?>
</p>


  <!-- BUTTONS -->
  <div class="flex flex-col sm:flex-row justify-center items-center gap-4">

    <!-- BUTTON 1 : PLAY -->
    <a
      href="<?php echo esc_url( get_theme_mod('hero_btn1_link') ); ?>"
      class="group flex items-center gap-3 bg-white dark:bg-slate-800
             text-gray-800 dark:text-white px-6 py-3 rounded-full
             shadow-md hover:shadow-lg transition-all
             border border-gray-100 dark:border-slate-700"
    >
      <span class="flex items-center justify-center w-8 h-8 rounded-full
                   bg-yellow-100 dark:bg-yellow-900
                   text-yellow-600 dark:text-yellow-300">
        <span class="material-icons-round text-lg">play_arrow</span>
      </span>

      <span class="font-semibold text-sm">
        <?php echo esc_html( get_theme_mod('hero_btn1_text') ); ?>
      </span>
    </a>

    <!-- BUTTON 2 : CTA -->
    <a
      href="<?php echo esc_url( get_theme_mod('hero_btn2_link') ); ?>"
      class="group flex items-center gap-2 bg-primary text-white
             px-6 py-3.5 rounded-full shadow-md
             hover:bg-blue-700 transition-all hover:scale-105"
    >
      <span class="font-semibold text-sm">
        <?php echo esc_html( get_theme_mod('hero_btn2_text') ); ?>
      </span>

      <span class="material-icons-round text-sm
                   group-hover:translate-x-1 transition-transform">
        north_east
      </span>
    </a>

  </div>

</div>


  <!-- PHILOSOPHY -->
  <!-- PHILOSOPHY SECTION -->
<div class="mt-20-phil grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

  <!-- LEFT: IMAGE COLLAGE -->
  <div class="lg:col-span-7 relative">
    <div class="grid grid-cols-2 gap-4">

      <!-- BIG IMAGE -->
      <?php if ($img1 = get_theme_mod('philo_img_1')): ?>
      <div class="row-span-2 relative group overflow-hidden rounded-2xl shadow-xl">
        <img
          src="<?php echo esc_url($img1); ?>"
          class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700"
          alt=""
        >
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
      </div>
      <?php endif; ?>

      <!-- SMALL IMAGE 1 -->
      <?php if ($img2 = get_theme_mod('philo_img_2')): ?>
      <div class="relative h-48 group overflow-hidden rounded-2xl shadow-xl">
        <img
          src="<?php echo esc_url($img2); ?>"
          class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700"
          alt=""
        >
      </div>
      <?php endif; ?>

      <!-- SMALL IMAGE 2 (OPTIONAL PLAY ICON) -->
      <?php if ($img3 = get_theme_mod('philo_img_3')): ?>
      <div class="relative h-48 group overflow-hidden rounded-2xl shadow-xl">
        <img
          src="<?php echo esc_url($img3); ?>"
          class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700"
          alt=""
        >

        <div class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/30 transition">
          <span class="w-10 h-10 bg-white/90 rounded-full flex items-center justify-center shadow-lg backdrop-blur-sm">
            <span class="material-icons-round text-gray-800">play_arrow</span>
          </span>
        </div>
      </div>
      <?php endif; ?>

    </div>
  </div>

  <!-- RIGHT: CONTENT -->
  <div class="lg:col-span-5 relative z-10 text-left">

    <span class="inline-block px-3 py-1 mb-4 rounded-full bg-indigo-50 dark:bg-indigo-900/50
                 text-indigo-600 dark:text-indigo-300 text-xs font-bold uppercase tracking-wider">
      <?php echo esc_html(get_theme_mod('philo_badge')); ?>
    </span>

    <h2 class="text-4xl md:text-5xl font-display font-bold mb-6 leading-tight">
      <?php echo wp_kses_post(nl2br(get_theme_mod('philo_heading'))); ?>
    </h2>

    <p class="text-gray-600 dark:text-gray-300 mb-6 text-lg leading-relaxed">
      <?php echo wp_kses_post(get_theme_mod('philo_text')); ?>
    </p>

    <a href="<?php echo esc_url(get_theme_mod('philo_link')); ?>"
       class="inline-flex items-center gap-2 text-primary font-semibold hover:underline decoration-2 underline-offset-4">
      <?php echo esc_html(get_theme_mod('philo_link_text')); ?>
      <span class="material-icons-round text-sm">arrow_forward</span>
    </a>

  </div>
</div>


</main>


<div class="fixed bottom-0 right-0 w-32 h-32 bg-gradient-to-tl from-brand-blue/20 to-transparent rounded-tl-full -z-10"></div>
<div class="fixed top-0 left-0 w-32 h-32 bg-gradient-to-br from-brand-yellow/20 to-transparent rounded-br-full -z-10"></div>



<!-- // school -->
<div class="bg-background-light-school min-h-screen flex items-center justify-center p-6">
  <div class="max-w-7xl w-full grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

    <!-- LEFT -->
    <div class="lg:col-span-5 space-y-10 pl-4 lg:pl-12">

      <!-- Badge -->
      <span class="inline-block px-4 py-1.5 rounded-full bg-indigo-100 text-indigo-700 text-xs font-semibold uppercase">
        <?php echo esc_html(get_theme_mod('school_badge')); ?>
      </span>

      <!-- Heading -->
      <h1 class="text-5xl md:text-6xl lg:text-7xl font-display leading-[1.05]">
        <?php echo nl2br(wp_kses_post(get_theme_mod('school_heading'))); ?>
      </h1>

      <!-- Tabs -->
      <div class="flex flex-col max-w-sm border-t border-gray-300">
        <?php
        $tabs = json_decode(get_theme_mod('school_tabs'), true);
        foreach ($tabs as $i => $tab) :
          $active = $i === 0;
        ?>
          <a href="#"
             data-key="<?php echo esc_attr($tab['key']); ?>"
             class="menu-link flex justify-between items-center px-4 py-4 border-b
                    text-sm tracking-wide
                    <?php echo $active
                      ? 'bg-primary text-white font-semibold'
                      : 'text-gray-700 hover:text-primary'; ?>">
            <span><?php echo esc_html($tab['label']); ?></span>
            <span class="material-icons-outlined">north_east</span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- RIGHT -->
    <div class="lg:col-span-7 flex justify-end relative">

      <!-- STACKED CARDS -->
      <div class="relative w-full max-w-xl">

        <!-- BACK CARD 1 -->
        <div class="absolute inset-0 translate-x-6 translate-y-6
                    rounded-[2.5rem] border-2 border-black bg-white"></div>

        <!-- BACK CARD 2 -->
        <div class="absolute inset-0 translate-x-3 translate-y-3
                    rounded-[2.5rem] border-2 border-black bg-white"></div>

        <!-- FRONT CARD -->
        <div id="layeredCard"
             class="relative bg-white rounded-[2.5rem]
                    border-2 border-black p-10 min-h-[520px]
                    flex flex-col justify-between transition-all duration-500">

          <!-- ICON -->
          <div class="absolute top-6 right-6 text-primary">
            <svg width="44" height="44" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
              <path d="M14 2v6h6"/>
            </svg>
          </div>

          <!-- CONTENT -->
          <div class="mt-16">
            <h2 id="cardTitle" class="text-3xl md:text-4xl font-display mb-6">
              Spaces Designed for Discovery.
            </h2>

            <p id="cardText" class="text-gray-600 leading-relaxed mb-10">
              With campuses at Gachibowli and Tellapur, our environments combine
              natural light, open learning zones, and scientifically designed
              Montessori materials — inspiring curiosity every day.
            </p>
          </div>

          <!-- CTA -->
          <a id="cardLink"
             class="inline-flex items-center gap-2 text-sm font-semibold border-b border-black w-fit">
            Know More
            <span class="material-icons-outlined text-sm">north_east</span>
          </a>

        </div>
      </div>

    </div>
  </div>
</div>



<!-- programm start here -->
<div class="bg-background-light dark:bg-background-dark min-h-screen font-sans">

<section class="relative py-16 px-4 sm:px-6 lg:px-8">

<div class="max-w-7xl mx-auto">

<!-- HEADER -->
<div class="mb-16 max-w-4xl">

  <?php if ($b = get_theme_mod('programs_badge')) : ?>
    <div class="inline-flex px-4 py-1.5 mb-6 rounded-full bg-slate-100 dark:bg-slate-800 border">
      <span class="text-xs font-semibold tracking-widest text-primary uppercase">
        <?= esc_html($b) ?>
      </span>
    </div>
  <?php endif; ?>

  <h1 class="text-5xl md:text-6xl lg:text-7xl leading-[1.1]">
    <?= esc_html(get_theme_mod('programs_heading')) ?>
    <span class="text-primary font-medium">
      <?= esc_html(get_theme_mod('programs_highlight')) ?>
    </span>
  </h1>

</div>

<!-- PROGRAM CARDS -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

<?php
$q = new WP_Query([
  'post_type' => 'bb_program',
  'posts_per_page' => -1,
]);

while ($q->have_posts()) : $q->the_post();

  $age   = get_post_meta(get_the_ID(), '_bb_age', true);
  $color = get_post_meta(get_the_ID(), '_bb_color', true);

  $bg = [
    'yellow' => 'bg-[#FCEEB5] dark:bg-yellow-900/40',
    'cyan'   => 'bg-[#A5DDF0] dark:bg-cyan-900/40',
    'indigo' => 'bg-[#2C4075] dark:bg-indigo-950 text-white',
  ][$color] ?? 'bg-[#FCEEB5]';
?>

<div class="group relative flex flex-col p-8 rounded-2xl <?= esc_attr($bg) ?> hover:-translate-y-1 transition">

  <?php if ($age) : ?>
    <div class="absolute top-8 right-8">
      <span class="inline-flex items-center px-3 py-1 rounded-full bg-white dark:bg-slate-900 text-xs font-semibold text-black dark:text-white shadow-sm">
  <?= esc_html($age) ?>
</span>

    </div>
  <?php endif; ?>

  <div class="mt-12 mb-6">
    <h3 class="text-3xl md:text-4xl leading-tight">
      <?php the_title(); ?>
    </h3>
  </div>

  <p class="text-base mb-12 opacity-80">
    <?php the_excerpt(); ?>
  </p>

  <div class="mt-auto pt-6 border-t flex justify-end">
    <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-sm font-semibold hover:underline">
      Know More
      
    </a>
    <span class="material-icons text-sm ml-1">north_east</span>
  </div>

</div>

<?php endwhile; wp_reset_postdata(); ?>

</div>
</div>
</section>
</div>



<!-- classroom start here-->
<div class="bg-background-light-flight dark:bg-background-dark min-h-screen p-6 sm:p-10">

<header class="text-center max-w-4xl mx-auto mb-16 pt-10">

  <?php if ($b = get_theme_mod('flight_badge')) : ?>
    <div class="inline-block bg-primary text-white rounded-full px-8 py-2.5 text-lg font-medium mb-6">
      <?= esc_html($b) ?>
    </div>
  <?php endif; ?>

  <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold">
    <?= esc_html(get_theme_mod('flight_line1')) ?>
  </h1>

  <h2 class="text-5xl md:text-6xl lg:text-7xl font-bold text-primary mt-2">
    <?= esc_html(get_theme_mod('flight_line2')) ?>
  </h2>

</header>

<main class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-[1400px] mx-auto">

<?php
$query = new WP_Query([
  'post_type' => 'flight_program',
  'posts_per_page' => -1,
]);

while ($query->have_posts()) : $query->the_post();

  $color = get_post_meta(get_the_ID(), '_flight_color', true) ?: 'blue';

  $bg = [
    'blue' => 'bg-card-blue',
    'orange' => 'bg-card-orange',
    'darkblue' => 'bg-card-darkblue text-white',
    'yellow' => 'bg-card-yellow',
  ][$color];
?>

<article class="flex flex-col rounded-[2rem] p-5 <?= esc_attr($bg) ?> group hover:shadow-xl">

  <div class="h-48 rounded-2xl overflow-hidden mb-6">
    <?php the_post_thumbnail('large', [
      'class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-700'
    ]); ?>
  </div>

  <div class="flex flex-col flex-grow">
    <h3 class="text-2xl md:text-3xl font-bold mb-3">
      <?php the_title(); ?>
    </h3>

    <p class="text-sm mb-6 opacity-80">
      <?php the_excerpt(); ?>
    </p>

    <a href="<?php the_permalink(); ?>"
       class="inline-flex items-center self-end font-bold text-sm border-b-2 border-transparent hover:border-current">
      Know More <span class="material-icons ml-1">north_east</span>
    </a>
  </div>

</article>

<?php endwhile; wp_reset_postdata(); ?>

</main>
</div>


<!-- testimonial section here -->
<div class="bg-background-light dark:bg-background-dark font-sans transition-colors duration-300 antialiased">

<section class="relative w-full overflow-hidden bg-primary dark:bg-zinc-900 py-16 md:py-24 px-4 sm:px-6 lg:px-8">

  <div class="max-w-7xl mx-auto relative z-10">

    <!-- HEADER -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16 items-start">

      <div class="flex flex-col items-start space-y-6">
        <span class="inline-block px-4 py-2 rounded-full bg-white/20 text-white text-xs font-semibold uppercase backdrop-blur-sm">
          <?php echo esc_html(get_theme_mod('testimonial_badge', 'Testimonials')); ?>
        </span>

        <h2 class="text-5xl md:text-6xl lg:text-7xl font-display text-white leading-tight">
          <?php
            echo nl2br(esc_html(
              get_theme_mod('testimonial_heading', "Every Journey\nMatters.")
            ));
          ?>
        </h2>
      </div>

      <div class="flex flex-col justify-center h-full pt-4 lg:pt-16">
        <p class="text-white/90 text-lg md:text-xl font-light leading-relaxed text-left lg:text-right max-w-2xl ml-auto">
          <?php echo esc_html(get_theme_mod('testimonial_desc')); ?>
        </p>
      </div>

    </div>

    <!-- CAROUSEL -->
    <div class="relative w-full">
        <div class="bb-testimonial-slider flex space-x-6 overflow-x-auto pb-12 pt-4 px-2 snap-x snap-mandatory scroll-smooth hide-scrollbar">


        <?php
        $items = get_theme_mod('testimonial_items');
        if ($items):
          foreach (explode("\n", $items) as $line):
            if (!str_contains($line, '|')) continue;
            [$name, $role, $img, $text] = array_map('trim', explode('|', $line, 4));
        ?>

        <div class="bb-slide flex-none w-[320px] md:w-[350px] snap-center transition-transform duration-300 hover:scale-105">
          <div class="h-full bg-card-light dark:bg-card-dark p-8 rounded-2xl shadow-xl flex flex-col justify-between min-h-[420px]">

            <div>
              <span class="text-6xl text-quote-blue font-serif block mb-4">“</span>
              <p class="text-gray-600 dark:text-gray-300 italic text-[15px] leading-relaxed mb-6 font-medium">
                <?php echo esc_html($text); ?>
              </p>
            </div>

            <div class="flex items-center gap-4 border-t border-gray-100 dark:border-gray-700 pt-6 mt-auto">
              <img
                src="<?php echo esc_url($img); ?>"
                alt="<?php echo esc_attr($name); ?>"
                class="w-12 h-12 rounded-full object-cover ring-2 ring-gray-100 dark:ring-gray-600"
              />
              <div>
                <h4 class="font-bold text-gray-900 dark:text-white text-base">
                  <?php echo esc_html($name); ?>
                </h4>
                <p class="text-xs text-gray-500 dark:text-gray-400 leading-tight mt-1">
                  <?php echo esc_html($role); ?>
                </p>
              </div>
            </div>

          </div>
        </div>

        <?php endforeach; endif; ?>

      </div>
    </div>

  </div>
</section>
</div>




<!-- Feature blog section here -->
<div class="bg-background-light dark:bg-background-dark text-text-main-light dark:text-text-main-dark transition-colors duration-300 min-h-screen font-sans antialiased">

  <main class="max-w-[1200px] mx-auto px-6 py-12 md:py-24">

    <!-- HEADER -->
<header class="mb-16 md:mb-24">
  <h1 class="text-5xl md:text-[5.5rem] leading-[1.1] tracking-tight font-normal">

    <span class="text-primary font-medium">
      <?php echo esc_html(get_theme_mod('insights_highlight', 'Insights')); ?>
    </span>

    <?php
      $heading = get_theme_mod(
        'insights_heading',
        "for Parents, Educators,\nand Thinkers."
      );
      echo nl2br(esc_html($heading));
    ?>

  </h1>
</header>


    <div class="border-t border-border-light dark:border-border-dark">

      <?php
      $insights = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'post_status'    => 'publish',
      ]);

      if ($insights->have_posts()):
        while ($insights->have_posts()): $insights->the_post();
      ?>

      <!-- ARTICLE -->
      <article class="group flex flex-col md:flex-row items-start md:items-center py-10 md:py-12 border-b border-border-light dark:border-border-dark">

        <!-- IMAGE -->
        <div class="w-full md:w-[220px] h-[140px] flex-shrink-0 overflow-hidden rounded-lg mb-6 md:mb-0 md:mr-10 bg-gray-200 dark:bg-gray-800">
          <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()): ?>
              <?php the_post_thumbnail('medium', [
                'class' => 'w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105 opacity-90 group-hover:opacity-100'
              ]); ?>
            <?php endif; ?>
          </a>
        </div>

        <!-- CONTENT -->
        <div class="flex-grow flex flex-col justify-center pr-4">
          <h2 class="text-2xl md:text-3xl font-normal mb-3 group-hover:text-primary transition-colors duration-300">
            <a href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
          </h2>

          <p class="text-text-muted-light dark:text-text-muted-dark font-normal text-base">
            <?php echo get_the_date('d.m.Y'); ?>
          </p>
        </div>

        <!-- LINK -->
        <div class="mt-6 md:mt-0 flex-shrink-0 w-full md:w-auto flex justify-start md:justify-end">
          <a
            href="<?php the_permalink(); ?>"
            class="inline-flex items-center text-sm font-medium border-b border-text-main-light/30 dark:border-text-main-dark/30 hover:border-primary hover:text-primary transition-all pb-0.5 group/link"
          >
            Know More
            <span class="material-icons-outlined text-[16px] ml-1 transform transition-transform duration-300 group-hover/link:translate-x-0.5 group-hover/link:-translate-y-0.5">
              north_east
            </span>
          </a>
        </div>

      </article>

      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>

    </div>

    <!-- VIEW ALL -->
    <div class="mt-16 flex justify-center">
      <a
        href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"
        class="inline-flex items-center text-base font-medium hover:text-primary transition-colors group"
      >
        View All
        <span class="material-icons-outlined text-sm ml-1 transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform">
          north_east
        </span>
      </a>
    </div>

  </main>
</div>



<!-- accordian section here -->
<div class="bg-background-light-acc dark:bg-background-dark font-body min-h-screen-part flex items-start justify-center pt-20 px-4">
  <main class="w-full max-w-3xl mx-auto space-y-4">

    <?php
    $faqs_raw = get_theme_mod('blueblocks_faq_items');

    if ($faqs_raw):
      $faqs = explode("\n", $faqs_raw);
      $first = false;

      foreach ($faqs as $faq):
        if (!str_contains($faq, '|')) continue;
        [$question, $answer] = array_map('trim', explode('|', $faq, 2));
        if (!$question || !$answer) continue;
    ?>

    <!-- FAQ ITEM -->
    <div class="faq-card rounded-xl overflow-hidden bg-surface-light dark:bg-surface-dark transition-colors duration-200">

      <div class="p-6 md:p-8 faq-item">

        <div class="flex justify-between items-start mb-3 cursor-pointer faq-toggle">
          <h3 class="text-xl md:text-2xl font-medium text-text-main-light dark:text-text-main-dark pr-8">
            <?php echo esc_html($question); ?>
          </h3>

          <button class="text-text-muted-light dark:text-text-muted-dark transition-colors">
            <svg class="h-6 w-6 faq-icon" fill="none" stroke="currentColor" stroke-width="1.5"
                 viewBox="0 0 24 24">
              <path d="M12 4v16m8-8H4"
                    stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
          </button>
        </div>

        <div class="faq-content text-sm md:text-base text-text-muted-light dark:text-text-muted-dark leading-relaxed max-w-2xl <?php echo $first ? '' : 'hidden'; ?>">
          <p><?php echo esc_html($answer); ?></p>
        </div>

      </div>
    </div>

    <?php
        $first = false;
      endforeach;
    endif;
    ?>

  </main>
</div>








<div class="bg-surface-light-experience dark:bg-background-dark text-text-light dark:text-text-dark antialiased min-h-screen-part flex flex-col transition-colors duration-300">

  <!-- ================= PARTNER LOGOS ================= -->
  <section class="w-full bg-white dark:bg-surface-dark py-12 px-4 border-b border-gray-100 dark:border-gray-800 overflow-hidden">
  <div class="max-w-6xl mx-auto">

    <!-- SCROLL CONTAINER -->
    <div class="relative overflow-hidden">
      <div class="logo-marquee flex items-center gap-16">

        <?php
        $logos = get_theme_mod('experience_logos');
        if ($logos):
          foreach (explode("\n", $logos) as $line):
            if (!str_contains($line, '|')) continue;
            [$img, $alt] = array_map('trim', explode('|', $line, 2));
        ?>
          <div class="h-16 md:h-20 lg:h-24 flex items-center flex-shrink-0">
            <img
              src="<?php echo esc_url($img); ?>"
              alt="<?php echo esc_attr($alt); ?>"
              class="h-full w-auto object-contain opacity-60 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-300 dark:invert"
            />
          </div>
        <?php endforeach; endif; ?>

        <!-- duplicate for seamless loop -->
        <?php
        if ($logos):
          foreach (explode("\n", $logos) as $line):
            if (!str_contains($line, '|')) continue;
            [$img, $alt] = array_map('trim', explode('|', $line, 2));
        ?>
          <div class="h-16 md:h-20 lg:h-24 flex items-center flex-shrink-0">
            <img
              src="<?php echo esc_url($img); ?>"
              alt="<?php echo esc_attr($alt); ?>"
              class="h-full w-auto object-contain opacity-60 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-300 dark:invert"
            />
          </div>
        <?php endforeach; endif; ?>

      </div>
    </div>

  </div>
</section>


  <!-- ================= EXPERIENCE HERO ================= -->
  <main class="flex-grow bg-background-light dark:bg-background-dark py-16 px-4 md:px-8 lg:px-12 relative overflow-hidden flex items-center justify-center">
    <div class="max-w-7xl-experience w-full mx-auto relative z-10">

      <div class="bg-primary rounded-2xl md:rounded-3xl shadow-soft text-white p-8 md:p-12 lg:p-20 flex flex-col md:flex-row items-center md:items-start relative min-h-[500px]">

        <!-- LEFT CONTENT -->
        <div class="w-full md:w-3/5 lg:w-1/2 z-20 flex flex-col justify-center h-full space-y-8 mt-8 md:mt-0">

          <h1 class="text-4xl md:text-5xl lg:text-6xl font-normal leading-tight tracking-tight">
            <?php echo nl2br(esc_html(get_theme_mod(
              'experience_title',
              'Experience Learning the Blue Blocks Way.'
            ))); ?>
          </h1>

          <div class="space-y-6">
            <p class="text-blue-100 text-lg font-light tracking-wide opacity-90">
              <?php echo esc_html(get_theme_mod(
                'experience_subtext',
                'Book Admission Workshop!'
              )); ?>
            </p>

            <a
              href="<?php echo esc_url(get_theme_mod('experience_btn_link', '#')); ?>"
              class="inline-flex items-center justify-between px-6 py-3 bg-white text-primary rounded-full hover:bg-gray-100 transition-colors duration-200 font-medium group w-auto max-w-xs"
            >
              <span class="mr-4 text-black">
                <?php echo esc_html(get_theme_mod(
                  'experience_btn_text',
                  'Book Admission Workshop'
                )); ?>
              </span>

              <span class="material-symbols-outlined text-sm transform group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform duration-200 text-black">
                arrow_outward
              </span>
            </a>
          </div>

        </div>

        <!-- RIGHT IMAGE -->
        <div class="absolute right-0 bottom-0 w-full md:w-3/5 lg:w-1/2 h-[120%] md:h-[130%] pointer-events-none flex items-end justify-end translate-y-12 md:translate-y-16 lg:translate-y-20 translate-x-4 md:translate-x-12 lg:translate-x-20">
          <div class="relative w-full h-full">

            <div class="absolute inset-0 bg-white dark:bg-gray-800 rounded-tl-[100px] transform translate-x-2 translate-y-2 shadow-xl z-0 hidden lg:block"
                 style="clip-path: polygon(20% 0%, 100% 0, 100% 100%, 0 100%, 0 25%);">
            </div>

            <img
              src="<?php echo esc_url(
                get_theme_mod(
                  'experience_image',
                  get_template_directory_uri() . '/assets/images/experience.jpg'
                )
              ); ?>"
              alt="Experience <?php bloginfo('name'); ?>"
              class="w-full h-full object-cover object-left-bottom shadow-2xl z-10 relative drop-shadow-2xl"
              style="clip-path: polygon(20% 5%, 100% 0, 100% 100%, 0 100%, 0 25%);"
            />

          </div>
        </div>

      </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-background-light dark:from-background-dark to-transparent z-0 pointer-events-none"></div>
  </main>
</div>




<!-- ========================= -->

<?php get_footer(); ?>




















