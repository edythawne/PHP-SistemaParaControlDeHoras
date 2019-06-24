<?php
    $this -> load -> view('v1/init/header', array('toolbar' => 'Actualizar Registro'));
    $this -> load -> view('v1/alumno/nav_slide');
    $this -> load -> view('v1/alumno/nav_bar', array('nav_params' => array('toolbar' => 'Actualizar Registro', 'nav_action' => 'menu', 'nav_icon' => 'menu', 'nav_href' => '')));
?>

<!-- Main -->

<main style="margin: 20px;">
    <div>
        <div class="row">

            <div class="col s1 m2 l2"></div>

            <div class="col s10 m8 l8">
                <div class="card">
                    <div class="card-content ">
                        <span class="card-title">Actualizar Registro</span>
                        <div class="row" style="padding: 10px;">

                            <?php
                                echo form_open('alumno/AlumnoController/updateRegister');
                            ?>

                            <div class="input-field col s12 m6 l6">
                                <input placeholder="766 ..." id="user" name="user" type="text" class="validat" disabled value="<?php echo $_SESSION['nombre']; ?>">
                                <label for="user">Nombre</label>
                                <?php echo form_error('user', '<span class="helper-text">', '</span>'); ?>
                            </div>

                            <div class="input-field col s12 m6 l6">
                                <input placeholder="766 ..." id="first_name" name="first_name" type="text" class="validate" disabled value="<?php echo $_SESSION['apellidos']; ?>">
                                <label for="first_name">Apellidos</label>
                                <?php echo form_error('first_name', '<span class="helper-text">', '</span>'); ?>
                            </div>

                            <div class="input-field col s12 m6 l6">
                                <input placeholder="766 ..." id="f_ent" name="f_ent" type="text" class="validate" disabled value="<?php echo date('Y-m-d', strtotime($registroHoy[0]['al_entrada'])); ?>">
                                <label for="f_ent">Fecha de Entrada</label>
                                 <?php echo form_error('f_ent', '<span class="helper-text">', '</span>'); ?>
                            </div>

                            <div class="input-field col s12 m6 l6">
                                <input placeholder="766 ..." id="h_ent" name="h_ent" type="text" class="validate" disabled value="<?php echo date('H:m:s', strtotime($registroHoy[0]['al_entrada'])); ?>">
                                <label for="h_ent">Hora de Entrada</label>
                                <?php echo form_error('h_ent', '<span class="helper-text">', '</span>'); ?>
                            </div>

                            <div class="input-field col s12 m6 l6">
                                <input placeholder="766 ..." id="date" name="date" type="text"  disabled class="datepicker validate" value="<?php echo date('Y-m-d'); ?>">
                                <label for="date">Fecha de Salida</label>
                                <?php echo form_error('date', '<span class="helper-text">', '</span>'); ?>
                            </div>

                            <div class="input-field col s12 m6 l6">
                                <input placeholder="766 ..." id="time" name="time" type="text" class="timepicker validate" value="<?php echo date('h:i A'); ?>">
                                <label for="time">Hora de Salida</label>
                                <?php echo form_error('time', '<span class="helper-text">', '</span>'); ?>
                            </div>

                            <div class="right">
                                <button class="waves-effect waves-light btn" name="submit" type="submit"><i class="material-icons right">save</i>Actualizar</button>
                            </div>

                            <?php
                                echo "</form>";
                            ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col s1 m2 l2"></div>

        </div>
    </div>
</main>

<!-- -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var options_datepicker = {
            defaultDate: new Date(),
            setDefaultDate: true,
            format: 'yyyy-mm-dd'
        };

        var datepicker = document.querySelector('.datepicker');
        var instance_datepicker = M.Datepicker.init(datepicker, options_datepicker);

        var options_timepicker = {
            defaultTime: 'now',
            twelveHour: false,
            format: "HH:ii:SS",
            autoClose: false
        };

        var timepicker = document.querySelector('.timepicker');
        var instance_timepicker = M.Timepicker.init(timepicker, options_timepicker);

    });
</script>

<?php
    $this -> load -> view('v1/init/footer');
?>


