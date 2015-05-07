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
class Setpassword extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('m_password', 'objpassword');
    }

    function index() {
        $userid = $this->input->get('uid');
        $type = $this->input->get('type');
        $data['uid'] = $this->encryption->decode($userid);
        $data['isForgot'] = ($type != "" && $type == "forgot") ? TRUE : FALSE;
        $this->load->view('header');
        $this->load->view('change-password', $data);
        $this->load->view('footer');
    }

    function set() {
        $post = $this->input->post();
        $login = $this->objpassword->setPassword($post);
        if ($login && $this->objpassword->login($login)) {
            header('location:' . site_url() . 'homepage');
        } else {
            header('location:' . site_url() . 'setpassword?msg=fail');
        }
    }

}
