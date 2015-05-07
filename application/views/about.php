<!-- Title bar -->
<div class="pi-section-w pi-section-base pi-section-base-gradient">
    <div class="pi-texture" style="background: url(<?= base_url() ?>assets/img/hexagon.png) repeat;"></div>
    <div class="pi-section" style="padding: 30px 40px 26px;">
        <div class="pi-row">
            <div class="pi-col-sm-12 pi-center-text-xs">
                <h1 class="h2 pi-weight-300 pi-margin-bottom-5"><?= isset($about->title) ? $about->title : "About Us" ?></h1>
            </div>
        </div>
    </div>
</div>
<!-- End title bar -->

<!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white pi-slider-enabled">
    <div class="pi-section pi-padding-top-bottom-80">
        <?= isset($about->content) ? $about->content : "" ?>
    </div>
</div>

<!-- - - - - - - - - - END SECTION - - - - - - - - - -->

<!-- - - - - - - - - - SECTION - - - - - - - - - - - -->
<div class="pi-section-w pi-shadow-inside-top pi-section-grey">
    <div class="pi-texture" style="background: url(<?= base_url() ?>assets/img/hexagon.png) repeat;"></div>
    <div class="pi-section">

        <div class="pi-text-center">
            <h3 class="pi-weight-700 pi-uppercase pi-letter-spacing pi-has-border pi-has-tall-border pi-has-short-border">
                Subscribe
            </h3>
        </div>

        <p class="lead-16 pi-text-center">
            Get Awesome Stuff !
        </p>

        <!-- Forms -->
        <form id="subscribeForm" class="pi-search-form-wide pi-text-center pi-margin-bottom-20" role="form">
            <div class="pi-input-inline" style="margin-right: 10px; width: 360px;">
                <input type="text" class="form-control input-lg pi-input-wide" name='name'  placeholder="Enter Your Name" required="">
            </div>
            <div class="pi-input-inline" style="margin-right: 10px; width: 360px;">
                <input type="email" class="form-control input-lg pi-input-wide" name='email'  placeholder="Enter email address">
            </div>
            <button type="button" id="subscribe" class="btn pi-btn-base pi-btn-big">Submit</button>
        </form>
        <!-- End forms -->
        <p id="msg"  class="pi-text-center"></p>
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
                <div class="pi-footer-tweets">
                    <a class="twitter-timeline" href="https://twitter.com/mvkbiz" data-widget-id="575160733849145344">Tweets by @mvkbiz</a>
                    <script>!function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                            if (!d.getElementById(id)) {
                                js = d.createElement(s);
                                js.id = id;
                                js.src = p + "://platform.twitter.com/widgets.js";
                                fjs.parentNode.insertBefore(js, fjs);
                            }
                        }(document, "script", "twitter-wjs");
                    </script>
                </div>
                <!-- End twitter -->
            </div>
            <!-- End col 4 -->
            <div class="pi-clearfix pi-hidden-lg-only pi-hidden-md-only"></div>
            <!-- Col 4 -->
            <div class="pi-col-md-4 pi-col-sm-6 pi-padding-bottom-30" style="background-image: url('img/map-base.png'); background-position: 50% 55px; background-repeat: no-repeat;">

                <h6 class="pi-margin-bottom-25 pi-weight-700 pi-uppercase pi-letter-spacing">
                    Contact Us
                </h6>

                <!-- Contact info -->
                <ul class="pi-list-with-icons pi-list-big-margins">

                    <!--                    <li>
                                            <span class="pi-bullet-icon"><i class="icon-location"></i></span>
                                            <strong>Address:</strong> 557 Cyan Avenue, Suite 65, <br>New York, CA 9008
                                        </li>-->

                    <!--                    <li>
                                            <span class="pi-bullet-icon"><i class="icon-phone"></i></span>
                                            <strong>Phone:</strong> (123) 456-7890
                                        </li>-->

                    <li>
                        <span class="pi-bullet-icon"><i class="icon-mail"></i></span>
                        <strong>Email:</strong> <a href="mailto:mikhail@mikhailkuznetsov.com">mikhail@mikhailkuznetsov.com</a>
                    </li>

                    <!--                    <li>
                                            <span class="pi-bullet-icon"><i class="icon-clock"></i></span>
                                            Monday - Friday: <strong>9:00 am - 10:00 pm</strong>
                                            <br>
                                            Saturday - Sunday: <strong>Closed</strong>
                                        </li>-->

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
                <form role="form" id="contactForm"  data-captcha="no" class="pi-contact-form">
                    <div class="pi-error-container"></div>
                    <div class="pi-row pi-grid-small-margins">
                        <div class="pi-col-2xs-6">
                            <div class="form-group">
                                <div class="pi-input-with-icon">
                                    <div class="pi-input-icon"><i class="icon-user"></i></div>
                                    <input name="name" class="form-control form-control-name" id="exampleInputName" placeholder="Name">
                                </div>
                            </div>
                        </div>
                        <div class="pi-col-2xs-6">
                            <div class="form-group">
                                <div class="pi-input-with-icon">
                                    <div class="pi-input-icon"><i class="icon-mail"></i></div>
                                    <input name="email" type="email" class="form-control form-control-email" id="exampleInputEmail" placeholder="Email">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="pi-input-with-icon">
                            <div class="pi-input-icon"><i class="icon-pencil"></i></div>
                            <textarea name="message" class="form-control form-control-comments" id="exampleInputMessage"  placeholder="Message" rows="3"></textarea>
                        </div>
                    </div>
                    <p>
                        <button type="button" id="send" class="btn pi-btn-base pi-btn-no-border">Send</button>
                    <div id="msg" style="color:white"></div>
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
<script type="text/javascript">
    $(document).ready(function () {
        $('#send').click(function () {
            $.ajax({
                type: 'POST',
                data: $('#contactForm').serialize(),
                url: "<?= site_url() ?>about/send",
                success: function (data, textStatus, jqXHR) {
                    $('#contactForm').trigger('reset');
                    if (data == 1) {
                        $('#msg').html("Message Successfully Delivered..!");
                    } else {
                        $('#msg').css("color", 'red');
                        $('#msg').html("Message Not Successfully Delivered..!");
                    }
                    $('#msg').fadeOut(4000);
                }
            });
        });
        $('#subscribe').on('click', function () {
            var email = $('#subscr_email').val();
            var email = $('#subscribeForm input[name="email"]').val();
            var name = $('#subscribeForm input[name="name"]').val();

            if (name.trim() == "") {
                $('input[name="name"]').css('border-color', 'red');
                return false;
            } else {
                $('input[name="name"]').css('border-color', '#dde1e1');
            }
            if (email.trim() == "") {
                $('input[name="email"]').css('border-color', 'red');
                return false;
            } else {
                $('input[name="email"]').css('border-color', '#dde1e1');
            }
            $.ajax({
                type: 'POST',
                data: {email: email, name: name, joined_url: "<?= site_url() . uri_string() ?>"},
                url: "<?= site_url() ?>homepage/addSubscriber",
                success: function (data, textStatus, jqXHR) {
                    if (data == 1) {
                        $('#subscribeForm').trigger('reset');
                        $('#msg').css('color', 'green');
                        $('#msg').text("Thank you for subscribing our Newsletter..!");
                    } else {
                        $('#msg').css('color', 'red');
                        $('#msg').text("You have already subscribed our newsletter..!");
                    }
                }
            });
        });
    });
</script>
