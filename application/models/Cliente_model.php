<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {

    public function getPedidos_model($data){

        $this->db->where($data);
        $dados =$this->db->get("tb_pedido")->result();

        foreach($dados as $keyP=>$valueP) {

            $this->db->where("pedido_id", $valueP->pedido_id);
            $valueP->produtos =$this->db->get("tb_pedido_produto")->result();

        foreach($valueP->produtos as $key=>$value) {

            $this->db->where("produto_id",$value->produto_id);
            $value->variantes_produto = $this->db->get("tb_pedido_produto_variantes")->result();

            $this->db->where("produto_id",$value->produto_id);
            $value->camisas = $this->db->get("tb_camisas")->result();

            $this->db->where("produto_id",$value->produto_id);
            $value->imgs = $this->db->get("tb_pedido_imgs")->result();
            }
        }

        return $dados;


    }

}