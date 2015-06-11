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
class M_coupons extends CI_Model {

    private $profileid;

    function __construct() {
        parent::__construct();
        $this->profileid = $this->session->userdata('profile_id');
    }

    function getCoupons() {
        $query = $this->db->get('coupons');
        return $query->result();
    }

    function getCoupon($gid) {
        $query = $this->db->get_where('coupons', array('coupon_id' => $gid));
        return $query->row();
    }

    function createCoupon($set) {
        if ($set['expire'] == "expire") {
            $set['expiry_date'] = date('Y-m-d', strtotime($set['expiry_date']));
        }
        unset($set['expire']);
        $this->db->insert('coupons', $set);
        return TRUE;
    }

    function updateCoupon($set) {
        $gid = $set['couponid'];
        unset($set['couponid']);
        if ($set['expire'] == "expire") {
            $set['expiry_date'] = date('Y-m-d', strtotime($set['expiry_date']));
        }
        unset($set['expire']);
        $this->db->update('coupons', $set, array('coupon_id' => $gid));
        return TRUE;
    }

    function setAction($type, $ids) {
        $msg = "";
        $this->db->where('coupon_id in (' . implode(',', $ids) . ')');
        switch ($type) {
            case "Active":
                $this->db->update('coupons', array('status' => 1));
                $msg = "A";
                break;
            case "Deactive":
                $this->db->update('coupons', array('status' => 0));
                $msg = "DA";
                break;
            case "Delete":
                $this->db->delete('coupons');
                $msg = "D";
                break;
        }
        return $msg;
    }

    function isExistCoupon($code) {
        $query = $this->db->get_where('coupons', array('coupon_code' => $code));
        return ($query->num_rows()) ? TRUE : FALSE;
    }

}
