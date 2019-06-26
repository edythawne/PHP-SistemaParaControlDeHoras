<?php

    /**
     * Obtener la URL de los CSS
     * @param $filename
     * @return string
     */
    function css_url($filename){
        return base_url('public/v2/css/'.$filename);
    }

    /**
     * Obtener la URL de los JS
     * @param $filename
     * @return string
     */
    function js_url($filename){
        return base_url('public/v2/js/'.$filename);
    }

    /**
     * Obtener la URL de los SRC
     * @param $filename
     * @return string
     */
    function img_url($filename) {
        return base_url('public/utils/img/'.$filename);
    }

?>