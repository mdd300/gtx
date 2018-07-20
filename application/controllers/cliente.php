<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cliente extends CI_Controller
{

    Public function _construct() { Parent::_construct(); }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view("cliente/login");
        $this->session->sess_destroy();
    }
    public function pedidos()
    {
        $session = $this->session->userdata("fashon_session");
        if(isset($session)){
            $this->load->view("cliente/inc/header");
            $this->load->view("cliente/pedidos");
            $this->load->view("cliente/inc/footer");
        }else{
            redirect(base_url("cliente"));
        }
    }
    public function getPedidos($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }
        $session = $this->session->userdata("fashon_session");
        $this->load->model("Cliente_model");
        $retorno = $this->Cliente_model->getPedidos_model($session)->result();

        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }
    public function updatePedido (){

        $data = array(
            "selected" => 3,
            "id" => $_GET['id']
        );

        $this->load->view("cliente/inc/header", $data);
        $this->load->view("cliente/pedido",$data);
        $this->load->view("cliente/inc/footer");

    }
}
