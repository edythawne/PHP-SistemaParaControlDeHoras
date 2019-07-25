<?php

    /**
     * Clave de Crypto
     * @return string
     */
    function getKey(){
        return 'f3r$ha';
    }

    /**
     * Clave v
     * @return string
     */
    function getKeyIv(){
        return 'f3r$hav';
    }

    /**
     * Metodo de incriptación
     * @return string
     */
    function getMethod(){
        return "AES-256-CBC";
    }

    /**
     * encrypt_decrypt
     * @param $action
     * @param $string
     * @return bool|string
     */
    function encrypt($string) {
        $output = false;
        // hash
        $key = hash('sha256', getKey());

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', getKeyIv()), 0, 16);

        $output = openssl_encrypt($string, getMethod(), $key, 0, $iv);
        $output = base64_encode($output);

        return $output;
    }

    /**
     * encrypt_decrypt
     * @param $action
     * @param $string
     * @return bool|string
     */
    function decrypt($string) {
        $output = false;
        // hash
        $key = hash('sha256', getKey());

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', getKeyIv()), 0, 16);

        $output = openssl_decrypt(base64_decode($string), getMethod(), $key, 0, $iv);

        return $output;
    }

?>