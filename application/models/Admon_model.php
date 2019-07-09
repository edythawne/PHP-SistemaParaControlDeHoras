<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admon_model extends CI_Model
{

    /**
     * Admon_model constructor.
     */
    public function __construct() {
        parent::__construct();

        // Cargar Libreria
        $this->load->library('database_constants');
    }

    /**
     * Busca un admon según su usuario y contraseña
     * @param $user
     * @param $password
     * @return mixed
     */
    public function buscarAdmon($user, $password){

    }

}