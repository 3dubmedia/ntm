<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php print $head_title; ?></title>

    <!-- FAVICON -->
    <link rel="icon" type="img/jpg" href="/sites/all/themes/Rival/assets/images/NS/favicon.png" />

    <!-- FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>

    <!-- Universal Stylesheet -->
    <?php print $styles; ?>

    <!-- CSS -->
    <link href="/<?php print path_to_theme(); ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/<?php print path_to_theme(); ?>/assets/css/simpletextrotator.css" rel="stylesheet">
    <link href="/<?php print path_to_theme(); ?>/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/<?php print path_to_theme(); ?>/assets/css/et-line-font.css" rel="stylesheet">
    <link href="/<?php print path_to_theme(); ?>/assets/css/magnific-popup.css" rel="stylesheet">
    <link href="/<?php print path_to_theme(); ?>/assets/css/flexslider.css" rel="stylesheet">
    <link href="/<?php print path_to_theme(); ?>/assets/css/owl.carousel.css" rel="stylesheet">
    <link href="/<?php print path_to_theme(); ?>/assets/css/animate.css" rel="stylesheet">
    <link href="/<?php print path_to_theme(); ?>/assets/css/style.css" rel="stylesheet">
    <link href="/<?php print path_to_theme(); ?>/assets/css/style-NS.css" rel="stylesheet">

    <!-- Script Libraries -->
    <?php print $scripts; ?>

</head>

<body id="home">

        <!-- Preloader -->
    <div class="page-loader">
        <div class="loader">Loading...</div>
    </div>

    <!-- Navigation start -->
    <nav class="navbar navbar-custom navbar-transparent navbar-fixed-top header" role="navigation">

        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="header-logo" href="/"><img src="/<?php print path_to_theme(); ?>/assets/images/NS/northstar-logo.png" width="248" height="74" alt="header-logo" /></a>
            </div>

            <div class="collapse navbar-collapse" id="custom-collapse">

                <?php
                    $tree = menu_tree_page_data('main-menu'); 
                    foreach($tree as $key => $mi) {
      
                        if ($tree[$key]['below']) {
                            $menu[$tree[$key]['link']['title']] = $tree[$key]['below'];

                            foreach($menu[$tree[$key]['link']['title']] as $mkey => $mmi) {
                                if ($mmi['below']) {
                                    $mmenu[$mmi['link']['title']] = $mmi['below'];
                                }
                            }
                        }
                    }
                ?>

                <ul class="nav navbar-nav navbar-right">

                    <?php
                        $menuCount = 1;

                        $main_menu = menu_navigation_links('main-menu');

                        foreach ($main_menu as $key => $value) {
                            $tmpHref = $value['href'];
                            $tmpTitle = $value['title'];
                            $isExternal = (strpos($tmpHref, "http") === false) ? false:true;
                            if ($tmpHref == '<front>'){
                                $tmpHref = '/';
                            } else if(!$isExternal) {
                                $tmpHref = "/" . drupal_get_path_alias($tmpHref);
                            }

                            if($menu[$tmpTitle]) { // has children
                                if(strcmp($tmpHref,"/") == 0) {
                                    print "<li class='dropdown'><a class='title'>" . $value['title'] . "</a><div class='sub-toggle dropdown-toggle' data-toggle='dropdown'></div>"; // not clickable
                                } else {
                                    print "<li class='dropdown'><a class='title' href='$tmpHref'>" . $value['title'] . "</a><div class='sub-toggle dropdown-toggle' data-toggle='dropdown'></div>"; // clickable
                                }
                            } else { // no children
                                if(strcmp($tmpHref,"/") == 0) {
                                    print "<li class='dropdown'><a class='title'>" . $value['title'] . "</a>"; // not clickable
                                } else {
                                    print "<li class='dropdown'><a class='title' href='$tmpHref'>" . $value['title'] . "</a>"; // clickable
                                }
                            }

                            if($menu[$tmpTitle]) {
                                print "<ul class='dropdown-menu'>";

                                foreach($menu[$tmpTitle] as $mKey => $mValue){
                                    if(!$mValue['link']['hidden']){
                                        $mTmpHref = $mValue['link']['href'];
                                        $mTmpTitle = $mValue['link']['title'];
                                        $isExternal = (strpos($mTmpHref, "http") === false) ? false:true;
                                        if ($mTmpHref == '<front>'){
                                            $mTmpHref = '/';
                                        } else if(!$isExternal) {
                                            $mTmpHref = "/" . drupal_get_path_alias($mTmpHref);
                                        }
                 
                                        if($mmenu[$mTmpTitle]) { // has children
                                            if(strcmp($mTmpHref,"/") == 0) {
                                                print "<li class='dropdown'><a class='title'>" . $mValue['link']['title'] . "</a><div class='sub-toggle dropdown-toggle' data-toggle='dropdown'></div>"; // not clickable
                                            } else {
                                                print "<li class='dropdown'><a class='title' href='$mTmpHref'>" . $mValue['link']['title'] . "</a><div class='sub-toggle dropdown-toggle' data-toggle='dropdown'></div>"; // clickable
                                            }
                                        } else { // no children
                                            if(strcmp($mTmpHref,"/") == 0) {
                                                print "<li class='dropdown'><a class='title'>" . $mValue['link']['title'] . "</a>"; // not clickable
                                            } else {
                                                print "<li class='dropdown'><a class='title' href='$mTmpHref'>" . $mValue['link']['title'] . "</a>"; // clickable
                                            }
                                        }

                                        if($mmenu[$mTmpTitle]) {
                                            print "<ul class='dropdown-menu'>";
                                            foreach($mmenu[$mTmpTitle] as $mmKey => $mmValue){
                                                if(!$mmValue['link']['hidden']){
                                                    $mmTmpHref = $mmValue['link']['href'];
                                                    $mmTmpTitle = $mmValue['link']['title'];
                                                    $isExternal = (strpos($mmTmpHref, "http") === false) ? false:true;
                                                    if ($mmTmpHref == '<front>'){
                                                        $mmTmpHref = '/';
                                                    } else if(!$isExternal) {
                                                        $mmTmpHref = "/" . drupal_get_path_alias($mmTmpHref);
                                                    }
                                                    print "<li class='dropdown'><a href='$mmTmpHref'>" . $mmValue['link']['title'] . "</a>";

                                                    print "</li>";
                                                }
                                            }
                                            print "</ul>";
                                        }

                                        print "</li>";
                                    }
                                }
                                print "</ul>";
                            }

                            print "</li>";

                            $menuCount++;

                        }
                    ?>

                    <li class="dropdown">
                        <form class="search-form" action="/search/node" method="post" id="search-form" accept-charset="UTF-8" role="form">

                            <input type="text" id="edit-keys" name="keys" value="" class="form-text form-control" name="search_block_form" />

                            <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                        </form>
					</li>

                </ul>
            </div>

        </div>

    </nav>
    <!-- Navigation end -->

    <?php print $page; ?>

    <!-- Footer start -->
<footer class="footer bg-dark">
    <div class="container">

        <div class="row">

            <div class="col-sm-8">
                <div class="footer-logo">
                    <a href="#"><img src="/<?php print path_to_theme(); ?>/assets/images/NS/northstar-logo-footer.png" width="152" height="30" alt="" /></a><p class="copyright font-alt">&copy; Copyright 2015, Northstar Travel Group, all rights reserved.</p>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="footer-social-links">
                    <a href="#">Terms of Use</a>
                    <a href="#">Privacy Policy</a>
                </div>
            </div>

        </div><!-- .row -->

    </div>
</footer>
<!-- Footer end -->

</div>
<!-- Wrapper start -->



<!-- Javascript files -->
<script src="/<?php print path_to_theme(); ?>/assets/js/jquery-2.1.3.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenLite.min.js"></script>
<script src="/<?php print path_to_theme(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/<?php print path_to_theme(); ?>/assets/js/jquery.mb.YTPlayer.min.js"></script>
<script src="/<?php print path_to_theme(); ?>/assets/js/appear.js"></script>
<script src="/<?php print path_to_theme(); ?>/assets/js/jquery.simple-text-rotator.min.js"></script>
<script src="/<?php print path_to_theme(); ?>/assets/js/jqBootstrapValidation.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="/<?php print path_to_theme(); ?>/assets/js/gmaps.js"></script>
<script src="/<?php print path_to_theme(); ?>/assets/js/isotope.pkgd.min.js"></script>
<script src="/<?php print path_to_theme(); ?>/assets/js/imagesloaded.pkgd.js"></script>
<script src="/<?php print path_to_theme(); ?>/assets/js/jquery.flexslider-min.js"></script>
<script src="/<?php print path_to_theme(); ?>/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/<?php print path_to_theme(); ?>/assets/js/jquery.fitvids.js"></script>

<script src="/<?php print path_to_theme(); ?>/assets/js/wow.min.js"></script>
<script src="/<?php print path_to_theme(); ?>/assets/js/owl.carousel.min.js"></script>
<script src="/<?php print path_to_theme(); ?>/assets/js/contact.js"></script>
<script src="/<?php print path_to_theme(); ?>/assets/js/custom.js"></script>
<script src="/<?php print path_to_theme(); ?>/assets/js/jquery-NS.js"></script>

<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-22053006-1']);
    _gaq.push(['_setDomainName', '.northstartravelmedia.com']);
    _gaq.push(['_trackPageview']);
    (function () {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>

</body>
</html>
