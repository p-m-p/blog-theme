<?php
/**
 * Template Name: Home page
 * Description: Home page with projects and posts
 *
 */

get_header(); ?>

  <section id="featured-projects">

    <nav id="featured-project-nav">
      <ol id="feature-links">
        <li><a class="feature-link" href="" title="">Project title</a></li>
        <li><a class="feature-link current" href="" title="">Project title</a></li>
        <li><a class="feature-link" href="" title="">Project title</a></li>
        <li><a class="feature-link" href="" title="">Project title</a></li>
      </ol>
    </nav>

    <div id="feature-slides">

      <figure class="featured-project">
        <figcaption class="feature-desc dark-content-box">
          <h2>Pong TURBO</h2>
          <p>Cras laoreet tortor vel velit porta sodales ultricies metus eleifend. Vivamus ut ipsum quis ipsum malesuada hendrerit eget et erat. Donec vel aliquam nibh. Aenean dapibus feugiat egestas. Morbi sed bibendum ligula. Praesent id nisi nec nibh placerat malesuada. Curabitur quis leo vitae elit mollis viverra eu rhoncus velit.</p>
        </figcaption>
        <img class="feature" src="" alt="">
      </figure>

    </div>

    <footer>
      <a href="" rel="prev">Previous project</a>
      <a href="" rel="next">Next project</a>
    </footer>

  </section>

  <?php while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'content', get_post_format() ); ?>

  <?php endwhile; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
