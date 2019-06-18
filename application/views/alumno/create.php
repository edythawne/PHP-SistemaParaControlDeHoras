<?php
    $this -> load -> view('html/header', array('nav_params' => array('toolbar' => 'Crear Registro', 'nav_action' => 'menu', 'nav_icon' => 'menu', 'nav_href' => '')));
    $this -> load -> view('alumno/navbar')
?>

<!-- Main -->

<main style="margin: 20px;">
    <div>
        <div class="row">

            <div class="col s1 m2 l2"></div>

            <div class="col s10 m8 l8">
                <div class="card">
                    <div class="card-content ">
                        <span class="card-title">Agregar Nuevo Registro</span>
                        <div class="row" style="padding: 10px;">

                            <?php
                                echo form_open('alumno/AlumnoController/saveRegister');
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

                            <!-- <div class="input-field col s12 m6 l4">
                                <input placeholder="766 ..." id="user" name="user" type="text" class="validate" disabled value="<?php //echo date('Y-m-d H:i:s'); ?>">
                                <label for="user">Tiempo de Registro</label>
                                 <?php //echo form_error('apellidos', '<span class="helper-text">', '</span>'); ?>
                            </div> -->

                            <div class="input-field col s12 m6 l6">
                                <input placeholder="766 ..." id="date" name="date" type="text" class="datepicker validate" >
                                <label for="date">Fecha de Entrada</label>
                                <?php echo form_error('date', '<span class="helper-text">', '</span>'); ?>
                            </div>

                            <div class="input-field col s12 m6 l6">
                                <input placeholder="766 ..." id="time" name="time" type="text" class="timepicker validate" value="<?php echo date('h:i A'); ?>">
                                <label for="time">Hora de Entrada</label>
                                <?php echo form_error('time', '<span class="helper-text">', '</span>'); ?>
                            </div>

                            <div class="right">
                                <button class="waves-effect waves-light btn" name="submit" type="submit"><i class="material-icons right">save</i>Guardar</button>
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

<?php
    $this -> load -> view('html/scripts');
?>

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

    //echo date('h:i A');
    //echo "<br>";
    //echo date("H:i:s", strtotime(date('h:i A')));

?>

<?php
    $this -> load -> view('html/footer');
?>


