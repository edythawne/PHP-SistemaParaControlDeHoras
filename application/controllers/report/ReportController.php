<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReportController extends CI_Controller {

    // Version Name
    private $versionName = 'v2';

    /**
     * ReportController constructor.
     */
    public function __construct() {
        parent::__construct();

        // Cargar Version
        $this -> versionName = $this -> config -> item('versionName');

        // Cargar librerías
        $this -> load -> library('pdf');
        $this -> load -> helper('url');
        $this -> load -> helper('crypto_helper');
        $this -> load -> helper('materializecss_helper');

        // Model
        $this -> load -> model('admon_model');
    }

    /**
     * Crear reporte principal de alumnos.
     */
    public function index(){

    }

    /**
     * Crear reporte con las horas del alumno
     * @param $num
     */
    public function genRepStuListDate($num){
        $this -> validateSession();

        $consult_1 = $this -> admon_model -> mostrarTodaInformacionAlumno($num);

        if ($consult_1[0]['id_a'] != NULL){
            $dataAdmon = array('alumnosFechasServicio' => $consult_1[0]);

            $name = $consult_1[0]['nom'].' '.$consult_1[0]['ape'];
            $html_content =  $this->load->view($this->versionName.'/report/admon/reporte_alumno', $dataAdmon, true);
            $this->pdf->loadHtml($html_content);
            $this->pdf->render();
            $this->pdf->stream('Reporte F1 '.$name.'.pdf', array("Attachment"=>0));
        } else {
            $this -> session -> set_userdata('message', "No existe un usuario con la ID: $num");
            redirect($this->versionName.'/admon/index');
        }
    }


    public function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
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