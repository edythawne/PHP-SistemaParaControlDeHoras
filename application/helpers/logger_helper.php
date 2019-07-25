<?php

    /**
     * Mensaje en la consola
     * @param $data
     */
    function console_log($data){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

?>