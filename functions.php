<?php

/*
// TABLE OF CONTENTS //
1. Menu functions
2. Sidebars
3. Utility functions
4. Other registrations
- Get ancestor page title FROM MENU, not page heriarchy
*/


// MENU FUNCTIONS //////
////////////////////////

function register_my_menus() {
  register_nav_menus(
    array(
      'nav-menu' => __( 'Top Nav Menu' ),
      'side-menu' => __( 'General Sidebar Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


// This generates the top nav menu.
class Walker_TopNav_Menu extends Walker {
    // Tell Walker where to inherit it's parent and id values
    var $db_fields = array(
        'parent' => 'menu_item_parent', 
        'id'     => 'db_id' 
    );
    /**
     * At the start of each element, output a <li> and <a> tag structure.
     * 
     * Note: Menu objects include url and title properties, so we will use those.
     */
	var $naviditeration = 0;
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $naviditeration;
        $output .= sprintf( "\n<li class='w-col w-col-2 w-col-small-2'><a href='%s' class='navlink%s' id='navid%d'>%s</a></li>\n",
            $item->url,
            ( $item->object_id === get_the_ID() ) ? ' current' : '',
			$naviditeration,
            $item->title
        );
		$naviditeration ++;
    }
}


// This generates the top nav dropdowns.

if (function_exists('simple_fields_fieldgroup')) {
	$topnav_dropdown_desc_values = simple_fields_fieldgroup('topnav_dropdown_desc',512);
	$topnav_dropdown_desc_values_defaults = simple_fields_fieldgroup('topnav_dropdown_desc_default',512);
} else {
	$topnav_dropdown_desc_values = $topnav_dropdown_desc_values_defaults = 0;
}
class Walker_TopNavDropDowns_Menu extends Walker {
    // Tell Walker where to inherit it's parent and id values
    var $db_fields = array(
        'parent' => 'menu_item_parent', 
        'id'     => 'db_id' 
    );
	var $subnaviditeration = 0;
	function start_lvl(&$output, $depth, $args=array()) {
		global $subnaviditeration;
		// If we are at a parent element, output this code to start a new div.w-row with the correct 'navid[#]-sub' id
		if( 0 == $depth) {
			$output .= sprintf(
			"\n<div class='w-row topsubnav' id='navid%d-sub'>
			\n<div class='w-col w-col-3 w-col-small-3 dropdown-leftcol'>
			\n<ul class='w-list-unstyled dropdown-list'>",
			$subnaviditeration);
		}
		parent::start_lvl($output, $depth,$args); // runs the start_lvl function in the parent class (Walker)
	}
	function end_lvl(&$output, $depth=0, $args=array()) {
		global $subnaviditeration;
		global $topnav_dropdown_desc_values;
		global $topnav_dropdown_desc_values_defaults;
		// If we are at a parent element, output this code to end the div.w-row (includes description and picture in dropdown)
		// This sprintf function can probably be used in the future to put in the correct description and image.
		if( 0 == $depth) {
			$$subnaviditeration = settype($subnaviditeration, 'integer');
			$text =  ( $topnav_dropdown_desc_values[$subnaviditeration]['topnav_dropdown_desc_text']   // exist check
					 ? $topnav_dropdown_desc_values[$subnaviditeration]['topnav_dropdown_desc_text']   // if true 
					 : $topnav_dropdown_desc_values_defaults['topnav_dropdown_desc_text_default']); // if false
			$imgURL= ( $topnav_dropdown_desc_values[$subnaviditeration]['topnav_dropdown_desc_img']['url']
					 ? $topnav_dropdown_desc_values[$subnaviditeration]['topnav_dropdown_desc_img']['image_src']['medium'][0]
					 : $topnav_dropdown_desc_values_defaults['topnav_dropdown_desc_img_default']['url']);
			$output .= sprintf(
			"\n</ul>
			\n</div>
			\n<div class='w-col w-col-6 w-col-small-6'>
			\n<p class='dropdown-p'>%s</p>
			\n</div>
			\n<div class='w-col w-col-3 w-col-small-3'><img class='dropdown-img' src='%s'>
			\n</div>
			\n</div>", $text, $imgURL);
		}
		// Increments subnaviditeration so that the next button triggers the next w.row
		$subnaviditeration ++;
		//I'm not sure what this does, but it was in the code I copied and I don't want to break it. :)
		parent::end_lvl($output, $depth,$args);
	}
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if( 0 == $depth )
			return;
		$output .= sprintf('<li><a href="%s" class="dropdown-link %s">%s</a>
            </li>',
		    $item->url,
            ( $item->object_id === get_the_ID() ) ? 'current' : '',
            $item->title
		);
		//parent::start_el(&$output, $item, $depth, $args);
    }
	
} // End class


// SIDEBARS ////////////
////////////////////////

register_sidebar(array(
	'name'          => 'Left Column - Single Page',
	'id'            => 'leftcol',
	'description'   => 'On normal pages (not including the homepage), there is a left sidebar. Widgets go there below the default nav menu.',
	'before_widget' => '<div class="w-row"><div class="w-col w-col-12">',
	'after_widget'  => '</div></div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>'
));
register_sidebar(array(
	'name'          => 'Homepage - Bottom Articles',
	'id'            => 'home-articles',
	'description'   => 'Widgets are each given a column on the homepage below the main information. Text widgets are suggested. PLEASE ONLY USE THREE MAX.',
	'before_widget' => '<div class="w-col w-col-4">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>'
));

// This is the left sidebar menu for pages. It gets all the children of the parent of the current page.
class Sidebar_Nav extends Walker_Nav_Menu {
    // Don't start the top level
    function start_lvl(&$output, $depth=0, $args=array()) {
        if( 0 == $depth )
            return;
        parent::start_lvl($output, $depth,$args);
		// parent::start_lvl() means run the start_lvl() function from the extended class (Walker_Nav_Menu)
    }
    // Don't end the top level
    function end_lvl(&$output, $depth=0, $args=array()) {
        if( 0 == $depth )
            return;
        parent::end_lvl($output, $depth,$args);
    }
    // Don't print top-level elements
    function start_el(&$output, $item, $depth=0, $args=array()) {
		if( 0 == $depth )
			return;
		parent::start_el($output, $item, $depth, $args);
    }
    function end_el(&$output, $item, $depth=0, $args=array()) {
        if( 0 == $depth )
            return;
        parent::end_el($output, $item, $depth, $args);
    }
    // Only follow down one branch
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        // Check if element as a 'current element' class
        $current_element_markers = array( 'current-menu-item', 'current-menu-parent', 'current-menu-ancestor' );
        $current_class = array_intersect( $current_element_markers, $element->classes );
        // If element has a 'current' class, it is an ancestor of the current element
        $ancestor_of_current = !empty($current_class);
        // If this is a top-level link and not the current, or ancestor of the current menu item - stop here.
        if ( 0 == $depth && !$ancestor_of_current)
            return;
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}


// UTILITY FUNCTIONS ///
////////////////////////

/* These two functions find the most ancestral parent of the page passed in ($childID) BASED ON THE APPEARANCE -> MENU menu passed in ($menuname), NOT based on page hierarchy. It then echoes the requested element ($objElem) of that page. */
$return = 0;
function returnTopMenuAncestor($menuname, $childID, $objElem = 'title') {
	global $return;
	$return = 0;
	$menu = wp_get_nav_menu_items($menuname);
	$result = find_menu_page_please_ok_thanks($childID,$menu);
	if ($result->$objElem){
		return $result->$objElem;
	} else {
		return null;
	}
}
function find_menu_page_please_ok_thanks($needle,$haystack) {
	global $return;
	// $needle is our search term. First we need to find the current page in our Appearance -> Menu menu (NOT page hierarchy).
	// We are going to look through every page in that menu (every $haystack) for the current one.
	// $listitemnumber isn't really relevant. (It's the position in line we're at going down the menu.)
	// $listitemobject is the page in that position with its details, like page id, page parent, etc
	if ($haystack){
		foreach($haystack as $listitemnumber=>$listitemobject) {
			// We want to search for the current page based on its WordPress ID
			$value = $listitemobject->object_id;
			// If we found the current page
			if($needle==$value) {
				// If the current page has a parent
				if ($listitemobject->post_parent) {
					// Run the search again with the parent, causing a loop that runs until we're at the highest page
					find_menu_page_please_ok_thanks($listitemobject->post_parent, $haystack, $return);
				} else {
				// If the current page has no parent, we're there. Return the page with its info.
					$return = $listitemobject;
					return $return;
				}
				// This part is looped; if we have a return value, we want to return it and stop the loop.
				if ($return) return $return;
			}
		}
	}
}

function get_string_between($string, $start, $end){
    $string = " ".$string;
    $ini = strpos($string,$start);
    if ($ini == 0) return "";
    $ini += strlen($start);
    $len = strpos($string,$end,$ini) - $ini;
    return substr($string,$ini,$len);
}

function str_replace_nth($search, $replace, $subject, $nth) {
    $found = preg_match_all('/'.preg_quote($search).'/', $subject, $matches, PREG_OFFSET_CAPTURE);
    if (false !== $found && $found > $nth) {
        return substr_replace($subject, $replace, $matches[0][$nth][1], strlen($search));
    }
    return $subject;
}

function printPre($value){
	ob_start();
	echo '<pre>';
	print_r($value);
	echo '</pre>';
	return ob_get_contents();
}


// OTHER REGISTRATIONS ///
//////////////////////////

function brett_add_editor_styles() {
    add_editor_style( '/css/tinymce-editor-style.css' );
}
add_action( 'admin_init', 'brett_add_editor_styles' );