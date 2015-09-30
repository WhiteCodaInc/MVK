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
class Login extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->model('m_login', 'objlogin');
    }

    function index() {
        $data['word'] = $this->common->getRandomDigit(5);
        $this->session->set_userdata('captchaWord', $data['word']);
        $this->load->view('header');
        $this->load->view('signin', $data);
        $this->load->view('footer');
    }

    function signin($get = NULL) {
        $post = $this->input->post();
        if ($get != NULL) {
            $get = $this->input->get();
            $post['email'] = $this->encryption->decode($get['u']);
            $post['password'] = $this->encryption->decode($get['p']);
        }
        if ($this->objlogin->login($post)) {
            header('location:' . site_url() . 'homepage');
        } else {
            header('location:' . site_url() . 'login?msg=fail');
        }
    }

    function captcha_refresh() {
        echo $this->common->getRandomDigit(5);
    }

    function checkEmail() {
        $email = $this->input->post('email');
        $res = $this->objlogin->can_register($email);
        echo (!$res) ? 0 : 1;
    }

    function sendMail() {
        $email = $this->input->post('email');
        $customerInfo = $this->objlogin->can_register($email);
        $uid = $this->encryption->encode($customerInfo->customer_id);
        $templateInfo = $this->common->getAutomailTemplate("FORGOT PASSWORD");
        $url = site_url() . 'setpassword?type=forgot&uid=' . $uid;
        $link = "<table border='0' align='center' cellpadding='0' cellspacing='0' class='mainBtn' style='margin-top: 0;margin-left: auto;margin-right: auto;margin-bottom: 0;padding-top: 0;padding-bottom: 0;padding-left: 0;padding-right: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-collapse: collapse;border-spacing: 0;'>";
        $link .= "<tr>";
        $link .= "<td align='center' valign='middle' class='btnMain' style='margin-top: 0;margin-left: 0;margin-right: 0;margin-bottom: 0;padding-top: 12px;padding-bottom: 12px;padding-left: 22px;padding-right: 22px;border-collapse: collapse;border-spacing: 0;-webkit-text-size-adjust: none;font-family: Arial, Helvetica, sans-serif;background-color: {$templateInfo['color']};height: 20px;font-size: 18px;line-height: 20px;mso-line-height-rule: exactly;text-align: center;vertical-align: middle;'>
                                            <a href='{$url}' style='padding-top: 0;padding-bottom: 0;padding-left: 0;padding-right: 0;display: inline-block;text-decoration: none;-webkit-text-size-adjust: none;font-family: Arial, Helvetica, sans-serif;color: #ffffff;font-weight: bold;'>
                                                <span style='text-decoration: none;color: #ffffff;'>
                                                    Reset My Password
                                                </span>
                                            </a>
                                        </td>";
        $link .= "</tr></table>";
        $tag = array(
            'FIRST_NAME' => $customerInfo->fname,
            'LAST_NAME' => $customerInfo->lname,
            'LINK' => $link,
            'THISDOMAIN' => "Mikhail"
        );
        $subject = $this->parser->parse_string($templateInfo['mail_subject'], $tag, TRUE);
        $this->load->view('email_format', $templateInfo, TRUE);
        $body = $this->parser->parse('email_format', $tag, TRUE);

        $from = ($templateInfo['from'] != "") ? $templateInfo['from'] : NULL;
        $name = ($templateInfo['name'] != "") ? $templateInfo['name'] : NULL;

        $res = $this->common->sendAutoMail($email, $subject, $body, $from, $name);
        echo ($res) ? 1 : 0;
    }

}
