<?php

global $base_url;	

if (drupal_is_front_page()) {
  if (theme_get_setting('tm_sliders') == 0) {
    /*-----------------------------------------------------------------------------------*/
    /*	Slider - http://slidesjs.com/                                                    */
    /*-----------------------------------------------------------------------------------*/
    drupal_add_js(drupal_get_path('theme', 'bowtie').'/js/slides.min.jquery.js');
    drupal_add_js('
      (function ($) { 
				if (jQuery().slides) {
					jQuery(\'#slider\').css({ display : \'block\' });
					jQuery("#slider").slides({
						preload: true,
						preloadImage: \''.$base_url.'/'.drupal_get_path('theme', 'bowtie').'/images/slider/loading.gif\',
						play: 0,
						width: 960,
						pause: 4500,
						slideSpeed: 1000,
						generatePagination: true,
						hoverPause: true,
						autoHeight: true
					});	
				}
      })(jQuery);
	  ', array('type' => 'inline', 'scope' => 'footer', 'weight' => 5));
  }
}

/* bowtie_breadcrumb($breadcrumb) */

function bowtie_breadcrumb($breadcrumb) {
  //drupal_set_message('<pre>'. check_plain(print_r($breadcrumb, 1)) .'</pre>');
  if (!empty($breadcrumb['breadcrumb'])) {
	  $out = '';
    $n = count($breadcrumb['breadcrumb']);
    $i = 1;
	  foreach ($breadcrumb['breadcrumb'] as $data) {
		  if ($i == 1) $out .= ' &nbsp; '.$data.'';
      else $out .= ' &nbsp; &#62;  &nbsp; '.$data.'';
      $i++;
	  }
	  // return '<p id="breadcrumbs">'.t('You are here').':'.$out.'</p>';
	  return '<p id="breadcrumbs"><div id="breadcrumb-text">'.$out.'</div></p>';
  }
}


/* Top Categories */
function bowtie_menu_top($menu_name = 'main-menu', $type = '') {
  static $menu_output = array();

  if (!isset($menu_output[$menu_name])) {
    $tree = menu_tree_page_data($menu_name);
    $menu_output[$menu_name] = bowtie_tree_output_menu_top($tree,$type);
  }
  return $menu_output[$menu_name];
}


function bowtie_tree_output_menu_top($tree,$type) {
  $output = '';
  $items = array();

  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }

  $num_items = count($items);
  $s = $a = $d = $c = '';
  $current = $front = FALSE;
  $j = 0;
  foreach ($items as $i => $data) {
    //$s .= '<pre>'. check_plain(print_r($data, 1)) .'</pre>';
	  if ($data['link']['in_active_trail']) { 
      $a = ' class="current"'; 
      $current = TRUE;
    } 
    else { 
      $a = ''; 
    }
    if (!$j) {
      $d = '-first-'; 
    }
    else {
      $d = '';
    }
    if ($data['link']['link_path'] == '<front>') {
      $d = '-front-';
      $front = TRUE;
    }
    else {
      $d = '';
    }
    switch ($j) {
		  case 0:
			  $c = ' color="#e2e2e2"';
			  break;
		  case 1:
			  $c = ' color="#c2deea"';
			  break;
		  case 2:
			  $c = ' color="#9ac883"';
			  break;
		  case 3:
			  $c = ' color="#e8bfbf"';
			  break;
		  case 4:
			  $c = ' color="#eab174"';
			  break;
		  default:
			  $c = ' color="#eab174"';
	  }
    $j++;
    if ($data['below']) {
	  $output .= '<li'.$a.$d.$c.'><a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>' . bowtie_tree_output_menu_top2($data['below']) ."</li>";
    }
    else {
	  $output .= '<li'.$a.$d.$c.'><a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>'."</li>";
    }
  }
  if ($current) { 
    $output = str_replace(array('-front-', '-first-'), '', $output); 
  } 
  else { 
    if ($front) {
      $output = str_replace(array('-front-', '-first-'), array(' class="current"', ''), $output);
    }
    else {
      $output = str_replace(array('-first-', '-front-'), array(' class="current"', ''), $output);
    }
  }
  return $output ? '<ul id="main-nav" class="sf-menu">'. $output .'</ul>'.$s : '';
}

function bowtie_tree_output_menu_top2($tree) {
  $output = '';
  $items = array();

  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }
  $num_items = count($items);
  foreach ($items as $i => $data) {

	if ($data['link']['in_active_trail']) $a = ''; else $a = '';

	if ($data['below']) {
		$output .= '<li'.$a.'><a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>'.bowtie_tree_output_menu_top2($data['below'])."</li>";
	}
    else {
	  $output .= '<li'.$a.'><a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>'."</li>";
    }
  }
  return $output ? '<ul>'. $output .'</ul>' : '';
}

/* Top Categories */
function bowtie_menu_footer($menu_name = 'menu-footer-menu', $type = '') {
  static $menu_output = array();

  if (!isset($menu_output[$menu_name])) {
    $tree = menu_tree_page_data($menu_name);
    $menu_output[$menu_name] = bowtie_tree_output_menu_footer($tree,$type);
  }
  return $menu_output[$menu_name];
}


function bowtie_tree_output_menu_footer($tree,$type) {
  $output = '';
  $items = array();

  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }

  $num_items = count($items);
  foreach ($items as $i => $data) {
	  $output .= '<li><a href="'.url($data['link']['href']).'">'.$data['link']['title'].'</a>'."</li>";
  }
  return $output ? '<ul class="footer-nav">'. $output .'</ul>' : '';
}


function bowtie_set_sharebar($content, $isout = false) {
  static $resl = '';
  if ($content) {
    $resl .= $content;
  }
  if ($isout and $resl) {
	  return '<div id="share" class="grid_2"><div class="fadeThis"><span class="hover"></span><a id="various1" href="#inline1" title="Share this website with the world!" ><span>Share this site</span></a></div><div class="hidden"><div id="inline1">'.$resl.'</div></div></div>';
  }
}

function bowtie_pager($variables) {
  $tags = $variables['tags'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $quantity = $variables['quantity'];
  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.

  $li_first = theme('pager_first', array('text' => (isset($tags[0]) ? $tags[0] : t('«')), 'element' => $element, 'parameters' => $parameters));
  $li_previous = theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : t('‹')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_next = theme('pager_next', array('text' => (isset($tags[3]) ? $tags[3] : t('›')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_last = theme('pager_last', array('text' => (isset($tags[4]) ? $tags[4] : t('»')), 'element' => $element, 'parameters' => $parameters));

  if ($pager_total[$element] > 1) {
    if ($li_first) {
      $items[] = array(
        'class' => array('pager-first'),
        'data' => $li_first,
      );
    }
    if ($li_previous) {
      $items[] = array(
        'class' => array('pager-previous'),
        'data' => $li_previous,
      );
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_previous', array('text' => $i, 'element' => $element, 'interval' => ($pager_current - $i), 'parameters' => $parameters)),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
            'class' => array('pager-current'),
            'data' => $i,
          );
        }
        if ($i > $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters)),
          );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => array('pager-next'),
        'data' => $li_next,
      );
    }
    if ($li_last) {
      $items[] = array(
        'class' => array('pager-last'),
        'data' => $li_last,
      );
    }
    return '<h2 class="element-invisible">' . t('Pages') . '</h2>' . theme('item_list', array(
      'items' => $items,
      'attributes' => array('class' => array('pager')),
    ));
  }
}



function bowtie_set_tabs($bid, $title, $content, $isout = false) {
  static $tabs = array();
  if ($bid) {
    $tabs[$bid]->bid = $bid;
    $tabs[$bid]->title = $title;
    $tabs[$bid]->content = $content;
  }
  if ($isout and isset($tabs) and is_array($tabs)) {
	$out_t = '';
	$out_c = '';
	$i = 1;
  $j = count($tabs);
	foreach ($tabs as $data) {
		if ($i == $j) $ac = ' class="last-tab"'; else  $ac = '';
		$out_t .= '<li'.$ac.'><a href="#tab'.$data->bid.'">'.$data->title.'</a></li>';
		$out_c .= '<div id="tab'.$data->bid.'" class="tab_content">'.$data->content.'</div>';
		$i++;
	}
	return '<div class="tabContainer left widget"><ul class="tabbed-content">'. $out_t .'</ul><div class="tabDesc">'.$out_c.'</div></div><div class="clear"></div>';
  }
}

function bowtie_set_home_video_right($bid, $title, $content, $isout = FALSE) {
  global $base_url;
  static $tabs = array();
  if ($bid) {
    $tabs[$bid]->bid = $bid;
    $tabs[$bid]->title = $title;
    $tabs[$bid]->content = $content;
  }
  if ($isout and isset($tabs) and is_array($tabs)) {
	$out_t = '';
	$out_c = '';
  $out_v = bowtie_set_home_video_left(FALSE, TRUE);
	$i = 0;
	foreach ($tabs as $datar) {
		if (!$i) $ac = ' class="selected"'; else  $ac = '';
		$out_t .= '<li><a href="#idTab'.$datar->bid.'"'.$ac.'><span>'.$datar->title.'</span></a></li>';
		$out_c .= '<div id="idTab'.$datar->bid.'" class="tabssection"><div class="css-scrollbar simple">'.$datar->content.'</div></div>';
		$i++;
	}
	return '<div id="banner">'.$out_v.'<div id="paginate-slider2"><div class="usual"><ul class="idTabs">'. $out_t .'</ul>'.$out_c.'</div></div><div class="clear"></div></div><script type="text/javascript" src="'.$base_url.'/'.drupal_get_path('theme', 'bowtie').'/js/banner.js"></script>';
  }
}


/* bowtie_user_menu_top($logged_in) */
function bowtie_user_menu_top($logged_in, $front_page) {
  global $user;
  $output = '';
  //<li><a href="#">Mature Warning: On</a></li>
  if (!$logged_in) { 
    $output .= '<li>'.l('Log in','user').'</li>';
    $output .= '<li>'.l('Register','user/register').'</li>';
  } else {
    $output .= '<li>'.l('Log out','user/logout').'</li>';
    $output .= '<li>'.l('Account','user/'.$user->uid).'</li>';
  }
  return '<ul><li class="first"><a href="'.check_url($front_page).'" name="toppage">'.t('Home').'</a></li>'. $output .'</ul>';
}


function bowtie_menu_tree($tree) {
  return '<ul>'. $tree['tree'] .'</ul>';
}

function bowtie_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';
  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  } //else {
    //$element['#localized_options']['attributes']['class'] += 'staticlinks';
  //}
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li>' . $output . $sub_menu ."</li>\n";
}

/**
 * Generate the HTML output for a menu item and submenu.
 *
 * @ingroup themeable
 */
 
function bowtie_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
  return '<li>'. $link . $menu ."</li>\n";
}




function bowtie_truncate_utf8($string, $len, $wordsafe = FALSE, $dots = FALSE, &$ll = 0) {

  if (drupal_strlen($string) <= $len) {
    return $string;
  }

  if ($dots) {
    $len -= 4;
  }

  if ($wordsafe) {
    $string = drupal_substr($string, 0, $len + 1); // leave one more character
    if ($last_space = strrpos($string, ' ')) { // space exists AND is not on position 0
      $string = substr($string, 0, $last_space);
      $ll = $last_space;
    }
    else {
      $string = drupal_substr($string, 0, $len);
	  $ll = $len;
    }
  }
  else {
    $string = drupal_substr($string, 0, $len);
	$ll = $len;
  }

  if ($dots) {
    $string .= ' ...';
  }

  return $string;
}

