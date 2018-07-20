<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fo_users
{

    public static $userdata = false;

    public function __construct()
    {

//        if (Fo_login::check(['redirect' => false])) {
//            if (self::$userdata === false) {
//                $CI = & get_instance();
//                $user_id = Fo_login::get()['user_id'];
//                $CI->db->from('tb_user');
//                $CI->db->where('user_id', $user_id);
//                $user_id = $CI->db->get()->result();
//                self::$userdata = $user_id[0];
//            }
//        }

    }

    /**Função para verificar se existe um usuário com o login específico, seja e-mail ou o username
     * @param $user_login
     * @return bool
     */

    public static function check_exists($user_login)
    {

        $CI = &get_instance();

        $CI->db->from('tb_user');
        $CI->db->where('user_login', $user_login);
        $CI->db->or_where('user_email', $user_login);
        $User = $CI->db->get()->result();

        return (empty($User) ? false : $User[0]); // Se não existir, retorna false, se existir, retorna o registro do banco

    }
    public static function check_exists2($user_login)
    {

        $CI = &get_instance();

        $CI->db->from('tb_cliente');
        $CI->db->where('cliente_username', $user_login);
        $CI->db->or_where('cliente_email', $user_login);
        $User = $CI->db->get()->result();

        return (empty($User) ? false : $User[0]); // Se não existir, retorna false, se existir, retorna o registro do banco

    }

}
