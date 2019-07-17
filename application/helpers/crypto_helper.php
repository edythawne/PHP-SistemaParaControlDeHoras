<?php

    /**
     * Clave de Encriptación & Desencriptacion
     * @return string
     */
    function getKey(){
        return 'f3r$ha';
    }

    /**
     * Encrypt
     * @param $text
     * @return string
     */
    function encrypt($text){
        $data = @mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(getKey()), $text, MCRYPT_MODE_CBC, md5(md5(getKey())));
        $encrypted = base64_encode($data);
        return $encrypted;
    }

    /**
     * Decrypt
     * @param $text
     * @return string
     */
    function decrypt($text){
        $data = @mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(getKey()), base64_decode($text), MCRYPT_MODE_CBC, md5(md5(getKey())));
        $decrypted = rtrim($data, "\0");
        return $decrypted;
    }

?>