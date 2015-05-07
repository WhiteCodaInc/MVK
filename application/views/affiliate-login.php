<!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piICheck piStylishSelect" style="background: #f4f6f6;">
    <div class="pi-section pi-padding-bottom-60">

        <div class="pi-text-center pi-margin-bottom-50">
            <h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border">
                Sign In
            </h1>
        </div>

        <!-- Row -->
        <div class="pi-row">

            <!-- Col 4 -->
            <div class="pi-col-md-4 pi-col-md-offset-4 pi-col-sm-6 pi-col-sm-offset-3 pi-col-xs-8 pi-col-xs-offset-2">

                <!-- Box -->
                <div class="pi-box pi-round pi-shadow-15">
                    <form method="post" action="<?= site_url() ?>affiliate/signin" >
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
                                Sign In
                            </button>
                        </p>
                        <!-- End submit button -->
                    </form>
                </div>
                <!-- End box -->
                <p class="pi-text-center">
                    Don't have Account? <a href="<?= site_url() ?>affiliate/join" class="pi-weight-600">Sign Up</a>
                </p>
            </div>
            <!-- End col 4 -->
        </div>
        <!-- End row -->
    </div>
</div>
<!-- - - - - - - - - - END SECTION - - - - - - - - - -->