<?php
    $this -> load -> view('v2/init/header', array('toolbar' => 'Registros'));
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
                                <b><?php echo $alumnoServicio['nom'].' '.$alumnoServicio['ape']; ?></b>
                            </div>
                            <div class="card-content p-2">
                                <div class="row">

                                    <div class="cell-sm-12 cell-md-4 cell-lg-4">
                                        <div data-role="panel">
                                            <div class="row">
                                                <div class="cell-4">
                                                    Especialidad
                                                </div>
                                                <div class="cell-8 text-right">
                                                    <b><?php echo $alumnoServicio['esp'] ?></b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cell-sm-12 cell-md-4 cell-lg-4">
                                        <div data-role="panel">
                                            <div class="row">
                                                <div class="cell-4">
                                                    Asunto
                                                </div>
                                                <div class="cell-8 text-right">
                                                    <b><?php echo $alumnoServicio['ti_s'] ?></b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cell-sm-12 cell-md-4 cell-lg-4">
                                        <div data-role="panel">
                                            <div class="row">
                                                <div class="cell-7">
                                                    Telefono
                                                </div>
                                                <div class="cell-5 text-right">
                                                    <b><?php echo decrypt($alumnoServicio['tel']); ?></b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>

                                <div class="row pt-2">

                                    <div class="cell-sm-12 cell-md-5 cell-lg-5">
                                        <div data-role="panel">
                                            <div class="row">
                                                <div class="cell-4">
                                                    Periodo
                                                </div>
                                                <div class="cell-8 text-right">
                                                    <b><?php echo $alumnoServicio['per'] ?></b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="cell-sm-12 cell-md-4 cell-lg-4">
                                        <div data-role="panel">
                                            <div class="row">
                                                <div class="cell-7">
                                                    Horas Cumplidas
                                                </div>
                                                <div class="cell-5 text-right">
                                                    <b><?php echo substr($alumnoServicio['hr_c'], 0, strpos($alumnoServicio['hr_c'],':')); ?> hrs.</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cell-sm-12 cell-md-3 cell-lg-3">
                                        <div data-role="panel">
                                            <div class="row">
                                                <div class="cell-7">
                                                    Horas Restantes
                                                </div>
                                                <div class="cell-5 text-right">
                                                    <b><?php echo $alumnoServicio['hr_r']; ?> hrs.</b>
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

                                        <?php $array_fechas = json_decode($alumnoServicio['fec'], true); ?>
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
                                                <th data-sortable="true" data-cls-column="text-center" class="text-center">Tiempo</th>
                                            </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            <?php $hours = 0; ?>
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