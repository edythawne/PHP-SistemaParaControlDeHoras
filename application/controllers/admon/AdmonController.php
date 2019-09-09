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
        $this -> load -> library('form_validation');
        $this -> load -> helper(array('url', 'form', 'crypto_helper', 'metro_helper'));

        // Model
        $this -> load -> model('user_model');
        $this -> load -> model('admon_model');
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
     * Permite mostrar la vista para crear ina
     */
    public function storeStudent(){
        // Validacion de Session
        $this -> validateSession();

        $this -> load -> view($this->versionName.'/admon/student_create', null);
    }

    /**
     * Metodo para guardar el alumno
     */
    public function saveStudent() {
        // Validar el formulario
        $this -> form_validation -> set_rules('nom', 'Nombre', 'required');
        $this -> form_validation -> set_rules('ape', 'Apellido', 'required');
        $this -> form_validation -> set_rules('tel', 'Telefono', 'required');
        $this -> form_validation -> set_rules('esp', 'Especialidad', 'required');
        $this -> form_validation -> set_rules('tse', 'Tipo de Servicio', 'required');
        $this -> form_validation -> set_rules('per', 'Periodo', 'required');
        $this -> form_validation -> set_rules('dur', 'Duración', 'required');

        if ($this -> form_validation -> run() == FALSE) {
            $this -> storeStudent();
        } else {
            $data = array(
                'nombre' => $this -> input -> post('nom'), 'apellidos' => $this -> input -> post('ape'),
                'telefono' => encrypt($this -> input -> post('tel')), 'especialidad' => $this -> input -> post('esp'),
                'tipo_servicio' => $this -> input -> post('tse'), 'periodo' => $this -> input -> post('per'),
                'duracion' => $this -> input -> post('dur'), 'usuario' => sha1($this -> input -> post('tel')),
                'contrasena' => sha1($this -> input -> post('tel'))
            );

            if ($this -> user_model -> crearAlumno($data) == 1){
                $this -> session -> set_userdata('message', '¡Alumno registrado!');
				redirect($this->versionName.'/admon/index');
            } else {
                $this -> session -> set_userdata('message', '¡Error al registrar alumno!');
            }
        }
    }

    public function storeAdmon(){

    }

    /**
     * @param $num
     */
    public function show($num){
        // Validacion de Session
        $this -> validateSession();

        $consult_1 = $this -> admon_model -> mostrarTodaInformacionAlumno($num);

        if ($consult_1[0]['id_a'] != NULL){
            $dataAdmon = array('alumnoServicio' => $consult_1[0]);
            $this -> load -> view($this->versionName.'/admon/student_info', $dataAdmon);
        } else {
            $this -> session -> set_userdata('message', "No existe un usuario con la ID: $num");
            redirect($this->versionName.'/admon');
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


?>
