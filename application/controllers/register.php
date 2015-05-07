<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mikhaill
 *
 * @author Laxmisoft
 */
class Register extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('m_register', 'objregister');
    }

    function index() {
        $this->load->view('header');
        $this->load->view('signup');
        $this->load->view('footer');
    }

    function signup() {
        $post = $this->input->post();
        $flag = FALSE;
        $isRegister = $this->objregister->isAlreadyRegiater($post);
        if ($isRegister && !is_object($isRegister)) {
            $data['passNull'] = FALSE;
            $flag = TRUE;
        } else if ($isRegister && is_object($isRegister)) {
            $data['passNull'] = TRUE;
            $data['res'] = $isRegister;
            $flag = TRUE;
        } else if (!$isRegister) {
            $msg = $this->objregister->register($post);
            header('location:' . site_url() . 'homepage?msg=' . $msg);
        }
        if ($flag) {
            $this->load->view('header');
            $this->load->view('signup', $data);
            $this->load->view('footer');
        }
    }

    function sendMail() {
        $post = $this->input->post();
        $uid = $this->encryption->encode($post['userid']);
        $templateInfo = $this->common->getAutomailTemplate("WELCOME E-MAIL");
        $url = site_url() . 'setpassword?uid=' . $uid;
        $link = "<table border='0' align='center' cellpadding='0' cellspacing='0' class='mainBtn' style='margin-top: 0;margin-left: auto;margin-right: auto;margin-bottom: 0;padding-top: 0;padding-bottom: 0;padding-left: 0;padding-right: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-collapse: collapse;border-spacing: 0;'>";
        $link .= "<tr>";
        $link .= "<td align='center' valign='middle' class='btnMain' style='margin-top: 0;margin-left: 0;margin-right: 0;margin-bottom: 0;padding-top: 12px;padding-bottom: 12px;padding-left: 22px;padding-right: 22px;border-collapse: collapse;border-spacing: 0;-webkit-text-size-adjust: none;font-family: Arial, Helvetica, sans-serif;background-color: {$templateInfo['color']};height: 20px;font-size: 18px;line-height: 20px;mso-line-height-rule: exactly;text-align: center;vertical-align: middle;'>
                                            <a href='{$url}' style='padding-top: 0;padding-bottom: 0;padding-left: 0;padding-right: 0;display: inline-block;text-decoration: none;-webkit-text-size-adjust: none;font-family: Arial, Helvetica, sans-serif;color: #ffffff;font-weight: bold;'>
                                                <span style='text-decoration: none;color: #ffffff;'>
                                                    Active Your Account
                                                </span>
                                            </a>
                                        </td>";
        $link .= "</tr></table>";
        $tag = array(
            'FIRST_NAME' => $post['fname'],
            'LAST_NAME' => $post['lname'],
            'LINK' => $link,
            'THISDOMAIN' => "Mikhail"
        );
        $subject = $this->parser->parse_string($templateInfo['mail_subject'], $tag, TRUE);
        $this->load->view('email_format', $templateInfo, TRUE);
        $body = $this->parser->parse('email_format', $tag, TRUE);

        $from = ($templateInfo['from'] != "") ? $templateInfo['from'] : NULL;
        $name = ($templateInfo['name'] != "") ? $templateInfo['name'] : NULL;

        $reply = $this->common->sendAutoMail($post['email'], $subject, $body, $from, $name);
        echo $reply;
    }

}
