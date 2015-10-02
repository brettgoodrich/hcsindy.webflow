      <div class="w-row">
        <div class="w-col w-col-6"></div>
        <div class="w-col w-col-6"></div>
      </div>
    </div>
	<div class="w-container footer">
      <div class="divider hide-landscape">
        <div>&nbsp;</div>
      </div>
      <div class="w-row">
        <div class="w-col w-col-6 footer-leftcol"><img class="landscape-only landscape-only-inline-block" src="<?php echo get_template_directory_uri(); ?>/images/logo-gold-svg.svg">
          <h6>horizon christian school</h6>
          <p>7702 Indian Lake Rd
            <br>Indianapolis, IN 46236
            <br>(317) 823-4538</p>
        </div>
        <div class="w-col w-col-6 footer-rightcol">
			<?php
				wp_nav_menu( array(
					'theme_location'	=> 'footer-menu',
					'menu_class'		=> 'footer-links',
					'container'			=> false,
					'before'			=> '<div class="bullet">&bull;</div>'
				) );
			?>
          <div class="w-clearfix footer-links" style="display:none;"><a class="footer-link" href="#">Employment</a>
            <div class="bullet">&nbsp;•&nbsp;</div><a class="footer-link" href="#">Apply</a>
            <div class="bullet">&nbsp;•&nbsp;</div><a class="footer-link" href="#">Directions</a>
            <div class="bullet">&nbsp;•&nbsp;</div><a class="footer-link" href="#">Contact</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/webflow.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/hcsindy.addedscripts.js"></script>
  <?php wp_footer(); ?>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>