<!-- Normal Checkbox -->
<!--<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/css/checkbox.css"/>-->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/admin/autocomplete/jquery-ui.css"/>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header no-margin" style="display: none">
        <h1 style="display: none" class="text-center">
            Mailbox
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- MAILBOX BEGIN -->
        <div class="mailbox row">
            <div class="col-xs-12">
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <!-- BOXES are complex enough to move the .box-header around.
                                     This is an example of having the box header within the box body -->
                                <div class="box-header">
                                    <i class="fa fa-inbox"></i>
                                    <h3 class="box-title">INBOX</h3>
                                </div>
                                <!-- compose message btn -->
                                <a id="compose" class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-mail"><i class="fa fa-pencil"></i> Compose Message</a>
                                <!-- Navigation - folders-->
                                <?php $type = $this->uri->segment(3); ?>
                                <div style="margin-top: 15px;">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="header">Folders</li>
                                        <li class="<?= ($type == "") ? "active" : "" ?>">
                                            <a href="<?= site_url() ?>admin/mailbox/inbox">
                                                <i class="fa fa-inbox"></i> Inbox <?= ($folder[0]) ? "({$folder[0]})" : "" ?>
                                            </a>
                                        </li>
                                        <li class="<?= ($type == "Drafts") ? "active" : "" ?>">
                                            <a href="<?= site_url() ?>admin/mailbox/inbox/Drafts">
                                                <i class="fa fa-pencil-square-o"></i> Drafts <?= ($folder[1]) ? "({$folder[1]})" : "" ?>
                                            </a>
                                        </li>
                                        <li class="<?= ($type == "Sent") ? "active" : "" ?>">
                                            <a href="<?= site_url() ?>admin/mailbox/inbox/Sent">
                                                <i class="fa fa-mail-forward"></i> Sent <?= ($folder[4]) ? "({$folder[4]})" : "" ?>
                                            </a>
                                        </li>
                                        <li class="<?= ($type == "Trash") ? "active" : "" ?>">
                                            <a href="<?= site_url() ?>admin/mailbox/inbox/Trash">
                                                <i class="fa fa-trash-o"></i> Trash <?= ($folder[2]) ? "({$folder[2]})" : "" ?>
                                            </a>
                                        </li>
                                        <li class="<?= ($type == "Archive") ? "active" : "" ?>">
                                            <a href="<?= site_url() ?>admin/mailbox/inbox/Archive">
                                                <i class="fa fa-folder"></i> Archive <?= ($folder[5]) ? "({$folder[5]})" : "" ?>
                                            </a>
                                        </li>
                                        <li class="<?= ($type == "Junk") ? "active" : "" ?>">
                                            <a href="<?= site_url() ?>admin/mailbox/inbox/Junk">
                                                <i class="fa fa-folder"></i> Junk <?= ($folder[3]) ? "({$folder[3]})" : "" ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- /.col (LEFT) -->
                            <div class="col-md-9 col-sm-8">
                                <form name="checkForm" id="checkForm" action="<?= site_url() ?>admin/mailbox/action" method="post">
                                    <div class="row pad" style="padding: 10px 0;">
                                        <div class="col-sm-10">
                                            <button style="margin-left: 10px" name="submit" value="delete" class="btn btn-danger btn-sm"  type="submit" >
                                                <i class="fa fa-trash-o"></i> 
                                                <?= ($type == "Drafts") ? "Discard Draft" : "Delete" ?>
                                            </button>
                                            <button style="margin-left: 10px" name="submit" value="spam" class="btn btn-danger btn-sm"  type="submit" >
                                                <i class="fa fa-trash"></i> 
                                                Mark as spam
                                            </button>
                                            <button style="margin-left: 10px" name="submit" value="archive" class="btn btn-primary btn-sm"  type="submit" >
                                                <i class="fa fa-trash"></i> 
                                                Archive
                                            </button>
                                        </div>
                                        <div class="col-md-2" style="text-align: right">
                                            <a class="btn btn-primary btn-sm" href="<?= site_url() ?>admin/mailbox/logout" >Logout</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive" id="data-panel">
                                        <!-- THE MESSAGES -->
                                        <table id="inbox-data-table" class="table table-mailbox">
                                            <thead >
                                                <tr>
                                                    <th style="padding: 10px;">
                                                        <input type="checkbox"/>
                                                    </th>
                                                    <th>From</th>
                                                    <th>Subject</th>
                                                    <th class="hidden-xs hidden-sm">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($email as $key => $value) { ?>
                                                    <tr id="<?= $value['id'] ?>" style="<?= (!$value['status']) ? "background-color: #F3F4F5;font-weight: 600;" : "" ?>" class="">
                                                        <td class="small-col">
                                                            <input type="checkbox" name="email_id[]" value="<?= $value['id'] ?>" />
                                                        </td>
                                                        <td class="name">
                                                            <a style="cursor: pointer" data-toggle="modal" data-target="#mail-body" class="<?= $value['id'] ?>">
                                                                <?= $value['from'] ?>
                                                            </a>
                                                        </td>
                                                        <td class="subject">
                                                            <a style="cursor: pointer" data-toggle="modal" data-target="#mail-body" class="<?= $value['id'] ?>">
                                                                <?= $value['subject'] ?>
                                                            </a>
                                                        </td>
                                                        <td class="time">
                                                            <?= $value['date'] ?>
                                                        </td>
                                                    </tr>
                                                <span style="display: none" class="body<?= $value['id'] ?>"><?= $value['body'] ?></span>
                                                <span style="display: none" class="to<?= $value['id'] ?>"><?= $value['to'] ?></span>
                                            <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th>From</th>
                                                    <th>Subject</th>
                                                    <th class="hidden-xs hidden-sm">Date</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div><!-- /.table-responsive -->
                                    <input type="hidden" name="type" value="<?= ($type == "") ? "Inbox" : $type ?>" />
                                </form>
                            </div><!-- /.col (RIGHT) -->
                        </div><!-- /.row -->
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col (MAIN) -->
        </div>
        <!-- MAILBOX END -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- COMPOSE MESSAGE MODAL -->
<div class="modal fade" id="compose-mail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="min-width: 294px;max-width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Compose New Message</h4>
            </div>
            <form id="composeForm" action="<?= site_url() ?>admin/mailbox/send"  method="post">
                <div class="modal-body">
                    <div class="row m-bot15">                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <div style="float: left;padding-right: 5px;cursor: pointer">
                                    <input  type="radio" value="new"  name="option" checked=""  class="simple">                          
                                    <span class="lbl padding-8">
                                        New Contact
                                    </span>
                                </div>
                                <div style="float: left;padding-right: 5px;cursor: pointer">
                                    <input  type="radio" value="exist"  name="option"  class="simple">                          
                                    <span class="lbl padding-8">
                                        Existing Contacts
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="form-group new">
                        <div class="input-group">
                            <span class="input-group-addon">TO:</span>
                            <input name="email_to" type="text" class="form-control" placeholder="Email TO">
                        </div>
                    </div>
                    <div class="row m-bot15 exist" style="display: none">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Select who you wish to email</label>
                                <select id="user" name="user" class="form-control" >
                                    <option value="1">Admin</option>
                                    <option value="2" selected="">Company Contact</option>
                                    <option value="3">Affiliates</option>
                                    <option value="4">Customer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row m-bot15 exist" style="display: none">                        
                        <div class="col-md-12">
                            <label>Choose Option</label>
                            <div class="form-group">
                                <div id="individual"  style="float: left;padding-right: 5px;cursor: pointer">
                                    <input id="rd_individual"  type="radio" value="all_c"  name="assign"  class="simple">                          
                                    <span class="lbl padding-8">
                                        Individual <span class="lb_individual">Contacts&nbsp;</span>
                                    </span>
                                </div>
                                <div id="group"  style="float: left;padding:0 5px;cursor: pointer;">
                                    <input id="rd_group" type="radio" value="all_gc"  name="assign" class="simple">                          
                                    <span class="lbl padding-8">
                                        Group <span class="lb_individual">Contacts&nbsp;</span>
                                    </span>
                                </div>
                                <div id="list"   style="float: left;padding:0 5px;cursor: pointer;">
                                    <input id="rd_list" type="radio" value="all_l"  name="assign" class="simple">                          
                                    <span class="lbl padding-8">Email List&nbsp;</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row exist" style="display: none">
                        <div class="col-md-7">
                            <label>Choose <span id="lbl_select">Contact </span></label>
                            <div class="form-group" id="user-tag">
                                <input type="text" class="form-control"  id="users" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Subject:</span>
                            <input name="email_subject" type="text" class="form-control" placeholder="Email Subject">
                        </div>
                    </div>
                    <div id="msg_txt" class="form-group" style="display: none">
                        <div class="input-group">
                            <label>Message</label>
                            <p></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="email_message" class="form-control" placeholder="Message" style="height: 120px;"></textarea>
                    </div>
                </div>
                <div class="modal-footer clearfix">
                    <button type="button" id="discard" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>
                    <button name="submit" type="submit" value="Send" class="btn btn-primary pull-left send"><i class="fa fa-paper-plane"></i> Send Message</button>
                    <button name="submit" type="submit" value="Draft" class="btn btn-primary pull-left draft"><i class="fa fa-envelope-o"></i> Save as Draft</button>
                </div>
                <input type="hidden" name="user_id" value="" />
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<style type="text/css">
    #body{
        width: 100%;
        min-height: 140px;
        border: 1px solid black;
        padding: 10px;
    }
</style>
<!--<a class="btn btn-block btn-primary" data-toggle="modal" data-target="#mail-body"></a>-->
<div class="modal fade" id="mail-body" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="min-width: 294px;max-width: 600px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-envelope-o"></i> View Email</h4>
            </div>
            <div class="modal-body">
                <div class="input-group" style="width: 100%">
                    <h4 style="float: left;padding-right: 5px;"><label>Subject :</label></h4>
                    <h4 id="subject"></h4>
                </div>
                <div class="input-group" style="width: 100%">
                    <h4 style="float: left;padding-right: 5px;"><label>From :</label></h4>
                    <h4 id="from"></h4>
                </div>
                <div class="input-group" style="width: 100%">
                    <h4 style="float: left;padding-right: 5px;"><label>Date :</label></h4>
                    <h4 id="date"></h4>
                </div>
                <div class="input-group" style="width: 100%">
                    <h4 style="float: left;padding-right: 5px;"><label>To :</label></h4>
                    <h4 id="to"></h4>
                </div>
                <div class="form-group">
                    <!--<textarea name="message" id="body" class="form-control" placeholder="Message" style="height: 120px;"></textarea>-->
                    <div class="" id="body"></div>
                </div>
            </div>
            <div class="modal-footer clearfix">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>
                <button type="button"  class="btn btn-primary pull-left reply"><i class="fa fa-mail-reply"></i> Reply</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php $msg = $this->session->flashdata('msg'); ?>
<?php
switch ($msg) {
    case "send":
        $m = "Email Successfully Send..!";
        $t = "success";
        break;
    case "fail":
        $m = "Email Sending Failed..!";
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

<script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script src="<?= base_url() ?>assets/admin/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPTS -->

<script>
    var contact = new Array();
    var ids = new Array();
//    var is_reply = false;
    function BindControls(ar1, ar2) {
        contact = ar1;
        ids = ar2;
        console.log(contact);
        console.log(ids);
        $('#users').autocomplete({
            source: ar1,
            minLength: 0,
            scroll: true
        }).focus(function () {
            $(this).autocomplete("search", "");
        });
        setTimeout(function () {
            $('.ui-autocomplete').css('z-index', '9999');
        }, 1000);
    }
</script>

<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#inbox-data-table").dataTable({
            asStripeClasses: [''],
            oLanguage: {
                "sEmptyTable": "No Emails Found..!"
            },
            aoColumnDefs: [{
                    bSortable: false,
                    aTargets: [0]
                }]
        });
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('email_message');
            //bootstrap WYSIHTML5 - text editor
            $(".textarea").wysihtml5();
        });
    });
</script>

<script type="text/javascript">
    $('input[name="assign"]').change(function () {
        var user = $('#user').val();
        if ($(this).val() == "all_c") {
            $.ajax({
                type: 'POST',
                url: "<?= site_url() ?>admin/email/allUser/" + user,
                success: function (json, textStatus, jqXHR) {
                    var data = JSON.parse(json);
                    var ar1 = data['user'];
                    var ar2 = data['ids'];
                    var lbl = "";
                    switch (user) {
                        case "1":
                            lbl = "Admin";
                            break;
                        case "2":
                            lbl = "Contact";
                            break;
                        case "3":
                            lbl = "Affiliate";
                            break;
                        case "4":
                            lbl = "Customer";
                            break;
                    }
                    $("#lbl_select").text(lbl);
                    $('#user-tag').html('<input type="text" class="form-control"  id="users" />');
                    BindControls(ar1, ar2);
                }
            });
        } else if ($(this).val() == "all_gc") {
            var user = $('#user').val();
            $.ajax({
                type: 'POST',
                url: "<?= site_url() ?>admin/email/allGroup/" + user,
                success: function (data, textStatus, jqXHR) {
                    $("#lbl_select").text("Group");
                    $('#user-tag').html(data);
                }
            });
        } else if ($(this).val() == "all_l") {
            $.ajax({
                type: 'POST',
                url: "<?= site_url() ?>admin/email/allEmailList",
                success: function (data, textStatus, jqXHR) {
                    $("#lbl_select").text("Group");
                    $('#user-tag').html(data);
                }
            });
        }
        else {
            return false;
        }
    });

    $('input[name="option"]').change(function () {
        var val = $(this).val();
        if (val == "new") {
            $('.new').show();
            $('.exist').hide();
        } else {
            $('.new').hide();
            $('.exist').show();
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#rd_individual').trigger('click');

        $('#discard').click(function () {
            $('#msg_txt').hide();
            $('#composeForm').trigger('reset');
        });

        $('#user').change(function () {
            var user = $(this).val();
            $('#rd_individual').removeAttr('checked');
            switch (user) {
                case "1":
                    $("#lbl_select").text("Admin");
                    $('.lb_individual').text("Admins");
                    $('#rd_individual').trigger('click');
                    $('#individual').css('display', 'block');
                    $('#group').css('display', 'none');
                    $('#list').css('display', 'none');
                    break;
                case "2":
                    $("#lbl_select").text("Contact");
                    $('.lb_individual').text("Contacts");
                    $('#rd_individual').trigger('click');
                    $('#individual').css('display', 'block');
                    $('#group').css('display', 'block');
                    $('#list').css('display', 'block');
                    break;
                case "3":
                case "4":
                    var lbl = (user == "3") ? "Affiliates" : "Customers";
                    var lbl1 = (user == "3") ? "Affiliate" : "Customer";
                    $("#lbl_select").text(lbl1);
                    $('.lb_individual').text(lbl);
                    $('#rd_individual').trigger('click');
                    $('#individual').css('display', 'block');
                    $('#group').css('display', 'block');
                    $('#list').css('display', 'none');
                    break;
            }
        });

        $('td > a').click(function () {
            var id = $(this).attr('class');
            $('button.reply').attr('id', id);
            $('#mail-body #subject').text($('tr#' + id + ' td.subject').text());
            $('#mail-body #from').text($('tr#' + id + ' td.name').text());
            $('#mail-body #date').text($('tr#' + id + ' td.time').text());
            $('#mail-body #to').text($('span.to' + id).text());
            $('#mail-body #body').text($('span.body' + id).text());
        });

        $('button.reply').click(function () {
            $('.close').trigger('click');
            var id = $(this).attr('id');
//            is_reply = true;
            $('#composeForm #msg_txt').show();
            $('#composeForm input[name="email_to"]').val($('tr#' + id + ' td.name').text().trim());
            $('#composeForm input[name="email_subject"]').val($('tr#' + id + ' td.subject').text().trim());
            $('#composeForm #msg_txt p').text($('span.body' + id).text().trim());
//            CKEDITOR.instances['email_message'].setData($('span.body' + id).text().trim(), true);
//            editor.setValue($('span.body' + id).text().trim(), true);
            $('a#compose').trigger('click');
        });

        $('#composeForm').on('submit', function () {
            $('input[name="user_id"]').val(ids[contact.indexOf($('#users').val())]);
            $('.close').trigger('click');
        });

        /*$('button.send,button.draft').click(function () {
         $('#load').css('display', 'block');
         var val = $(this).val();
         var body = CKEDITOR.instances['email_message'].getData();
         $('#composeForm #email_message').text(body);
         
         $.ajax({
         type: 'POST',
         data: $('#composeForm').serialize(),
         url: "<?= site_url() ?>admin/mailbox/send/" + val,
         success: function (data, textStatus, jqXHR) {
         $('#composeForm').trigger('reset');
         $('#load').css('display', 'none');
         $('.close').trigger('click');
         if (data == 1) {
         $('#composeForm').trigger('reset');
         var msg = (val == "Send") ?
         "Email has been successfully sent..!" :
         "Email save as draft successfully..!";
         alertify.success(msg);
         } else {
         alertify.error("Failed to sending Email..!");
         }
         }
         });
         });*/
        setTimeout(function () {
            $('.ui-autocomplete').css('z-index', '9999');
        }, 1000);

    });
</script>