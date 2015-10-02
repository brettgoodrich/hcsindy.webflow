<?php

get_header();

the_post();

get_sidebar();

?>

        <div class="w-col w-col-9 w-clearfix content-paragraphs">
          <h2 class="landscape-only">Academics</h2>
          <ul class="w-list-unstyled dropdown-list leftmenu phone-only landscape-only">
            <li class="dropdown-listitem"><a class="dropdown-link" href="#">Elementary</a>
            </li>
            <li><a class="dropdown-link" href="#">Middle School</a>
            </li>
            <li><a class="dropdown-link" href="#">High School</a>
            </li>
            <li><a class="dropdown-link" href="#">Discovery</a>
            </li>
            <li><a class="dropdown-link" href="#">Gardening Program</a>
            </li>
          </ul>
          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>
        </div>
      </div>
    </div>
<?php

get_footer();

?>