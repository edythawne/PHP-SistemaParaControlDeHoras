<?php
    $this -> load -> view('v2/init/header', array('toolbar' => 'Registros'));

    // Datos
    $alumno = $_SESSION['nombre'].' '.$_SESSION['apellidos'];

?>

<body>
    <?php
        $this -> load -> view('v2/admon/nav_slide',  array('uri' => 'index'));
        $this -> load -> view('v2/admon/nav_bar', array('nav_params' => array('toolbar' => 'Admon')));
        $this -> load -> view('v2/init/notifier');
    ?>
    <main>
        <div class="">
            <div class="p-2">
                <div class="row">

                    <div class="cell-sm-12 cell-md-3 cell-lg-4">
                        <div class="card">
                            <div class="pr-2 pt-4 pb-2 pl-2">
                                <ul data-role="listview" data-view="list" class="flex-align-center">
                                    <li data-caption="Administradores">
                                        <ul class="pt-2">
                                            <li data-icon="<span class='mif-folder fg-orange'>" data-caption="Crear Admon"></li>
                                            <li data-icon="<span class='mif-folder fg-green'>" data-caption="Mostrar Admon"></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="cell-sm-12 cell-md-3 cell-lg-4">
                        <div class="card">
                            <div class="pr-2 pt-4 pb-2 pl-2">
                                <ul data-role="listview" data-view="list" class="flex-align-center">
                                    <li data-caption="Alumnos de Servicio">
                                        <ul class="pt-2">
                                            <li data-icon="<span class='mif-folder fg-orange'>" data-caption="Crear Alumno"></li>
                                            <li data-icon="<span class='mif-folder fg-green'>" data-caption="Mostrar Alumnos"></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="cell-sm-12 cell-md-12 cell-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <b>Lista de Alumnos en Activo</b>
                            </div>
                            <div class="card-content p-2">
                                <div class="row">
                                    <div class="cell-12">
                                        <table class="table striped table-border cell-border row-hover row-border"
                                               data-role="table"
                                               data-cls-table-top="row flex-nowrap"
                                               data-cls-search="cell-md-8"
                                               data-cls-rows-count="cell-md-4"
                                               data-rows="10"
                                               data-rows-steps="10, 15, 100"
                                               data-show-activity="false">
                                            <thead>
                                            <tr>
                                                <th data-sortable="true" class="text-center">ID</th>
                                                <th data-sortable="true" class="text-center">Nombre & Apellidos</th>
                                                <th data-sortable="true" data-cls-column="text-center" class="text-center">T. Cumplido</th>
                                                <th data-sortable="true" data-cls-column="text-center" class="text-center"">T. Restante</th>
                                                <th data-cls-column="text-center" class="text-center">V. Info</th>
                                            </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            <?php foreach ($infoHorasAlumnos as $iha): ?>
                                                <tr>
                                                    <td><?php echo $iha['id_alumno']; ?></td>
                                                    <td><?php echo $iha['nombre'].' '.$iha['apellidos']; ?></td>
                                                    <td><?php echo $iha['horas_cumplidas']; ?></td>
                                                    <td><?php echo (480 - $iha['horas_cumplidas']); ?></td>
                                                    <td><a href="<?php echo base_url('index.php/v2/admon/info_student/'.$iha['id_alumno']) ?>" class="button mini">Ver</a></td>
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