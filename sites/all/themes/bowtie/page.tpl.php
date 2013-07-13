<?php print render($page['header']); 
global $base_url;
?>
	<div id="top-bg"></div>
	<div class="container_12" id="header" >

		<!-- Search form -->
		<div id="header_search_form">
		<?php print render($page['search']); ?>
		</div>	

		<header>		
			<!-- Logo Here -->
			<a href="<?php print check_url($front_page); ?>">
				<div id="logo" class="grid_4"></div><!-- end #logo .grid_4 -->
			</a>			
			<!-- Main Navigation Here -->
			<nav id="top_nav" class="grid_8">
        <?php print bowtie_menu_top() ?>
			</nav> <!-- end #top-nav .grid_8 -->
		</header>		
		<div class="clear"></div>		
	</div> <!-- end #container_12 #header -->
	<div class="clear"></div>
	
	<!-- BEGIN CALL TO ACTION -->
	<div class="inner-cta-wrap">
		<div id="call-to-action" class="container_12">			
			<!-- TOP SENTENCE -->
			<div id="cta-top" class="grid_12">
				<h2 class="inner-title"><?php print $title; ?></h2>
			</div> <!-- end #cta-top .grid_6 .alpha -->			
		</div> <!-- end .container_12 #call-to-action -->
	</div><!-- end .cta-wrap -->
	
	<div class="clear"></div>
	
	<!-- Begin Main Body -->
	<div class="container_12" id="body-wrap" role="main">
	
		<div id="breadcrumb-wrap" class="grid_12">
      <?php print $breadcrumb; ?>			
		</div>
    <?php if (isset($messages)) { print '<div class="clear"></div>' . $messages . '<div class="clear"></div>'; } ?>
    <?php if($tabs) { print '<div class="clear"></div>' . render($tabs) . '<div class="clear"></div>'; } ?>
		<?php if (arg(0) == 'node' and theme_get_setting('tm_blog') and (isset($page['sidebar_top']) or isset($page['sidebar_tab']) or isset($page['sidebar_bottom'])) and (isset($page['content']['system_main']['nodes'][arg(1)]['#bundle']) and  $page['content']['system_main']['nodes'][arg(1)]['#bundle'] != 'full_width')) { ?>
      <?php if (theme_get_setting('tm_blog') == 1) { ?>      		
		    <div id="sidebar" class="grid_4 suffix_1">
	        <?php render($page['sidebar_tab']); print render($page['sidebar_top']) . bowtie_set_tabs(null, null, null, true) . render($page['sidebar_bottom']); ?>
		    </div>
		    <div id="post-content-wrap" class="grid_7 p_node">
          <?php print render($page['content']); ?>
		    </div>
      <?php } else { ?>
 		    <div id="post-content-wrap" class="grid_7 suffix_1 p_node">
          <?php print render($page['content']); ?>
		    </div>
		    <div id="sidebar" class="grid_4">
	        <?php render($page['sidebar_tab']); print render($page['sidebar_top']) . bowtie_set_tabs(null, null, null, true) . render($page['sidebar_bottom']); ?>
		    </div>
      <?php } ?>
    <?php } elseif ((arg(0) == 'blog' or arg(0) == 'taxonomy' or arg(0) == 'contact') and theme_get_setting('tm_archive') and (isset($page['sidebar_top']) or isset($page['sidebar_tab']) or isset($page['sidebar_bottom']))) { ?>
      <?php if (theme_get_setting('tm_archive') == 1) { ?>      		
		    <div id="sidebar" class="grid_4 suffix_1">
	        <?php render($page['sidebar_tab']); print render($page['sidebar_top']) . bowtie_set_tabs(null, null, null, true) . render($page['sidebar_bottom']); ?>
		    </div>
		    <div id="post-content-wrap" class="grid_7">
          <?php print render($page['content']); ?>
		    </div>
      <?php } else { ?>
 		    <div id="post-content-wrap" class="grid_7 suffix_1">
          <?php print render($page['content']); ?>
		    </div>
		    <div id="sidebar" class="grid_4">
	        <?php render($page['sidebar_tab']); print render($page['sidebar_top']) . bowtie_set_tabs(null, null, null, true) . render($page['sidebar_bottom']); ?>
		    </div>
      <?php } ?>
    <?php } elseif (arg(0) == 'portfolio') { ?>
		  <div id="post-content-wrap" class="grid_12">
        <?php print render($page['content']); ?>
		  </div>
    <?php } else { ?>
		  <div id="post-content-wrap" class="grid_12">      			
			  <div id="content" >
          <?php print render($page['content']); ?>
			  </div>
		  </div>
    <?php } ?>
    
    <div id="globaltechpro_top"><a href="#top">Top</a></div>
	
	</div> <!-- end #body-wrap .container_12 -->
	
	<div class="clear"></div>
	
	<div class="clear"></div>
	<footer>
		
	<div id="home-widgets-wrap" class="open-content">
	
		<div id="home-widgets" class="container_12">
		   <?php if (isset($page['footer_widgets'])) { print render($page['footer_widgets']); } ?>
		</div> <!-- end #home-widgets .container_12 -->
			
	</div> <!-- end #home-widgets-wrap -->
	
	<div class="clear"></div>
	
		<div id="social-wrap" >
			<div id="social-icons" class="container_12">
				<ul class="grid_10 omega">
				
					<?php if (theme_get_setting('tm_ac_twitter')) { ?>
          <!-- TWITTER -->
					<li id="twitter">
					<a href="http://twitter.com/<?php print theme_get_setting('tm_ac_twitter')?>">
						<div class="fadeThis">
							<span class="hover"></span>
						</div>
					</a>
					</li>
          <?php } ?>
					
          <?php if (theme_get_setting('tm_ac_setting_0')) { ?>
					<!-- FACEBOOK -->
					<li id="facebook">
					<a href="http://facebook.com/<?php print theme_get_setting('tm_ac_setting_0')?>">
						<div class="fadeThis">
							<span class="hover"></span>
						</div>
					</a>
					</li>
          <?php } ?>

          <?php if (theme_get_setting('tm_ac_setting_1')) { ?>
					<!-- DRIBBBLE -->
					<li id="dribbble">
					<a href="http://dribbble.com/<?php print theme_get_setting('tm_ac_setting_1')?>">
						<div class="fadeThis">
							<span class="hover"></span>
						</div>
					</a>
					</li>
          <?php } ?>
				
          <?php if (theme_get_setting('tm_ac_setting_2')) { ?>
					<!-- FORRST -->
					<li id="forrst">
					<a href="http://forrst.com/<?php print theme_get_setting('tm_ac_setting_2')?>">
						<div class="fadeThis">
							<span class="hover"></span>
						</div>
					</a>
					</li>
          <?php } ?>

					<!-- RSS -->
					<li id="rss">
					<a href="<?php print url('rss.xml'); ?>">
						<div class="fadeThis">
							<span class="hover"></span>
						</div>
					</a>
					</li>
					
					<!-- CONTACT -->
					<li id="contact">
					<a href="<?php print url('contact'); ?>">
						<div class="fadeThis">
							<span class="hover"></span>
						</div>
					</a>
					</li>
					
				</ul>

				<?php print bowtie_set_sharebar(NULL, TRUE) ?>

			</div><!-- end .container_12 -->
		</div> <!-- end #social-wrap -->
		
		<div id="copyright-wrap">
			
			<div class="container_12">
				<div id="copyright" class="grid_12 omega">
          <?php if (isset($page['footer_copyright'])) { print render($page['footer_copyright']); } ?>
          <?php print bowtie_menu_footer() ?>
				</div>
			</div><!-- end #copyright -->
			
		</div> <!-- end #footer-widget-wrap -->
		
	</footer>

<?php //print '<pre>'. check_plain(print_r($page['content'], 1)) .'</pre>'; ?>