<?php

get_header(); ?>
  
        <div class="w-col w-col-6 content-leftcol">
          <h2 class="first-heading">On the Calendar</h2>

			<?php $calendar_query = new WP_Query( 'category_name=on-the-calendar&posts_per_page=-1' );
			while ( $calendar_query->have_posts() ) : $calendar_query->the_post();?>
				<div class="w-clearfix list-item"><img class="list-item-image" src="<?php echo get_template_directory_uri(); ?>/images/lionhead_flat_black.png">
					<h4 class="list-item-h4">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h4>
					<?php the_content(); ?>
					<a class="news-item-link" href="<?php the_permalink(); ?>" rel="bookmark" title="Read More">Read More &gt;</a>
				</div>
			<?php endwhile; ?>

        </div>
        <div class="w-col w-col-6 content-rightcol">
          <div>
            <h2 class="first-heading">Announcements</h2>

			<?php $announcements_query = new WP_Query( 'category_name=announcements&posts_per_page=-1' );
			while ( $announcements_query->have_posts() ) : $announcements_query->the_post();?>
				<div class="w-clearfix list-item"><img class="list-item-image" src="<?php echo get_template_directory_uri(); ?>/images/lionhead_flat_black.png">
					<h4 class="list-item-h4">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h4>
					<?php the_content(); ?>
					<a class="news-item-link" href="<?php the_permalink(); ?>" rel="bookmark" title="Read More">Read More &gt;</a>
				</div>
			<?php endwhile; ?>

<?php /*/ Note the differences between the one with the image-fullwidth and the one without. ?>
            <h4 class="list-item-h4 image-fullwidth">Kroger Community Rewards Program</h4>
            <div class="w-clearfix list-item"><img class="list-item-image fullwidth" src="<?php echo get_template_directory_uri(); ?>/images/rogerkroger-300x184.jpg">
              <p>Horizon Christian School just recently applied for the Kroger Community Rewards Program! Whenever you shop at Kroger and use your Kroger Plus Card, Horizon Christian School will now earn rewards! It’s so easy – enroll your Kroger Plus Card today with these simple steps.</p><a class="news-item-link" href="post.html">Read More &gt;</a>
            </div>
			  
            <div class="w-clearfix list-item"><img class="list-item-image" src="<?php echo get_template_directory_uri(); ?>/images/lionhead_flat_black.png">
              <h4 class="list-item-h4">Robotics Team Receives Awards</h4>
              <p>Horizon Robotics Team competed in the City of Indianapolis VEX Robotics Competition and were awarded both the “Programming Skills Award” and the “Design Award”. &nbsp;Congratulations, team!</p><a class="news-item-link" href="post.html">Read More &gt;</a>
            </div>
<?php /**/ ?>
          </div> <?php // End Announcements ?>

          <div>
            <h2>Athletics</h2>

			<?php $athletics_query = new WP_Query( 'category_name=athletics&posts_per_page=-1' );
			while ( $athletics_query->have_posts() ) : $athletics_query->the_post();?>
				<div class="w-clearfix list-item"><img class="list-item-image" src="<?php echo get_template_directory_uri(); ?>/images/lionhead_flat_black.png">
					<h4 class="list-item-h4">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h4>
					<?php the_content(); ?>
					<a class="news-item-link" href="<?php the_permalink(); ?>" rel="bookmark" title="Read More">Read More &gt;</a>
				</div>
			<?php endwhile; ?>

          </div> <?php // End Athletics ?>
        </div>
    </div>
	<?php if (is_active_sidebar('home-articles')): ?>
		<div class="divider">
			<div>&nbsp;</div>
		</div>
		<div class="w-row">
			<?php dynamic_sidebar('home-articles'); ?>
		</div>
	<?php else:
		echo '<!-- WordPress error: home sidebar not found. -->';
	endif; ?>
  </div>
</div>
<?php get_footer(); ?>