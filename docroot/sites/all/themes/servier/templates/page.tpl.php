<?php
/**
 * @file
 * A single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['content']: The main content of the current page.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */

// Global header
?>


<nav id="servier" class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

<?php
	// Render the header region
	print render($page['header']);
?>

	  <a class="navbar-brand" href="#">
        <img src="../img/logo.png" alt="logo" class="logo"/>
      </a>

      <button class="bg-mobile-button navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Advocacy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pipeline & Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Ecosystem</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#news">Newsroom</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#careers">Careers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
        </ul>
      </div>
  </nav>

</header><?php

// Drupal messages and editor links
$renderedTabs = trim(render($tabs));
if ($messages || $renderedTabs || $action_links) {
	?><div class="page-toolbox"><div class="shell"><?php
		print $messages;
		print $renderedTabs;
		if ($action_links) {
			?><ul class="action-links"><?php 
				print render($action_links);
			?></ul><?php
		}
	?></div></div><?php
}

// Main content area
?><div class="page">
	
<div class="site-banner position-relative p-3 p-md-5 m-md-3 text-center">
      <div class="bleed-over">
      </div>
      <div class="bleed-over-text">
      <h1>At Servier, we dedicate everything we are today to bringing the promise of tomorrow to the patients we serve.</h1>
        <a class="btn" href="#">icon</a>
      </div>
</div> 
	
	<?php
	if ($page_manager) {
		// If Page Manager is handling the page, no extra markup is needed here
		print render($page['content']);
	} else {
		// If Page Manager isn't handling the page, display the page title and main content with simple markup
		?><?php
			print render($title_prefix);
			print render($title_suffix);
			if ($title) {
				?><h1><?php print $title; ?></h1><?php
			}
			print render($page['content']);
		?><?php
	}
?>


    <div class="container bleed-pad">
      <div class="px-md-12">
        <div class="my-3 p-3">
          <p class="lead">Servier is strengthening its presence in the United States, the world's premier market for pharmaceutical products <sup class="blue-note">1</sup></sup></p>
          <p class="blue-note-desc"><sup>1</sup> The United States represents 47% of the global market for healthcare products.</p>
        </div>
      </div>
    </div>

    <div class="container text-center">
        <div class="px-md-12">
          <div class="my-3 p-3">
            <h2 class="bold-title">Servier in the U.S. at a glance</h2>
          </div>
        </div>
      </div>

    <div class="circle-container justify-content-between container d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
        <div class="text-center">
          <div class="my-3 p-3 circles circles-orange">
            <p class="lead"><span class="lead-numbers">80+</span> Employees</p>
          </div>
        </div>
        <div class="text-center">
          <div class="my-3 py-3 circles circles-purple">
            <p class="lead"><span class="lead-numbers">2</span> Entities*</p>
          </div>
        </div>
        <div class="text-center">
          <div class="my-3 py-3 circles circles-blue">
            <p class="lead"><span class="lead-numbers">10+</span> Partnerships</p>
          </div>
        </div>
      </div>



          <div class="information">
            <p class="lead copyright">*Servier BioInnovation and Servier Pharmaceuticals</p>
          </div>
   

      <div class="bg-light">
        <div class="px-md-12 container">
          <div class="my-3 p-3 text-center">
            <div class="bold-title bold-title-stripe">Pipline & Products</div>
          
            <p class="lead">We have a devicive pipline spearheader to address critical and unmet needs.</p>
          
          </div>

          <!-- setup the accordion list -->
          <ul class="accordion-menu">
            <li class="accordion-menu-panel text-center">menu 1 <span class="js-action closed">+</span></li>
            <li class="accordion-menu-panel text-center">menu 2 <span class="js-action closed">+</span></li>
            <li class="accordion-menu-panel text-center">menu 3 <span class="js-action closed">+</span></li>
            <li class="accordion-menu-panel text-center">menu 4 <span class="js-action closed">+</span></li>
          </ul>

        </div>
      </div> 

    <div class="bg-none">
      <div class="container text-center">
        <div class="px-md-12">
          <div class="my-3 p-3">
            <h2 class="bold-title bold-title-stripe">Ecosystem</h2>
            <p class="lead">We believe co-creation is fundamental to driving innovation.</p>
          </div>
          <img src="../../assets/collective_logos.jpg" alt="collective logos" class="logo-stretch" />
        </div>
      </div>  
    </div>    

  <div class="bg-news" name="news">
      <div class="container">
        <div class="news-header">
          <div class="my-3 p-3 text-center">
            <h2 class="bold-title bold-title-stripe--invert">Newsroom</h2>
          </div>
          
        </div>
        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
          <div class="mr-md-3 pt-3 px-3 pt-md-5 px-md-5 overflow-hidden">
            <div class="my-3 py-3">
              <p class="lead">short blurb text
              <span class="lead-date">30/12/2018</span>
              </p>
              <a href="#newsarticle" class="ghost-button">Press Release</a>
            </div>
          </div>
          <div class="mr-md-3 pt-3 px-3 pt-md-5 px-md-5 overflow-hidden">
            <div class="my-3 py-3">
              <p class="lead">short blurb text
              <span class="lead-date">30/12/2018</span>
              </p>
              <a href="#newsarticle" class="ghost-button">Press Release</a>
            </div>
          </div>
          <div class="mr-md-3 pt-3 px-3 pt-md-5 px-md-5 overflow-hidden">
            <div class="my-3 py-3">
              <p class="lead">short blurb text
              <span class="lead-date">30/12/2018</span>
              </p>
              <a href="#newsarticle" class="ghost-button">Press Release</a>
            </div>
          </div>
        </div>
      </div>  
    </div>  


    <div class="bg-careers" name="careers">
      <div class="container">
          <div class="row">
              <div class="push-6 col-sm col-12">
                <h2 class="bold-title bold-title-stripe">Careers</h2>
                <p class="intro">Work at servier and experience a long-term relationship of trust.</p>
                <p class="lead">At Servier, our ambition is for you to experience a long-term relationship of trust that will encourage you to express your qualities and further develop your skills.</p>
                <a href="#newsarticle" class="ghost-button ghost-button--careers">Open Positions</a>
              </div>
          </div>
        </div>
    </div>  

</div>

<?php

// Global footer
?>

<div class="bg-light footer">
        <div class="px-md-12 container">
          <div class="my-3 p-3 text-center">
            <div class="bold-title">Contact Us</div>
          
            <p class="lead">For additional information about Servier Pharmaceuticals and to learn<br/>how to collaborate with us, please contact:</p>
          
            </div>

            <div class="row foot-border">
              <div class="col-sm foot-border-right">
                <h4>Servier Pharmaceuticals</h4>
                <p>Pier Four, Seaport District<br/>Boston MA, 02110<br/><a href="tel:1-617-555-1212">+ 1 617.555.1212</a></p>
              </div>
              <div class="col-sm foot-border-right">
                <h4>Media Inquiries</h4>
                <p class="foot-border-bottom">Email: <a href="mailto:media@servierus.com">media@ServierUS.com</a></p>
                <h4>General Inquiries</h4>
                <p>Email: <a href="mailto:info@servierus.com">info@ServierUS.com</a></p>
              </div>
              <div class="col-sm">
                <h4>Sign Up for Updates</h4>
                <form><input type="text"/><input type="button" value="go"/></form>
              </div>
            </div>

            <div class="row footer-end">
              <div class="col-lg-3 col-md-6 col-12">
                <a class="navbar-brand" href="#">
                  <img src="../../icons/logo.png" alt="logo" class="logo"/>
                </a>
                
              </div>
              <div class="col-lg-6 col-md-6 col-12">
                <p>&copy; Servier - Latest update : October 2018. 
                <a href="#">Terms</a> | <a href="#">Privacy</a></p>
              </div>
              <div class="col-lg-3 col-md-12 col-12">
                <p><a href="#">Twitter</a> | <a href="#">LinkedIn</a></p>
              </div>
            </div>

        </div>
      </div> 

<!-- <footer class="page-footer"><div class="shell"><?php
	// Render the main footer region
	print render($page['footer']);
?></div></footer> -->

<?php
