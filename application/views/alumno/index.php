<?php
    $this -> load -> view('html/header', array('nav_params' => array('toolbar' => 'Registro', 'nav_action' => 'menu', 'nav_icon' => 'menu', 'nav_href' => '')));
    $this -> load -> view('alumno/navbar')
?>

<!-- Main -->
<div >


</div>

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
    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red waves-effect waves-light btn modal-trigger" href="<?php echo base_url('index.php/alumno/create_day') ?>">
            <i class="material-icons">add</i>
        </a>
    </div>

</main>

<!-- -->

<?php
    $this -> load -> view('html/scripts');
?>
<?php
    $this -> load -> view('html/footer');
?>

