<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/google-maps.css"/>

<!-- - - - - - - - - - SECTION - - - - - - - - - -->

<div class="pi-section-w pi-section-base pi-section-parallax" style="background-image: url(<?= base_url() ?>assets/img_external/gallery/boat.jpg);">
    <div class="pi-texture" style="background: rgba(24, 28, 32, 0.8);"></div>
    <div class="pi-section pi-padding-top-100 pi-padding-bottom-80 pi-text-center">

        <p>
            <i class="icon-paper-plane pi-icon-circle pi-icon-base pi-icon-big" style="width: 74px; height: 74px; line-height: 74px;"></i>
        </p>

        <h2 class="h1 pi-text-shadow pi-has-border pi-has-tall-border pi-has-base-border pi-has-short-border" style="font-size: 60px;">
            Feel Free. <span class="pi-text-base">Say Hey!</span>
        </h2>

        <p class="lead-18 pi-weight-300 pi-margin-bottom-30 pi-p-half">
            Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod
        </p>

    </div>
</div>

<!-- - - - - - - - - - END SECTION - - - - - - - - - -->

<!-- - - - - - - - - - SECTION - - - - - - - - - -->

<!-- Breadcrumbs -->
<div class="pi-section-w pi-border-bottom pi-section-grey">
    <div class="pi-section pi-titlebar pi-breadcrumb-only">
        <div class="pi-breadcrumb">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Company</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
</div>
<!-- End breadcrumbs -->

<!-- - - - - - - - - - END SECTION - - - - - - - - - -->

<!-- - - - - - - - - - SECTION - - - - - - - - - -->

<div class="pi-section-w pi-section-white piICheck piStylishSelect piSocials">
    <div class="pi-section">

        <div class="pi-row">
            <div class="pi-col-sm-8">
                <h2 class="h4 pi-has-bg pi-weight-700 pi-uppercase pi-letter-spacing pi-margin-bottom-30">
                    Get In Touch
                </h2>

                <!-- Contact form -->
                <form role="form" action="handlers/formContact.php" class="pi-contact-form">
                    <div class="pi-error-container"></div>
                    <div class="pi-row pi-grid-small-margins">
                        <div class="pi-col-sm-6">
                            <div class="form-group pi-padding-bottom-10">
                                <label for="exampleInputName1">Name *</label>
                                <input type="text" class="form-control form-control-name" id="exampleInputName1"
                                       placeholder="e.g. Adam Smith">
                            </div>
                            <div class="form-group pi-padding-bottom-10">
                                <label for="exampleInputEmail1">Email address *</label>
                                <input type="email" class="form-control form-control-email" id="exampleInputEmail1"
                                       placeholder="e.g. mail@example.com">
                            </div>
                        </div>
                        <div class="pi-col-sm-6">
                            <div class="form-group pi-padding-bottom-10">
                                <label for="exampleInputCompany">Company Name</label>
                                <input type="text" class="form-control form-control-company-name" id="exampleInputCompany"
                                       placeholder="e.g. PI Studio">
                            </div>
                            <div class="form-group pi-padding-bottom-10">
                                <label for="exampleInputPhone">Phone</label>
                                <input type="text" class="form-control form-control-phone" id="exampleInputPhone"
                                       placeholder="e.g. +11111111">
                            </div>
                        </div>
                    </div>
                    <div class="form-group pi-padding-bottom-10">
                        <label for="exampleInputSelect">Your Budget</label>
                        <select class="form-control form-control-budjet" id="exampleInputSelect">
                            <option>$1000</option>
                            <option>$1500</option>
                            <option>$3000</option>
                            <option>$5000</option>
                            <option>$10000</option>
                        </select>
                    </div>
                    <div class="form-group pi-padding-bottom-10">
                        <label for="exampleInputMessage1">Message *</label>
                        <textarea class="form-control form-control-comments" id="exampleInputMessage1" placeholder="How can we help?" rows="3"></textarea>
                    </div>
                    <div  class="form-group pi-padding-bottom-10">
                        <script type="text/javascript">
                            var RecaptchaOptions = {
                                theme: 'clean'
                            };
                        </script>
                        <script type="text/javascript"
                                src="http://www.google.com/recaptcha/api/challenge?k=6LcQ-_USAAAAACuWYZck-TkqvxpqeptnCgasjQlJ">
                        </script>
                        <noscript>
                        <iframe src="http://www.google.com/recaptcha/api/noscript?k=6LcQ-_USAAAAACuWYZck-TkqvxpqeptnCgasjQlJ"
                                height="300" width="500" frameborder="0"></iframe><br>
                        <textarea name="recaptcha_challenge_field" rows="3" cols="40">
                        </textarea>
                        <input type="hidden" name="recaptcha_response_field"
                               value="manual_challenge">
                        </noscript>
                    </div>
                    <p>
                        <button class="btn pi-btn-base">
                            Send Message<i class="icon-paper-plane pi-icon-right"></i>
                        </button>
                    </p>
                </form>
                <!-- End contact form -->

            </div>
            <div class="pi-col-sm-4">

                <h2 class="h4 pi-has-bg pi-weight-700 pi-uppercase pi-letter-spacing pi-margin-bottom-30">
                    Contact Us
                </h2>

                <ul class="pi-list-with-icons pi-list-big-margins pi-padding-bottom-10">
                    <li><span class="pi-bullet-icon"><i class="icon-location"></i></span>557 Cyan Avenue, Suite 65, <br>New York, CA 9008<br>
                        <a href="#">Get Directions</a></li>

                    <li><span class="pi-bullet-icon"><i class="icon-mail"></i></span><a href="#">example@mail.com</a><br><a href="#">hello@mail.com</a></li>

                    <li><span class="pi-bullet-icon"><i class="icon-phone"></i></span>+1 (330) <strong>993-443</strong>, <br>
                        +1 (330) <strong>995-445</strong></li>

                    <li><span class="pi-bullet-icon"><i class="icon-clock"></i></span>Monday - Friday: <strong>9:00 am - 10:00 pm</strong>
                        <br>
                        Saturday - Sunday: <strong>Closed</strong></li>
                </ul>
                <ul class="pi-social-icons pi-small pi-jump pi-colored-bg pi-round pi-padding-bottom-10">
                    <li><a href="#" class="pi-social-icon-facebook"><i class="icon-facebook"></i></a></li>
                    <li><a href="#" class="pi-social-icon-twitter"><i class="icon-twitter"></i></a></li>
                    <li><a href="#" class="pi-social-icon-dribbble"><i class="icon-dribbble"></i></a></li>
                    <li><a href="#" class="pi-social-icon-rss"><i class="icon-rss"></i></a></li>
                </ul>

            </div>
        </div>

    </div>
</div>

<!-- - - - - - - - - - END SECTION - - - - - - - - - -->


<!-- Footer -->
<!-- Widget area -->
<div class="pi-section-w pi-border-bottom pi-border-top-light pi-section-dark">
    <div class="pi-section pi-padding-bottom-10">

        <!-- Row -->
        <div class="pi-row">

            <!-- Col 4 -->
            <div class="pi-col-md-4 pi-padding-bottom-30">

                <h6 class="pi-margin-bottom-25 pi-weight-700 pi-uppercase pi-letter-spacing">
                    <a href="#" class="pi-link-no-style">Latest Tweet</a>
                </h6>

                <!-- Twitter -->
                <div class="pi-footer-tweets"><ul class="pi-bullets-circle pi-bullets-base pi-bullets pi-list-big-margins"><li><span class="pi-bullet-icon"><i class="icon-twitter"></i></span><a href="http://twitter.com/PIthemess" target="_blank" title="PIthemess on Twitter">@PIthemess</a> Meet Aura 1.6 version. A lot of new things are coming soon. <br><span class="pi-smaller-text pi-italic pi-text-opacity-50">Jun. 29, 2014</span></li><li><span class="pi-bullet-icon"><i class="icon-twitter"></i></span><a href="http://twitter.com/PIthemess" target="_blank" title="PIthemess on Twitter">@PIthemess</a> Hey, this is PI Themes twitter account! <br><span class="pi-smaller-text pi-italic pi-text-opacity-50">Jun. 29, 2014</span></li></ul></div>
                <!-- End twitter -->

            </div>
            <!-- End col 4 -->

            <div class="pi-clearfix pi-hidden-lg-only pi-hidden-md-only"></div>

            <!-- Col 4 -->
            <div class="pi-col-md-4 pi-col-sm-6 pi-padding-bottom-30" style="background-image: url('<?= base_url() ?>assets/img/map-base.png'); background-position: 50% 55px; background-repeat: no-repeat;">

                <h6 class="pi-margin-bottom-25 pi-weight-700 pi-uppercase pi-letter-spacing">
                    Contact Us
                </h6>

                <!-- Contact info -->
                <ul class="pi-list-with-icons pi-list-big-margins">

                    <li>
                        <span class="pi-bullet-icon"><i class="icon-location"></i></span>
                        <strong>Address:</strong> 557 Cyan Avenue, Suite 65, <br>New York, CA 9008
                    </li>

                    <li>
                        <span class="pi-bullet-icon"><i class="icon-phone"></i></span>
                        <strong>Phone:</strong> (123) 456-7890
                    </li>

                    <li>
                        <span class="pi-bullet-icon"><i class="icon-mail"></i></span>
                        <strong>Email:</strong> <a href="mailto:hello@pitheme.com">hello@pitheme.com</a>
                    </li>

                    <li>
                        <span class="pi-bullet-icon"><i class="icon-clock"></i></span>
                        Monday - Friday: <strong>9:00 am - 10:00 pm</strong>
                        <br>
                        Saturday - Sunday: <strong>Closed</strong>
                    </li>

                </ul>
                <!-- End contact info -->

            </div>
            <!-- End col 4 -->

            <!-- Col 4 -->
            <div class="pi-col-md-4 pi-col-sm-6 pi-padding-bottom-30">

                <h6 class="pi-margin-bottom-25 pi-weight-700 pi-uppercase pi-letter-spacing">
                    Say Hey
                </h6>

                <!-- Contact form -->
                <form role="form" action="handlers/formContact.php" data-captcha="no" class="pi-contact-form">
                    <div class="pi-error-container"></div>
                    <div class="pi-row pi-grid-small-margins">
                        <div class="pi-col-2xs-6">
                            <div class="form-group">
                                <div class="pi-input-with-icon">
                                    <div class="pi-input-icon"><i class="icon-user"></i></div>
                                    <input class="form-control form-control-name" id="exampleInputName"
                                           placeholder="Name">
                                </div>
                            </div>
                        </div>
                        <div class="pi-col-2xs-6">
                            <div class="form-group">
                                <div class="pi-input-with-icon">
                                    <div class="pi-input-icon"><i class="icon-mail"></i></div>
                                    <input type="email" class="form-control form-control-email" id="exampleInputEmail"
                                           placeholder="Email">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="pi-input-with-icon">
                            <div class="pi-input-icon"><i class="icon-pencil"></i></div>
                            <textarea class="form-control form-control-comments" id="exampleInputMessage"
                                      placeholder="Message"
                                      rows="3"></textarea>
                        </div>
                    </div>
                    <p>
                        <button type="submit" class="btn pi-btn-base pi-btn-no-border">Send</button>
                    </p>
                </form>
                <!-- End contact form -->
            </div>
            <!-- End col 4 -->
        </div>
        <!-- End row -->
    </div>
</div>
<!-- End widget area -->

