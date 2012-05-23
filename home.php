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

    <?php 
      $projects = new WP_Query('category_name=projects');
      while ($projects->have_posts()) : 
        $projects->the_post();
        $post = $projects->post;
        $image = wp_get_attachment_image_src(
            get_post_thumbnail_id($post->ID)
          , 'single-post-thumbnail'
        );
    ?>

      <figure class="featured-project">
        <figcaption class="feature-desc dark-content-box">
          <h2><?php echo $post->post_title; ?></h2>
          <p><?php echo $post->post_content; ?></p>
        </figcaption>
        <img class="feature" src="<?php echo $image[0]; ?>" alt="">
      </figure>
    </div>

    <?php endwhile; ?>

    <footer>
      <a href="" rel="prev">Previous project</a>
      <a href="" rel="next">Next project</a>
    </footer>

  </section><!-- #featured-projects -->

  <section id="posts">
    <h2>Latest posts</h2>

  <?php 
    $recent_posts = new WP_Query(array('cat' => '-4', 'posts_per_page' => 5)); 
    while($recent_posts->have_posts()) : 
      $recent_posts->the_post();
      $post = $recent_posts->post;
      $image = wp_get_attachment_image_src(
          get_post_thumbnail_id($post->ID)
        , 'single-post-thumbnail'
      );
      $pub_date = date_parse($post->post_date_gmt);
      $permalink = get_permalink($post->ID);
  ?>

    <article class="post">
      <section class="post-excerpt"> 
        <h2><a href="<?php echo $permalink ?>"><?php echo $post->post_title; ?></a></h2>
        <?php echo $post->post_content; ?>
        <a href="<?php echo $permalink ?>"></a>
      </section>
      <aside class="post-meta dark-content-box">
        <a href="<?php echo $permalink ?>"><img src="<?php echo $image[0]; ?>" alt=""></a>
        <time datetime="<?php echo $pub_date['year'].'-'.$pub_date['month'].'-'.$pub_date['day']; ?>" pubdate>
          <span class="pub-day"><?php echo $pub_date['day']; ?></span>
          <span class="pub-month"><?php echo date("M", mktime(0, 0, 0, $pub_date['month'])); ?></span>
          <span class="pub-year"><?php echo $pub_date['year']; ?></span>
        </time>
        <div class="comment-count">
          <span class="comment-total"><?php echo $post->comment_count; ?></span>
          comments
        </div>
      </aside>
    </article>

  <?php endwhile; ?>

  </section><!-- #posts -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
