<?php
/**
 * Created by PhpStorm.
 * User: Anna
 * Date: 25.09.2017
 * Time: 23:44
 */
?>
<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
?>
<?use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Page\Asset;
Loc::loadMessages(__FILE__);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" <?=LANGUAGE_ID?>>
<head profile="http://gmpg.org/xfn/11">
    <?$APPLICATION->ShowTitle(Novux);?>
    <?$APPLICATION->ShowHead();?>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <!-- Load Jquery -->
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/jquery.js", true);?>
    <!-- End Load -->

    <!-- for IE6 i'm sorry but there is too much wrong with it, needs warning at least, you can disable it by delething this load. -->
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/jquery.badBrowser.js", true);?>
    <!-- End Load -->

    <!-- ALL jQuery Tools. No jQuery library -->
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/jquery.tools.js", true);?>
    <!-- End Load -->

    <!-- Load Jquery Easing -->
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/jquery.easing.js", true);?>
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/jquery.css-transform.js", true);?>
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/jquery.css-rotate-scale.js", true);?>
    <!-- End Load -->

    <!-- Load Jquery Cycle and adiacent CSS File -->
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/jquery.cycle.js", true);?>
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/_include/css/jquery.cycle.css");?>
     <!-- End Load -->

    <!-- Load Cufon and Adiacent Font Files, and apply Cufon on used Styles -->
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/cufon.js", true);?>
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/Museo_400-Museo_italic_400.font.js", true);?>
    <!-- End Load -->

    <!-- Load Pretty Photo -->
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/_include/css/prettyPhoto.css");?>
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/jquery.prettyPhoto.js", true);?>
    <script type="text/javascript">
        /* pretty photo responds on rel='prettyPhoto' */
        jQuery(document).ready(function() { $("a[rel^='prettyPhoto']").prettyPhoto();   });
    </script>
    <!-- End Load -->

    <!-- Load Superfish Drowpdown Menu, and run it -->
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/jquery.hoverInt.js", true);?>
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/jquery.bgiframe.js", true);?>
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/superfish.js", true);?>
    <!-- End Load -->

    <!-- Load Jquery Roundabout, and adiacent JS & CSS file -->
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/jquery.roundabout.js", true);?>
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/jquery.roundabout-shapes-1.1.js", true);?>
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/_include/css/jquery.roundabout.css");?>
   <!-- End Load -->

    <!-- Load SWFObject, used for video embedding -->
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/swfobject.js", true);?>
    <!-- End Load -->

    <!-- Load Quicksand -->
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/jquery.quicksand.js", true);?>
    <!-- End Load -->

    <!-- Load some small custom scripts -->
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/custom.js", true);?>
    <!-- End Load -->

    <!-- Load PNG Fix older IE Versions -->
    <!--[if lt IE 7]>
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/pngfix.js", true);?>
    <script type="text/javascript">DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <!-- End Load -->

    <!-- Load Main Stylesheet -->
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/_include/css/style.css");?>
    <!-- End Load -->

    <!-- Load Alternate Stylesheets, can be disabled if not used -->
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/_include/css/style-orange.css");?>
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/_include/css/style-dirtyblue.css");?>
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/_include/css/style-redish.css");?>
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/_include/css/style-green.css");?>
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/_include/css/style-pink.css");?>
    <?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/_include/js/styleswitch.js", true);?>
    <!-- End Load -->

    <!-- Load Main Enhancements Stylesheet border radius, transparency and such things -->
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/_include/css/style-enhance.css");?>
    <!-- End Load -->

    <!-- Load IE Stylesheet -->
    <!--[if IE]>
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/_include/css/ie.css");?>
    <![endif]-->
    <!-- End Load -->

    <!-- Load IE6 Stylesheet -->
    <!--[if IE 6]>
    <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/_include/css/ie6.css");?>
    <![endif]-->
    <!-- End Load -->

</head>
<body>
<!-- start top and main menu -->
<div class="main-menu">
    <div class="ornament">
        <div class="containit">
            <?if(!CSite::InDir('/')):?><a href="/"><?endif;?>
                <?if(!CSite::InDir('/')):?></a><?endif;?>

            <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "",
                Array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "left",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "2",
                    "MENU_CACHE_GET_VARS" => array(""),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "left",
                    "USE_EXT" => "Y"
                )
            );?>
            <div class="menu">
                <!-- navigation start -->
                <div id="navigation">

                    <ul class="sf-menu">
                        <li class="current"><a href="index-roundabout.html" class="applyfont">Home</a>
                            <ul>
                                <li><a href="index-cycle.html">Home Normal</a></li>
                                <li><a href="index-roundabout-autoplay.html">Home Roundabout Autoplay</a></li>
                                <li><a href="index-roundabout.html">Home Roundabout</a></li>
                                <li><a href="index-nivo-slider.html">Home Nivo Slider</a></li>
                                <li class="last roundbottom"><a href="index-feature-carousel.html">Home Feature Carousel</a></li>
                            </ul>
                        </li>
                        <li><a href="gallery-grid.html" class="applyfont">Gallery</a>
                            <ul>
                                <li><a href="gallery-grid.html">Gallery Grid Filterable</a></li>
                                <li><a href="gallery-list.html">Gallery List</a></li>
                                <li><a href="gallery-grid-sidebar.html">Gallery Grid Sidebar</a></li>
                                <li><a href="blank.html">Another Page</a><ul>
                                        <li class="roundtop"><a href="blank.html">Risus malesuada mi</a></li>
                                        <li><a href="blank.html">Fusce tincidunt nisl nec</a></li>
                                        <li><a href="blank.html">Curabitur plac orci mi stincidunt</a></li>
                                        <li class="last roundbottom"><a href="blank.html">Nec lorem mattis</a></li>
                                    </ul>
                                </li>
                                <li class="last roundbottom"><a href="blank.html">Page With Stuff On It</a></li>
                            </ul>
                        </li>
                        <li><a href="faq.html" class="applyfont">FAQ</a></li>
                        <li><a href="services-wide.html" class="applyfont">Services</a>
                            <ul>
                                <li><a href="services-sidebar.html">Services Sidebar</a></li>
                                <li><a href="services-wide.html">Services Wide Big Icons</a></li>
                                <li class="last roundbottom"><a href="services-wide-small.html">Services Wide Small Icons</a></li>
                            </ul>
                        </li>
                        <li><a href="blog-grid.html" class="applyfont">Blog</a>
                            <ul>
                                <li><a href="blog-grid.html">Blog Style Grid</a></li>
                                <li><a href="blog-grid-noimage.html">Blog Style Grid No Image</a></li>
                                <li><a href="blog-list.html">Blog Style List</a></li>
                                <li class="last roundbottom"><a href="blog-list-noimage.html">Blog Style List No Image</a></li>
                            </ul>

                        </li>
                        <li class="last"><a href="contact-half.html" class="applyfont">Contact</a>
                            <ul>
                                <li><a href="contact-half.html">Contact Style Halfed</a></li>
                                <li class="last roundbottom"><a href="contact-wide.html">Contact Style Wide</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
                <!-- navigation end -->
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>

<!-- end top and main menu -->
<!-- start header alternate -->
<div class="header-alt">

    <div class="slide slide-roundabout bg1">
        <div class="containit ornament-right">
            <div class="roundaboutshadow">
                <h1 class="mb4">You can have a Bigger single  Roundabout here.</h1>
                <p class="mb20">Amazingly this IS compatible with all modern and current Browsers.</p>
                <!-- roundabout images targets, prettyphoto opens on click of the middle item -->

                <script type="text/javascript" charset="utf-8">
                    function roundaboutimage1(){  $.prettyPhoto.open('_include/images/showcase/showcase1.jpg', 'title', 'Some Brilliant Project'); }
                    function roundaboutimage2(){  $.prettyPhoto.open('_include/images/showcase/showcase2.jpg', 'title', 'Another One'); }
                    function roundaboutimage3(){  $.prettyPhoto.open('_include/images/showcase/showcase3.jpg', 'title', 'This is Insane'); }
                    function roundaboutimage4(){  $.prettyPhoto.open('_include/images/showcase/showcase4.jpg', 'title', 'Another Comment'); }
                    function roundaboutimage5(){  $.prettyPhoto.open('_include/images/showcase/showcase5.jpg', 'title', 'This roundabout Rules'); }
                    function roundaboutimage6(){  $.prettyPhoto.open('_include/images/showcase/showcase6.jpg', 'title', 'Awsome Commment'); }
                    function roundaboutimage7(){  $.prettyPhoto.open('_include/images/showcase/showcase7.jpg', 'title', 'And Another One'); }
                </script>
                <!-- the actual roundabout -->
                <ul id="roundabout">
                    <li id="roundaboutimage1"><a href="javascript:roundaboutimage1();"><img src="<?=SITE_TEMPLATE_PATH;?>/images/showcase/roundabout/showcase1.jpg" alt="" /></a></li>
                    <li id="roundaboutimage2"><a href="javascript:roundaboutimage2();"><img src="<?=SITE_TEMPLATE_PATH;?>/images/showcase/roundabout/showcase2.jpg" alt="" /></a></li>
                    <li id="roundaboutimage3"><a href="javascript:roundaboutimage3();"><img src="<?=SITE_TEMPLATE_PATH;?>/images/showcase/roundabout/showcase3.jpg" alt="" /></a></li>
                    <li id="roundaboutimage4"><a href="javascript:roundaboutimage4();"><img src="<?=SITE_TEMPLATE_PATH;?>/images/showcase/roundabout/showcase4.jpg" alt="" /></a></li>
                    <li id="roundaboutimage5"><a href="javascript:roundaboutimage5();"><img src="<?=SITE_TEMPLATE_PATH;?>/images/showcase/roundabout/showcase1.jpg" alt="" /></a></li>
                    <li id="roundaboutimage6"><a href="javascript:roundaboutimage6();"><img src="<?=SITE_TEMPLATE_PATH;?>/images/showcase/roundabout/showcase2.jpg" alt="" /></a></li>
                    <li id="roundaboutimage7"><a href="javascript:roundaboutimage7();"><img src="<?=SITE_TEMPLATE_PATH;?>/images/showcase/roundabout/showcase3.jpg" alt="" /></a></li>
                </ul>
                <div id="filler"><!--  --></div>
            </div>
            <!-- start the roundabout with descriptions -->
            <script type="text/javascript">
                //<![CDATA[
                var descs = {
                    roundaboutimage1: 'Some text about the item <a href="#">a link</a> here. ',
                    roundaboutimage2: 'He has the look of a wise, fierce warrior.',
                    roundaboutimage3: 'Attention all mice: you&rsquo;ve been warned.',
                    roundaboutimage4: 'Some text about the item <a href="#">a link</a> here.',
                    roundaboutimage5: 'Introducing: the INCREDIBLE ROUNDABOUT!',
                    roundaboutimage6: 'Attention all mice: you&rsquo;ve been warned.',
                    roundaboutimage7: 'Yes you can have Video here if you want.'
                };
                // settings for first button, for each roundabout image one setting
                var linkone = {
                    roundaboutimage1: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>View Details</span></a>',
                    roundaboutimage2: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>View Details</span></a>',
                    roundaboutimage3: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>View Details</span></a>',
                    roundaboutimage4: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>View Details</span></a>',
                    roundaboutimage5: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>View Details</span></a>',
                    roundaboutimage6: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>View Details</span></a>',
                    roundaboutimage7: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>View Details</span></a>'
                };
                // settings for second button, for each roundabout image one setting
                var linktwo = {
                    roundaboutimage1: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>Purchase This Now</span></a>',
                    roundaboutimage2: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>Get it at Themeforest</span></a>',
                    roundaboutimage3: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>Purchase This Now</span></a>',
                    roundaboutimage4: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>Get it at Themeforest</span></a>',
                    roundaboutimage5: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>Do Something Now</span></a>',
                    roundaboutimage6: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>Purchase This Now</span></a>',
                    roundaboutimage7: '<a class="btn-medium" href="http://themeforest.net/user/bogdanspn/portfolio?ref=bogdanspn"><span>Cufon Buttons are Sexy</span></a>'
                };
                // what happens on focus and on blur
                $('#roundabout li').focus(function() {
                    var useLinkone = (typeof linkone[$(this).attr('id')] != 'undefined') ? linkone[$(this).attr('id')] : '';
                    $('#roundaboutlinkone').html(useLinkone).fadeIn(200);
                    var useLinktwo = (typeof linktwo[$(this).attr('id')] != 'undefined') ? linktwo[$(this).attr('id')] : '';
                    $('#roundaboutlinktwo').html(useLinktwo).fadeIn(200);
                    var useText = (typeof descs[$(this).attr('id')] != 'undefined') ? descs[$(this).attr('id')] : '';
                    $('#roundaboutdescription').html(useText).fadeIn(200);
                    Cufon.replace('#roundaboutdescription, #roundaboutlinkone,  #roundaboutlinktwo', { hover: true, textShadow: '1px 1px 0 #ffffff', fontFamily: 'Museo' });
                }).blur(function() {
                    $('#roundaboutlinkone').fadeOut(200);
                    $('#roundaboutlinktwo').fadeOut(200);
                    $('#roundaboutdescription').fadeOut(200);
                });

                $(document).ready(function() {
                    var interval;
                    $('#roundabout')
                        .roundabout({
                            shape: 'lazySusan',
                            easing: 'swing',
                            minOpacity: 1, // 1 fully visible, 0 invisible
                            minScale: 0.5, // tiny!
                            duration: 400,
                            btnNext: '#roundaboutnext',
                            btnPrev: '#roundaboutprevious',
                            clickToFocus: true
                        });
                });
                function startAutoPlay() {
                    return setInterval(function() {
                        $('#roundabout').roundabout_animateToNextChild();
                    }, 3000);
                }
                //]]>
            </script>
        </div>

    </div>

</div>
<!-- end header alternate-->

<!-- start main content -->
<div class="main-content pt-alt">
    <div class="containit">

