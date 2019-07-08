<?php
    $this -> load -> view('v2/init/header', array('toolbar' => 'Registros'));


    print_r($registroHoy);

    // Datos
    $nombre = $_SESSION['nombre'];
    $apellidos = $_SESSION['apellidos'];
    $now = date('Y-m-d');
    $time = date('H:i:s');

    $f_ent = date('Y-m-d', strtotime($registroHoy[0]['al_entrada']));
    $h_ent = date('H:m:s', strtotime($registroHoy[0]['al_entrada']));
?>

    <style>
        .login-form {
            width: 100%;
        }

        @media (min-width: 576px) {
            .login-form {
                max-width: 440px;
            }
        }

        @media (min-width: 768px) {
            .login-form {
                max-width: 600px;
            }
        }

        @media (min-width: 992px) {
            .login-form {
                max-width: 840px;
            }
        }

        @media (min-width: 1200px) {
            .login-form {
                max-width: 840px;
            }
        }

        @media (min-width: 1452px) {
            .login-form {
                max-width: 840px;
            }
        }
    </style>

<body>
    <?php
        $this -> load -> view('v2/alumno/nav_slide', array('uri' => 'update_day'));
        $this -> load -> view('v2/alumno/nav_bar', array('nav_params' => array('toolbar' => 'Actualizar Registro', 'nav_action' => 'menu', 'nav_icon' => 'menu', 'nav_href' => '')));
    ?>

    <main class="">
        <div class="h-100 p-4">
            <div class="p-2">
                <div class="row">

                    <div class="login-form card">
                        <div class="card-header">
                            <b>Actualizar Registro</b>
                        </div>
                        <div class="card-content p-2">
                            <?php
                            echo form_open('/alumno/AlumnoController/updateRegister');
                            ?>

                            <div class="row">
                                <div class="cell-sm-12 cell-md-6 cell-lg-6 pl-5 pt-2 pr-5 pb-2">
                                    <label for="user">Nombre</label>
                                    <input placeholder="Ingrese Nombre" id="user" name="user" type="text" class="validat" disabled value="<?php echo $nombre; ?>">
                                    <?php echo form_error('user', '<small class="text-muted">', '</small>'); ?>
                                </div>
                                <div class="cell-sm-12 cell-md-6 cell-lg-6 pl-5 pt-2 pr-5 pb-2">
                                    <label for="first_name">Apellidos</label>
                                    <input placeholder="Ingrese Apellidos" id="first_name" name="first_name" type="text" class="validate" disabled value="<?php echo $apellidos; ?>">
                                    <?php echo form_error('first_name', '<small class="text-muted">', '</small>'); ?>
                                </div>
                                <div class="cell-sm-12 cell-md-6 cell-lg-6 pl-5 pt-2 pr-5 pb-2">
                                    <label for="f_ent">Fecha de Entrada</label>
                                    <input placeholder="Ingrese Fecha" id="f_ent" name="f_ent" data-role="calendarpicker" data-input-format="%y/%m/%d" disabled value="<?php echo $f_ent; ?>">
                                    <?php echo form_error('date', '<small class="text-muted">', '</small>'); ?>
                                </div>
                                <div class="cell-sm-12 cell-md-6 cell-lg-6 pl-5 pt-2 pr-5 pb-2">
                                    <label for="h_ent">Hora de Entrada</label>
                                    <input placeholder="Ingrese Hora" id="h_ent" name="h_ent" data-role="timepicker" class="disabled" disabled value="<?php echo $h_ent; ?>">
                                    <?php echo form_error('time', '<small class="text-muted">', '</small>'); ?>
                                </div>
                                <div class="cell-sm-12 cell-md-6 cell-lg-6 pl-5 pt-2 pr-5 pb-2">
                                    <label for="date">Fecha de Salida</label>
                                    <input placeholder="Ingrese Fecha" id="date" name="date" data-role="calendarpicker" data-input-format="%y/%m/%d" value="<?php echo $now; ?>">
                                    <?php echo form_error('date', '<small class="text-muted">', '</small>'); ?>
                                </div>
                                <div class="cell-sm-12 cell-md-6 cell-lg-6 pl-5 pt-2 pr-5 pb-2">
                                    <label for="time">Hora de Salida</label>
                                    <input placeholder="Ingrese Hora" id="time" name="time" data-role="timepicker" value="<?php echo $time; ?>">
                                    <?php echo form_error('time', '<small class="text-muted">', '</small>'); ?>
                                </div>

                                <div class="cell-12  pl-5 pt-2 pr-5 pb-2">
                                    <button class="button success" name="submit" type="submit">Guardar Datos</button>
                                </div>

                            </div>

                            <?php
                            echo "</form>";
                            ?>
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