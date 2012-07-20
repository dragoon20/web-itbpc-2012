</div><!-- //#wrapper -->

<div id="footer">

	<? /* Removing the credit is fine, but if someone asks you where you got this theme, be nice and don't lie */ ?>

	<p><?php _e('Powered by <a href="http://www.wordpress.org" title="State-of-the-art semantic personal publishing platform">WordPress</a> &amp; <a href="http://www.noscope.com/fauna/" title="Highly adaptive open-source draping for Wordpress sites">Fauna</a>','fauna'); ?><?php if(is_user_logged_in()) { ?> &nbsp; &nbsp; <a href="<?php echo get_option('siteurl'); ?>/wp-admin/"><?php _e('Site Admin', 'fauna'); ?></a><?php } ?></p>
	<!-- Visual theme based on Fauna for Wordpress, http://www.noscope.com/fauna/ -->

	<p class="feeds">
		<a class="feedicon" href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate Entries using RSS 2.0','fauna') ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon_feed.gif" alt="<?php _e('Feed','fauna'); ?>" /> <?php _e('Entries','fauna') ?></a> &nbsp; &nbsp;
		<a class="feedicon" href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('Syndicate Comments using RSS 2.0','fauna') ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon_feed.gif" alt="<?php _e('Feed','fauna'); ?>" /> <?php _e('Comments','fauna') ?></a>
	</p>

</div>

<!--<?php echo $wpdb->num_queries; ?> <?php _e('queries.','fauna'); ?> <?php timer_stop(1); ?> <?php _e('seconds.','fauna'); ?> -->
<?php wp_footer(); ?>

</body>
</html>