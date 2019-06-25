<?php
    $this -> load -> view('v1/init/header', array('toolbar' => 'Registros'));
    $this -> load -> view('v1/alumno/nav_slide');
    $this -> load -> view('v1/alumno/nav_bar', array('nav_params' => array('toolbar' => 'Registros', 'nav_action' => 'menu', 'nav_icon' => 'menu', 'nav_href' => '')));
    $this -> load -> view('v1/init/notifier');
?>

<main style="margin: 20px;">
    <div>
        <div class="row">

            <div class="col s12">
                <div class="card">
                    <div class="card-content ">
                        <span class="card-title"><?php echo $_SESSION['nombre'].' '.$_SESSION['apellidos']; ?></span>
                        <div class="row">
                            <div class="col s12 m6 l6">
                                <div class="collection">
                                    <a href="#!" class="collection-item black-text">Horas Cumplidas
                                        <span class="badge" data-badge-caption="hrs"><?php echo $horasCumplidas; ?></span>
                                    </a>
                                </div>
                            </div>

                            <div class="col s12 m6 l6">
                                <div class="collection">
                                    <a href="#!" class="collection-item black-text">Horas Restantes
                                        <span class="badge" data-badge-caption="hrs"><?php echo $horasRestantes; ?></span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col s12">
                <div class="card">
                    <div class="card-content ">
                        <span class="card-title">Lista de Fechas en Activo</span>
                        <div class="row">

                            <table class="highlight">
                                <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Hora de Entrada</th>
                                    <th>Hora de Salida</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($registroHorasCumplidas as $rhc): ?>
                                    <tr>
                                        <td><?php echo $rhc['fecha_entrada']; ?></td>
                                        <td><?php echo $rhc['hora_entrada']; ?></td>
                                        <td><?php echo $rhc['hora_salida']; ?></td>
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

    <!-- fab -->
    <?php
        if ($checarRegistroHoy == 0):
    ?>

    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red waves-effect waves-light btn modal-trigger" href="<?php echo base_url('index.php/v1/alumno/create_day') ?>">
            <i class="material-icons">add</i>
        </a>
    </div>

    <?php
        elseif($checarRegistroHoyCompleto == 0):
    ?>

    <!-- Nothing! -->

    <?php
        else:
    ?>

    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red waves-effect waves-light btn modal-trigger" href="<?php echo base_url('index.php/v1/alumno/update_day') ?>">
            <i class="material-icons">update</i>
        </a>
    </div>

    <?php
        endif;
    ?>



</main>

<!-- -->
<?php
    $this -> load -> view('v1/init/footer');
?>

