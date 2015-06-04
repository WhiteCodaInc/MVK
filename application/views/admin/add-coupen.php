<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="display: none">
            <?= isset($coupen) ? "Edit" : "Add New" ?> Coupen
        </h1>
        <button type="button" id="addCoupen" class="btn btn-primary">
            <?= isset($coupen) ? 'Update Existing Coupen' : 'Create New Coupen' ?>
        </button>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3"></div>
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><?= isset($coupen) ? "Existing" : "New" ?> Coupen</h3>
                    </div><!-- /.box-header -->
                    <?php $method = isset($coupen) ? "updateCoupen" : "createCoupen"; ?>
                    <!-- form start -->
                    <form id="coupenForm" role="form" action="<?= site_url() ?>admin/coupens/<?= $method ?>" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Coupen Name</label>
                                <input type="text" name="coupen_name" value="<?= isset($coupen) ? $coupen->coupen_name : '' ?>" placeholder="Coupen Name" autofocus="autofocus" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Coupen Code</label>
                                <input type="text" name="coupen_code" value="<?= isset($coupen) ? $coupen->coupen_code : '' ?>" placeholder="Coupen Name" autofocus="autofocus" class="form-control"  />
                            </div>
                            <div class="form-group">
                                <label>Discount Type</label>
                                <select name="disc_type" class="form-control">
                                    <option value="F">Flate</option>
                                    <option value="P">Percentage</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" name="disc_amount" value="<?= isset($coupen) ? $coupen->disc_amount : '' ?>" placeholder="Amount" autofocus="autofocus" class="form-control"  />
                            </div>
                            <div class="form-group">
                                <label>Coupen Validity</label>
                                <select name="coupen_validity" class="form-control">
                                    <option value="1">One Time</option>
                                    <option value="2">Disc For x Month</option>
                                    <option value="3">LifeTime</option>
                                </select>
                            </div>
                            <div class="form-group month-duration" style="display: none">
                                <label>Month</label>
                                <input type="text" name="month_duration" value="<?= isset($coupen) ? $coupen->month_duration : '' ?>" placeholder="Month" autofocus="autofocus" class="form-control"  />
                            </div>
                            <div class="form-group">
                                <label>Valid Till</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="expire_date" value="<?= isset($coupen) ? date('d-m-Y', strtotime($coupen->expire_date)) : '' ?>"  class="form-control form-control-inline input-medium default-date-picker" size="16" type="text">
                                </div><!-- /.input group -->
                            </div><!-- /.form group -->
                            <div class="form-group">
                                <label>User For</label>
                                <input type="text" name="no_of_use" value="<?= isset($coupen) ? $coupen->no_of_use : '' ?>" placeholder="Number Of Use" class="form-control"  />
                                Times
                            </div>
                        </div><!-- /.box-body -->
                        <?php if (isset($coupen)): ?>
                            <input type="hidden" name="coupenid" value="<?= $coupen->coupen_id ?>" />
                        <?php endif; ?>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            <div class="col-md-3"></div>
            <!-- right column -->
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<script type="text/javascript">
    $(function () {
        $('.default-date-picker').datepicker({
            format: "dd-mm-yyyy",
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true
        });
    });
    $(document).ready(function () {
        $('#addCoupen').click(function () {
            $('#coupenForm').submit();
        });
    });
</script>