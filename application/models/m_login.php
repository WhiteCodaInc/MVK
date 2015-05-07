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
class M_login extends CI_Model {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    function login($post) {
        $query = $this->db->get_where('customer_detail', $post);
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

    function can_register($email) {
        $query = $this->db->get_where('customer_detail', array('email' => $email));
        return ($query->num_rows() == 1) ? $query->row() : 0;
    }

}
