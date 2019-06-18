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
        $this -> load -> library('form_validation');
        $this -> load -> helper('materializecss_helper');

        // Model
        $this -> load -> model('user_model');
    }

    /**
     * Index Method
     */
    public function index(){
        $this -> validateSession();

        // Consultas
        $consult_1 = $this -> user_model -> horasCumplidas($this -> session -> userdata('id_alumno'));
        $consult_2 = $this -> user_model -> mostrarRegistroHorasCumplidas($this -> session -> userdata('id_alumno'));

        $dataStudent = array(
            'horasCumplidas' => $consult_1[0]['HorasCumplidas'],
            'horasRestantes' => (480 - $consult_1[0]['HorasCumplidas']),
            'registroHorasCumplidas' => $consult_2
        );

        $this -> load -> view('alumno/index', $dataStudent);
    }

    /**
     * Insertar informacion
     */
    public function store(){
        $this -> validateSession();
        $this -> load -> view('alumno/create');
    }

    /**
     * Actualización
     * @param $params
     */
    public function update($params){

    }

    /**
     * Mostrar algunos registros
     * @param $params
     */
    public function show($params){

    }

    public function validateSession(){
        if (!$this -> session -> userdata('nombre')){
            redirect('home');
        }
    }

    /**
     * Cerrar sesion
     */
    public function closeSession(){
        $this -> session -> set_userdata('access', 'false');
        $this -> session -> sess_destroy();

        if ($this -> session -> userdata('access') === 'false'){
            redirect('home');
        }
    }

    /**
     * Guardar el registro de entrada
     */
    public function saveRegister(){
        // Validar el formulario
        $this -> form_validation -> set_rules('date', 'Date', 'required|callback_check_date_format');
        $this -> form_validation -> set_rules('time', 'Time', 'required|callback_check_time_format');

        if ($this -> form_validation -> run() === FALSE){
            $this -> store();
        } else {
            /**
             * $format_date = date('Y-m-d', strtotime($this -> input -> post('date')));
            $format_time = date("H:i:s", strtotime($this -> input -> post('time')));
            $data = array(
            'fk_alumno' => $this -> session -> userdata('id_alumno'),
            'al_entrada' => $format_date.' '.$format_time
            );

            if ($this -> user_model -> agregarRegistro($data) === 1){
            $this -> session -> set_tempdata('status_register', '1', 300);
            redirect('alumno');
            } else {
            $this -> session -> set_tempdata('status_register', '0', 300);
            }
             */
        }
    }

    /**
     * Validación de la hora actual
     * @param $string
     * @return bool
     */
    public function check_time_format($string){
        if (strpos($string, 'AM')){
            $this -> form_validation -> set_message('check_time_format', 'Ingrese PM en vez de AM a la hora');
            return false;
        } else {
            return true;
        }
    }

    /**
     * Validación de la fecha actual
     * @param $string
     * @return bool
     */
    public function check_date_format($string){
        if (date('Y-m-d') ===  $string){
            return true;
        } else {
            $this -> form_validation -> set_message('check_date_format', 'Ingrese la fecha actual');
            return false;
        }
    }
}