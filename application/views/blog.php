<!-- - - - - - - - - - SECTION - - - - - - - - - -->



<!-- - - - - - - - - - END SECTION - - - - - - - - - -->

<!-- - - - - - - - - - SECTION - - - - - - - - - -->

<div class="pi-section-w pi-section-white piCaptions">
    <div class="pi-section pi-padding-bottom-60">

        <!-- Filter -->
        <div class="pi-pagenav pi-padding-bottom-20 pi-big pi-text-center" data-isotope-nav="isotope">
            <ul>
                <li><a href="#" class="pi-active" data-filter="*">All</a></li>
                <?php foreach ($category as $key => $value) { ?>
                <li><a href="#" data-filter=".<?= "category_" . $value->category_id ?>"><?= $value->category_name ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <!-- End filter -->

        <!-- Portfolio gallery -->
        <div id="isotope" class="pi-row pi-liquid-col-xs-2 pi-liquid-col-sm-3 pi-gallery pi-gallery-small-margins pi-text-center isotope">
            <?php foreach ($blogs as $value) { ?>
                <?php
                $img_src = ($value->feature_img != "") ?
                        "http://mikhailkuznetsov.s3.amazonaws.com/" . $value->feature_img :
                        base_url() . 'assets/img_external/gallery/default.jpg';
                ?>
                <!-- Portfolio item -->
                <div class="<?= 'category_' . $value->category_id ?> Morning pi-gallery-item isotope-item">
                    <div class="pi-img-w pi-img-shadow pi-img-with-overlay pi-no-margin-bottom">
                        <img style="width:333px;height:233px" src="<?= $img_src ?>" alt="">
                        <div class="pi-img-overlay pi-overlay-slide pi-show-heading">
                            <h6 class="pi-weight-700 pi-uppercase pi-letter-spacing pi-margin-top-minus-5 pi-text-shadow">
                                <a href="<?= site_url() ?>blogs/single_post/<?= $value->blog_id ?>" class="pi-link-white"><?= $value->title ?></a>
                            </h6>

                                                                        <!--<p class="pi-margin-top-minus-5 pi-margin-bottom-15"></p>-->
                            <a href="<?= site_url() ?>blogs/single_post/<?= $value->blog_id ?>" class="btn pi-btn-small pi-btn-base pi-uppercase pi-weight-600 pi-letter-spacing">View Post</a>
                        </div>
                    </div>
                    <div class="pi-img-shadow-gap pi-shadow-effect8"></div>
                </div>
                <!-- End portfolio item -->
            <?php } ?>
        </div>
        <!-- End portfolio gallery -->
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

<script src="<?= base_url() ?>assets/3dParty/isotope/isotope.js"></script>
<script src="<?= base_url() ?>assets/scripts/pi.init.isotope.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
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