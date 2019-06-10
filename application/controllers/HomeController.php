<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    public function index(){
        $this -> load -> helper('url');
        $this -> load -> helper('materializecss_helper');

        $data = array(
            'nav_params' => array('toolbar' => 'Ford 32 - Horarios', 'nav_action' => 'nothing', 'nav_icon' => 'menu', 'nav_href' => ''),
        );

        $this -> load -> view('html/header', $data);
        $this -> load -> view('home');
        $this -> load -> view('html/footer');
    }

}