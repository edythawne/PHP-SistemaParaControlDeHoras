<?php
    $this -> load -> view('v2/init/header', array('toolbar' => 'Registros'));

    // Datos
    $alumno = $_SESSION['nombre'].' '.$_SESSION['apellidos'];
?>
<body>
    <?php
        $this -> load -> view('v2/alumno/nav_slide',  array('uri' => 'index'));
        $this -> load -> view('v2/alumno/nav_bar', array('nav_params' => array('toolbar' => 'Registros', 'nav_action' => 'menu', 'nav_icon' => 'menu', 'nav_href' => '')));
    ?>

    <main class="">
        <div class="h-100">
            <div class="p-2">
                <div class="row">
                    <div class="cell-12">
                        <div class="card">
                            <div class="card-header">
                                <b><?php echo $alumno; ?></b>
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
                                                    Horas Cumplidas
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
                        <div class="card p-2">
                            <div class="card-header">
                                <b>Horas en Activo</b>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="cell-12">
                                        <table class="table table-border cell-border">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Asistencia</th>
                                                <th class="text-center">Hora de Entrada</th>
                                                <th class="text-center">Hora de Salida</th>
                                                <th class="text-center">Obs.</th>
                                            </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            <?php foreach ($registroHorasCumplidas as $rhc): ?>
                                                <tr>
                                                    <td><?php echo $rhc['fecha_entrada']; ?></td>
                                                    <td><?php echo $rhc['hora_entrada']; ?></td>
                                                    <td><?php echo $rhc['hora_salida']; ?></td>
                                                    <td> ng </td>
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