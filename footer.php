		</div><!-- #main -->
		<div class="modal fade in" id="siteMapmodal" tabindex="-1" role="dialog" aria-labelledby="siteMapLabel" aria-hidden="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
						<h2 class="modal-title" id="myModalLabel"><?PHP echo get_bloginfo ( 'name' ); ?></h2>
					</div>
					<div class="modal-body">
					<?PHP
					
						if(get_theme_mod("scan_page")=="on"):
							
							$oeru_theme = get_option( 'oeru_theme' );
							echo $oeru_theme['scan_page_html'];
						
						else:
						
							if(get_option('oeru_theme_scan_page_html')):
							
								echo get_option( 'oeru_theme_scan_page_html');
								
							endif;
	
						endif;
						
					?>
					</div>
				</div>
			 </div>
		</div>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="entry-header container">
				<?php get_sidebar("sidebar-1"); ?>
			</div>
		</footer><!-- #colophon -->
	</div><!-- #page -->
	<?php wp_footer(); ?>
</body>
</html>