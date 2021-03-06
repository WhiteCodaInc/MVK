<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/comments.css"/>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/boxes.css"/>
<!-- - - - - - - - - - SECTION - - - - - - - - - -->
<!-- Title bar -->
<div class="pi-section-w pi-section-base pi-section-base-gradient">
    <div class="pi-texture" style="background: url(<?= base_url() ?>assets/img/hexagon.png) repeat;"></div>
    <div class="pi-section" style="padding: 30px 40px 26px;">

        <div class="pi-row">
            <div class="pi-col-sm-12 pi-center-text-xs">
                <h1 class="h2 pi-weight-300 pi-margin-bottom-5"><?= $default->title ?></h1>
            </div>
        </div>
    </div>
</div>
<!-- End title bar -->

<!-- - - - - - - - - - END SECTION - - - - - - - - - -->
<!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white pi-slider-enabled piTooltips piSocials">
    <div class="pi-section pi-padding-bottom-10">
        <?php if ($default->feature_video != ""): ?>
            <div class="pi-row">
                <!--<div class="pi-col-sm-1 pi-padding-bottom-40"></div>-->
                <div class="pi-col-sm-12 pi-padding-bottom-40">
                    <div id='mediaplayer'></div>
                    <script type='text/javascript' src='https://d2f058tgxz31a7.cloudfront.net/video_setting/jwplayer.js'></script>
                    <script type="text/javascript">
                        jwplayer('mediaplayer').setup({
                            file: 'rtmp://s12e6wqr7fb3zu.cloudfront.net/cfx/st/<?= $default->feature_video ?>',
                            width: "720",
                            height: "480"
                        });</script>
                </div>
                <!--<div class="pi-col-sm-1 pi-padding-bottom-40"></div>-->
            </div>
        <?php endif; ?>
        <div class="pi-row">
            <!--<div class="pi-col-sm-1 pi-padding-bottom-40"></div>-->
            <div class="pi-col-sm-12 pi-padding-bottom-40">
                <?= $default->content ?>
            </div>
            <!--<div class="pi-col-sm-1 pi-padding-bottom-40"></div>-->
        </div>
    </div>
</div>
<!-- - - - - - - - - - END SECTION - - - - - - - - - -->

<!-- - - - - - - - - - SECTION - - - - - - - - - -->
<?php $userid = $this->session->userdata('userid'); ?>
<div class="pi-section-w pi-section-white ">
    <div class="pi-section" style="padding: 0 40px 40px">
        <div class="pi-row">

            <div class="pi-col-sm-12 ">
                <h2 class="h4 pi-has-bg pi-weight-700 pi-uppercase pi-letter-spacing ">
                    Give Comment
                </h2>
                <div class="pi-row">
                    <div class="pi-col-sm-12">
                        <!-- Contact form -->
                        <form method="post" role="form" action="<?= site_url() ?>homepage/addComment" >
                            <div class="pi-row">
                                <?php if ($userid == ""): ?>
                                    <div class="pi-col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Name</label>
                                            <input name="name" type="text" class="form-control form-control-name" placeholder="e.g. Adam Smith" required="">
                                        </div>
                                    </div>
                                    <div class="pi-col-sm-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input name="email" type="email" class="form-control form-control-email" placeholder="e.g. mail@example.com" required="">
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="pi-col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputMessage1">Comment</label>
                                        <textarea name="comment" class="form-control form-control-comments" placeholder="Write Comment here...."rows="3" required=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <p style="text-align: <?= ($userid == "") ? 'right' : 'left' ?>">
                                <button type="submit" class="btn pi-btn">
                                    Submit
                                </button>
                            </p>
                            <input type="hidden" name="blog_id" value="<?= $default->blog_id ?>" />
                            <input type="hidden" name="joined_url" value="<?= site_url() . uri_string() ?>" />
                        </form>
                        <!-- End contact form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- - - - - - - - - - END SECTION - - - - - - - - - -->

<!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white pi-slider-enabled piTooltips piSocials">
    <div class="pi-section" style="padding: 0 40px 40px">
        <div class="pi-row">
            <div class="pi-col-sm-12 ">
                <h4 class="pi-has-bg pi-weight-700 pi-uppercase pi-letter-spacing ">
                    Blog Comments
                </h4>
                <ul class="pi-comments">
                    <?php foreach ($comments as $value) { ?>
                        <li>
                            <div class="pi-testimonial pi-testimonial-author-with-icon pi-margin-bottom-30">
                                <div class="pi-testimonial-content pi-testimonial-content-quotes">
                                    <p><?= $value->comment ?></p>
                                </div>
                                <div class="pi-testimonial-author pi-clearfix">
                                    <span class="pi-icon-man"></span>
                                    <div>
                                        <h6 class="pi-weight-700 pi-no-margin-bottom"><?= $value->name ?></h6>
                                        <p class="pi-italic pi-no-margin-bottom">
                                            Email <a href="#"><?= $value->email ?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </div>
</div>
<!-- - - - - - - - - - END SECTION - - - - - - - - - -->

<!-- - - - - - - - - - SECTION - - - - - - - - - -->

<div class="pi-section-w pi-shadow-inside-top pi-section-white">
    <div class="pi-texture" ></div>
    <div class="pi-section pi-padding-bottom-20">

        <!--        <div class="pi-text-center">
                    <h3 class="pi-weight-700 pi-uppercase pi-letter-spacing pi-has-border pi-has-tall-border pi-has-short-border">
                        Recent Blog Post
                    </h3>
                </div>-->
        <!-- Portfolio gallery -->
        <div class="pi-row pi-liquid-col-xs-2 pi-liquid-col-sm-3 pi-gallery pi-gallery-small-margins pi-text-center">
            <?php foreach ($latest as $key => $value): ?>
                <?php
                $img_src = ($value->feature_img != "") ?
                        "http://mikhailkuznetsov.s3.amazonaws.com/" . $value->feature_img :
                        base_url() . 'assets/img_external/gallery/default.jpg';
                ?>
                <!-- Portfolio item -->
                <div class="pi-gallery-item pi-padding-bottom-30">
                    <div class="pi-img-w pi-img-round-corners pi-img-shadow">
                        <a href="<?= site_url() ?>blogs/single_post/<?= $value->blog_id ?>">
                            <img style="width:333px;height:233px" src="<?= $img_src ?>" alt="">
                        </a>
                    </div>
                    <h3 class="h6 pi-weight-700 pi-uppercase pi-letter-spacing pi-margin-bottom-5">
                        <a href="<?= site_url() ?>blogs/single_post/<?= $value->blog_id ?>" class="pi-link-dark"><?= $value->title ?></a>
                    </h3>
                </div>
                <!-- End portfolio item -->
            <?php endforeach; ?>
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
                <input type="email" class="form-control input-lg pi-input-wide" name='email'  placeholder="Enter email address" required="">
            </div>
            <button type="button" id="subscribe" class="btn pi-btn-base pi-btn-big">Submit</button>
        </form>
        <!-- End forms -->
        <p id="msg"  class="pi-text-center"></p>
    </div>
</div>


<!-- - - - - - - - - - END SECTION - - - - - - - - - -->

<?php $msg = $this->input->get('msg'); ?>
<?php
switch ($msg) {
    case "true":
        $m = "Register Successfully.!Please Check Your Email..!";
        $t = "success";
        break;
    case "false":
        $m = "We could not sent credentail to your email.!Please contact to admin.!";
        $t = "error";
        break;
    default:
        $m = 0;
        break;
}
?>
<script type="text/javascript">
<?php if ($msg): ?>
        alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#subscribe').on('click', function () {
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
