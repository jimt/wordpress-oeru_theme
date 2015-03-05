		</div><!-- #main -->
		<div class="modal fade in" id="siteMapmodal" tabindex="-1" role="dialog" aria-labelledby="siteMapLabel" aria-hidden="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
						<h2 class="modal-title" id="myModalLabel">OCL4Ed</h2>
					</div>
				<div class="modal-body">
					<?PHP
					
						if(get_theme_mod("scan_page")=="on"):
							
							$oeru_theme = get_option( 'oeru_theme' );
							echo $oeru_theme['scan_page_html'];
							
						endif;
						
					?>
				</div>
			 </div>
		</div>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php //get_sidebar(); ?>
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>