<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {


    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function setCliente_model($data){

        $this->load->library('Fo_login');


        $pass = Fo_login::encrypt_password(strtolower($data["cliente_nome"].$data["cliente_sobrenome"]));
        $this->db->set($data);
        $this->db->set("cliente_pass", $pass);
        return $this->db->insert("tb_cliente");


    }

    public function setUpdateCliente_model($data, $id){

        $this->db->where("id_cliente", $id);
        $this->db->set($data);
        return $this->db->update("tb_cliente");


    }

    public function getCliente_model($id = null){

        if($id !== null){
            $this->db->select("id_cliente,cliente_nome,cliente_sobrenome,cliente_telefone,cliente_email,cliente_doc,cliente_endereco,cliente_cidade,cliente_estado,cliente_cep, cliente_username");
            $this->db->where("id_cliente", $id);
        }
        return $this->db->get("tb_cliente")->result();
    }

  }
