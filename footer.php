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

<?php

	if (is_singular() && get_option( 'thread_comments' )) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_footer();

?>
</body>
</html>
