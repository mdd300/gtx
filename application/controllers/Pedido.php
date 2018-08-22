<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends CI_Controller {

    public function setPedido($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }

        define('UPLOAD_DIR', './upload/produtos/img/');

        $this->load->model("Pedido_model");

        $pedido = $this->Pedido_model->setPedido($Data["id"],$Data["pedido"]);

        foreach($Data["produtos"] as $key=>$value) {

            $produto = $this->Pedido_model->setProduto($value,$pedido);

            foreach($value["variantes_produto"] as $keyVar=>$valueVar) {

                $this->Pedido_model->setVariantes($valueVar,$produto);

            }

            foreach($value["camisas"] as $keycamisas=>$camisasPed) {

                $this->Pedido_model->setCamisas($camisasPed,$produto);

            }

            foreach($value["imgs"] as $keyImg=>$imgPed) {

                $img = $imgPed["src"];
                if($img !== "") {
                    $img = str_replace('data:image/png;base64,', '', $img);
                    $img = str_replace(' ', '+', $img);
                    $data = base64_decode($img);
                    $nome = uniqid() . ".png";
                    $file = UPLOAD_DIR . $nome;

                    file_put_contents($file, $data);

                    $this->Pedido_model->setImgs($nome,$produto);

                }
            }

        }

        $retorno = true;

        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }

    public function getPedidos($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }

        $this->load->model("Pedido_model");

        $retorno = $this->Pedido_model->getPedidos($Data)->result();

        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }

    public function getPedido($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }

        $this->load->model("Pedido_model");

        $retorno = $this->Pedido_model->getPedido($Data["id"]);

        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }

    public function updatePedido (){


        $session = $this->session->userdata("fashon_session");
        if(isset($session)) {
            $data = array(
                "selected" => 3,
                "id" => $_GET['id'],
                "tipo" => $session["user_tipo"]
            );
            $this->load->view("gtx/inc/header", $data);
            $this->load->view("gtx/pedido", $data);
            $this->load->view("gtx/inc/footer");
        }else{
            redirect(base_url());
        }
    }

    public function gerarPDF (){

        $id = $_GET['id'];

        $this->load->model("Pedido_model");

        $pdf = $this->Pedido_model->getPDF_Model($id);

        if($pdf->num_rows() > 0) {
            $pdf = $pdf->result()[0];
            $this->load->helper('download');
            if ($pdf->pdf_nome) {
                $data = file_get_contents('./upload/pdf/' . $pdf->pdf_nome);
            }
            $name = $pdf->pdf_nome;
            force_download($name, $data);
        }else{
            echo "Não possui PDF";
        }
    }

    public function setUpdatePedido($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }
        define('UPLOAD_DIR', './upload/produtos/img/');

        $this->load->model("Pedido_model");
        if(isset($Data["delete"])) {
            if (count($Data["delete"]) > 0)
                $this->Pedido_model->deleteImgs($Data["delete"]);
        }
        if(isset($Data["deleteCamisas"])) {
            if (count($Data["deleteCamisas"]) > 0)
                $this->Pedido_model->deleteCamisas($Data["deleteCamisas"]);
        }
        if(isset($Data["insertCamisa"])) {
            if (count($Data["insertCamisa"]) > 0)
                foreach($Data["insertCamisa"] as $keyCam=>$valueCam) {

                    $this->Pedido_model->setCamisas($valueCam, $valueCam["produto_id"]);

                }
        }
        foreach($Data["insert"] as $keyImg=>$imgPed) {

            if($imgPed["insert"]["src"] !== ""){
                $img = $imgPed["insert"]["src"];
                if($img !== "") {
                    $img = str_replace('data:image/png;base64,', '', $img);
                    $img = str_replace(' ', '+', $img);
                    $data = base64_decode($img);
                    $nome = uniqid() . ".png";
                    $file = UPLOAD_DIR . $nome;

                    file_put_contents($file, $data);

                    $this->Pedido_model->setImgs($nome, $imgPed["produto_id"]);
                }
            }
        }

        $this->Pedido_model->updatePedido($Data["update"]);

        foreach($Data["update"]["produtos"] as $key=>$value) {

            $this->Pedido_model->updateProduto($value);

            foreach ($value["camisas"] as $keycamisas => $camisasPed) {

                $this->Pedido_model->updateCamisas($camisasPed);

            }
        }

        $retorno = true;

        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }

    public function StatusChanged($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }

        $this->load->model("Home_model");
        $cliente =  $this->Home_model->getCliente_model($Data["pedido"]["cliente_id"])[0];

        $this->load->library('Fo_api');
        $retorno = Fo_api::sendEmailStatus($cliente->cliente_nome. " ". $cliente->cliente_sobrenome, $cliente->cliente_email, $Data["pedido"]["pedido_status"]);


        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }
}
