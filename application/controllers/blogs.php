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
class Blogs extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('m_blogs', 'objblogs');
    }

    function index() {
        $data['blogs'] = $this->objblogs->getBlogs();
        $data['category'] = $this->objblogs->getBlogCategories();
        $this->load->view('header');
        $this->load->view('blog', $data);
        $this->load->view('footer');
    }

    function single_post($blogid) {
        $data['single'] = $this->objblogs->getSingleBlog($blogid);
        $data['related'] = $this->objblogs->getRelatedBlog($blogid);
        $data['comments'] = $this->objblogs->getComments($blogid);

        $this->load->view('header', $data);
        $this->load->view('blog-single-post', $data);
        $this->load->view('footer');
    }

    function addComment() {
        $post = $this->input->post();
        $this->objblogs->addComment($post);
        header('location:' . site_url() . 'blogs/single_post/' . $post['blog_id']);
    }

}
