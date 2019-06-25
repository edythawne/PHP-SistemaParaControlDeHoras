<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title><?php echo $toolbar ?></title>

    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="<?php echo css_url('material-icons.css');?>">

    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo css_url('bootstrap-material-design.css'); ?>">
    <link rel="stylesheet" href="<?php echo css_url('navbar-top-fixed.css'); ?>">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo js_url('jquery-3.2.1.slim.min.js')?>"></script>
    <script src="<?php echo js_url('popper.js')?>"></script>
    <script src="<?php echo js_url('bootstrap-material-design.js')?>"></script>
    <script>
        $(document).ready(function() {
            $('body').bootstrapMaterialDesign();
        });
    </script>
</head>
<body>