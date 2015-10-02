<?php

get_header();

$thispost = get_post(479);

get_sidebar('quicklinks');

?>

        <div class="w-col w-col-9 w-clearfix content-paragraphs">
          <h1><?php echo $thispost->post_title; ?></h1>
		  <p><?php echo $thispost->post_content; ?></p>
        </div>
      </div>
      <div class="w-row">
        <div class="w-col w-col-6"></div>
        <div class="w-col w-col-6"></div>
      </div>
    </div>

<?php

get_footer();

?>