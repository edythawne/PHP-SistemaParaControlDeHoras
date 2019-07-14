<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    // Version Name
    private $versionName = 'v1';

    /**
     * LoginController constructor.
     */
    public function __construct(){
        parent::__construct();

        // Cargar Version
        $this -> versionName = $this -> config -> item('versionName');

        // Cargar librerías
        $this -> load -> helper('url');
        $this -> load -> helper('form');
        $this -> load -> library('form_validation');

        if ($this -> versionName == 'v1'){
            $this -> load -> helper('materializecss_helper');
        } else {
            $this -> load -> helper('metro_helper');
        }
    }


    /**
     * Index Method
     */
    public function index(){
        if ($this -> session -> userdata('nombre')){
            redirect($this->versionName.'/alumno');
        }

        $this -> load -> view($this->versionName.'/admon/login');
    }

    /**
     * Metodo para iniciar session
     */
    public function login(){
        // Validar campos del formulario
        $this -> form_validation -> set_rules('user', 'User', 'required');
        $this -> form_validation -> set_rules('password', 'Password', 'required');

        if ($this -> form_validation -> run() == FALSE){
            $this -> index();
        } else {
            $this -> load -> model('admon_model');
            $user = sha1($this -> input -> post('user'));
            $pass = sha1($this -> input -> post('password'));
            $object = $this -> admon_model -> buscarAdmon($user, $pass);

            if (sizeof($object) > 0){
                $session_data = array(
                    'id_admin' => $object[0]['id_admin'],
                    'nombre' => $object[0]['nombre'],
                    'apellidos' => $object[0]['apellidos'],
                    'access' => 'admon',
                    'allow' => 'true'
                );
                $this -> session -> set_userdata($session_data);
                redirect($this->versionName.'/admon/index');
            } else {
                $this->index();
            }
        }
    }
}

?>