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
class Homepage extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();

        $this->load->model('m_blogs', 'objblog');
        $this->load->model('m_homepage', 'objhome');
    }

    function index() {
        $data['latest'] = $this->objblog->getLatestBlog();
        $default = $this->objblog->getDefaultBlog();
        $data['default'] = $default;
        $data['comments'] = $this->objblog->getComments($default->blog_id);
        $this->load->view('header');
        //$this->load->view('slider');
        $this->load->view('homepage', $data);
        $this->load->view('footer');
    }

    function addSubscriber() {
        $post = $this->input->post();
        $msg = $this->objhome->addSubscriber($post);
        echo ($msg) ? 1 : 0;
    }

    function addComment() {
        $post = $this->input->post();
        $this->objblog->addComment($post);
        header('location:' . site_url() . 'homepage');
    }

}
