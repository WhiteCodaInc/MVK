<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_admin_login
 *
 * @author Laxmisoft
 */
class M_coupens extends CI_Model {

    private $profileid;

    function __construct() {
        parent::__construct();
        $this->profileid = $this->session->userdata('profile_id');
    }

    function getCoupens() {
        $query = $this->db->get('coupens');
        return $query->result();
    }

    function getCoupen($gid) {
        $query = $this->db->get_where('coupens', array('coupen_id' => $gid));
        return $query->row();
    }

    function createCoupen($set) {
        $this->db->insert('coupens', $set);
        return TRUE;
    }

    function updateCoupen($set) {
        $gid = $set['coupenid'];
        unset($set['coupenid']);
        $this->db->update('coupens', $set, array('coupen_id' => $gid));
        return TRUE;
    }

    function setAction() {
        $ids = $this->input->post('coupen');
        foreach ($ids as $value) {
            $this->db->delete('coupens', array('coupen_id' => $value));
        }
    }

}
