<!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piICheck piStylishSelect" style="background: #f4f6f6;">
    <div class="pi-section pi-padding-bottom-60">

        <div class="pi-text-center pi-margin-bottom-50">
            <h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border">
                Register
            </h1>
        </div>

        <!-- Row -->
        <div class="pi-row">

            <!-- Col 4 -->
            <div class="pi-col-md-4 pi-col-md-offset-4 pi-col-sm-6 pi-col-sm-offset-3 pi-col-xs-8 pi-col-xs-offset-2">

                <!-- Box -->
                <div class="pi-box pi-round pi-shadow-15">
                    <form method="post" action="<?= site_url() ?>register/signup" >
                        <!-- Email form -->
                        <div class="form-group">
                            <div class="pi-input-with-icon">
                                <div class="pi-input-icon"><i class="icon-user"></i></div>
                                <input type="text" name="fullname" class="form-control" placeholder="Full Name">
                            </div>
                        </div>
                        <!-- End email form -->

                        <!-- Password form -->
                        <div class="form-group">
                            <div class="pi-input-with-icon">
                                <div class="pi-input-icon"><i class="icon-mail"></i></div>
                                <input type="email" name="email" class="form-control"  placeholder="E-mail">
                            </div>
                        </div>
                        <!-- End password form -->
                        <!-- Submit button -->
                        <p>
                            <button type="submit" class="btn pi-btn-base pi-btn-wide pi-weight-600">
                                Register
                            </button>
                        </p>
                        <!-- End submit button -->
                    </form>
                </div>
                <p class="pi-text-center">
                    Already have an account? <a href="<?= site_url() ?>login" class="pi-weight-600">Login</a>
                </p>
                <!-- End box -->
            </div>
            <!-- End col 4 -->
        </div>
        <!-- End row -->
        <?php if (isset($passNull)): ?>
            <!-- Row -->
            <div class="pi-row">
                <!-- Col 4 -->
                <div class="pi-col-md-3"></div>
                <div class="pi-col-md-6">
                    <div  class="pi-alert-success fade in alert">
                        <button type="button" class="pi-close" data-dismiss="alert">
                            <i class="icon-cancel"></i>
                        </button>
                        <p>
                            <?php if ($passNull): ?>
                                <strong>Hey !</strong> looks like you already joined,but haven't set a password yet. <a id="send" href="javascript:void(0);">Click Here</a> to set password.
                            <?php else : ?>
                                <strong>Hey !</strong> You have already Register with our system. <a href="<?= site_url() ?>login">Click Here</a> to Login.
                            <?php endif; ?>
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
        $('#send').click(function () {
            $.ajax({
                type: 'POST',
                data: {
                    userid: "<?= $res->customer_id ?>",
                    fname: "<?= $res->fname ?>",
                    lname: "<?= $res->lname ?>",
                    email: "<?= $res->email ?>"
                },
                url: "<?= site_url() ?>register/sendMail",
                success: function (data, textStatus, jqXHR) {
                    //$('.alert').removeClass('pi-alert-danger');
                    //$('.alert').addClass('pi-alert-success');
                    $('.alert').children('p').text("Please check your email for the password setting instruction..!");
                }
            });
        });
    });
</script>