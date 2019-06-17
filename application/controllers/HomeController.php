<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    /**
     * HomeController constructor.
     */
    public function __construct(){
        parent::__construct();

        // Cargar librerías
        $this -> load -> helper('url');
        $this -> load -> helper('form');
        $this -> load -> library('form_validation');
        $this -> load -> helper('materializecss_helper');
    }

    /**
     * Index Method
     */
    public function index(){
        if ($this -> session -> userdata('nombre')){
            redirect('alumno');
        }

        $this -> load -> view('home');
    }

    /**
     * Metodo para iniciar session
     */
    public function login(){
        // Validar campos del formulario
        $this -> form_validation -> set_rules('user', 'User', 'required');
        $this -> form_validation -> set_rules('password', 'Password', 'required');

        if ($this -> form_validation -> run() === FALSE){
            $this -> index();
        } else {
            $this -> load -> model('user_model');
            $user = $this -> input -> post('user');
            $pass = $this -> input -> post('password');
            $object = $this -> user_model -> buscarAlumno($user, $pass);

            if (sizeof($object) > 0){
                $session_data = array(
                    'id_alumno' => $object[0]['id_alumno'],
                    'nombre' => $object[0]['nombre'],
                    'apellidos' => $object[0]['apellidos'],
                    'access' => 'true'
                );
                $this -> session -> set_userdata($session_data);
                redirect('alumno');
            } else {
                $this->index();
            }
        }
    }


}