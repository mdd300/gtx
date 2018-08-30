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
    public function pedidosCli()
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
    public function getPedidosCli($Data = null){
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
    public function updatePedidoCli (){

        $data = array(
            "selected" => 3,
            "id" => $_GET['id']
        );

        $this->load->view("cliente/inc/header", $data);
        $this->load->view("cliente/pedido",$data);
        $this->load->view("cliente/inc/footer");

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


        $session = $this->session->userdata("fashon_session");
        if(isset($session)) {
            $data = array(
                "selected" => 2,
                "tipo" => $session["user_tipo"]
            );
            $this->load->view("gtx/inc/header", $data);
            $this->load->view("gtx/clientes");
            $this->load->view("gtx/inc/footer");
        }else{
            redirect(base_url());
        }
    }
    public  function users(){


        $session = $this->session->userdata("fashon_session");
        if(isset($session)) {
            $data = array(
                "selected" => 6,
                "tipo" => $session["user_tipo"]

            );
            $this->load->view("gtx/inc/header", $data);
            $this->load->view("gtx/users");
            $this->load->view("gtx/inc/footer");
        }else{
            redirect(base_url());
        }
    }
    public  function addUser(){


        $session = $this->session->userdata("fashon_session");
        if(isset($session)) {
            $data = array(
                "selected" => 6,
                "tipo" => $session["user_tipo"]

            );
            $this->load->view("gtx/inc/header", $data);
            $this->load->view("gtx/AddUsers");
            $this->load->view("gtx/inc/footer");
        }else{
            redirect(base_url());
        }
    }

    public  function updateUser(){


        $session = $this->session->userdata("fashon_session");
        if(isset($session)) {
            $data = array(
                "selected" => 6,
                "tipo" => $session["user_tipo"]
            );
            $this->load->view("gtx/inc/header", $data);
            $this->load->view("gtx/AddUsers");
            $this->load->view("gtx/inc/footer");
        }else{
            redirect(base_url());
        }
    }
    public  function categorias(){


        $session = $this->session->userdata("fashon_session");
        if(isset($session)) {
            $data = array(
                "selected" => 5,
                "tipo" => $session["user_tipo"]

            );
            $this->load->view("gtx/inc/header", $data);
            $this->load->view("gtx/categorias");
            $this->load->view("gtx/inc/footer");
        }else{
            redirect(base_url());
        }
    }
    public  function pedidos(){


        $session = $this->session->userdata("fashon_session");
        if(isset($session)) {
            $data = array(
                "selected" => 3,
                "tipo" => $session["user_tipo"]
            );
            $this->load->view("gtx/inc/header", $data);
            $this->load->view("gtx/pedidos");
            $this->load->view("gtx/inc/footer");
        }else{
            redirect(base_url());
        }
    }
    public  function produtos(){


        $session = $this->session->userdata("fashon_session");
        if(isset($session)) {
            $data = array(
                "selected" => 4,
                "tipo" => $session["user_tipo"]
            );
            $this->load->view("gtx/inc/header", $data);
            $this->load->view("gtx/produtos");
            $this->load->view("gtx/inc/footer");
        }else{
            redirect(base_url());
        }
    }

    public function getUsers($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }

        $this->load->model("Home_model");
        $retorno = $this->Home_model->getUsers_model($Data);

        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }

    public function setUser($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }

        $this->load->model("Home_model");
        $retorno = $this->Home_model->setUsers_model($Data["data"]);

        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }

    public function setUpdateUser($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }

        $this->load->model("Home_model");
        $retorno = $this->Home_model->updateUsers_model($Data["data"],$Data["id"]);

        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }


    public  function addProduto(){


        $session = $this->session->userdata("fashon_session");
        if(isset($session)) {
            $data = array(
                "selected" => 4,
                "tipo" => $session["user_tipo"]
            );
            $this->load->view("gtx/inc/header", $data);
            $this->load->view("gtx/addProduto");
            $this->load->view("gtx/inc/footer");
        }else{
            redirect(base_url());
        }
    }
    public  function addPedido(){

        $session = $this->session->userdata("fashon_session");
        if(isset($session)) {
        $data = array(
            "selected" => 3,
            "tipo" => $session["user_tipo"]
        );

        $this->load->model("Home_model");
        $retorno['cliente'] = $this->Home_model->getCliente_model($_GET['id'])[0];
        $retorno["id"] = $_GET['id'];

        $this->load->view("gtx/inc/header", $data);
        $this->load->view("gtx/addPedido",$retorno);
        $this->load->view("gtx/inc/footer");
        }else{
            redirect(base_url());
        }
    }
    public function updateCliente(){

	    $session = $this->session->userdata("fashon_session");
        if(isset($session)) {
        $data = array(
            "selected" => 2,
            "id" => $_GET['id'],
            "tipo" => $session["user_tipo"]
        );

        $this->load->view("gtx/inc/header", $data);
        $this->load->view("gtx/updateCliente",$data);
        $this->load->view("gtx/inc/footer");
        }else{
            redirect(base_url());
        }
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

        $session = $this->session->userdata("fashon_session");
        if(isset($session)) {
            $data = array(
                "selected" => 2,
                "tipo" => $session["user_tipo"]
            );

        $this->load->view("gtx/inc/header", $data);
        $this->load->view("gtx/addCliente");
        $this->load->view("gtx/inc/footer");
        }else{
            redirect(base_url());
        }
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



    public function editPDF (){

        $id = $_GET['id'];

        $this->load->model("Pedido_model");
        $this->load->model("Home_model");

        $data = array();
        $data["pedido"] = $this->Pedido_model->getPedido($id);
        $data["cliente"] =$this->Home_model->getCliente_model( $data["pedido"]->cliente_id)[0];
        $data["subtotal"] = 0.0;


        // Instancia a classe mPDF
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'ut-8',
            'format' => "A4",
        ]);
        // Ao invés de imprimir a view 'welcome_message' na tela, passa o código
        // HTML dela para a variável $html
        $data["html"] = $this->load->view('pdf_pedido',$data,TRUE);

        $this->load->view("cliente/inc/header");
        $this->load->view("cliente/pdf", $data);
        $this->load->view("cliente/inc/footer");


    }

    public function visualizarPDF (){

        $id = $_GET['id'];

        $this->load->model("Pedido_model");
        $this->load->model("Home_model");

        $data = array();
        $data["pedido"] = $this->Pedido_model->getPedido($id);
        $data["cliente"] =$this->Home_model->getCliente_model( $data["pedido"]->cliente_id)[0];
        $data["subtotal"] = 0.0;

        $html = $this->load->view('pdf_pedido_visual',$data,TRUE);

        // Instancia a classe mPDF
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'ut-8',
            'format' => "A4",
        ]);
        // Ao invés de imprimir a view 'welcome_message' na tela, passa o código
        // HTML dela para a variável $html
        // Define um Cabeçalho para o arquivo PDF
        $mpdf->SetHeader(array('odd' => array (
            'L' => array (
                'content' => '',
                'font-size' => 10,
                'font-style' => 'B',
                'font-family' => 'serif',
                'color'=>'#000000'
            ),
            'C' => array (
                'content' => "  ",
                'font-size' => 10,
                'font-style' => 'B',
                'font-family' => 'serif',
                'color'=>'#000000',
            ),
            'R' => array (
                'content' => '
  <img style=\' height: 40px; width: 80px;\' src=\'https://gtxsports.com.br/wp-content/uploads/2017/07/gtxSports_blk.png\'>
       ',
                'font-size' => 10,
                'font-style' => 'B',
                'font-family' => 'serif',
                'color'=>'#000000'
            ),
            'line' => 1,
        ),
            'even' => array ()));
        // Define um rodapé para o arquivo PDF, nesse caso inserindo o número da
        // página através da pseudo-variável PAGENO
        $mpdf->SetFooter('{PAGENO}');
        // Insere o conteúdo da variável $html no arquivo PDF
        $mpdf->writeHTML($html);
        // Cria uma nova página no arquivo
        // Insere o conteúdo na nova página do arquivo PDF
//        $mpdf->WriteHTML('<p><b>Minha nova página no arquivo PDF</b></p>');
        // Gera o arquivo PDF

        $pdf = uniqid().".pdf";
        $mpdf->Output( );




    }

    public function gerarPDF ($Data = null){

        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }

        $html = $Data["content"];

        // Instancia a classe mPDF
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'ut-8',
            'format' => "A4",
            'setAutoTopMargin' => 'pad'
        ]);
        // Ao invés de imprimir a view 'welcome_message' na tela, passa o código
        // HTML dela para a variável $html
        // Define um Cabeçalho para o arquivo PDF
        $mpdf->SetHeader(array('odd' => array (
            'L' => array (
                'content' => '',
                'font-size' => 10,
                'font-style' => 'B',
                'font-family' => 'serif',
                'color'=>'#000000'
            ),
            'C' => array (
                'content' => "  ",
                'font-size' => 10,
                'font-style' => 'B',
                'font-family' => 'serif',
                'color'=>'#000000',
            ),
            'R' => array (
                'content' => '
  <img style=\' height: 40px; width: 80px;\' src=\'https://gtxsports.com.br/wp-content/uploads/2017/07/gtxSports_blk.png\'>
       ',
                'font-size' => 10,
                'font-style' => 'B',
                'font-family' => 'serif',
                'color'=>'#000000'
            ),
            'line' => 1,
        ),
            'even' => array ()));
        // Define um rodapé para o arquivo PDF, nesse caso inserindo o número da
        // página através da pseudo-variável PAGENO
        $mpdf->SetFooter('{PAGENO}');
        // Insere o conteúdo da variável $html no arquivo PDF
        $mpdf->writeHTML($html);
        // Cria uma nova página no arquivo
        // Insere o conteúdo na nova página do arquivo PDF
//        $mpdf->WriteHTML('<p><b>Minha nova página no arquivo PDF</b></p>');
        // Gera o arquivo PDF

        $pdf = uniqid().".pdf";
        $arquivo = $mpdf->Output("upload/pdf/".$pdf,"F" );

        $retorno["name"] = "upload/pdf/".$pdf;

        $this->load->model("Home_model");

        $this->Home_model->setPDF_Model($Data["id"],$pdf);

        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }



}
