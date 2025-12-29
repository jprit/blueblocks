<?php get_header(); ?>

<main class="max-w-7xl mx-auto px-6 py-16">
  
  <?php if (have_posts()) : ?>
    
    <?php while (have_posts()) : the_post(); ?>
      
      <article class="mb-12 border-b pb-8">
        <h1 class="text-3xl font-semibold mb-4">
          <a href="<?php the_permalink(); ?>" class="hover:text-primary">
            <?php the_title(); ?>
          </a>
        </h1>

        <div class="text-gray-600 mb-4 text-sm">
          <?php echo get_the_date(); ?>
        </div>

        <div class="prose max-w-none">
          <?php the_excerpt(); ?>
        </div>
      </article>

    <?php endwhile; ?>

  <?php else : ?>

    <p>No content found.</p>

  <?php endif; ?>

</main>

<?php get_footer(); ?>
