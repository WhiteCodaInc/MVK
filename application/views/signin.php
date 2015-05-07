<!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piICheck piStylishSelect" style="background: #f4f6f6;">
    <div class="pi-section pi-padding-bottom-60">

        <div class="pi-text-center pi-margin-bottom-50">
            <h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border">
                Log In
            </h1>
        </div>

        <!-- Row -->
        <div class="pi-row">
            <!-- Col 4 -->
            <div class="pi-col-md-4 pi-col-md-offset-4 pi-col-sm-6 pi-col-sm-offset-3 pi-col-xs-8 pi-col-xs-offset-2">
                <!-- Box -->
                <div class="pi-box pi-round pi-shadow-15">
                    <form method="post" action="<?= site_url() ?>login/signin" >
                        <!-- Email form -->
                        <div class="form-group">
                            <div class="pi-input-with-icon">
                                <div class="pi-input-icon"><i class="icon-mail"></i></div>
                                <input type="email" name="email" class="form-control"  placeholder="E-mail">
                            </div>
                        </div>
                        <!-- End email form -->

                        <!-- Password form -->
                        <div class="form-group">
                            <div class="pi-input-with-icon">
                                <div class="pi-input-icon"><i class="icon-lock"></i></div>
                                <input type="password" name="password" class="form-control"  placeholder="Password">
                            </div>
                        </div>
                        <!-- End password form -->
                        <?php $msg = $this->input->get('msg'); ?>
                        <?php if (isset($msg) && $msg != ""): ?>
                            <div class="form-group">
                                <span style="color:red">Username or Passsword is invalid..!</span>
                            </div>
                        <?php endif; ?>
                        <!-- Submit button -->
                        <p>
                            <button type="submit" class="btn pi-btn-base pi-btn-wide pi-weight-600">
                                Log In
                            </button>
                        </p>
                        <!-- End submit button -->
                    </form>
                </div>
                <!-- End box -->
                <p class="pi-text-center">
                    Don't have Account? <a href="<?= site_url() ?>register" class="pi-weight-600">Register</a> |
                    <a href="javascript:void(0);" class="pi-weight-600"  data-toggle="modal" data-target="#new-event">Forgot Password</a>
                </p>
            </div>
            <!-- End col 4 -->
        </div>
        <!-- End row -->
    </div>
</div>
<div class="modal fade" id="new-event" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px">
        <div class="modal-content" style="background-color: #F4F6F6">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Forgot Password</h3>
            </div>
            <div class="modal-body pi-section-white" >
                <div class="pi-row">
                    <div class="pi-col-md-12">
                        <div class="form-group">
                            <input type="email" id="forgotEmail" placeholder="Enter your email address" class="form-control" />
                            <span id="msg" style="color: red;"></span>
                        </div>
                    </div>
                </div>
                <div class="pi-row">
                    <div class="pi-col-md-6">
                        <div class="form-group">
                            <h1 id="captcha_img" style="text-align: center;background-image:url(<?= base_url() ?>assets/img/captcha_background.png); ">
                                <?= $word ?>
                            </h1>
                        </div>
                    </div>
                    <div class="pi-col-md-3">
                        <div class="form-group">
                            <img id="refresh" src="<?= base_url() ?>assets/img/refresh.png" alt="refresh" />
                        </div>
                    </div>
                </div>
                <div class="pi-row">
                    <div class="pi-col-md-12">
                        <div class="form-group">
                            <input type="text" id="captcha_word" class="form-control" placeholder="Enter Captcha Here" />
                            <span id="msgCaptcha" style="color: red"></span>
                        </div>
                    </div>
                </div>
                <div class="pi-row">
                    <div class="pi-col-md-4">
                        <div class="form-group">
                            <p>
                                <button type="button" id="send" class="btn pi-btn-base pi-uppercase pi-weight-700 pi-letter-spacing">
                                    Send <i class="icon-paper-plane pi-icon-right"></i>
                                </button>
                            </p>
                        </div>
                    </div>
                    <div class="pi-col-md-8">
                        <div style="display: none" id="loadSend">
                            <img src="<?= base_url() ?>assets/img/load.GIF" alt="" />
                        </div>
                        <span id="msgSend"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- - - - - - - - - - END SECTION - - - - - - - - - -->
<script type="text/javascript">
    $(document).ready(function () {

        var emailV = 1;
        var captchaV = 1;
        var sess_word = "<?= $this->session->userdata('captchaWord') ?>";
        $('#forgotEmail').focusout(function () {
            var email = $(this).val();
            if (email.trim() != "") {
                $.ajax({
                    type: "POST",
                    data: {email: email},
                    url: "<?= base_url() ?>login/checkEmail",
                    success: function (res) {
                        if (res == 0) {
                            emailV = 0;
                            $('#msg').text('Your Email is not register!');
                        }
                        else {
                            $('#msg').empty();
                            emailV = 1;
                        }
                    }
                });
            } else {
                emailV = 0;
            }
        });
        $('#captcha_word').focusout(function () {
            var word = $(this).val();
            if (word.trim() != "") {
                if (word != sess_word) {
                    captchaV = 0;
                    $('#msgCaptcha').text("Captcha Invalid..!");
                } else {
                    captchaV = 1;
                    $('#msgCaptcha').empty();
                }
            } else {
                captchaV = 0;
            }
        });
        $('#send').click(function () {
            var email = $('#forgotEmail').val();
            if (emailV === 0 || captchaV === 0)
                return false;
            $('#refresh').trigger('click');
            $('#loadSend').css('display', 'block');
            $.ajax({
                type: "POST",
                data: {email: email},
                url: "<?= base_url() ?>login/sendMail",
                success: function (res) {
                    $('#loadSend').css('display', 'none');
                    if (res == 1) {
                        $('#msgSend').css('color', 'green');
                        $('#msgSend').text('Check your email to get your link..!');
                    } else {
                        $('#msgSend').css('color', 'red');
                        $('#msgSend').text('Email sending failed..!Try Again!');
                    }
                    $('#forgotEmail').val("");
                    $('#captcha_word').val("");
                    setTimeout(function () {
                        $('#msgSend').empty();
                        $('.close').trigger('click');
                    }, 1000);

                }
            });
        });

        $("#refresh").click(function () {
            $(this).css('cursor', 'progress');
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>login/captcha_refresh",
                success: function (res) {
                    $('#refresh').removeAttr('style');
                    if (res) {
                        sess_word = res;
                        $("#captcha_img").html(res);
                    }
                }
            });
        });

        $('#remember').click(function () {
            $('input[name="remember"]').trigger('click');
        });
    });
</script>