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
    }

    /**
     * Index Method
     */
    public function index(){
        $data = array(
            'nav_params' => array('toolbar' => 'Registro', 'nav_action' => 'nothing', 'nav_icon' => 'menu', 'nav_href' => ''),
        );

        print_r($this->session->userdata);

        $this -> load -> view('html/header', $data);
        $this -> load -> view('alumnos/alumno');
        $this -> load -> view('html/footer');
    }
}