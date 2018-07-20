<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {

    public function getPedidos_model($data){

        $this->db->where($data);
        return $this->db->get("tb_pedido");

    }

}