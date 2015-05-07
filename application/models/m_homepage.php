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
class M_homepage extends CI_Model {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    function addSubscriber($set) {
        $this->db->trans_start();
        $fname = $set['name'];
        //$this->db->insert('subscriber', $set);
        $query = $this->db->get_where('customer_detail', array('email' => $set['email']));
        if ($query->num_rows() <= 0) {
            $name = explode(' ', $fname);
            $set['fname'] = (isset($name[0])) ? $name[0] : '';
            $set['lname'] = (isset($name[1])) ? $name[1] : '';
            $set['joined_via'] = "subscription";
            unset($set['name']);
            $this->db->insert('customer_detail', $set);
        }
        $this->common->addMailMember($fname, $set['email'], 'Subscriber');
        $this->db->trans_complete();
        return ($this->db->trans_status()) ? TRUE : FALSE;
    }

}
