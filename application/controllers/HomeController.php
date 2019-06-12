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
        $data = array(
            'nav_params' => array('toolbar' => 'Ford 32 - Horarios', 'nav_action' => 'nothing', 'nav_icon' => 'menu', 'nav_href' => ''),
        );

        $this -> load -> view('html/header', $data);
        $this -> load -> view('home');
        $this -> load -> view('html/footer');
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
            $object = $this -> user_model -> searchUserForPassword($user, $pass);

            //print_r($object);
            //print_r('<br>');
            //print_r($object[0]['nombre']);

            if (sizeof($object) > 0){
                $session_data = array(
                    'id_alumno' => $object[0]['id_alumno'],
                    'nombre' => $object[0]['nombre'],
                    'apellidos' => $object[0]['apellidos'],
                    'access' => true
                );
                $this -> session -> set_userdata($session_data);
                redirect('alumno');
            } else {
                $this->index();
            }
        }
    }


}