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
        $this -> load -> library('database_constants');
    }

    /**
     * Busca un admon según su usuario y contraseña
     * @param $user
     * @param $password
     * @return mixed
     */
    public function buscarAdmon($user, $password){
        $this -> load -> database();

        $this -> db -> select($this -> database_constants :: usuario_datos_1);
        $this -> db -> where($this -> database_constants :: usuario_usuario, $user);
        $this -> db -> where($this -> database_constants :: usuario_contrasena, $password);
        $query = $this -> db -> get($this -> database_constants :: tabla_admon);
        $result =  $query -> result_array();
        $this -> db -> close();

        return $result;
    }

}