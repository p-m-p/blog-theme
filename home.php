<?php
/**
 * Template Name: Home page
 * Description: Home page with projects and posts
 *
 */
 
$projects = new WP_Query('category_name=projects');
$images = array();

get_header(); ?>

  <section id="featured-projects">

    <?php if ($projects->post_count > 1) : ?>
      <nav id="featured-project-nav">
        <ol id="feature-links">
          <?php for ($i = 0; $i < $projects->post_count; $i += 1) : ?>
            <li><a class="feature-link<?php if ($i === 0) echo ' current'; ?>" href="#" data-index="<?php echo $i ?>"></a></li>
          <?php endfor; ?>
        </ol>
      </nav>
    <?php endif; ?>

    <div id="feature-slides">

      <div id="feature-descriptions" class="slider-viewport">
    		<ul>
    	    <?php 
    	      while ($projects->have_posts()) : 
    	        $projects->the_post();
    	        $post = $projects->post;
    	        $image = wp_get_attachment_image_src(
    	            get_post_thumbnail_id($post->ID)
    	          , 'single-post-thumbnail'
    	        );
    			    array_push($images, $image[0]);
    	    ?>
    	
    	      <li class="feature-description dark-content-box">
    	        <h2><?php echo $post->post_title; ?></h2>
    	        <p><?php echo $post->post_content; ?></p>
    	      </li>
    	
    	    <?php endwhile; ?>
    		</ul>
    	</div>
		
  		<div id="feature-images" class="slider-viewport">
    		<ul>
    		  <?php foreach ($images as $image) : ?>
    		    <li><img class="feature-image" src="<?php echo $image; ?>"></li>
    		  <?php endforeach; ?>
    		</ul>
  		</div>
    </div>

    <footer>
      <button type="button" id="play-pause">Pause</button>
    </footer>

  </section><!-- #featured-projects -->
  
  <div id="page-content">
    <section id="posts">
      <h2 class="section-heading"><span>Latest</span> posts</h2>
  
    <?php 
      $recent_posts = new WP_Query(array('cat' => '-4', 'posts_per_page' => 5)); 
      while($recent_posts->have_posts()) : 
        $recent_posts->the_post();
        global $more;
        $more = 0;
        $post = $recent_posts->post;
        $image = wp_get_attachment_image_src(
            get_post_thumbnail_id($post->ID)
          , 'single-post-thumbnail'
        );
        $pub_date = date_parse($post->post_date_gmt);
        $permalink = get_permalink($post->ID);
    ?>
  
      <article class="post">
  
        <section class="post-excerpt ">
          <div class="post-inner">
            <h2 class="post-title"><a href="<?php echo $permalink ?>"><?php echo $post->post_title; ?></a></h2>
            <?php echo the_content(); ?>
          </div>
        </section>
  
        <aside class="post-meta">
          <div class="gap-right">
  
            <a class="post-thumbnail" href="<?php echo $permalink ?>"><img src="<?php echo $image[0]; ?>" alt=""></a>
  
            <div class="post-meta-date">
              <time class="pub-date dark-content-box" datetime="<?php echo $pub_date['year'].'-'.$pub_date['month'].'-'.$pub_date['day']; ?>" pubdate>
                <div class="pub-day"><?php echo $pub_date['day']; ?></div>
                <div class="pub-month"><?php echo date("M", mktime(0, 0, 0, $pub_date['month'])); ?></div>
                <div class="pub-year"><?php echo $pub_date['year']; ?></div>
              </time>
            </div>
  
            <div class="post-meta-comments">
              <div class="dark-content-box">
                <div class="comment-total"><?php echo $post->comment_count; ?></div>
                comments
              </div>
            </div>
  
          </div>
        </aside>
  
      </article>
  
    <?php endwhile; ?>
  
    </section><!-- #posts -->
  
    <?php get_sidebar(); ?>
  </div>
  
<?php get_footer(); ?>
