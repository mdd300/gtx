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
            $this->db->where("id_cliente", $id);
        }
        return $this->db->get("tb_cliente")->result();
    }

    public function setPDF_Model($id, $nome){
        $this->db->set('pedido_id', $id);
        $this->db->set("pdf_nome", $nome);
        return $this->db->insert("tb_pdf");
    }

    public function getUsers_model($data){

        if(isset($data['where'])){
            $this->db->select("user_nome,user_sobrenome,user_email,user_login,user_tipo");
            $this->db->where("user_id",$data['where']);
        }

        return $this->db->get("tb_user")->result();

    }

    public function setUsers_model($data){

        $user = array(
            "user_nome" => $data['user_nome'],
            "user_sobrenome" => $data['user_sobrenome'],
            "user_email" => $data['user_email'],
            "user_login" => $data['user_login'],
            "user_senha" => Fo_login::encrypt_password($data['user_senha']),
            "user_tipo" => $data['user_tipo'],
        );

        return $this->db->insert("tb_user", $user);

    }
    public function updateUsers_model($data, $id){

        $user = array(
            "user_nome" => $data['user_nome'],
            "user_sobrenome" => $data['user_sobrenome'],
            "user_email" => $data['user_email'],
            "user_login" => $data['user_login'],
            "user_senha" => Fo_login::encrypt_password($data['user_senha']),
            "user_tipo" => $data['user_tipo'],
        );
        $this->db->where("user_id", $id);
        return $this->db->update("tb_user", $user);

    }

  }
