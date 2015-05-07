<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        $page = $this->uri->segment(1);
        ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
        <title><?= (isset($single)) ? $single->title : $page ?></title>

        <!-- for Facebook -->          
        <?php if (isset($single)): ?>
            <?php
            $img_src = ($single->feature_img != "") ?
                    "http://mikhailkuznetsov.s3.amazonaws.com/" . $single->feature_img :
                    base_url() . 'assets/img_external/gallery/default.jpg';

            function chop_string($string, $x = 200) {
                $string = strip_tags(stripslashes($string)); // convert to plaintext
                return substr($string, 0, strpos(wordwrap($string, $x), "\n"));
            }
            ?>
            <meta property="og:title" content="<?= $single->title ?>" />
            <meta property="og:type" content="article" />
            <meta property="og:image" content="<?= $img_src ?>" />
            <meta property="og:url" content="http://mikhailkuznetsov.com/home/blogs/single_post/<?= $single->blog_id ?>" />
            <meta property="og:description" content="<?= chop_string($single->content, 100) ?>" />
        <?php endif; ?>

        <link rel="shortcut icon" href="<?= base_url() ?>assets/favicon.ico"/>

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/3dParty/bootstrap/css/bootstrap.min.css"/>

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/global.css"/>

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/3dParty/rs-plugin/css/pi.settings.css"/>

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/typo.css"/>

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/3dParty/colorbox/colorbox.css"/>

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/boxes.css"/>

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/portfolio.css"/>

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/slider.css"/>

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/counters.css"/>

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/tooltips.css"/>

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/testimonials.css"/>

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/accordion.css"/>

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/page-nav.css"/>

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/social.css"/>

        <!--Fonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic'
              rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <!--Fonts with Icons-->
        <link rel="stylesheet" href="<?= base_url() ?>assets/3dParty/fontello/css/fontello.css"/>

        <script src="<?= base_url() ?>assets/3dParty/jquery-1.11.0.min.js"></script>
        <script src="<?= base_url() ?>assets/3dParty/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/3dParty/autohidingnavbar.js"></script>
    </head>
    <body>
        <?php $name = $this->session->userdata('name'); ?>
        <div id="pi-all">

            <!-- Header -->
            <div class="pi-header pi-header-row-sm-fixed">

                <div class="pi-header-sticky">
                    <!-- Header row -->
                    <div class="pi-section-w pi-section-dark pi-shadow-bottom">
                        <div class="pi-section pi-row-sm">

                            <div style="margin-right:1%" class="pi-row-block pi-pull-left pi-row-block-txt" >
                                <?php if ($name != ""): ?>
                                    <a style="color: #bfc8cd" href="<?= site_url() ?>logout"><span>Logout</span></a>
                                <?php else : ?>
                                    <a style="color: #bfc8cd" href="<?= site_url() ?>login"><span>Login</span></a> / 
                                    <a style="color: #bfc8cd" href="<?= site_url() ?>register"><span>Register</span></a>
                                <?php endif; ?>
                            </div>

                            <!-- Menu -->
                            <div class="pi-row-block pi-pull-left">
                                <ul class="pi-simple-menu pi-has-hover-border pi-full-height pi-hidden-sm">
                                    <!--<li class="active"><a href="<?= site_url() ?>homepage"><span>Home</span></a></li>-->
                                    <li class=""><a href="<?= site_url() ?>blogs"><span>Blog</span></a></li>
                                    <li class=""><a href="<?= site_url() ?>about"><span>About</span></a></li>
                                </ul>
                            </div>
                            <!-- End menu -->
                            <!-- Social icons -->
                            <div class="pi-row-block pi-pull-right pi-hidden-2xs">
                                <ul class="pi-social-icons pi-stacked pi-jump pi-full-height pi-bordered pi-small pi-colored-bg clearFix">
                                    <li><a href="https://twitter.com/mvkbiz" class="pi-social-icon-twitter"><i class="icon-twitter"></i></a></li>
                                    <li><a href="https://www.facebook.com/mvkbiz" class="pi-social-icon-facebook"><i class="icon-facebook"></i></a></li>
                                    <li><a href="http://instagram.com/swimmusic/" class="pi-social-icon-instagram"><i class="icon-instagram"></i></a></li>
                                </ul>
                            </div>
                            <!-- End social icons -->

                            <!-- Text -->
                            <div class="pi-row-block pi-row-block-txt pi-pull-right pi-hidden-xs">Follow Us:</div>
                            <!-- End text -->

                            <!--- Owner Name ---->
                            <div style="margin:1% 0 0 18%;" class="pi-row-block pi-pull-left pi-row-block-txt">
                                <a href="<?= site_url() ?>homepage">
                                    <h4 style="font-family: 'Lobster', cursive;">Mikhail Kuznetsov</h4>
                                </a>
                            </div>
                            <!--- End Owner Name ---->

                            <!-- Mobile menu button -->
                            <div class="pi-row-block pi-pull-right pi-hidden-lg-only pi-hidden-md-only">
                                <button class="btn pi-btn pi-mobile-menu-toggler" data-target="#pi-main-mobile-menu">
                                    <i class="icon-menu pi-text-center"></i>
                                </button>
                            </div>
                            <!-- End mobile menu button -->
                            <!-- Mobile menu -->
                            <div id="pi-main-mobile-menu" class="pi-section-menu-mobile-w pi-section-dark">
                                <div class="pi-section-menu-mobile">
                                    <ul class="pi-menu-mobile pi-items-have-borders pi-menu-mobile-dark">
                                        <li class="active"><a href="<?= site_url() ?>homepage"><span>Home</span></a></li>
                                        <li class=""><a href="<?= site_url() ?>blogs"><span>Blog</span></a></li>
                                        <li class=""><a href="<?= site_url() ?>about"><span>About</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End mobile menu -->
                        </div>
                    </div>
                    <!-- End header row -->
                </div>
            </div>

            <?php if ($name != ""): ?>
                <div class="pi-row-sm pi-section-dark" style="border-top: 1px solid #2e343a;text-align: center">
                    <div class="pi-row-block-txt">
                        You are login as : 
                        <span style="font-family: 'Lobster', cursive;font-size: 20px;line-height: 1.3em;margin-bottom: 10px;letter-spacing: 0;color: white">
                            <?= $name ?>
                        </span>
                    </div>
                </div>
            <?php endif; ?>
            <!-- End header -->
            <script>
                $("div.pi-header-sticky").autoHidingNavbar();
            </script>
