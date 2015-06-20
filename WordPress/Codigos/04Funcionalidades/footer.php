	</section>
	<footer class="container  footer">
		<div class="item">
			<?php wp_pagenavi(); ?>			
		</div>
		<?php
		$defaults = array(
			'theme_location' => 'menu_social',
			'container' => 'nav',
			'container_class' => 'item nav nav-main',
			'container_id' => 'nav-social'
		);

		wp_nav_menu( $defaults );
		?>
		<div class="item">
			Pié de página
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>