<?php

    function css_url($filename){
        return base_url('public/css/'.$filename);
    }

    function js_url($filename){
        return base_url('public/js/'.$filename);
    }

    function img_url($filename) {
        return base_url('public/img/'.$filename);
    }

?>