<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-envelope-o"></i>
    <span class="label label-success ebadge">0</span>
</a>
<ul class="dropdown-menu">
    <li class="header">You have <span class="totalC"><?= $this->common->getTotalUnreadComment() ?></span> comments</li>
    <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu unreadSMS">
            <?php foreach ($comments as $comment) { ?>
                <?php
                if ($comment->user_id != NULL) {
                    if ($comment->type == "customer") {
                        $cInfo = $this->common->getCustomerInfo($comment->user_id);
                        $img_src = ($comment->customer_avatar != "") ?
                                "http://mikhailkuznetsov.s3.amazonaws.com/" . $comment->customer_avatar :
                                base_url() . 'assets/admin/img/default-avatar.png';
                    } else {
                        $aInfo = $this->common->getAffiliateInfo($comment->user_id);
                        $img_src = ($comment->affiliate_avatar != "") ?
                                "http://mikhailkuznetsov.s3.amazonawsF.com/" . $comment->affiliate_avatar :
                                base_url() . 'assets/admin/img/default-avatar.png';
                    }
                } else {
                    $img_src = base_url() . 'assets/admin/img/default-avatar.png';
                }
                ?>
                <li><!-- start message -->
                    <a href="<?= site_url() . 'admin/comment' ?>">
                        <div class="pull-left">
                            <img style="width:60px;height:60px" src="<?= $img_src ?>" class="img-circle" alt="Customer Image"/>
                        </div>
                        <h4>
                            <?= $comment->name ?>
                            <small><i class="fa fa-clock-o"></i><?= date('m-d-Y H:i', strtotime($comment->date)) ?></small>
                        </h4>
                        <p><?= substr($comment->comment, 0, 50); ?>...</p>
                    </a>
                </li><!-- end message -->
            <?php } ?>
        </ul>
    </li>
    <li class="footer"><a href="<?= site_url() . 'admin/comment' ?>">See All Comments</a></li>
</ul>

