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
		  <?php print render($page['slide_show']); ?>
      <?php if (theme_get_setting('tm_sliders') == 2) { ?>
  	    <div id="piecemaker-wrap">
			    <div id="piecemaker">
				    <p>The slider requires Flash. Please install.</p>
			    </div>
		    </div>
      <?php } ?>      
	</div>
	<div class="clear"></div>
	
	<div class="cta-wrap">
		<div id="call-to-action" class="container_12 clearfix">
			<div class="grid_7">
				<h2><?php print $site_slogan; ?></h2>
			</div>
			<div class="cta-info grid_5" >
			  <?php if (theme_get_setting('tm_layouts') == 0 or theme_get_setting('tm_layouts') == 3) { ?>
				  <div id='tuw_div'></div>
        <?php } else { ?>
          <?php print render($page['home_testimonial']); ?>
        <?php } ?>
			</div>
		</div>
	</div>	
	<div class="clear"></div>
	
	<!-- Begin Main Body -->
	<div class="container_12" id="home-portfolio" role="main">
    <?php print render($page['home_portfolio']); ?>
	</div> <!-- end #body-wrap .container_12 -->
	<div class="clear"></div>
  <div class="container_12">
    <?php if (theme_get_setting('tm_layouts') == 2 or theme_get_setting('tm_layouts') == 3) { ?>
      <div class="grid_3"><h3><?php print t('PROFESSIONAL SERVICES'); ?></h3></div>
		  <div class="grid_9">
			  <div class="hr-pattern"></div>
		  </div>    
      <div class="clear"></div>
      <div id="home-services-wrap" class="clearfix">
        <?php print render($page['home_services']); ?>
      </div>
    <?php } else { ?>
      <div class="grid_2"><h3><?php print t('Latest Blog Post'); ?></h3></div>
      <div class="grid_10">
        <div class="hr-pattern"></div>
      </div>
      <div class="clear"></div>
      <div id="home-blog-post-wrap">
        <div id="home-blog" class="grid_9">
          <?php print render($page['home_blog_left']); ?>
        </div>
        <div id="blog-list" class="grid_3 omega">
          <?php print render($page['home_blog_right']); ?>
        </div>
      </div>
    <?php } ?>
    
  <div id="globaltechpro_top"><a href="#top">Top</a></div>
  
  </div>

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

