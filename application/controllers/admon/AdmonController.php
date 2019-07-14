<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdmonController extends CI_Controller {

    // Version Name
    private $versionName = 'v2';

    /**
     * AdmonController constructor.
     */
    public function __construct() {
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

        // Model
        $this -> load -> model('admon_model');
        $this -> load -> model('user_model');
    }

    /**
     * Index Method
     */
    public function index(){
        // Validacion de Session
        $this -> validateSession();

        // Consultas
        $consult_1 = $this -> admon_model -> mostrarInfoHorasAlumnos();

        $dataAdmon = array('infoHorasAlumnos' => $consult_1);

        $this -> load -> view($this->versionName.'/admon/index', $dataAdmon);
    }

    /**
     * @param $num
     */
    public function show($num){
        // Validacion de Session
        $this -> validateSession();

        $consult_1 = $this -> admon_model -> mostrarAlumnoFechasServicio($num);

        if ($consult_1[0]['id_alumno'] != NULL){
            $consult_2 = $this -> user_model -> horasCumplidas($num);
            $dataAdmon = array('alumnosFechasServicio' => $consult_1[0], 'horasCumplidas' => $consult_2[0]['HorasCumplidas'],
                'horasRestantes' => (480 - $consult_2[0]['HorasCumplidas']), 'nombreAlumno' => $consult_1[0]['nombre'].' '.$consult_1[0]['apellidos']);

            $this -> load -> view($this->versionName.'/admon/info_student', $dataAdmon);
        } else {
            $this -> session -> set_userdata('message', "No existe un usuario con la ID: $num");
            redirect($this->versionName.'/admon/index');
        }
    }

    /**
     * Validar session
     */
    public function validateSession(){
        if (!$this -> session -> userdata('nombre')){
            redirect($this->versionName.'/admon/login');
        }

        if ($this -> session -> userdata('access') != 'admon'){
            redirect($this->versionName.'/alumno');
        }
    }
}