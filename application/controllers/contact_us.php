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
class Contact_us extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view('header');
        $this->load->view('contact-us');
        $this->load->view('footer');
    }

}
