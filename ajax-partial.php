<?php
/**
 * Template Name: Info box partial 
 * Description: Home page with projects and posts
 *
 */

$include_page_elements = !array_key_exists('_ap', $_GET);

if ($include_page_elements) {
  get_header();
}

while ( have_posts() ) : the_post(); ?>

  <?php the_content(); ?>

<?php endwhile; ?>

<?php 

if ($include_page_elements) {
  get_sidebar(); 
  get_footer(); 
}

?>
