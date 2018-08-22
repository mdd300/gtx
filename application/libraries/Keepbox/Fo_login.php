<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fo_login
{

    /**O nome padrão da sessão
     * @var string
     */
    public static $session_name = "fashon_session";

    /**
     * Nome da sessão para o nível de acesso de usuário
     * @var type
     */
    public static $access_user = "access_user";

    /**
     * Nome da sessão para o nível de acesso de manager
     * @var type
     */
    public static $access_manager = "access_manager";

    /**
     * O tipo padrão de acesso, quando não passado
     * @var type
     */

    public static $default_access_type = "access_user";
//    public static $default_access_type = "access_manager";
    public static $default_login_uri = "login/index";

    public function __construct()
    {
        $CI = &get_instance();
    }

    /**
     * Método para criptografar uma senha no formato que utilizamos
     * @param null $password
     * @return bool|mixed|string
     */
    public static function encrypt_password($password = null)
    {
        if (!empty($password)) {
            return password_hash($password, PASSWORD_BCRYPT);
        } else {
            return false;
        }
    }

    /**Método para verificar se uma senha fornecida está de acordo com um hash do banco
     * @param $password
     * @param $user_hash
     * @return bool
     */
    public static function check_password($password, $user_hash)
    {

        return password_verify($password, $user_hash);

    }

    /**
     *
     * @param array $Data ['user_login']: o login do usuário
     * @param array $Data ['user_pass']
     */
    public static function do_login(array $Data)
    {

        $CI = &get_instance();

        $CI->load->library(['Keepbox/Fo_users']);

        $Result = [ // Retorno padrão
            'success' => false,
            'type' => 'error',
            'text' => "Usuário ou senha incorretos"
        ];

        $user_login = $Data['user_login'] ?? false; // Índice com o login do usuário, que pode ser o username ou e-mail
        $user_pass = $Data['user_senha'] ?? false; // Senha do usuário

        if ($user_login and $user_pass) {

            $checkedUser = Fo_users::check_exists($user_login);

            if ($checkedUser) { // Se existe o usuário com o login especificado

                $CI->db->select('*');
                $CI->db->from('tb_user');
                $CI->db->where('user_id', $checkedUser->user_id);

                $userdata = $CI->db->get()->result()[0]; // Buscando novametne o usuário, porém agora trazendo todos os dados


//                if ($userdata->user_status == ENABLED) { // Se o usuário está ativo


                        if (self::check_password($user_pass, $userdata->user_senha)) {

                            $Result['success'] = true;
                            $Result['type'] = 'success';
                            $Result['text'] = "Login efetuado com sucesso!";
                            $Result['user'] = $checkedUser->user_nome . $checkedUser->user_sobrenome;
                            $Result['id'] = $checkedUser->user_id;

                            $CI->session->set_userdata(self::$session_name, [
                                'user_id' => $checkedUser->user_id,
                                'user_tipo' =>$checkedUser->user_tipo,
                            ]);

                        } else {
                            $Result['text'] = "Usuário ou senha incorretos!";
                        }

//                } else { // Se não está ativo
//                    $Result['success'] = false;
//                    $Result['type'] = 'error';
//                    $Result['text'] = "Usuário bloqueado, por favor entre em contato!";
//                }

            } else { // Se não existe
                $Result['success'] = false;
                $Result['type'] = 'error';
                $Result['text'] = "E-mail ou usuário não cadastrado!";
            }

        } else { // Se não tem os índices necessários
            $Result['success'] = false;
            $Result['type'] = 'error';
            $Result['text'] = "Por favor, confira o login e senha!";
        }

        return $Result;

    }

    /**Método para obter os dados da sessão do usuário
     * @return mixed
     */
    public static function get()
    {

        $CI = &get_instance();

        if (self::check(['redirect' => false])) {
            return $CI->session->userdata(self::$session_name);
        } else {
            return false;
        }
    }

    /**
     * Este método verifica se o usuário está logado
     * @param array $Data ['access_type']: o tipo de acesso solicitado
     * @return boolean
     */
    public static function check($Data = [])
    {

        $CI = &get_instance();

        $redirect = $Data['redirect'] ?? true; // Se é para redirecionar caso não exista o acesso

        $Uri = $CI->uri->uri_string();

        $access = $CI->session->userdata(self::$session_name); // A sessão, caso exista

        $Uri_allowed_without_login = in_array($Uri, $CI->config->item('without_login')); // Verificando se a página solicitada está no array de permitidas sem login

        if (empty($access)) {
            if (!$Uri_allowed_without_login) {
                if ($redirect) {
                    redirect(base_url(self::$default_login_uri));
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    /**
     * Método para finalizar a sessão e voltar para a tela de login
     */
    public static function logout()
    {

        $CI = &get_instance();
        $CI->session->unset_userdata(self::$session_name);

        redirect(base_url());

    }
    public static function do_login2(array $Data)
    {

        $CI = &get_instance();

        $CI->load->library(['Keepbox/Fo_users']);

        $Result = [ // Retorno padrão
            'success' => false,
            'type' => 'error',
            'text' => "Usuário ou senha incorretos"
        ];

        $user_login = $Data['cliente_username'] ?? false; // Índice com o login do usuário, que pode ser o username ou e-mail
        $user_pass = $Data['cliente_pass'] ?? false; // Senha do usuário

        if ($user_login and $user_pass) {

            $checkedUser = Fo_users::check_exists2($user_login);


            if ($checkedUser) { // Se existe o usuário com o login especificado

                $CI->db->select('*');
                $CI->db->from('tb_cliente');
                $CI->db->where('id_cliente', $checkedUser->id_cliente);

                $userdata = $CI->db->get()->result()[0]; // Buscando novametne o usuário, porém agora trazendo todos os dados


//                if ($userdata->user_status == ENABLED) { // Se o usuário está ativo


                if (self::check_password($user_pass, $userdata->cliente_pass)) {

                    $Result['success'] = true;
                    $Result['type'] = 'success';
                    $Result['text'] = "Login efetuado com sucesso!";
                    $Result['user'] = $checkedUser->cliente_nome . $checkedUser->cliente_sobrenome;
                    $Result['id'] = $checkedUser->id_cliente;

                    $CI->session->set_userdata(self::$session_name, [
                        'cliente_id' => $checkedUser->id_cliente
                    ]);

                } else {
                    $Result['text'] = "Usuário ou senha incorretos!";
                }

//                } else { // Se não está ativo
//                    $Result['success'] = false;
//                    $Result['type'] = 'error';
//                    $Result['text'] = "Usuário bloqueado, por favor entre em contato!";
//                }

            } else { // Se não existe
                $Result['success'] = false;
                $Result['type'] = 'error';
                $Result['text'] = "E-mail ou usuário não cadastrado!";
            }

        } else { // Se não tem os índices necessários
            $Result['success'] = false;
            $Result['type'] = 'error';
            $Result['text'] = "Por favor, confira o login e senha!";
        }

        return $Result;

    }

}
