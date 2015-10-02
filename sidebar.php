<?php
/* If this page is NOT in the 'Top' menu in Appearance -> Menu OR $quicklinks is true (from sidebar-quicklinks.php), $ancestorTitle is set to FALSE and the Quick Links menu is used instead. */
$ancestorTitle = ( $quicklinks ? null : returnTopMenuAncestor('Top', get_the_ID()));
?>

<div class="w-col w-col-3 <?php /** ?>hide-phone hide-landscape <?php /**/ ?>page-sidebar"><img class="leftmenu-img hide-phone hide-landscape" src="<?php echo get_template_directory_uri(); ?>/images/logo-gold-svg.svg">
	<h2 class="sidebar-header">
		<?php
		if($ancestorTitle){
			echo $ancestorTitle;
		} else {
			echo 'Quick Links';
		}
		?>
	</h2>
	<?php
	if ($ancestorTitle) {
		wp_nav_menu( array(
			'theme_location' 	=> 'nav-menu', 
			'container'			=> false,
			'depth'				=> '2',
			'menu_class'		=> 'w-list-unstyled dropdown-list leftmenu',
			'walker'			=> new Sidebar_Nav()
		) );
	} else {
		wp_nav_menu( array(
			'theme_location' 	=> 'side-menu', 
			'container'			=> false,
			'depth'				=> '1',
			'menu_class'		=> 'w-list-unstyled dropdown-list leftmenu'
		) );
	} ?>
	
	<?php if (is_active_sidebar('leftcol')): ?>
		<div class="hide-landscape hide-phone">
			<div class="divider spaceonly">
				<div>&nbsp;</div>
			</div>
			<?php dynamic_sidebar('leftcol'); ?>
		</div>
	<?php endif; ?>
	
</div>