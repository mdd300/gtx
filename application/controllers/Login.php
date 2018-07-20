<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $this->load->view('metronic/login/login');
    }

    public function do_login ($post = null) {

        $this->load->library(['Keepbox/fo_login']);

        if ($post == null) {
            $Output = true;
            $post = $this->input->post();
        } else {
            $Output = false;
        }

        $Response = Fo_login::do_login($post);

        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($Response));

    }

    public function do_login2 ($post = null) {

        $this->load->library(['Keepbox/fo_login']);

        if ($post == null) {
            $Output = true;
            $post = $this->input->post();
        } else {
            $Output = false;
        }

        $Response = Fo_login::do_login2($post);

        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($Response));
    }

}
