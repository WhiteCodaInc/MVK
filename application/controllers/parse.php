<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Parse extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        echo '<pre>';

        $myfile = fopen(FCPATH . 'data.txt', "a");

        $post = $this->input->post();

        fwrite($myfile, "--POST {$post} ---\n");

        fwrite($myfile, "----POST Data-----\n");
        if (is_array($post) && count($post)) {
            foreach ($post as $key => $value) {
                fwrite($myfile, "{$key} : {$value}\n");
            }
        }

        $data = json_decode($post);
        fwrite($myfile, "----JSON Data-----\n");
        if (is_array($data) && count($data)) {
            foreach ($post as $key => $value) {
                fwrite($myfile, "{$key} : {$value}\n");
            }
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */