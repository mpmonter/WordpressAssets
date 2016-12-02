<?php

global $prefix;

$post_id = $post->ID;

/* Get Team Page ID */
$get_team_id = get_option('id_team_page');

/* Enable Single Work Post */
$enable_single = get_theme_option(tk_theme_name.'_work_work_single');

/* Get columns */
$get_post_type = get_option('col_1-'.$post->ID);
$get_post_type_col_center = get_option('col_2-'.$post->ID);
$get_post_type_col_right = get_option('col_3-'.$post->ID);

/* Latest News column Title */
$latest_news_title_left = get_option('sub_news_title_left-'.$post->ID);
$latest_news_title_center = get_option('sub_news_title_center-'.$post->ID);
$latest_news_title_right = get_option('sub_news_title_right-'.$post->ID);

/* Testimonials column Title */
$sub_testimonials_left = get_option('sub_testimonial_title_left-'.$post->ID);
$sub_testimonials_center = get_option('sub_testimonial_title_center-'.$post->ID);
$sub_testimonials_right = get_option('sub_testimonial_title_right-'.$post->ID);

/* Team column Title */
$sub_team_left = get_option('sub_team_title_left-'.$post->ID);
$sub_team_center = get_option('sub_team_title_center-'.$post->ID);
$sub_team_right = get_option('sub_team_title_right-'.$post->ID);

/* Work column Title */
$sub_work_left = get_option('sub_work_title_left-'.$post->ID);
$sub_work_center = get_option('sub_work_title_center-'.$post->ID);
$sub_work_right = get_option('sub_work_title_right-'.$post->ID);

/* Ad Banner column Title */
$sub_banner_left = get_option('sub_bulder_banner_title_left-'.$post->ID);
$sub_banner_center = get_option('sub_bulder_banner_title_center-'.$post->ID);
$sub_banner_right = get_option('sub_bulder_banner_title_right-'.$post->ID);

/* Page Content column Title */
$page_content_title_left = get_option('sub_page_content_title_left-'.$post->ID);
$page_content_title_center = get_option('sub_page_content_title_center-'.$post->ID);
$page_content_title_right = get_option('sub_page_content_title_right-'.$post->ID);

?>

<div class="row-fluid part_home">


<?php
//////////////////////////////
//                          //
//      LEFT COLUMN         //
//                          //
//////////////////////////////
?>

<!-- SERVICES LEFT -->
<?php if($get_post_type == 'services') {

        $get_service = get_option('sub_services_left-'.$post->ID); ?>


        <div class="span4 ca-menu left">
            <div class="row-fluid">
                <?php
                    $args = array('post_type' => 'services', 'post_status' => 'publish', 'posts_per_page' => 1, 'p' => $get_service);

                    //The Query
                    query_posts($args);

                    //The Loop
                    if ( have_posts() ) : while ( have_posts() ) : the_post();

                    $featured_service_img = get_post_meta($post->ID, $prefix.'featured_service', true);
                    $tk_background_color = get_post_meta($post->ID, $prefix.'background_color', true);
                    $tk_headline_color = get_post_meta($post->ID, $prefix.'headline_color', true);
                    $tk_background_hover_color = get_post_meta($post->ID, $prefix.'background_hover_color', true);
                    $tk_subheadline_color = get_post_meta($post->ID, $prefix.'sub_headline_color', true);
                    $tk_text_color = get_post_meta($post->ID, $prefix.'text_color', true);
                    $tk_hover_color = get_post_meta($post->ID, $prefix.'hover_color', true);
                ?>

                <style type="text/css">
.ca-menu.left .ca-item:hover a.more_link span, .ca-menu.left .ca-item:hover h1, .ca-menu.left .ca-item:hover p{color: #fff !important;}
.ca-menu.left .ca-item:hover a.more_link span ,  .ca-menu.left .ca-item a.more_link span  {color: #fff !important;border:1px solid #fff;padding:10px 20px;}
.ca-menu .ca-item<?php echo $post->ID; ?> {background-image:url(<?php tk_get_thumb(300, 233, $featured_service_img ); ?>);}
.ca-menu .ca-sub-item<?php echo $post->ID; ?> {background-image:url('wp-content/themes/new-washington/images/home-service-bg.png');}
/*.ca-item<?php echo $post->ID; ?> .ca-main {color: #<?php echo $tk_headline_color; ?>;}
.ca-item<?php echo $post->ID; ?> .ca-sub {color: #<?php echo $tk_subheadline_color;?>}
.ca-item<?php echo $post->ID; ?> .more_link {color: #<?php echo $tk_text_color; ?>;}*/
.ca-item<?php echo $post->ID; ?> .ca-main {color: #fff;}
.ca-item<?php echo $post->ID; ?> .ca-sub {color: #fff;}
.ca-item<?php echo $post->ID; ?> .more_link {color: #fff;}
                </style>


                <div class="ca-item ca-item<?php echo $post->ID; ?> rounded">
                    <div class="ca-sub-item ca-sub-item<?php echo $post->ID; ?> rounded">
                        <a href="<?php the_permalink(); ?>">
                            <br style="clear:both" />
                            <div class="ca-content">

                                <h1 itemprop="articleSection" class="ca-main" style="color:white!important;"><?php the_title(); ?></h1>

                                <a class="more_link more_link_three" href="<?php the_permalink(); ?>"><span style="color:white;border: 1px solid #fff;padding: 10px 20px;white-space: nowrap;margin-left: -15px;"><?php echo __('Read More', tk_theme_name); ?></span></a>
                            </div>
                        </a>
                    </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </div><!-- span4 -->

<!-- NEWS LEFT -->
<?php } elseif ($get_post_type == 'news') { ?>


        <div class="span4 news">

            <script type="text/javascript">
                jQuery(window).load(function() {
                    var sliderWidth = jQuery('.flexslider-left<?php echo $post_id ?>').width();

                    if(sliderWidth < 500) {
                        var itemWidthCalc = (sliderWidth);
                    } else {
                        var itemWidthCalc = (sliderWidth - 10) / 2;
                    }

                    jQuery('.flexslider-left<?php echo $post_id; ?>').flexslider({
                        animation: "fade",
                        animationLoop: false,
                        itemWidth: itemWidthCalc,
                        itemMargin: 0,
                        controlNav: false,
                        slideshow: false,
                        controlsContainer: ".flexslider-part-left<?php echo $post_id; ?>"
                    });
                });

                // check grid size on resize event
                jQuery(window).resize(function() {
                    var getFlexslider = jQuery('.flexslider-left<?php echo $post_id ?>').html();

                    jQuery('.flexslider-part-left<?php echo $post_id ?> .flex-direction-nav').remove();
                    jQuery('.flexslider-left<?php echo $post_id ?>').remove();
                    jQuery('.flexslider-part-left<?php echo $post_id ?>').append('<div class="flexslider flexslider-left<?php echo $post_id; ?>">'+getFlexslider+'</div>');

                    var sliderWidth = jQuery('.flexslider-left<?php echo $post_id ?>').width();

                    if(sliderWidth < 500) {
                        var itemWidthCalc = (sliderWidth);
                    } else {
                        var itemWidthCalc = (sliderWidth - 10) / 2;
                    }

                    jQuery('.flexslider-left<?php echo $post_id; ?>').flexslider({
                        animation: "fade",
                        animationLoop: false,
                        itemWidth: itemWidthCalc,
                        itemMargin: 10,
                        controlNav: false,
                        slideshow: false,
                        controlsContainer: ".flexslider-part-left<?php echo $post_id; ?>",
                        minItems: 1
                    });
                });
            </script>


            <?php if(!empty($latest_news_title_left)){ ?>
                <h3 class="slider-titles"><?php echo $latest_news_title_left; ?></h3>
            <?php } ?>
            <div class="row-fluid">
                <div class="span12 home-page-border"></div>
            </div>
            <br>


            <div class="flexslider-part wider flexslider-part-left<?php echo $post_id; ?>">
                <div class="flexslider flexslider-left<?php echo $post_id; ?>">
                    <ul class="slides">
                        <?php
                            $news_post_num = get_option('sub_news_number_left-'.$post->ID);
                            $news_post_cat = get_option('sub_news_category_left-'.$post->ID);

                            if ($news_post_cat == '0') {
                                $args = array('post_status' => 'publish', 'post_type' => 'post', 'posts_per_page' => $news_post_num,);
                            } else {
                                $args = array('post_status' => 'publish', 'post_type' => 'post', 'cat' => $news_post_cat, 'posts_per_page' => $news_post_num,);
                            }

                            // The Query
                            query_posts ($args);
                            // The Loop
                            if (have_posts()): while (have_posts()) : the_post();
                            $format = get_post_format();

                            $post_day = get_the_date('d');
                            $post_month = get_the_date('M');
                            $post_year = get_the_date('Y');
                        ?>
                        <li>
                            <div class="vertical_tabs_content">
                                <div class="tab_date rounded pull-left"><span><?php echo $post_day; ?></span><?php echo $post_month; ?><br><?php echo $post_year; ?></div>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <span class="by"><?php the_author_posts_link(); ?> / <a href="<?php the_permalink(); ?>"><?php comments_number( '0', '1', '%' ); ?> <?php _e('Comments', tk_theme_name) ?></a></span>
                                <div class="clear"></div>
                                <p><?php the_excerpt_length(160); ?></p>
                                <a href="<?php the_permalink(); ?>" class="read_more"><?php _e('Read more', tk_theme_name); ?></a>
                            </div>
                        </li>
                        <?php endwhile; endif; wp_reset_query();?>
                    </ul>
                </div><!-- flexslider -->
            </div>
            <div class="clear"></div>
        </div><!-- span4 -->
<!-- TESTIMONIALS LEFT -->
<?php } elseif ($get_post_type == 'testimonials'){ ?>

        <div class="span4">

            <?php if(!empty($sub_testimonials_left)){ ?>
                <h3><?php echo $sub_testimonials_left; ?></h3>
                <div class="row-fluid">
                    <div class="span12 home-page-border"></div>
                </div>
                <br>
            <?php } ?>


            <?php
                $testimonial_post_left = get_option('sub_testimonial_left-'.$post_id);
                $random_post = get_option('sub_check_testimonials_left-'. $post_id);

                if($random_post[0] == 'yes'){
                    $args = array('post_status' => 'publish', 'post_type' => 'testimonials', 'posts_per_page' =>1, 'orderby' => 'rand');
                } else {
                    $args = array('post_status' => 'publish', 'post_type' => 'testimonials', 'posts_per_page' =>1, 'p' => $testimonial_post_left);
                }

                //The Query
                query_posts($args);

                //The Loop
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                $email_avatar = get_post_meta($post->ID, $prefix.'email', true);
                $name_user = get_post_meta($post->ID, $prefix.'job_position', true);
                $avatar = get_avatar( $email_avatar, 72);

            ?>

            <div class="row-fluid">
                <div class="span12 vertical_tabs_content tab_testimonial rounded">
                    <?php if ($email_avatar) {
                            if(isset($avatar)){ ?>
                                <div class="gravatar rounded"><?php echo $avatar; ?></div>
                    <?php } } ?>
                    <h3><?php the_title();?></h3>
                    <span class="by"><?php echo $name_user ?></span>
                    <div class="clear"></div>
                    <div class="row-fluid">
                        <div class="span12 home-page-border"></div>
                    </div>
                    <?php the_content();?>
                </div>
            </div>
            <?php endwhile; endif; ?>

        </div>
<!-- TEAM LEFT -->
<?php } elseif ($get_post_type == 'team') {

        $team_number = get_option('sub_team_number_left-'.$post->ID); ?>


        <div class="span4 team">

            <?php if(!empty($sub_team_left)){ ?>
                <h3><?php echo $sub_team_left; ?></h3>
            <?php } ?>
            <div class="row-fluid">
                <div class="span12 home-page-border"></div>
            </div>
            <br>


            <script type="text/javascript">
                jQuery(window).load(function() {
                    var sliderWidth = jQuery('.flexslider-left<?php echo $post_id ?>').width();
                    var windowWidth = jQuery(window).width();

                        if(windowWidth < 630){

                         if(sliderWidth < 320) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  if(sliderWidth < 440) {
                                var itemWidthCalc = (sliderWidth - 10) / 2;
                                var marginWidth = 10;
                            } else {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }

                        } else {

                            if(sliderWidth < 500) {

                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  {
                                var itemWidthCalc = (sliderWidth - 10 ) / 3;
                                var marginWidth = 10;
                            }
                        }

                    jQuery('.flexslider-left<?php echo $post_id; ?>').flexslider({
                        animation: "fade",
                        animationLoop: false,
                        itemWidth: itemWidthCalc,
                        itemMargin: 10,
                        controlNav: false,
                        slideshow: false,
                        controlsContainer: ".flexslider-part-left<?php echo $post_id; ?>",
                        minItems: 1
                    });
                });

                // check grid size on resize event
                jQuery(window).resize(function() {
                    var getFlexslider = jQuery('.flexslider-left<?php echo $post_id ?>').html();

                    jQuery('.flexslider-part-left<?php echo $post_id ?> .flex-direction-nav').remove();
                    jQuery('.flexslider-left<?php echo $post_id ?>').remove();
                    jQuery('.flexslider-part-left<?php echo $post_id ?>').append('<div class="flexslider flexslider-left<?php echo $post_id; ?>">'+getFlexslider+'</div>');

                    var sliderWidth = jQuery('.flexslider-left<?php echo $post_id ?>').width();
                    var windowWidth = jQuery(window).width();

                        if(windowWidth < 630){

                         if(sliderWidth < 320) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  if(sliderWidth < 440) {
                                var itemWidthCalc = (sliderWidth - 10) / 2;
                                var marginWidth = 10;
                            } else {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }

                        } else {
                            if(sliderWidth < 500) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        }

                    jQuery('.flexslider-left<?php echo $post_id; ?>').flexslider({
                        animation: "fade",
                        animationLoop: false,
                        itemWidth: itemWidthCalc,
                        itemMargin: 10,
                        controlNav: false,
                        slideshow: false,
                        controlsContainer: ".flexslider-part-left<?php echo $post_id; ?>",
                        minItems: 1
                    });
                });
            </script>


            <div class="flexslider-part flexslider-three wider flexslider-part-left<?php echo $post_id; ?>">
                <div class="flexslider flexslider-left<?php echo $post_id; ?>">
                    <ul class="slides">
                        <?php
                            $args = array('post_status' => 'publish', 'post_type' => 'team-members', 'posts_per_page' =>$team_number, 'meta_key'=>'_thumbnail_id');
                            // The Query
                            query_posts ($args);
                            // The Loop
                            if (have_posts()): while (have_posts()) : the_post();
                            $tk_member_title = get_post_meta($post->ID, $prefix.'title_info', true);
                            $post_link = get_permalink($get_team_id).'#'.$post->post_title;
                        ?>
                        <li>
                            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                <div class="<?php if (has_post_thumbnail()) { echo 'flipper'; } ?>">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <div class="front rounded">
                                            <?php the_post_thumbnail('teammembers-slide-big'); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="back rounded <?php if (!has_post_thumbnail()) { echo 'fixed'; } ?>">
                                        <div class="team-wrap">
                                            <div class="team-cell">
                                                <h3><a href="<?php echo $post_link; ?>"><?php the_title(); ?></a></h3>
                                               <?php if(!empty($tk_member_title)){ ?><span class="member_title"><?php echo $tk_member_title; ?></span><?php } ?>
                                            </div><!-- team-cell -->
                                        </div><!-- team-wrap -->
                                    </div>
                                </div>
                           </div>
                        </li>
                        <?php endwhile; endif; wp_reset_query(); ?>
                    </ul>
                </div>
            </div>

        </div><!-- span4 -->
<!-- WORK LEFT -->
<?php } elseif ($get_post_type == 'work') {

        $work_number = get_option('sub_work_number_left-'.$post->ID); ?>


        <div class="span4 team">

            <?php if(!empty($sub_work_left)){ ?>
                <h3><?php echo $sub_work_left; ?></h3>
            <?php } ?>
            <div class="row-fluid">
                <div class="span12 home-page-border"></div>
            </div>
            <br>


            <script type="text/javascript">
                jQuery(window).load(function() {
                    var sliderWidth = jQuery('.flexslider-left<?php echo $post_id ?>').width();
                    var windowWidth = jQuery(window).width();

                        if(windowWidth < 630){

                         if(sliderWidth < 320) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  if(sliderWidth < 440) {
                                var itemWidthCalc = (sliderWidth - 10) / 2;
                                var marginWidth = 10;
                            } else {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }

                        } else {

                            if(sliderWidth < 500) {

                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  {
                                var itemWidthCalc = (sliderWidth - 10 ) / 3;
                                var marginWidth = 10;
                            }
                        }

                    jQuery('.flexslider-left<?php echo $post_id; ?>').flexslider({
                        animation: "fade",
                        animationLoop: false,
                        itemWidth: itemWidthCalc,
                        itemMargin: 10,
                        controlNav: false,
                        slideshow: false,
                        controlsContainer: ".flexslider-part-left<?php echo $post_id; ?>",
                        minItems: 1
                    });
                });

                // check grid size on resize event
                jQuery(window).resize(function() {
                    var getFlexslider = jQuery('.flexslider-left<?php echo $post_id; ?>').html();

                    jQuery('.flexslider-part-left<?php echo $post_id; ?> .flex-direction-nav').remove();
                    jQuery('.flexslider-left<?php echo $post_id; ?>').remove();
                    jQuery('.flexslider-part-left<?php echo $post_id; ?>').append('<div class="flexslider flexslider-left<?php echo $post_id; ?>">'+getFlexslider+'</div>');

                    var sliderWidth = jQuery('.flexslider-left<?php echo $post_id; ?>').width();
                    var windowWidth = jQuery(window).width();

                        if(windowWidth < 630){

                         if(sliderWidth < 320) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  if(sliderWidth < 440) {
                                var itemWidthCalc = (sliderWidth - 10) / 2;
                                var marginWidth = 10;
                            } else {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }

                        } else {
                            if(sliderWidth < 500) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        }

                    jQuery('.flexslider-left<?php echo $post_id; ?>').flexslider({
                        animation: "fade",
                        animationLoop: false,
                        itemWidth: itemWidthCalc,
                        itemMargin: 10,
                        controlNav: false,
                        slideshow: false,
                        controlsContainer: ".flexslider-part-left<?php echo $post_id; ?>",
                        minItems: 1
                    });
                });
            </script>

                    <div class="flexslider-part flexslider-three flexslider-part-left<?php echo $post_id; ?>">
                       <div class="flexslider flexslider-left flexslider<?php echo $post_id; ?> flexslider-left<?php echo $post_id; ?>">
                         <ul class="slides">

                               <?php
                                   $args = array('post_status' => 'publish', 'post_type' => 'work', 'posts_per_page' => $work_number);
                                   // The Query
                                   query_posts ($args);
                                   // The Loop
                                   if (have_posts()): while (have_posts()) : the_post();
                               ?>
                               <li>
                                   <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                       <div class="<?php if (has_post_thumbnail()) { echo 'flipper'; } ?>">
                                           <?php if (has_post_thumbnail()) { ?>
                                               <div class="front rounded">
                                                   <?php the_post_thumbnail('teammembers-slide'); ?>
                                               </div>
                                           <?php } ?>
                                           <div class="back rounded <?php if (!has_post_thumbnail()) { echo 'fixed'; } ?>">

                                                   <div class="team-wrap">
                                                       <div class="team-cell">
                                                            <?php if($enable_single == 'yes'){ ?>
                                                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                            <?php } else { ?>
                                                                <h3><?php the_title(); ?></h3>
                                                            <?php } ?>

                                                                <p class="member_title">
                                                                    <?php
                                                                    $work_categories = wp_get_post_terms($post->ID, 'ct_work');
                                                                    $category_count = count($work_categories);

                                                                        $i = 1;
                                                                        foreach($work_categories as $single_cat) {
                                                                            if($i == $category_count) {
                                                                                $comma = '';
                                                                            } else {
                                                                                $comma = ', ';
                                                                            }
                                                                            echo $single_cat -> name.$comma;
                                                                            $i++;
                                                                        }
                                                                    ?>
                                                                </p>
                                                   </div><!-- cell-wrap -->
                                               </div><!-- team-wrap -->
                                            </div>
                                       </div>
                                  </div>
                               </li>
                               <?php endwhile; endif; ?>

                           </ul>
                       </div>
                   </div><!-- flexslider-part -->
                <div class="clear"></div>

            </div><!-- span6 -->
<!-- ADD BANNER LEFT -->
<?php  } elseif ($get_post_type == 'adbanner'){

        $ad_post = get_option('sub_bulder_banner_left-' . $post->ID);
        $custom_banner = get_post_meta($ad_post, $prefix.'custom_banner_code', true);
        $image_src = wp_get_attachment_image_src( get_post_thumbnail_id($ad_post), 'full' ); ?>

        <div class="span4 home-content-ad">

            <?php if(!empty($sub_banner_left)){ ?>
                <h3><?php echo $sub_banner_left; ?></h3>
            <?php } ?>
            <div class="row-fluid">
                <div class="span12 home-page-border"></div>
            </div>
            <br>

            <?php if(!empty($custom_banner)) {
                echo $custom_banner;
            } else { ?>
                <a href="<?php site_url(); ?>?banner_id=<?php echo $ad_post; ?>">
                    <img src="<?php echo $image_src[0]; ?>" title="<?php the_title($ad_post)?>" alt="<?php the_title($ad_post)?>"/>
                </a>
            <?php } ?>

        </div>
<!-- CONTENT LEFT -->
<?php } elseif ($get_post_type == 'content') {

        $page_content = get_option('sub_page_content_left-'.$post->ID); ?>

        <div class="span4">
            <?php if(!empty($page_content_title_left)){ ?>
                <h3><?php echo $page_content_title_left; ?></h3>
                <div class="row-fluid">
                    <div class="span12 home-page-border"></div>
                </div>
                <br>
            <?php } ?>

            <?php wp_reset_query();

                global $more;    // Declare global $more (before the loop).
                query_posts('page_id='.$page_content);
                if (have_posts()) : while (have_posts()) : the_post();
                        $more = 0;
                        the_content("Read more");
                    endwhile;
                else:
                endif;

            wp_reset_query(); ?>
        </div>
<?php }

//////////////////////////////
//                          //
//      CENTER COLUMN       //
//                          //
//////////////////////////////
?>

<!-- SERVICES CENTER -->
<?php if($get_post_type_col_center == 'services') {
        $get_service = get_option('sub_services-'.$post_id); ?>
        <div class="span4 ca-menu center">
            <div class="row-fluid">
                <?php
                    $args = array('post_type' => 'services', 'post_status' => 'publish', 'posts_per_page' => 1, 'p'=>$get_service);

                    //The Query
                    query_posts($args);

                    //The Loop
                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                    $featured_service_img = get_post_meta($post->ID, $prefix.'featured_service', true);
                    $tk_background_color = get_post_meta($post->ID, $prefix.'background_color', true);
                    $tk_background_hover_color = get_post_meta($post->ID, $prefix.'background_hover_color', true);
                    $tk_headline_color = get_post_meta($post->ID, $prefix.'headline_color', true);
                    $tk_subheadline_color = get_post_meta($post->ID, $prefix.'sub_headline_color', true);
                    $tk_text_color = get_post_meta($post->ID, $prefix.'text_color', true);
                    $tk_hover_color = get_post_meta($post->ID, $prefix.'hover_color', true);

                ?>


                <style type="text/css">
.c.ca-menu.left .ca-item:hover a.more_link span, .ca-menu.left .ca-item:hover h1, .ca-menu.left .ca-item:hover p{color: #fff !important;}
.ca-menu.left .ca-item:hover a.more_link span ,  .ca-menu.left .ca-item a.more_link span  {color: #fff !important;border:1px solid #fff;padding:10px 20px;}
.ca-menu .ca-item<?php echo $post->ID; ?> {background-image:url(<?php tk_get_thumb(300, 233, $featured_service_img ); ?>);}
.ca-menu .ca-sub-item<?php echo $post->ID; ?> {background-image:url('wp-content/themes/new-washington/images/home-service-bg.png');}
.ca-item<?php echo $post->ID; ?> .ca-main {color: #<?php echo $tk_headline_color; ?>;}
.ca-item<?php echo $post->ID; ?> .ca-sub {color: #<?php echo $tk_subheadline_color;?>}
.ca-item<?php echo $post->ID; ?> .more_link {color: #<?php echo $tk_text_color; ?>;}
                </style>


                <div class="ca-item ca-item<?php echo $post->ID; ?> rounded">
                    <div class="ca-sub-item ca-sub-item<?php echo $post->ID; ?> rounded">
                        <a href="<?php the_permalink(); ?>">
                            <br style="clear:both" />

                            <div class="ca-content">
                                <h1 itemprop="articleSection" class="ca-main" style="color:white;"><?php the_title(); ?></h1>

                                <a class="more_link more_link_three" href="<?php the_permalink(); ?>">
                                    <span style="color:white;border: 1px solid #fff;padding: 10px 20px;white-space: nowrap;margin-left: -15px;"><?php echo __('Read More', tk_theme_name); ?></span>
                                </a>
                            </div>
                        </a>
                    </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </div><!-- span4 -->



<!-- NEWS CENTER -->
<?php } elseif ($get_post_type_col_center == 'news') {  ?>


        <div class="span4 news">

            <script type="text/javascript">
                jQuery(window).load(function() {
                    var sliderWidth = jQuery('.flexslider-center<?php echo $post_id ?>').width();

                    if(sliderWidth < 500) {
                        var itemWidthCalc = (sliderWidth);
                    } else {
                        var itemWidthCalc = (sliderWidth - 10) / 2;
                    }

                    jQuery('.flexslider-center<?php echo $post_id; ?>').flexslider({
                        animation: "fade",
                        animationLoop: false,
                        itemWidth: itemWidthCalc,
                        itemMargin: 0,
                        controlNav: false,
                        slideshow: false,
                        controlsContainer: ".flexslider-part-center<?php echo $post_id; ?>"
                    });
                });

                // check grid size on resize event
                jQuery(window).resize(function() {
                    var getFlexslider = jQuery('.flexslider-center<?php echo $post_id ?>').html();

                    jQuery('.flexslider-part-center<?php echo $post_id ?> .flex-direction-nav').remove();
                    jQuery('.flexslider-center<?php echo $post_id ?>').remove();
                    jQuery('.flexslider-part-center<?php echo $post_id ?>').append('<div class="flexslider flexslider-center<?php echo $post_id; ?>">'+getFlexslider+'</div>');

                    var sliderWidth = jQuery('.flexslider-center<?php echo $post_id ?>').width();

                    if(sliderWidth < 500) {
                        var itemWidthCalc = (sliderWidth);
                    } else {
                        var itemWidthCalc = (sliderWidth - 10) / 2;
                    }

                    jQuery('.flexslider-center<?php echo $post_id; ?>').flexslider({
                        animation: "fade",
                        animationLoop: false,
                        itemWidth: itemWidthCalc,
                        itemMargin: 10,
                        controlNav: false,
                        slideshow: false,
                        controlsContainer: ".flexslider-part-center<?php echo $post_id; ?>",
                        minItems: 1
                    });
                });
            </script>


            <?php if(!empty($latest_news_title_center)){ ?>
                <h3 class="slider-titles"><?php echo $latest_news_title_center; ?></h3>
            <?php } ?>
            <div class="row-fluid">
                <div class="span12 home-page-border"></div>
            </div>
            <br>


            <div class="flexslider-part wider flexslider-part-center<?php echo $post_id; ?>">
                <div class="flexslider flexslider-center<?php echo $post_id; ?>">
                    <ul class="slides">
                        <?php
                            $news_post_num = get_option('sub_news_number_center-'.$post_id);
                            $news_post_cat = get_option('sub_news_category_center-'.$post_id);

                            if ($news_post_cat == '0') {
                                $args = array('post_status' => 'publish', 'post_type' => 'post', 'posts_per_page' => $news_post_num,);
                            } else {
                                $args = array('post_status' => 'publish', 'post_type' => 'post', 'cat' => $news_post_cat, 'posts_per_page' => $news_post_num,);
                            }

                            // The Query
                            query_posts ($args);
                            // The Loop
                            if (have_posts()): while (have_posts()) : the_post();
                            $format = get_post_format();

                            $post_day = get_the_date('d');
                            $post_month = get_the_date('M');
                            $post_year = get_the_date('Y');
                        ?>
                        <li>
                            <div class="vertical_tabs_content">
                                <div class="tab_date rounded pull-left"><span><?php echo $post_day; ?></span><?php echo $post_month; ?><br><?php echo $post_year; ?></div>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <span class="by"><?php the_author_posts_link(); ?> / <a href="<?php the_permalink(); ?>"><?php comments_number( '0', '1', '%' ); ?> <?php _e('Comments', tk_theme_name) ?></a></span>
                                <div class="clear"></div>
                                <p><?php the_excerpt_length(160); ?></p>
                                <a href="<?php the_permalink(); ?>" class="read_more"><?php _e('Read more', tk_theme_name); ?></a>
                            </div>
                        </li>
                        <?php endwhile; endif; wp_reset_query();?>
                    </ul>
                </div><!-- flexslider -->
            </div>
            <div class="clear"></div>
        </div><!-- span4 -->


<!-- TESTIMONIALS CENTER -->
<?php } elseif ($get_post_type_col_center == 'testimonials'){ ?>

        <div class="span4">


            <?php if(!empty($sub_testimonials_center)){ ?>
                <h3><?php echo $sub_testimonials_center; ?></h3>
                <div class="row-fluid">
                    <div class="span12 home-page-border"></div>
                </div>
                <br>
            <?php } ?>


            <?php
                $testimonial_post_center = get_option('sub_testimonial_center-'.$post_id);
                $random_post = get_option('sub_check_testimonials_center-'. $post_id);

                if($random_post[0] == 'yes'){
                    $args = array('post_status' => 'publish', 'post_type' => 'testimonials', 'posts_per_page' =>1, 'orderby' => 'rand');
                } else {
                    $args = array('post_status' => 'publish', 'post_type' => 'testimonials', 'posts_per_page' =>1, 'p' => $testimonial_post_center);
                }

                //The Query
                query_posts($args);

                //The Loop
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                $email_avatar = get_post_meta($post->ID, $prefix.'email', true);
                $name_user = get_post_meta($post->ID, $prefix.'job_position', true);
                $avatar = get_avatar( $email_avatar, 72);

            ?>

            <div class="row-fluid">
                <div class="span12 vertical_tabs_content tab_testimonial rounded">
                    <?php if ($email_avatar) {
                            if(isset($avatar)){ ?>
                                <div class="gravatar rounded"><?php echo $avatar; ?></div>
                    <?php } } ?>
                    <h3><?php the_title();?></h3>
                    <span class="by"><?php echo $name_user ?></span>
                    <div class="clear"></div>
                    <div class="row-fluid">
                        <div class="span12 home-page-border"></div>
                    </div>
                    <?php the_content();?>
                </div>
            </div>
            <?php endwhile; endif; ?>


        </div><!-- span4 -->


<!-- TEAM CENTER -->
<?php } elseif ($get_post_type_col_center == 'team') {

        $team_number = get_option('sub_team_number_center-'.$post_id); ?>

        <div class="span4 team">

            <?php if(!empty($sub_team_center)){ ?>
                <h3><?php echo $sub_team_center; ?></h3>
            <?php } ?>
            <div class="row-fluid">
                <div class="span12 home-page-border"></div>
            </div>
            <br>


            <script type="text/javascript">
                jQuery(window).load(function() {
                    var sliderWidth = jQuery('.flexslider-center<?php echo $post_id ?>').width();
                    var windowWidth = jQuery(window).width();


                        if(windowWidth < 630){

                         if(sliderWidth < 320) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  if(sliderWidth < 440) {
                                var itemWidthCalc = (sliderWidth - 10) / 2;
                                var marginWidth = 10;
                            } else {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }

                        } else {
                            if(sliderWidth < 500) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        }

                    jQuery('.flexslider-center<?php echo $post_id; ?>').flexslider({
                        animation: "fade",
                        animationLoop: false,
                        itemWidth: itemWidthCalc,
                        itemMargin: 10,
                        controlNav: false,
                        slideshow: false,
                        controlsContainer: ".flexslider-part-center<?php echo $post_id; ?>",
                        minItems: 1
                    });
                });

                // check grid size on resize event
                jQuery(window).resize(function() {
                    var getFlexslider = jQuery('.flexslider-center<?php echo $post_id ?>').html();

                    jQuery('.flexslider-part-center<?php echo $post_id ?> .flex-direction-nav').remove();
                    jQuery('.flexslider-center<?php echo $post_id ?>').remove();
                    jQuery('.flexslider-part-center<?php echo $post_id ?>').append('<div class="flexslider flexslider-center<?php echo $post_id; ?>">'+getFlexslider+'</div>');

                    var windowWidth = jQuery(window).width();
                    var sliderWidth = jQuery('.flexslider-center<?php echo $post_id ?>').width();

                        if(windowWidth < 630){

                         if(sliderWidth < 320) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  if(sliderWidth < 440) {
                                var itemWidthCalc = (sliderWidth - 10) / 2;
                                var marginWidth = 10;
                            } else {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }

                        } else {
                            if(sliderWidth < 500) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        }

                    jQuery('.flexslider-center<?php echo $post_id; ?>').flexslider({
                        animation: "fade",
                        animationLoop: false,
                        itemWidth: itemWidthCalc,
                        itemMargin: 10,
                        controlNav: false,
                        slideshow: false,
                        controlsContainer: ".flexslider-part-center<?php echo $post_id; ?>",
                        minItems: 1
                    });
                });
            </script>


            <div class="flexslider-part wider flexslider-three  flexslider-part-center<?php echo $post_id; ?>">
                <div class="flexslider flexslider-center<?php echo $post_id; ?>">
                    <ul class="slides">
                        <?php
                            $args = array('post_status' => 'publish', 'post_type' => 'team-members', 'posts_per_page' =>$team_number, 'meta_key'=>'_thumbnail_id');
                            // The Query
                            query_posts ($args);
                            // The Loop
                            if (have_posts()): while (have_posts()) : the_post();
                            $tk_member_title = get_post_meta($post->ID, $prefix.'title_info', true);
                            $post_link = get_permalink($get_team_id).'#'.$post->post_title;
                        ?>
                        <li>
                            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                <div class="<?php if (has_post_thumbnail()) { echo 'flipper'; } ?>">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <div class="front rounded">
                                            <?php the_post_thumbnail('teammembers-slide-big'); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="back rounded <?php if (!has_post_thumbnail()) { echo 'fixed'; } ?>">
                                        <div class="team-wrap">
                                            <div class="team-cell">
                                                <h3><a href="<?php echo $post_link; ?>"><?php the_title(); ?></a></h3>
                                               <?php if(!empty($tk_member_title)){ ?><span class="member_title"><?php echo $tk_member_title; ?></span><?php } ?>
                                            </div><!-- team-cell -->
                                        </div><!-- team-wrap -->
                                    </div>
                                </div>
                           </div>
                        </li>
                        <?php endwhile; endif; ?>
                    </ul>
                </div>
            </div>

        </div><!-- span4 -->



<!-- WORK CENTER -->
<?php } elseif ($get_post_type == 'work') {

        $work_number = get_option('sub_work_number_center-'.$post->ID); ?>


        <div class="span4 team">

            <?php if(!empty($sub_work_center)){ ?>
                <h3><?php echo $sub_work_center; ?></h3>
            <?php } ?>
            <div class="row-fluid">
                <div class="span12 home-page-border"></div>
            </div>
            <br>


            <script type="text/javascript">
                jQuery(window).load(function() {
                    var sliderWidth = jQuery('.flexslider-center<?php echo $post_id ?>').width();
                    var windowWidth = jQuery(window).width();


                        if(windowWidth < 630){

                         if(sliderWidth < 320) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  if(sliderWidth < 440) {
                                var itemWidthCalc = (sliderWidth - 10) / 2;
                                var marginWidth = 10;
                            } else {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }

                        } else {
                            if(sliderWidth < 500) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        }

                    jQuery('.flexslider-center<?php echo $post_id; ?>').flexslider({
                        animation: "fade",
                        animationLoop: false,
                        itemWidth: itemWidthCalc,
                        itemMargin: 10,
                        controlNav: false,
                        slideshow: false,
                        controlsContainer: ".flexslider-part-center<?php echo $post_id; ?>",
                        minItems: 1
                    });
                });

                // check grid size on resize event
                jQuery(window).resize(function() {
                    var getFlexslider = jQuery('.flexslider-center<?php echo $post_id ?>').html();

                    jQuery('.flexslider-part-center<?php echo $post_id ?> .flex-direction-nav').remove();
                    jQuery('.flexslider-center<?php echo $post_id ?>').remove();
                    jQuery('.flexslider-part-center<?php echo $post_id ?>').append('<div class="flexslider flexslider-center<?php echo $post_id; ?>">'+getFlexslider+'</div>');

                    var windowWidth = jQuery(window).width();
                    var sliderWidth = jQuery('.flexslider-center<?php echo $post_id ?>').width();

                        if(windowWidth < 630){

                         if(sliderWidth < 320) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  if(sliderWidth < 440) {
                                var itemWidthCalc = (sliderWidth - 10) / 2;
                                var marginWidth = 10;
                            } else {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }

                        } else {
                            if(sliderWidth < 500) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        }

                    jQuery('.flexslider-center<?php echo $post_id; ?>').flexslider({
                        animation: "fade",
                        animationLoop: false,
                        itemWidth: itemWidthCalc,
                        itemMargin: 10,
                        controlNav: false,
                        slideshow: false,
                        controlsContainer: ".flexslider-part-center<?php echo $post_id; ?>",
                        minItems: 1
                    });
                });
            </script>

                    <div class="flexslider-part flexslider-three flexslider-part-center<?php echo $post_id; ?>">
                       <div class="flexslider flexslider-center flexslider<?php echo $post_id; ?> flexslider-center<?php echo $post_id; ?>">
                         <ul class="slides">

                               <?php
                                   $args = array('post_status' => 'publish', 'post_type' => 'work', 'posts_per_page' => $work_number);
                                   // The Query
                                   query_posts ($args);
                                   // The Loop
                                   if (have_posts()): while (have_posts()) : the_post();
                               ?>
                               <li>
                                   <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                       <div class="<?php if (has_post_thumbnail()) { echo 'flipper'; } ?>">
                                           <?php if (has_post_thumbnail()) { ?>
                                               <div class="front rounded">
                                                   <?php the_post_thumbnail('teammembers-slide'); ?>
                                               </div>
                                           <?php } ?>
                                           <div class="back rounded <?php if (!has_post_thumbnail()) { echo 'fixed'; } ?>">

                                                   <div class="team-wrap">
                                                       <div class="team-cell">
                                                            <?php if($enable_single == 'yes'){ ?>
                                                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                            <?php } else { ?>
                                                                <h3><?php the_title(); ?></h3>
                                                            <?php } ?>

                                                                <p class="member_title">
                                                                    <?php
                                                                    $work_categories = wp_get_post_terms($post->ID, 'ct_work');
                                                                    $category_count = count($work_categories);

                                                                        $i = 1;
                                                                        foreach($work_categories as $single_cat) {
                                                                            if($i == $category_count) {
                                                                                $comma = '';
                                                                            } else {
                                                                                $comma = ', ';
                                                                            }
                                                                            echo $single_cat -> name.$comma;
                                                                            $i++;
                                                                        }
                                                                    ?>
                                                                </p>
                                                   </div><!-- cell-wrap -->
                                               </div><!-- team-wrap -->
                                            </div>
                                       </div>
                                  </div>
                               </li>
                               <?php endwhile; endif; ?>

                           </ul>
                       </div>
                   </div><!-- flexslider-part -->
                <div class="clear"></div>

            </div><!-- span6 -->




<!-- ADD BANNER CENTER -->
<?php  } elseif ($get_post_type_col_center == 'adbanner'){

        $ad_post = get_option('sub_bulder_banner_center-' . $post_id);
        $custom_banner = get_post_meta($ad_post, $prefix.'custom_banner_code', true);
        $image_src = wp_get_attachment_image_src( get_post_thumbnail_id($ad_post), 'full' ); ?>

        <div class="span4 home-content-ad">

            <?php if(!empty($sub_banner_center)){ ?>
                <h3><?php echo $sub_banner_center; ?></h3>
            <?php } ?>
            <div class="row-fluid">
                <div class="span12 home-page-border"></div>
            </div>
            <br>

            <?php
                if(!empty($custom_banner)) {
                    echo $custom_banner;
                } else { ?>
                    <a href="<?php site_url(); ?>?banner_id=<?php echo $ad_post; ?>">
                        <img src="<?php echo $image_src[0]; ?>" title="<?php the_title($ad_post)?>" alt="<?php the_title($ad_post)?>"/>
                    </a>
            <?php } ?>
        </div>


<!-- CONTENT CENTER -->
<?php } elseif ($get_post_type_col_center == 'content') {

        $page_content = get_option('sub_page_content_center-'.$post_id); ?>

        <div class="span4">
            <?php if(!empty($page_content_title_center)){ ?>
                <h3><?php echo $page_content_title_center; ?></h3>
                <div class="row-fluid">
                    <div class="span12 home-page-border"></div>
                </div>
                <br>
            <?php } ?>

            <?php wp_reset_query();

                global $more;    // Declare global $more (before the loop).
                query_posts('page_id='.$page_content);
                if (have_posts()) : while (have_posts()) : the_post();
                        $more = 0;
                        the_content("Read more");
                    endwhile;
                else:
                endif;

            wp_reset_query(); ?>
        </div>

<?php }



//////////////////////////////
//                          //
//      RIGHT COLUMN        //
//                          //
//////////////////////////////
?>

<!-- SERVICES RIGHT -->
<?php if ($get_post_type_col_right == 'services') {

        $get_service = get_option('sub_services_right-'.$post_id); ?>


        <div class="span4 ca-menu right">
            <div class="row-fluid">
                <?php
                    $args = array('post_type' => 'services', 'post_status' => 'publish', 'posts_per_page' => 1, 'p'=>$get_service);

                    //The Query
                    query_posts($args);

                    //The Loop
                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                    $featured_service_img = get_post_meta($post->ID, $prefix.'featured_service', true);
                    $tk_background_color = get_post_meta($post->ID, $prefix.'background_color', true);
                    $tk_background_hover_color = get_post_meta($post->ID, $prefix.'background_hover_color', true);
                    $tk_headline_color = get_post_meta($post->ID, $prefix.'headline_color', true);
                    $tk_subheadline_color = get_post_meta($post->ID, $prefix.'sub_headline_color', true);
                    $tk_text_color = get_post_meta($post->ID, $prefix.'text_color', true);
                    $tk_hover_color = get_post_meta($post->ID, $prefix.'hover_color', true);
                ?>


                <style type="text/css">
               /*     .ca-menu .ca-item<?php echo $post->ID; ?>:hover {background-color: #<?php echo $tk_background_hover_color; ?>}*/
.c.ca-menu.left .ca-item:hover a.more_link span, .ca-menu.left .ca-item:hover h1, .ca-menu.left .ca-item:hover p{color: #<?php echo $tk_hover_color; ?> !important;}
.ca-menu.left .ca-item:hover a.more_link span ,  .ca-menu.left .ca-item a.more_link span  {color: #fff !important;border:1px solid #fff;padding:10px 20px;}
.ca-menu .ca-item<?php echo $post->ID; ?> {background-image:url(<?php tk_get_thumb(300, 233, $featured_service_img ); ?>);}
.ca-menu .ca-sub-item<?php echo $post->ID; ?> {background-image:url('wp-content/themes/new-washington/images/home-service-bg.png');}
.ca-item<?php echo $post->ID; ?> .ca-main {color: #<?php echo $tk_headline_color; ?>;}
.ca-item<?php echo $post->ID; ?> .ca-sub {color: #<?php echo $tk_subheadline_color;?>}
.ca-item<?php echo $post->ID; ?> .more_link {color: #<?php echo $tk_text_color; ?>;}
                </style>


                <div class="ca-item ca-item<?php echo $post->ID; ?> rounded">
                    <div class="ca-sub-item ca-sub-item<?php echo $post->ID; ?> rounded">
                        <a href="<?php the_permalink(); ?>">
                            <br style="clear:both" />
                            <div class="ca-content">
                                <h1 itemprop="articleSection" class="ca-main" style="color:white;"><?php the_title(); ?></h1>

                                <a class="more_link more_link_three" href="<?php the_permalink(); ?>">
                                    <span  style="color:white;border: 1px solid #fff;padding: 10px 20px;white-space: nowrap;margin-left: -15px;"><?php echo __('Read More', tk_theme_name); ?></span></a>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; endif; wp_reset_postdata(); ?>
                </div>
            </div>
        </div><!-- span4 -->


<!-- NEWS RIGHT  -->
<?php } elseif ($get_post_type_col_right == 'news') { ?>


        <div class="span4 news">

            <script type="text/javascript">
                jQuery(window).load(function() {
                    var sliderWidth = jQuery('.flexslider-right<?php echo $post_id ?>').width();

                    if(sliderWidth < 500) {
                        var itemWidthCalc = (sliderWidth);
                    } else {
                        var itemWidthCalc = (sliderWidth - 10) / 2;
                    }

                    jQuery('.flexslider-right<?php echo $post_id; ?>').flexslider({
                        animation: "fade",
                        animationLoop: false,
                        itemWidth: itemWidthCalc,
                        itemMargin: 0,
                        controlNav: false,
                        slideshow: false,
                        controlsContainer: ".flexslider-part-right<?php echo $post_id; ?>"
                    });

                    // check grid size on resize event
                    jQuery(window).resize(function() {
                        var getFlexslider = jQuery('.flexslider-right<?php echo $post_id ?>').html();

                        jQuery('.flexslider-part-right<?php echo $post_id ?> .flex-direction-nav').remove();
                        jQuery('.flexslider-right<?php echo $post_id ?>').remove();
                        jQuery('.flexslider-part-right<?php echo $post_id ?>').append('<div class="flexslider flexslider-right<?php echo $post_id; ?>">'+getFlexslider+'</div>');

                        var sliderWidth = jQuery('.flexslider-right<?php echo $post_id ?>').width();

                        if(sliderWidth < 500) {
                            var itemWidthCalc = (sliderWidth);
                        } else {
                            var itemWidthCalc = (sliderWidth - 10) / 2;
                        }

                        jQuery('.flexslider-right<?php echo $post_id; ?>').flexslider({
                            animation: "fade",
                            animationLoop: false,
                            itemWidth: itemWidthCalc,
                            itemMargin: 10,
                            controlNav: false,
                            slideshow: false,
                            controlsContainer: ".flexslider-part-right<?php echo $post_id; ?>",
                            minItems: 1
                        });
                    });

                });
            </script>


            <?php if(!empty($latest_news_title_right)){ ?>
                <h3 class="slider-titles"><?php echo $latest_news_title_right; ?></h3>
            <?php } ?>
            <div class="row-fluid">
                <div class="span12 home-page-border"></div>
            </div>
            <br>


            <div class="flexslider-part wider  flexslider-part-right<?php echo $post_id; ?>">
                <div class="flexslider flexslider-right<?php echo $post_id; ?>">
                    <ul class="slides">
                        <?php
                            $news_post_num = get_option('sub_news_number_right-'.$post_id);
                            $news_post_cat = get_option('sub_news_category_right-'.$post_id);

                            if ($news_post_cat == '0') {
                                $args = array('post_status' => 'publish', 'post_type' => 'post', 'posts_per_page' => $news_post_num,);
                            } else {
                                $args = array('post_status' => 'publish', 'post_type' => 'post', 'cat' => $news_post_cat, 'posts_per_page' => $news_post_num,);
                            }

                            // The Query
                            query_posts ($args);
                            // The Loop
                            if (have_posts()): while (have_posts()) : the_post();
                            $format = get_post_format();

                            $post_day = get_the_date('d');
                            $post_month = get_the_date('M');
                            $post_year = get_the_date('Y');
                        ?>
                        <li>
                            <div class="vertical_tabs_content">
                                <div class="tab_date rounded pull-left"><span><?php echo $post_day; ?></span><?php echo $post_month; ?><br><?php echo $post_year; ?></div>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <span class="by"><?php the_author_posts_link(); ?> / <a href="<?php the_permalink(); ?>"><?php comments_number( '0', '1', '%' ); ?> <?php _e('Comments', tk_theme_name) ?></a></span>
                                <div class="clear"></div>
                                <p><?php the_excerpt_length(160); ?></p>
                                <a href="<?php the_permalink(); ?>" class="read_more"><?php _e('Read more', tk_theme_name); ?></a>
                            </div>
                        </li>
                        <?php endwhile; endif; wp_reset_query();?>
                    </ul>
                </div><!-- flexslider -->
            </div>
            <div class="clear"></div>
        </div><!-- span4 -->


<!-- TESTIMONIALS RIGHT  -->
<?php } elseif ($get_post_type_col_right == 'testimonials'){ ?>

            <div class="span4">

                <?php if(!empty($sub_testimonials_right)){ ?>
                    <h3><?php echo $sub_testimonials_right; ?></h3>
                    <div class="row-fluid">
                        <div class="span12 home-page-border"></div>
                    </div>
                    <br>
                <?php } ?>


                <?php
                    $testimonial_post_right = get_option('sub_testimonial_right-'.$post_id);
                    $random_post = get_option('sub_check_testimonials_right-'.$post_id);

                    if($random_post[0] == 'yes'){
                        $args = array('post_status' => 'publish', 'post_type' => 'testimonials', 'posts_per_page' =>1, 'orderby' => 'rand');
                    } else {
                        $args = array('post_status' => 'publish', 'post_type' => 'testimonials', 'posts_per_page' =>1, 'p' => $testimonial_post_right);
                    }

                    //The Query
                    query_posts($args);

                    //The Loop
                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                    $email_avatar = get_post_meta($post->ID, $prefix.'email', true);
                    $name_user = get_post_meta($post->ID, $prefix.'job_position', true);
                    $avatar = get_avatar( $email_avatar, 72);

                ?>

                <div class="row-fluid">
                    <div class="span12 vertical_tabs_content tab_testimonial rounded">
                        <?php if ($email_avatar) {
                                if(isset($avatar)){ ?>
                                    <div class="gravatar rounded"><?php echo $avatar; ?></div>
                        <?php } } ?>
                        <h3><?php the_title();?></h3>
                        <span class="by"><?php echo $name_user ?></span>
                        <div class="clear"></div>
                        <div class="row-fluid">
                            <div class="span12 home-page-border"></div>
                        </div>
                        <?php the_content();?>
                    </div>
                </div>
                <?php endwhile; endif; ?>

            </div><!-- span4 -->


<!-- TEAM RIGHT  -->
<?php } elseif ($get_post_type_col_right == 'team') {

    $team_number = get_option('sub_team_number_right-'.$post_id); ?>

            <div class="span4 team">

                <?php $team_title = get_option('title_team_page'); ?>

                <?php if(!empty($sub_team_right)){ ?>
                    <h3><?php echo $sub_team_right; ?></h3>
                <?php } ?>
                <div class="row-fluid">
                    <div class="span12 home-page-border"></div>
                </div>
                <br>


                <script type="text/javascript">
                    jQuery(window).load(function() {
                        var sliderWidth = jQuery('.flexslider-right<?php echo $post_id ?>').width();
                        var windowWidth = jQuery(window).width();

                        if(windowWidth < 630){

                         if(sliderWidth < 320) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  if(sliderWidth < 440) {
                                var itemWidthCalc = (sliderWidth - 10) / 2;
                                var marginWidth = 10;
                            } else {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;

                            }

                        } else {
                            if(sliderWidth < 500) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        }

                        jQuery('.flexslider-right<?php echo $post_id; ?>').flexslider({
                            animation: "fade",
                            animationLoop: false,
                            itemWidth: itemWidthCalc,
                            itemMargin: 10,
                            controlNav: false,
                            slideshow: false,
                            controlsContainer: ".flexslider-part-right<?php echo $post_id; ?>",
                            minItems: 1
                        });
                    });

                    // check grid size on resize event
                    jQuery(window).resize(function() {
                        var getFlexslider = jQuery('.flexslider-right<?php echo $post_id ?>').html();

                        jQuery('.flexslider-part-right<?php echo $post_id ?> .flex-direction-nav').remove();
                        jQuery('.flexslider-right<?php echo $post_id ?>').remove();
                        jQuery('.flexslider-part-right<?php echo $post_id ?>').append('<div class="flexslider flexslider-right<?php echo $post_id; ?>">'+getFlexslider+'</div>');

                        var windowWidth = jQuery(window).width();
                        var sliderWidth = jQuery('.flexslider-right<?php echo $post_id ?>').width();

                        if(windowWidth < 630){

                         if(sliderWidth < 320) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  if(sliderWidth < 440) {
                                var itemWidthCalc = (sliderWidth - 10) / 2;
                                var marginWidth = 10;
                            } else {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }

                        } else {
                            if(sliderWidth < 500) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        }

                        jQuery('.flexslider-right<?php echo $post_id; ?>').flexslider({
                            animation: "fade",
                            animationLoop: false,
                            itemWidth: itemWidthCalc,
                            itemMargin: 10,
                            controlNav: false,
                            slideshow: false,
                            controlsContainer: ".flexslider-part-right<?php echo $post_id; ?>",
                            minItems: 1
                        });
                    });
                </script>


                <div class="flexslider-part wider flexslider-three flexslider-part-right<?php echo $post_id; ?>">
                    <div class="flexslider flexslider-right<?php echo $post_id; ?>">
                        <ul class="slides">
                            <?php
                                $args = array('post_status' => 'publish', 'post_type' => 'team-members', 'posts_per_page' =>$team_number, 'meta_key'=>'_thumbnail_id');
                                // The Query
                                query_posts ($args);
                                // The Loop
                                if (have_posts()): while (have_posts()) : the_post();
                                $tk_member_title = get_post_meta($post->ID, $prefix.'title_info', true);
                                $post_link = get_permalink($get_team_id).'#'.$post->post_title;
                            ?>
                            <li>
                                <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                    <div class="<?php if (has_post_thumbnail()) { echo 'flipper'; } ?>">
                                        <?php if (has_post_thumbnail()) { ?>
                                            <div class="front rounded">
                                                <?php the_post_thumbnail('teammembers-slide-big'); ?>
                                            </div>
                                        <?php } ?>
                                        <div class="back rounded <?php if (!has_post_thumbnail()) { echo 'fixed'; } ?>">
                                            <div class="team-wrap">
                                                <div class="team-cell">
                                                    <h3><a href="<?php echo $post_link; ?>"><?php the_title(); ?></a></h3>
                                                   <?php if(!empty($tk_member_title)){ ?><span class="member_title"><?php echo $tk_member_title; ?></span><?php } ?>
                                                </div><!-- team-cell -->
                                            </div><!-- team-wrap -->
                                        </div>
                                    </div>
                               </div>
                            </li>
                            <?php endwhile; endif; ?>

                        </ul>
                    </div>
                </div><!-- flexslider-part -->

            </div><!-- span4 -->



<!-- WORK RIGHT -->
<?php } elseif ($get_post_type == 'work') {

        $work_number = get_option('sub_work_number_right-'.$post->ID); ?>


        <div class="span4 team">

            <?php if(!empty($sub_work_right)){ ?>
                <h3><?php echo $sub_work_right; ?></h3>
            <?php } ?>
            <div class="row-fluid">
                <div class="span12 home-page-border"></div>
            </div>
            <br>


                <script type="text/javascript">
                    jQuery(window).load(function() {
                        var sliderWidth = jQuery('.flexslider-right<?php echo $post_id ?>').width();
                        var windowWidth = jQuery(window).width();

                        if(windowWidth < 630){

                         if(sliderWidth < 320) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  if(sliderWidth < 440) {
                                var itemWidthCalc = (sliderWidth - 10) / 2;
                                var marginWidth = 10;
                            } else {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;

                            }

                        } else {
                            if(sliderWidth < 500) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        }

                        jQuery('.flexslider-right<?php echo $post_id; ?>').flexslider({
                            animation: "fade",
                            animationLoop: false,
                            itemWidth: itemWidthCalc,
                            itemMargin: 10,
                            controlNav: false,
                            slideshow: false,
                            controlsContainer: ".flexslider-part-right<?php echo $post_id; ?>",
                            minItems: 1
                        });
                    });

                    // check grid size on resize event
                    jQuery(window).resize(function() {
                        var getFlexslider = jQuery('.flexslider-right<?php echo $post_id ?>').html();

                        jQuery('.flexslider-part-right<?php echo $post_id ?> .flex-direction-nav').remove();
                        jQuery('.flexslider-right<?php echo $post_id ?>').remove();
                        jQuery('.flexslider-part-right<?php echo $post_id ?>').append('<div class="flexslider flexslider-right<?php echo $post_id; ?>">'+getFlexslider+'</div>');

                        var windowWidth = jQuery(window).width();
                        var sliderWidth = jQuery('.flexslider-right<?php echo $post_id ?>').width();

                        if(windowWidth < 630){

                         if(sliderWidth < 320) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  if(sliderWidth < 440) {
                                var itemWidthCalc = (sliderWidth - 10) / 2;
                                var marginWidth = 10;
                            } else {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }

                        } else {
                            if(sliderWidth < 500) {
                                var itemWidthCalc = (sliderWidth);
                                var marginWidth = 0;
                            } else  {
                                var itemWidthCalc = (sliderWidth - 10) / 3;
                                var marginWidth = 10;
                            }
                        }

                        jQuery('.flexslider-right<?php echo $post_id; ?>').flexslider({
                            animation: "fade",
                            animationLoop: false,
                            itemWidth: itemWidthCalc,
                            itemMargin: 10,
                            controlNav: false,
                            slideshow: false,
                            controlsContainer: ".flexslider-part-right<?php echo $post_id; ?>",
                            minItems: 1
                        });
                    });
                </script>




                    <div class="flexslider-part flexslider-three flexslider-part-right<?php echo $post_id; ?>">
                       <div class="flexslider flexslider-right flexslider<?php echo $post_id; ?> flexslider-right<?php echo $post_id; ?>">
                         <ul class="slides">

                               <?php
                                   $args = array('post_status' => 'publish', 'post_type' => 'work', 'posts_per_page' => $work_number);
                                   // The Query
                                   query_posts ($args);
                                   // The Loop
                                   if (have_posts()): while (have_posts()) : the_post();
                               ?>
                               <li>
                                   <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                       <div class="<?php if (has_post_thumbnail()) { echo 'flipper'; } ?>">
                                           <?php if (has_post_thumbnail()) { ?>
                                               <div class="front rounded">
                                                   <?php the_post_thumbnail('teammembers-slide'); ?>
                                               </div>
                                           <?php } ?>
                                           <div class="back rounded <?php if (!has_post_thumbnail()) { echo 'fixed'; } ?>">

                                                   <div class="team-wrap">
                                                       <div class="team-cell">
                                                            <?php if($enable_single == 'yes'){ ?>
                                                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                            <?php } else { ?>
                                                                <h3><?php the_title(); ?></h3>
                                                            <?php } ?>

                                                                <p class="member_title">
                                                                    <?php
                                                                    $work_categories = wp_get_post_terms($post->ID, 'ct_work');
                                                                    $category_count = count($work_categories);

                                                                        $i = 1;
                                                                        foreach($work_categories as $single_cat) {
                                                                            if($i == $category_count) {
                                                                                $comma = '';
                                                                            } else {
                                                                                $comma = ', ';
                                                                            }
                                                                            echo $single_cat -> name.$comma;
                                                                            $i++;
                                                                        }
                                                                    ?>
                                                                </p>
                                                   </div><!-- cell-wrap -->
                                               </div><!-- team-wrap -->
                                            </div>
                                       </div>
                                  </div>
                               </li>
                               <?php endwhile; endif; ?>

                           </ul>
                       </div>
                   </div><!-- flexslider-part -->
                <div class="clear"></div>

            </div><!-- span6 -->





<!-- ADD BANNER RIGHT  -->
<?php  } elseif ($get_post_type_col_right == 'adbanner'){

        $ad_post = get_option('sub_bulder_banner_right-' . $post_id);
        $custom_banner = get_post_meta($ad_post, $prefix.'custom_banner_code', true);
        $image_src = wp_get_attachment_image_src( get_post_thumbnail_id($ad_post), 'full' ); ?>

        <div class="span4 home-content-ad">

            <?php if(!empty($sub_banner_right)){ ?>
                <h3><?php echo $sub_banner_right; ?></h3>
            <?php } ?>
            <div class="row-fluid">
                <div class="span12"></div>
            </div>
            <br>

            <?php
                if(!empty($custom_banner)) {
                    echo $custom_banner;
                } else { ?>
                    <a href="<?php site_url(); ?>?banner_id=<?php echo $ad_post; ?>">
                        <img src="<?php echo $image_src[0]; ?>" title="<?php the_title($ad_post)?>" alt="<?php the_title($ad_post)?>"/>
                    </a>
            <?php } ?>
        </div>


<!-- CONTENT RIGHT  -->
<?php } elseif ($get_post_type_col_right == 'content') {

        $page_content = get_option('sub_page_content_right-'.$post_id); ?>

        <div class="span4">
            <?php if(!empty($page_content_title_right)){ ?>
                <h3><?php echo $page_content_title_right; ?></h3>
                <div class="row-fluid">
                    <div class="span12"></div>
                </div>
                <br>
            <?php } ?>

            <?php wp_reset_query();

                global $more;    // Declare global $more (before the loop).
                query_posts('page_id='.$page_content);
                if (have_posts()) : while (have_posts()) : the_post();
                        $more = 0;
                        the_content("Read more");
                    endwhile;
                else:
                endif;

            wp_reset_query(); ?>

        </div>


<?php } ?>


</div><!-- /row-fluid -->