<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->

	<footer role="contentinfo">

	</footer><!-- #footer -->
</div><!-- #page -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-1.7.2.min.js"><\/script>')</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/easing.jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/box-slider.jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/box-slider-fx-scroll-3d.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/theme.js"></script>
<?php

	if (is_singular() && get_option( 'thread_comments' )) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_footer();

?>
</body>
</html>
