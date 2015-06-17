<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_view
 *
 * @author Laxmisoft
 */
class M_blogs extends CI_Model {

    private $userid, $type;

    //put your code here
    function __construct() {
        parent::__construct();

        $this->userid = $this->session->userdata('userid');
        $this->type = $this->session->userdata('type');
    }

    function getLatestBlog() {
        $where = array(
            'status' => 1,
            'default_post' => 0
        );
        $this->db->limit(3);
        $this->db->order_by('order', 'asc');
        $query = $this->db->get_where('blogs', $where);
        return $query->result();
    }

    function getRelatedBlog($blogid) {
        $blog = $this->getSingleBlog($blogid);
        $where = array(
            'status' => 1,
            'blog_id !=' => $blogid,
            'category_id' => $blog->category_id
        );
        $this->db->limit(3);
        $this->db->order_by('order', 'asc');
        $query = $this->db->get_where('blogs', $where);
        return $query->result();
    }

    function getDefaultBlog() {
        $where = array(
            'status' => 1,
            'default_post' => 1
        );
        $query = $this->db->get_where('blogs', $where);
        return $query->row();
    }

    function getSingleBlog($blogid) {
        $query = $this->db->get_where('blogs', array('blog_id' => $blogid));
        return $query->row();
    }

    function getBlogs() {
        $this->db->select('*');
        $this->db->from('blogs as B');
        $this->db->join('blog_categories as BC', 'B.category_id = BC.category_id', 'left outer');
        $this->db->order_by('order', 'asc');
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function getBlogCategories() {
        $query = $this->db->get('blog_categories');
        return $query->result();
    }

    function addComment($set) {
        $flag = TRUE;
        if ($this->type == "customer" && $this->userid != "") {
            $query = $this->db->get_where('customer_detail', array('customer_id' => $this->userid));
            $customer = $query->row();
            $set['name'] = $customer->fname . ' ' . $customer->lname;
            $set['email'] = $customer->email;
            $set['user_id'] = $customer->customer_id;
            $set['type'] = $this->type;
            $flag = FALSE;
        } else if ($this->type == "affiliate" && $this->userid != "") {
            $query = $this->db->get_where('affiliate_detail', array('affiliate_id' => $this->userid));
            $affilaite = $query->row();
            $set['name'] = $affilaite->fname . ' ' . $affilaite->lname;
            $set['email'] = $affilaite->email;
            $set['user_id'] = $affilaite->affiliate_id;
            $set['type'] = $this->type;
            $flag = FALSE;
        }
        if ($flag) {
            $query = $this->db->get_where('customer_detail', array('email' => $set['email']));
            if ($query->num_rows() <= 0) {
                $fname = $set['name'];
                $name = explode(' ', $fname);
                $customer = array(
                    'fname' => (isset($name[0])) ? $name[0] : '',
                    'lname' => (isset($name[1])) ? $name[1] : '',
                    'email' => $set['email'],
                    'joined_via' => "comment",
                    'joined_url' => $set['joined_url']
                );
                $this->db->insert('customer_detail', $customer);
//                $insertid = $this->db->insert_id();
//                $set['user_id'] = $insertid;
//                $set['type'] = $this->type;
                $this->common->addMailMember($set['name'], $set['email'], 'Commentator');
            }
        }
        unset($set['joined_url']);
        $this->db->insert('blog_comment', $set);
        return TRUE;
    }

    function getComments($blogid) {
        if ($this->userid != "") {
            $query = $this->db->query("select * from blog_comment where status = 1 and blog_id = {$blogid} union select * from blog_comment where status = 0 and user_id = {$this->userid} and type='{$this->type}' and blog_id = {$blogid} order by date desc", FALSE);
        } else {
            $query = $this->db->query("select * from blog_comment where status = 1 and blog_id = {$blogid}  order by date desc", FALSE);
        }
        return $query->result();
    }

}
