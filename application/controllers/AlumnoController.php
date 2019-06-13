<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AlumnoController extends CI_Controller {

    /**
     * AlumnoController constructor.
     */
    public function __construct(){
        parent::__construct();

        // Cargar librerias
        $this -> load -> helper('url');
        $this -> load -> helper('materializecss_helper');

        // Model
        $this -> load -> model('user_model');
    }

    /**
     * Index Method
     */
    public function index(){
        // Validacion de sessiones
        if (!$this -> session -> userdata('nombre')){
            redirect('home');
        }

        // Mostrar algunos datos
        $data = array('nav_params' => array('toolbar' => 'Registro', 'nav_action' => 'nothing', 'nav_icon' => 'menu', 'nav_href' => ''));

        // Consultas
        $consult_1 = $this -> user_model -> horasCumplidas($this -> session -> userdata('id_alumno'));
        $consult_2 = $this -> user_model -> mostrarRegistroHorasCumplidas($this -> session -> userdata('id_alumno'));

        $dataStudent = array(
            'horasCumplidas' => $consult_1[0]['HorasCumplidas'],
            'horasRestantes' => (480 - $consult_1[0]['HorasCumplidas']),
            'registroHorasCumplidas' => $consult_2
        );

        $this -> load -> view('html/header', $data);
        $this -> load -> view('alumnos/alumno', $dataStudent);
        $this -> load -> view('html/footer');
    }
}