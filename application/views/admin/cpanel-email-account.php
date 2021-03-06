<!-- Right side column. Contains the navbar and content of the page -->
<style type="text/css">
    #account-data-table tr td,#account-data-table tr th{
        text-align: center;
    }
</style>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style=" display: none">
            Email Accounts
        </h1>
        <a href="<?= site_url() ?>admin/cpanel/addAccount" class="create btn btn-success btn-sm">
            <i class="fa fa-plus"></i>
            Create New Email Account
        </a>
        <button  value="Delete" class="delete btn btn-danger btn-sm" id="Delete" type="button" >Delete</button>
        <button  value="Add" class="add btn btn-info btn-sm" id="Add" type="button" >Add Header Notification</button>
        <button  value="Remove" class="remove btn btn-warning btn-sm" id="Remove" type="button" >Remove Header Notification</button>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box" >
                    <div class="box-header">
                        <h3 class="box-title">Email Account Detail</h3>
                    </div><!-- /.box-header -->
                    <form name="checkForm" id="checkForm" action="" method="post">
                        <div class="box-body table-responsive" id="data-panel">
                            <table id="account-data-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="padding: 10px;">
                                            <input type="checkbox"/>
                                        </th>
                                        <th class="hidden-xs hidden-sm">Email Address</th>
                                        <th>Unread</th>
                                        <th>Total</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($account as $value) { ?>
                                        <tr>
                                            <td>
                                                <div>
                                                    <label>
                                                        <input type="checkbox" name="account[]" value="<?= $value->account_id ?>"/>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="hidden-xs hidden-sm"><?= $value->email ?></td>
                                            <td>Unread(<?= $value->unread ?>)</td>
                                            <td>Total(<?= $value->total ?>)</td>
                                            <td>
                                                <a href="<?= site_url() ?>admin/cpanel/editAccount/<?= $value->account_id ?>" class="btn bg-navy btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th class="hidden-xs hidden-sm">Email Address</th>
                                        <th>Unread</th>
                                        <th>Total</th>
                                        <th>Edit</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <input type="hidden" id="actionType" name="actionType" value="" />
                        </div><!-- /.box-body -->
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->
<?php $msg = $this->session->flashdata('msg'); ?>
<?php
switch ($msg) {
    case "I":
        $m = "Email Account Successfully Created..!";
        $t = "success";
        break;
    case "E":
        $m = "Email Account Already Exists..!";
        $t = "error";
        break;
    case "U":
        $m = "Email Account Successfully Updated..!";
        $t = "success";
        break;
    case "D":
        $m = "Email Account(s) Successfully Deleted..!";
        $t = "error";
        break;
    case "A":
        $m = "Email Account(s) Successfully Added Into Header Notification..!";
        $t = "success";
        break;
    case "R":
        $m = "Email Account(s) Successfully Removed From The Header Notification..!";
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

<!-- DATA TABES SCRIPT -->
<script src="<?= base_url() ?>assets/admin/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/admin/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#account-data-table").dataTable({
            aoColumnDefs: [{
                    bSortable: false,
                    aTargets: [0, 2, 3, 4]
                }]
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {

        $('button.add').click(function (e) {
            action($(this).val());
            e.preventDefault();
        });
        $('button.remove').click(function (e) {
            action($(this).val());
            e.preventDefault();
        });

        $('button.delete').click(function (e) {
            var bcat = "";
            var act = $(this).val();
            $('#account-data-table tbody tr').each(function () {
                if ($(this).children('td:first').find('div.checked').length) {
                    $txt = $(this).children('td:nth-child(2)').text();
                    bcat += $txt.trim() + ",";
                }
            });

            bcat = bcat.substring(0, bcat.length - 1);

            alertify.confirm("Are you sure want to delete Email Account(s):<br/>" + bcat, function (e) {
                if (e) {
                    action(act);
                    return true;
                }
                else {
                    return false;
                }
            });
        });
        function action(actiontype) {
            $('#actionType').val(actiontype);
            $('#checkForm').attr('action', "<?= site_url() ?>admin/cpanel/action");
            $('#checkForm').submit();
        }
    });

</script>