<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Adventure Time
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'adventure-time' ) ); ?>"><?php printf( esc_html__( 'Powered by %s', 'adventure-time' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Made with &hearts; by %1$s', 'adventure-time' ), 'Allison' ); ?>
<!-- 		  <a href="http://www.greengeeks.com" title="Web Hosting"><img src="http://www.greengeeks.com/greentags/greengeeks_hosted_120x60.gif" border="0"></a>
 -->    </div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
