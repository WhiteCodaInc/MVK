<!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piICheck piStylishSelect" style="background: #f4f6f6;">
    <div class="pi-section pi-padding-bottom-60">

        <div class="pi-text-center pi-margin-bottom-50">
            <h2 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border">
                Set Your Password
            </h2>
        </div>

        <!-- Row -->
        <div class="pi-row">

            <!-- Col 4 -->
            <div class="pi-col-md-4 pi-col-md-offset-4 pi-col-sm-6 pi-col-sm-offset-3 pi-col-xs-8 pi-col-xs-offset-2">

                <!-- Box -->
                <div class="pi-box pi-round pi-shadow-15">
                    <form id="passForm" method="post" action="<?= site_url() ?>setpassword/set" >
                        <!-- Email form -->
                        <div class="form-group">
                            <div class="pi-input-with-icon">
                                <div class="pi-input-icon"><i class="icon-lock"></i></div>
                                <input id="passwd" type="password" name="password" class="form-control"  placeholder="Please Enter a New Password" required="">
                            </div>
                        </div>
                        <!-- End email form -->

                        <!-- Password form -->
                        <div class="form-group">
                            <div class="pi-input-with-icon">
                                <div class="pi-input-icon"><i class="icon-lock"></i></div>
                                <input id="confirm_passwd" type="password" name="password" class="form-control"  placeholder="Please Confirm Your New Password" required="">
                            </div>
                        </div>
                        <!-- End password form -->
                        <p>
                            <button type="submit" class="btn pi-btn-base pi-btn-wide pi-weight-600">
                                I`m Ready to Get Started
                            </button>
                        </p>
                        <span id="msgPass" style="color: red"></span>
                        <!-- End submit button -->
                        <input type="hidden" name="userid" value="<?= $uid ?>" />
                        <input type="hidden" name="type" value="<?= ($isForgot) ? "forgot" : "" ?>" />
                    </form>
                </div>
            </div>
            <!-- End col 4 -->
        </div>
        <!-- End row -->

        <?php $msg = $this->input->get('msg'); ?>
        <?php if (isset($msg) && $msg != ""): ?>
            <!-- Row -->
            <div class="pi-row">
                <!-- Col 4 -->
                <div class="pi-col-md-3"></div>
                <div class="pi-col-md-6">
                    <div  class="pi-alert-danger fade in alert">
                        <button type="button" class="pi-close" data-dismiss="alert">
                            <i class="icon-cancel"></i>
                        </button>
                        <p>
                            <strong>Sorry !</strong> We could not parse your URL. Please Check your URL and Try Again..!.
                        </p>
                    </div>
                </div>
                <div class="pi-col-md-3"></div>
            </div>
            <!-- End row -->
        <?php endif; ?>
    </div>
</div>
<!-- - - - - - - - - - END SECTION - - - - - - - - - -->
<script type="text/javascript">
    $(document).ready(function () {

        var pass = 1;
        var confirmpass = 1;

        $('#passwd').focusout(function () {
            var passwd = $(this).val();

            var confirmpasswd = $('#confirm_passwd').val();
            if (confirmpasswd !== "") {
                if (passwd !== confirmpasswd) {
                    $('#msgPass').text("Password must be same as above!");
                    pass = 0;
                }
            }
        });

        $('#confirm_passwd').focusout(function () {
            var confirmpasswd = $(this).val();

            var passwd = $('#passwd').val();
            if (passwd !== confirmpasswd) {

                $('#msgPass').text("Password must be same as above!");
                confirmpass = 0;
            }
            else {

                $('#msgPass').empty();
                confirmpass = 1;
            }
        });
        $('#passForm').on('submit', function () {
            if (pass === 0 || confirmpass === 0)
            {
                $('#msgPass').text("Password Must be Same..!");
                return false;
            }
        });
    });
</script>