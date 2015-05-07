<!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piICheck piStylishSelect" style="background: #f4f6f6;">
    <div class="pi-section pi-padding-bottom-60">

        <div class="pi-text-center pi-margin-bottom-50">
            <h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border">
                Sign Up
            </h1>
        </div>

        <!-- Row -->
        <div class="pi-row">

            <!-- Col 4 -->
            <div class="pi-col-md-4 pi-col-md-offset-4 pi-col-sm-6 pi-col-sm-offset-3 pi-col-xs-8 pi-col-xs-offset-2">

                <!-- Box -->
                <div class="pi-box pi-round pi-shadow-15">
                    <form method="post" action="<?= site_url() ?>affiliate/signup" >
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
                                Sign Up
                            </button>
                        </p>
                        <!-- End submit button -->
                    </form>
                </div>
                <!-- End box -->
            </div>
            <!-- End col 4 -->
        </div>
        <!-- End row -->
    </div>
</div>
<!-- - - - - - - - - - END SECTION - - - - - - - - - -->