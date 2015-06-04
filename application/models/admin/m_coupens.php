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
        $set['expiry_date'] = date('Y-m-d', strtotime($set['expiry_date']));
        $this->db->insert('coupens', $set);
        return TRUE;
    }

    function updateCoupen($set) {
        $gid = $set['coupenid'];
        unset($set['coupenid']);
        $this->db->update('coupens', $set, array('coupen_id' => $gid));
        return TRUE;
    }

    function setAction($type) {
        $msg = "";
        $ids = $this->input->post('coupen');
        echo '<pre>';
        print_r($ids);
        die();
        switch ($type) {
            case "Active":
                break;
            case "Deactive":
                break;
            case "Delete":
                foreach ($ids as $value) {
                    $this->db->delete('coupens', array('coupen_id' => $value));
                }
                $msg = "D";
                break;
            default:
                break;
        }
    }

}
