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
class M_aboutus extends CI_Model {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    function getAboutusContent() {
        $query = $this->db->get('aboutus');
        return $query->row();
    }

}
