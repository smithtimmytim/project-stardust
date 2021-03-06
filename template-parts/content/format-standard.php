<?php
/**
 * Standard Template
 * 
 * @package Stardust
 * 
 */
use function Stardust\Utility\widont;
?>

<article <?php post_class('entry h-entry'); ?>>
  <header class="entry__header">
    <div class="entry__taxonomy"><?php the_category(' '); ?></div>
    <h1 class="entry__title headline">
      <a href="<?php the_permalink(); ?>"><?php echo widont(get_the_title()); ?></a>
    </h1>
    <?php if (has_excerpt()) : ?>
      <h2 class="entry__subtitle"><?php echo widont(get_the_excerpt()); ?></h2>
    <?php endif; ?>
    <div class="entry__meta">
      <a href="<?php the_permalink(); ?>" class="entry__date u-url"><time class="dt-published" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('D, M jS, Y'); ?></time></a>
    </div>

    <?php 
      if ( get_post_meta( get_the_ID(), 'rating', true ) ) {
        get_template_part(
          'template-parts/svg/svg_rating'
        );
      } 
      ?>
  </header>

  <?php if (has_post_thumbnail()) : ?>
    <figure class="entry__featured-image">
      <?php the_post_thumbnail('medium_large'); ?>
      <?php if (get_the_post_thumbnail_caption()) : ?>
        <figcaption class="entry__featured-image-caption"><?php the_post_thumbnail_caption(); ?></figcaption>
      <?php endif; ?>
    </figure>
  <?php endif; ?>

  <div class="e-content entry__content hyphens">
    <?php the_content(); ?>
  </div>

  <?php if (is_singular('post')) : ?>
    <footer class="entry__footer">
      <?php

        // Add Post Tags
        get_template_part(
          'template-parts/content/post-tags'
        );

        // Add Post Syndication
        get_template_part(
          'template-parts/content/post-syndication'
        );
        ?>
      <?php if (comments_open() || get_comments_number() > 0) : ?>
        <div id="post-discussion" class="entry-comments">
          <div class="entry-comments__comments">
            <?php comments_template(); ?>
          </div>

        </div>
      <?php endif; ?>
    </footer>
  <?php endif; ?>

</article>
