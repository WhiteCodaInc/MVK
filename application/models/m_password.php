<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_aboutus
 *
 * @author Laxmisoft
 */
class M_password extends CI_Model {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    function login($post) {
        $where = array(
            'email' => $post['email'],
            'password' => $post['password']
        );
        $query = $this->db->get_where('customer_detail', $where);
        $res = $query->row();
        if ($query->num_rows() > 0) {
            $this->session->set_userdata('name', $res->fname . ' ' . $res->lname);
            $this->session->set_userdata('userid', $res->customer_id);
            $this->session->set_userdata('type', "customer");
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function setPassword($post) {
        $where['customer_id'] = $post['userid'];
        $set['password'] = $post['password'];
        if ($this->db->update('customer_detail', $set, $where)) {
            $query = $this->db->get_where('customer_detail', $where);
            $login['email'] = $query->row()->email;
            $login['password'] = $post['password'];
            if ($post['type'] == "forgot") {
                $this->sendMail($post['userid'], "FORGOT PASSWORD SUCCESS");
            }
            return $login;
        } else {
            return FALSE;
        }
    }

    function sendMail($userid, $type) {
        $userInfo = $this->common->getCustomerInfo($userid);
        $templateInfo = $this->common->getAutomailTemplate($type);

        $tag = array(
            'FIRST_NAME' => $userInfo->fname,
            'LAST_NAME' => $userInfo->lname,
            'THISDOMAIN' => "Mikhail"
        );
        $subject = $this->parser->parse_string($templateInfo['mail_subject'], $tag, TRUE);
        $this->load->view('email_format', $templateInfo, TRUE);
        $body = $this->parser->parse('email_format', $tag, TRUE);

        $from = ($templateInfo['from'] != "") ? $templateInfo['from'] : NULL;
        $name = ($templateInfo['name'] != "") ? $templateInfo['name'] : NULL;

        return $this->common->sendAutoMail($userInfo->email, $subject, $body, $from, $name);
    }

}
