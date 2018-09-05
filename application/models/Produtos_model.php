<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_model extends CI_Model {


    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function getProdutosModel(){
        return $this->db->get("tb_produtos");
    }

    public function setProdutos_model($data){

        $produto = array(
            "produto_nome"=> $data["produto_nome"],
            "produto_preco"=> $data["produto_preco"],
            "produto_data"=> date('d/m/Y h:m:s'),
            "produto_comentario"=> $data["produto_comentario"],
            "produto_tipo"=> $data["produto_tipo"],
        );

        $this->db->insert("tb_produtos", $produto);

        return $this->db->insert_id();

    }

    public function setVariantes_model($data, $id){

        $this->db->insert("tb_produto_variantes", array("variante_nome"=>$data["variante_nome"], "produto_id"=> $id));

        return $this->db->insert_id();

    }
    public function setOpcoes_model($data, $id){

        $this->db->insert("tb_variante_opcoes", array("opcao_nome"=>$data["opcao_nome"],"opcao_preco"=>$data["opcao_preco"], "variante_id"=> $id));

        return $this->db->insert_id();

    }

    public function getProduto_model($id){

        $this->db->where("prod.produto_id",$id);

        $prod = $this->db->get("tb_produtos as prod")->result()[0];

        $this->db->where("produto_id",$id);
        $retorno = array(
            "produto_nome" =>$prod->produto_nome,
            "produto_preco" =>$prod->produto_preco,
            "produto_comentario" =>$prod->produto_comentario,
            "produto_tipo" =>$prod->produto_tipo,
            "produto_variantes" => $this->db->get("tb_produto_variantes")->result()
        );

        foreach($retorno["produto_variantes"] as $key=>$value) {
            $this->db->where("variante_id",$value->variante_id);
            $value->opcoes = $this->db->get("tb_variante_opcoes")->result();
        }

        return $retorno;
    }

    public function getProdutosNames_model()
    {
        $this->db->select("produto_id, produto_nome");
        return $this->db->get("tb_produtos")->result();
    }

    public function getVariantesProd_model($id){

        $this->db->where("produto_id",$id);
        $variantes = $this->db->get("tb_produto_variantes")->result();

        foreach($variantes as $key=>$value) {
            $this->db->where("variante_id", $value->variante_id);
            $opcoes = $this->db->get("tb_variante_opcoes");
            $value->value = "";
            if($opcoes->num_rows() > 0){
                $value->opcoes = $opcoes->result();
            }
        }

        return $variantes;
    }

    public function updateProduto($id, $data){
        $this->db->where("produto_id", $id);
        $this->db->set("produto_nome", $data["produto_nome"]);
        $this->db->set("produto_preco", $data["produto_preco"]);
        return $this->db->update("tb_produtos");

    }
    public function updateVariante( $data){
        $this->db->where("variante_id", $data["variante_id"]);
        $this->db->set("variante_nome", $data["variante_nome"]);
        return $this->db->update("tb_produto_variantes");

    }
    public function updateOpcao( $data){
        $this->db->where("opcao_id", $data["opcao_id"]);
        $this->db->set("opcao_nome", $data["opcao_nome"]);
        return $this->db->update("tb_variante_opcoes");

    }

    public function getCategorias_model(){

       return $this->db->get("tb_categorias")->result();

    }
    public function setCategorias_model($Data){

        return $this->db->insert("tb_categorias",$Data);

    }

    public function deleteProduto_model($id){
        return $this->db->delete("tb_categorias",$id);
    }

}