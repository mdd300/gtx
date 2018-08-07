<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido_model extends CI_Model {


    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function setPedido($cliente, $pedido){

        $data = array(
            "cliente_id"=> $cliente,
            "pedido_data" => date('d/m/Y h:m:s'),
            "pedido_status" => AGUARDANDO,
            "pedido_frete" => $pedido["pedido_frete"],
            "pedido_desconto" => $pedido["pedido_desconto"]
        );

        $this->db->insert("tb_pedido",$data);

        return $this->db->insert_id();

    }

    public function setProduto($produto,$pedido){

        $data = array(
            "produto_nome"=> $produto["produto_nome"],
            "produto_preco" => $produto["produto_preco"],
            "produto_comentario" => $produto["produto_comentario"],
            "pedido_id" => $pedido

        );

        $this->db->insert("tb_pedido_produto",$data);

        return $this->db->insert_id();

    }
    public function setCamisas($camisa,$produto){

        $data = array(
            "camisa_nome"=> $camisa["camisa_nome"],
            "camisa_tamanho" => $camisa["camisa_tamanho"],
            "camisa_short" => $camisa["camisa_short"],
            "camisa_numero" => $camisa["camisa_numero"],
            "camisa_comentario" => $camisa["camisa_comentario"],
            "produto_id" => $produto

        );

        return $this->db->insert("tb_camisas",$data);

    }

    public function setImgs($imgs,$produto){

        $data = array(
            "src"=> $imgs,
            "produto_id" => $produto

        );

        return $this->db->insert("tb_pedido_imgs",$data);

    }

    public function getPedidos(){

        $this->db->join("tb_cliente as cli", "cli.id_cliente = cliente_id");
        return $this->db->get("tb_pedido");

    }

    public function getPedido($id){

        $this->db->where("pedido_id",$id);
        $this->db->join("tb_cliente as cli", "cli.id_cliente = cliente_id");
        $dados =$this->db->get("tb_pedido")->result()[0];

        $this->db->where("pedido_id",$id);
        $dados->produtos =$this->db->get("tb_pedido_produto")->result();

        foreach($dados->produtos as $key=>$value) {

            $this->db->where("produto_id",$value->produto_id);
            $value->variantes_produto = $this->db->get("tb_pedido_produto_variantes")->result();

            $this->db->where("produto_id",$value->produto_id);
            $value->camisas = $this->db->get("tb_camisas")->result();

            $this->db->where("produto_id",$value->produto_id);
            $value->imgs = $this->db->get("tb_pedido_imgs")->result();
        }

        return $dados;
    }

    public function deleteImgs($data){

        foreach($data as $key=>$value) {
            $this->db->delete("tb_pedido_imgs",$value);
        }
        return true;
    }
    public function deleteCamisas($data){

        foreach($data as $key=>$value) {
            $this->db->delete("tb_camisas",$value);
        }
        return true;
    }

    public function updatePedido($pedido){
        $this->db->where("pedido_id",$pedido["pedido_id"]);
        $this->db->set("pedido_status", $pedido["pedido_status"]);
        $this->db->set("pedido_frete", $pedido["pedido_frete"]);
        $this->db->set("pedido_desconto", $pedido["pedido_desconto"]);
        $this->db->update("tb_pedido");
    }

    public function updateProduto($prod){
        $this->db->where("produto_id",(int)$prod["produto_id"]);
        $data = array(
            "produto_nome"=> $prod["produto_nome"],
            "produto_preco" => $prod["produto_preco"],
            "produto_comentario" => $prod["produto_comentario"],

        );
        $this->db->update("tb_pedido_produto",$data);
    }
    public function updateCamisas($camisa){
        $this->db->where("camisa_id",(int)$camisa["camisa_id"]);
        $data = array(
            "camisa_nome"=> $camisa["camisa_nome"],
            "camisa_tamanho" => $camisa["camisa_tamanho"],
            "camisa_short" => $camisa["camisa_short"],
            "camisa_numero" => $camisa["camisa_numero"],
            "camisa_comentario" => $camisa["camisa_comentario"],

        );
        $this->db->update("tb_camisas",$data);
    }

    public function setVariantes($variantes,$prodId){

        $data = array(
            "produto_id"=> $prodId,
            "variante_index"=>$variantes["variante_nome"],
            "variante_value"=>$variantes["value"]
        );

        return $this->db->insert("tb_pedido_produto_variantes", $data);
    }
}
