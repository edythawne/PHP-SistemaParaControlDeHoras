<?php
    $this -> load -> view('v2/init/header', array('toolbar' => 'Registros'));

    // Datos
    $alumno = $_SESSION['nombre'].' '.$_SESSION['apellidos'];

?>

<body>
    <?php
        $this -> load -> view('v2/admon/nav_slide',  array('uri' => 'info_student'));
        $this -> load -> view('v2/admon/nav_bar', array('nav_params' => array('toolbar' => 'Admon')));
    ?>

    <main>
        <div class="">
            <div class="p-2">

                <div class="row">

                    <div class="cell-12">
                        <div class="card">
                            <div class="card-header">
                                <b><?php echo $nombreAlumno; ?></b>
                            </div>
                            <div class="card-content p-2">
                                <div class="row">
                                    <div class="cell-sm-12 cell-md-4 cell-lg-4">
                                        <div data-role="panel">
                                            <div class="row">
                                                <div class="cell-8">
                                                    Horas Cumplidas
                                                </div>
                                                <div class="cell-4 text-right">
                                                    <?php echo $horasCumplidas; ?> hrs.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cell-sm-12 cell-md-4 cell-lg-4">
                                        <div data-role="panel">
                                            <div class="row">
                                                <div class="cell-8">
                                                    Horas Restantes
                                                </div>
                                                <div class="cell-4 text-right">
                                                    <?php echo $horasRestantes; ?> hrs.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cell-sm-12 cell-md-4 cell-lg-4">
                                        <div data-role="panel">
                                            <div class="row">
                                                <div class="cell-6">
                                                    Fecha de Inicio
                                                </div>
                                                <div class="cell-6 text-right">
                                                    dd/mm/aaaa
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="cell-12">
                        <div class="card">
                            <div class="card-header">
                                <b>Asistencia</b>
                            </div>
                            <div class="card-content p-2">
                                <div class="row">
                                    <div class="cell-12">

                                        <?php $array_fechas = json_decode($alumnosFechasServicio['fechas'], true); ?>
                                        <?php krsort($array_fechas); ?>


                                        <table class="table striped responsive-table table-border cell-border row-hover row-border"
                                                data-role="table"
                                                data-cls-table-top="row flex-nowrap"
                                                data-cls-search="cell-md-8"
                                                data-cls-rows-count="cell-md-4"
                                                data-rows="10"
                                                data-rownum="true"
                                                data-rows-steps="10, 15, 100"
                                                data-show-activity="false">
                                            <thead>
                                            <tr>
                                                <th data-sortable="true" data-cls-column="text-center" class="text-center">Fecha Asistencia</th>
                                                <th data-cls-column="text-center" class="text-center">Entrada</th>
                                                <th data-cls-column="text-center" class="text-center">Salida</th>
                                                <th data-sortable="true" data-cls-column="text-center" class="text-center">T. Acumulado</th>
                                            </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            <?php foreach ($array_fechas as $af): ?>
                                                <tr>
                                                    <td><?php echo $af['fecha_asistencia']; ?></td>
                                                    <td><?php echo $af['hora_entrada']; ?></td>
                                                    <td><?php echo $af['hora_salida']; ?></td>
                                                    <td><?php echo $af['horas_acumuladas']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </main>
</body>

<?php
    $this->load->view('v2/init/footer');
?>