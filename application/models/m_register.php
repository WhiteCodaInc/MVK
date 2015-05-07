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
class M_register extends CI_Model {

//put your code here
    function __construct() {
        parent::__construct();
    }

    function register($post) {
        $name = explode(' ', $post['fullname']);
        $post['fname'] = $name[0];
        $post['lname'] = $name[1];
        $post['password'] = $this->generateRandomString(5);
        $post['joined_via'] = "registration";
        unset($post['fullname']);



        $this->db->insert('customer_detail', $post);
        $reply = $this->sendCredential($post);
        $msg = ($reply) ? "true" : "false";
        return $msg;
    }

    function generateRandomString($length = 5) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    function isAlreadyRegiater($post) {
        $query = $this->db->get_where('customer_detail', array('email' => $post['email']));
        $res = $query->row();
        if ($query->num_rows() > 0) {
            return ($res->password == NULL) ? $res : TRUE;
        } else {
            return FALSE;
        }
    }

    function sendCredential($post) {
        $templateInfo = $this->common->getAutomailTemplate("NEW USER REGISTRATION");
        $tag = array(
            'FIRST_NAME' => $post['fname'],
            'LAST_NAME' => $post['lname'],
            'EMAIL' => $post['email'],
            'PASSWORD' => $post['password'],
            'THISDOMAIN' => "Mikhail"
        );
        $subject = $this->parser->parse_string($templateInfo['mail_subject'], $tag, TRUE);
        $this->load->view('email_format', $templateInfo, TRUE);
        $body = $this->parser->parse('email_format', $tag, TRUE);

        $from = ($templateInfo['from'] != "") ? $templateInfo['from'] : NULL;
        $name = ($templateInfo['name'] != "") ? $templateInfo['name'] : NULL;

        return $this->common->sendAutoMail($post['email'], $subject, $body, $from, $name);
    }

}
