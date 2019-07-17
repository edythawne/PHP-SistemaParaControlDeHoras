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
        $this -> load -> helper('url');
        $this -> load -> helper('crypto_helper');
        $this -> load -> helper('materializecss_helper');

        // Model
        $this -> load -> model('admon_model');
        $this -> load -> model('user_model');
    }

    /**
     * Crear reporte principal de alumnos.
     */
    public function index(){

    }

    public function test(){
        //$this->load->view($this->versionName.'/report/admon/reporte_alumno', array('x' => ''));

        $this->load->library('pdf');
        $html_content =  $this->load->view($this->versionName.'/report/admon/reporte_alumno', array('x' => ''), true);
        $this->pdf->loadHtml($html_content);
        $this->pdf->render();
        $this->pdf->stream("test.pdf", array("Attachment"=>0));
    }


    public function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

}

?>