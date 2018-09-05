<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

    public function getProdutos($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }

        $this->load->model("Produtos_model");
        $retorno = $this->Produtos_model->getProdutosModel()->result();

        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }

    public function setProdutos($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }


            $this->load->model("Produtos_model");
            $produtoID = $this->Produtos_model->setProdutos_model($Data);

            foreach($Data["produto_variantes"] as $keyVar=>$valueVar) {

                $varianteID = $this->Produtos_model->setVariantes_model($valueVar, $produtoID);

                foreach($valueVar["opcoes"] as $keyOp=>$valueOp) {

                        $retorno = $this->Produtos_model->setOpcoes_model($valueOp, $varianteID);

                }
        }


            if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }

    public function updateProduto (){


        $session = $this->session->userdata("fashon_session");
        if(isset($session)) {
            $data = array(
                "selected" => 4,
                "id" => $_GET['id'],
                "tipo" => $session["user_tipo"]
            );
            $this->load->view("gtx/inc/header", $data);
            $this->load->view("gtx/produto", $data);
            $this->load->view("gtx/inc/footer");
        }else{
            redirect(base_url());
        }
    }

    public function deleteCategorias($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }

        $this->load->model("Produtos_model");
        $retorno = $this->Produtos_model->deleteProduto_model($Data["id"]);

        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }

    public function getProduto($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }

        $this->load->model("Produtos_model");
        $retorno = $this->Produtos_model->getProduto_model($Data["id"]);

        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }

    public function getProdutosNames($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }

        $retorno = array();

        $this->load->model("Produtos_model");
        $prod = $this->Produtos_model->getProdutosNames_model();

        foreach($prod as $key=>$value) {
        array_push($retorno,$value->produto_id . " - " .$value->produto_nome);
        }

            if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }

    public function getVariantes($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }

        $id = strtok($Data["data"], ' - ');

        $this->load->model("Produtos_model");
        $retorno = $this->Produtos_model->getProduto_model($id);

        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }

    public function setUpdateProduto($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }


        $this->load->model("Produtos_model");
        $produto = $Data["data"];

        $this->Produtos_model->updateProduto($Data["id"], $produto);

        foreach($produto["produto_variantes"] as $keyVar=>$valueVar) {

            $varianteID = $this->Produtos_model->updateVariante($valueVar);

            foreach($valueVar["opcoes"] as $keyOp=>$valueOp) {

                $retorno = $this->Produtos_model->updateOpcao($valueOp);

            }
            if(isset($valueVar["opcoes_insert"] )){
                foreach($valueVar["opcoes_insert"] as $keyOpI=>$valueOpI) {

                $retorno = $this->Produtos_model->setOpcoes_model($valueOpI, $valueVar["variante_id"]);
                }
            }
        }

        foreach($produto["produto_variantes_insert"] as $keyVar=>$valueVar) {

            $varianteID = $this->Produtos_model->setVariantes_model($valueVar, $Data["id"]);

            foreach($valueVar["opcoes"] as $keyOp=>$valueOp) {

                $retorno = $this->Produtos_model->setOpcoes_model($valueOp, $varianteID);

            }
        }

        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }

    public function getCategorias($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }

        $this->load->model("Produtos_model");
        $retorno = $this->Produtos_model->getCategorias_model();


        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }
    public function setCategorias($Data = null){
        if ($Data == null) {
            $Output = true;
            $Data = $this->input->post();
        } else {
            $Output = false;
        }

        $this->load->model("Produtos_model");
        $retorno = $this->Produtos_model->setCategorias_model($Data);


        if ($Output == true) {
            echo json_encode($retorno);
        } else {
            return $retorno;
        }
    }
}
