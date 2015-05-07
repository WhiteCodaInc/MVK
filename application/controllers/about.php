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
class About extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        //$this->load->library('twitterlib');
        $this->load->model('m_aboutus', 'objaboutus');
    }

    function index() {



        $data['about'] = $this->objaboutus->getAboutusContent();
        $this->load->view('header');
        $this->load->view('about', $data);
        $this->load->view('footer');
    }

    function send() {
        $post = $this->input->post();
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => "ssl://smtp.googlemail.com",
            'smtp_port' => "465",
            'smtp_user' => "sanjayvekariya18@gmail.com", // change it to yours
            'smtp_pass' => "MyD@te18021991" // change it to yours
        );
        $subject = "New Query From {$post['name']}";
        $body = "Name    : {$post['name']}," . '<br>';
        $body .= "Email   : {$post['email']}," . '<br>';
        $body .= "Message : {$post['message']}." . '<br>';

        $this->load->library('email', $config);
        $this->email->from("info@mikhailkuznetsov.com", "Mikhail");
        $this->email->to("sanjayvekariya18@gmail.com");
        $this->email->subject($subject);
        $this->email->message($body);
        if ($this->email->send()) {
            echo 1;
        } else {
            echo 0;
        }
    }

}
