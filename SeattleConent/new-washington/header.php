<?php session_start(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">



  <title><?php
        global $page, $paged;
        wp_title('|', true, 'right');
        bloginfo('name');
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && ( is_home() || is_front_page() ))
            echo " | $site_description";
        if ($paged >= 2 || $page >= 2)
            echo ' | ' . sprintf(__('Page %s', tk_theme_name), max($paged, $page));
        ?></title>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">



<!-- call us at  (801) 938-7708 -->
  <!-- YtW4VgKAoI8wWa3sXkJZ2_Cvdec -->
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="profile" href="http://microformats.org/profile/specs" />
<link rel="profile" href="http://microformats.org/profile/hatom" />
<meta name="verify-a" value="221432425684e3ce4563">
<link href="https://plus.google.com/112261312332061781080" rel="publisher" />

    <!--[if lt IE 9]>
       <script>
          document.createElement('header');
          document.createElement('nav');
          document.createElement('section');
          document.createElement('article');
          document.createElement('aside');
          document.createElement('footer');
       </script>
    <![endif]-->


    <!-- Favicon -->
    <?php $favicon = get_theme_option(tk_theme_name.'_general_favicon'); if(empty($favicon)) { $favicon = get_template_directory_uri()."/style/img/favicon.ico"; }?>
    <link rel="shortcut icon" href="<?php echo $favicon;?>" />





    <!-- Google Analytics code -->
    <?php
        $g_analitics = get_theme_option(tk_theme_name.'_general_google_analytics');
        if( isset ($g_analitics) && $g_analitics != ''){
            echo $g_analitics;
        }
    ?>
    <!-- frontpage only meta -->
<?php // add_to_homepage(); ?>

<?php wp_head();?>
<!-- Custom CSS -->
<?php
    $custom_css = get_theme_option(tk_theme_name.'_custom_style_custom_css');
    if(isset($custom_css) && $custom_css !== ''){
        echo '<style type="text/css">'.$custom_css.'</style>';
    }
?>
<script>// jQuery.noConflict(); </script>


<!--Organization Schema -->
<script type='application/ld+json'>
{
	"@context": "http://schema.org/",
	"@type": "Organization",
	"address": {
		"@type": "PostalAddress",
		"addressCountry": "USA",
		"addressLocality": "Seattle",
		"addressRegion": "WA",
		"postalCode": " 98121",
		"streetAddress": "  2125 Western Ave #500 ",
		"email": "contact@advocateslaw.com",
		"description": "Personal Injury Law Firm in Seattle",
		"name": "The Advocates"
	},
	"awards": "Super Lawyers, The National Trial Lawyers",
	"foundingDate": "1992",
	"logo": "https://www.advocateslaw.com/wp-content/uploads/2016/10/advocates-scroll.png",
	"description": "Personal Injury Law Firm in Utah",
	"url": "https://www.advocateslaw.com",
	"name": "Advocates Law Firm"
}
</script>
<!--Attorney Schema -->
<script type='application/ld+json'>
{
	"@context": "http://schema.org/",
	"@type": "Attorney",
	"currenciesAccepted": "USD",
	"openingHours": "24/7",
	"url": "https://www.advocateslaw.com",
	"image": "https://www.advocateslaw.com/wp-content/uploads/2016/10/advocates-scroll.png",
	"paymentAccepted": "any",

	"address": {
		"@type": "PostalAddress",
		"addressCountry": "USA",
		"addressLocality": "Seattle",
		"addressRegion": "Washington",
		"postOfficeBoxNumber": "500",
		"postalCode": "98121",
		"streetAddress": " 2125 Western Ave #500 ",
		"email": "contact@advocateslaw.com",
		"telephone": "(206) 452-4200",
		"description": "Seattle Personal Injury Law Firm",
		"name": "Advocates Law"
	},
	"logo": [
		"https://www.advocateslaw.com/wp-content/uploads/2016/10/advocates-scroll.png",
		"https://www.advocateslaw.com/wp-content/uploads/2016/10/advocates-scroll.png"
	],
	"telephone": "(206) 452-4200",
	"smokingAllowed": "No",
	"description": "Seattle Advocates Law Personal Injury Law Firm",
	"name": "Advocates Law"
}
</script>



</head>

<body <?php body_class(); ?>>

<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"suf7i1aoZM0085", domain:"utahadvocates.com",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=suf7i1aoZM0085" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->



<?php do_action( 'body_open' ); ?>

<?php if ( ! isset( $content_width ) ) $content_width = 940; ?>

    <div id="fb-root"></div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=214600778739981";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <?php
        $header_left_text = get_theme_option(tk_theme_name . '_general_header_left_text');
        $header_button_text = get_theme_option(tk_theme_name . '_general_header_button_text');
        $header_button_url = get_theme_option(tk_theme_name . '_general_header_button_url');
        $header_right_text = get_theme_option(tk_theme_name . '_general_header_right_text');

        $show_slider = get_theme_option(tk_theme_name.'_general_enable_slider');

        $logo = get_theme_option(tk_theme_name.'_general_header_logo');

        $logo_margin_top = get_option(tk_theme_name . '_general_header_margin_top');
        $logo_margin_bottom = get_option(tk_theme_name . '_general_header_margin_bottom');
        $logo_margin_left = get_option(tk_theme_name . '_general_header_margin_left');
    ?>


<div id="container">
    <div class="container-narrow">

        <!-- Pre Header/Top -->
        <header>
            <div class="top">
                <div class="container">
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- Logo -->
                            <div class="logo" style="margin-top:<?php echo $logo_margin_top ?>px;margin-bottom:<?php echo $logo_margin_bottom ?>px;margin-left:<?php echo $logo_margin_left ?>px;">
                                <?php
                                    if (empty($logo)) {
                                        $logo = get_template_directory_uri() . "/style/images/logo.png";
                                    } else {
                                        $logo = get_option(tk_theme_name . '_general_header_logo');
                                    }
                                ?>
                                <a href="<?php echo home_url(); ?>"><img src="https://www.advocateslaw.com/wp-content/uploads/2016/11/final_advocates_logo-compressed-1.png" alt='<?php bloginfo('name') ?>' title="<?php bloginfo('name') ?>"/></a>
                            </div>

                            <?php
                                $phone = get_option(tk_theme_name . '_general_header_contact_phone');
                                $email = get_option(tk_theme_name . '_general_header_contact_email');
                            ?>

                          <div style="position:relative;">
                <?php if (!empty($phone) || !empty($email)) { ?>
                    <div class="header_contact rounded">
                        <?php if (!empty($phone)) { ?>
                             <div class="phone" style"z-index:99 !important;">
                                  <a onClick="ga('send', 'event', 'headerPhone', 'Click', window.location.pathname, true);" style=" color:#004865 !important;font-family: SlabBold; font-size:1.25em; padding-left: -6px;" href="tel:<?php echo stripslashes($phone); ?>">
                                      <span class="responsive-text gawcc-number-swap"><?php echo stripslashes($phone); ?></span>
                                  </a>
                            </div>
                    </div>
                        <?php } ?>
                        <?php } ?>
                        <img id="hand" src="https://www.advocateslaw.com/wp-content/uploads/2016/11/advocates-arm-new-1.png" alt="the advocates helping hand" />

     </div>

                         </div>
                        </div>
                    </div>
                </div>
            </div> 


            <!-- .top -->

            <?php if (function_exists('has_nav_menu') && has_nav_menu('primary')) { ?>
            <!-- Main Navigation -->
            <div class="menu_wrap" style="background: #baba95;">
                <div class="container">
                    <div class="navbar navbar-inverse navbar-relative-top">
                      <div class="navbar-inner">
                        <div class="container">
                          <a href="utahadvocates.com"><img class="mobileLogo" src="/wp-content/uploads/2016/11/mobileLogo.jpg" alt"mobile image" /></a>
                          <div class="mobileNumberContainer"><a href="tel:+12065424200" class="mobileNumber">801-326-0809</a></div>
                          <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </a>
                          <div class="nav-collapse collapse navbar-responsive-collapse">

                                <?php

                                    wp_nav_menu( array(
                                        'menu'       => 'primary',
                                        'theme_location' => 'primary',
                                        'depth'      => 0,
                                        'container'  => false,
                                        'menu_class' => 'nav',
                                        'fallback_cb' => 'wp_page_menu',
                                        'items_wrap'      => '<ul id="%1$s" class="%2$s responsive-text">%3$s</ul>',
                                        //Process nav menu using our custom nav walker
                                        'walker' => new twitter_bootstrap_nav_walker()));
                                ?>

                          </div>
                        </div>
                      </div><!-- /navbar-inner -->
                    </div>
                </div>
            </div><!-- /menu_wrap -->
            <?php } ?>


        </header>