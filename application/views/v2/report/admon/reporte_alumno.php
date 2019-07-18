<!DOCTYPE html>
<html>
<head>
    <title>Reporte F1</title>
</head>
<style>
    * {
        margin: 0;
        box-sizing: border-box;
    }

    html {
        padding-top: 10px;
        background: #e6e6e6;
        text-align: center;
    }

    body {
        width: 730px;
        font-family: 'Droid', 'Helvetica';
        font-size: 14px;
        padding: 30px 40px;
        text-align: left;
        margin: 0 auto;
        background-color: #FFF;
    }

    .page_break {
        page-break-before: always;
    }

    h2 {
        margin-top: 8px;
        margin-bottom: 15px;
    }

    table {
        border-collapse: collapse;
        margin: 8px 0;
    }

    table th, td {
        padding: 8px 14px 8px 14px;
        border: 1px solid #333;
    }

    .text-center {
        text-align: center;
    }

    img {
        max-width: 100%;
    }
</style>
<body>

<div class="wrapper">
    <table style="table-layout: fixed; width: 100%;">
        <thead>
            <tr align="center" style="border: 0px">
                <th>
                    <img src="<?php echo $_SERVER['DOCUMENT_ROOT'].'/servicio/public/utils/img/gob.jpg';?>" width="150px" height="80px">
                </th>
                <th>
                    <img src="<?php echo $_SERVER['DOCUMENT_ROOT'].'/servicio/public/utils/img/sev.jpg';?>" width="150px" height="80px">
                </th>
                <th>
                    <img src="<?php echo $_SERVER['DOCUMENT_ROOT'].'/servicio/public/utils/img/ver.jpg';?>" width="150px" height="80px">
                </th>
                <th>
                    <img src="<?php echo $_SERVER['DOCUMENT_ROOT'].'/servicio/public/utils/img/ford.jpeg';?>" width="80px" height="80px">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr align="center">
                <th colspan="4">
                    ESCUELA PRIMARIA FORD 32
                </th>
            </tr>
            <tr align="center">
                <th colspan="4">
                    REPORTE SOBRE HORAS DE SERVICIO
                </th>
            </tr>
        </tbody>
    </table>

    <br>

    <table style="width: 100%;">
        <thead>
            <tr bgcolor="#c3c3c3">
                <th colspan="4">Información del Alumno</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><b>Nombre</b></td>
                <td><?php echo $alumnosFechasServicio['nom'].' '.$alumnosFechasServicio['ape']; ?></td>
                <td><b>Tipo de Servicio</b></td>
                <td><?php echo $alumnosFechasServicio['ti_s'] ?></td>
            </tr>
            <tr>
                <td><b>Periodo</b></td>
                <td><?php echo $alumnosFechasServicio['per'] ?></td>
                <td><b>Horas Acumuladas</b></td>
                <td>
                    <?php echo substr($alumnosFechasServicio['hr_c'], 0, strpos($alumnosFechasServicio['hr_c'],':')).' de '.$alumnosFechasServicio['dur']; ?>
                </td>
            </tr>
        </tbody>
    </table>

    <br>
    <?php $array_fechas = json_decode($alumnosFechasServicio['fec'], true); ?>
    <?php krsort($array_fechas); ?>
    <?php $count = 0; ?>

    <table style="width: 100%;">
        <thead>
            <tr bgcolor="#c3c3c3">
                <th colspan="5">Lista de Asistencia</th>
            </tr>
            <tr align="center" bgcolor="#c3c3c3">
                <th>#</th>
                <th>Fecha</th>
                <th>Entrada</th>
                <th>Salida</th>
                <th>Tiempo</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($array_fechas as $af): ?>
            <tr align="center">
                <td><?php $count +=1; echo $count; ?></td>
                <td><?php echo $af['fecha_asistencia']; ?></td>
                <td><?php echo $af['hora_entrada']; ?></td>
                <td><?php echo $af['hora_salida']; ?></td>
                <td><?php echo $af['horas_acumuladas']; ?></td>
            </tr>
        <?php endforeach; ?>
        <tr align="center">
            <td colspan="3"></td>
            <td><b>Horas Preliminares</b></td>
            <td><?php echo $alumnosFechasServicio['hr_c']; ?></td>
        </tr>
        </tbody>
    </table>

</body>
</html>
