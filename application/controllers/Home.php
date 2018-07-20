<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){

	    $this->load->view("gtx/login");

    }
    public function cliente(){
        $this->load->view("cliente/login");
        $this->session->sess_destroy();
    }
    public  function dashboard(){
        $data = array(
            "selected" => 1
        );
        $this->load->view("gtx/inc/header", $data);
        $this->load->view("gtx/dashboard");
        $this->load->view("gtx/inc/footer");

    }
    public  function clientes(){

	    $data = array(
	        "selected" => 2
        );
        $session = $this->session->userdata("fashon_session");
        if(isset($session)) {
            $this->load->view("gtx/inc/header", $data);
            $this->load->view("gtx/clientes");
            $this->load->view("gtx/inc/footer");
        }else{
            redirect(base_url());
        }
    }
    public  function pedidos(){

        $data = array(
            "selected" => 3
        );
        $session = $this->session->userdata("fashon_session");
        if(isset($session)) {
            $this->load->view("gtx/inc/header", $data);
            $this->load->view("gtx/pedidos");
            $this->load->view("gtx/inc/footer");
        }else{
            redirect(base_url());
        }
    }
    public  function addPedido(){

        $data = array(
            "selected" => 2
        );

        $this->load->model("Home_model");
        $retorno['cliente'] = $this->Home_model->getCliente_model($_GET['id'])[0];
        $retorno["id"] = $_GET['id'];

        $this->load->view("gtx/inc/header", $data);
        $this->load->view("gtx/addPedido",$retorno);
        $this->load->view("gtx/inc/footer");

    }
    public function updateCliente(){

        $data = array(
            "selected" => 2,
            "id" => $_GET['id']
        );

        $this->load->view("gtx/inc/header", $data);
        $this->load->view("gtx/updateCliente",$data);
        $this->load->view("gtx/inc/footer");

    }

    public function getClienteWhere($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }

        $this->load->model("Home_model");
        $retorno = $this->Home_model->getCliente_model($Data["id"])[0];

        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }

    public  function AddCliente(){

        $data = array(
            "selected" => 2
        );

        $this->load->view("gtx/inc/header", $data);
        $this->load->view("gtx/addCliente");
        $this->load->view("gtx/inc/footer");

    }

    public function setCliente($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }

        $this->load->model("Home_model");
        $retorno = $this->Home_model->setCliente_model($Data);

        $this->load->library('Fo_api');
        Fo_api::sendEmail($Data['cliente_nome']. " ". $Data['cliente_sobrenome'], $Data["cliente_email"], $Data["cliente_username"]);

        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }

    public function setUpdateCliente($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }

        $this->load->model("Home_model");
        $retorno = $this->Home_model->setUpdateCliente_model($Data["data"], $Data["id"]);

        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }

    public function getClientes($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }

        $this->load->model("Home_model");
        $retorno = $this->Home_model->getCliente_model();


        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }

}
