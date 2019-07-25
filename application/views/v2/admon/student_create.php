<?php
    $this -> load -> view('v2/init/header', array('toolbar' => 'Crear Alumno'));
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
        $this -> load -> view('v2/admon/nav_slide',  array('uri' => 'student_create'));
        $this -> load -> view('v2/admon/nav_bar', array('nav_params' => array('toolbar' => 'Crear Alumno')));
    ?>

    <main>
        <div class="">
            <div class="p-2">

                <div class="row">


                    <div class="login-form card">
                        <div class="card-header">
                            <b>Datos del Alumno</b>
                        </div>
                        <div class="card-content p-2">
                            <form action="<?php echo base_url('index.php/admon/AdmonController/saveStudent')?>"
                                  method="post" accept-charset="utf-8"
                                  data-role="validator"
                                  action="javascript:" data-interactive-check="true">

                            <div class="row">
                                <div class="cell-sm-12 cell-md-6 cell-lg-6 pl-5 pt-2 pr-5 pb-2">
                                    <label for="user">Nombre</label>
                                    <input placeholder="Ingrese Nombre" id="nom" name="nom" type="text" class="valid" value="<?php echo set_value('nom');?>">
                                    <?php echo form_error('nom', '<small class="text-muted">', '</small>'); ?>
                                </div>
                                <div class="cell-sm-12 cell-md-6 cell-lg-6 pl-5 pt-2 pr-5 pb-2">
                                    <label for="first_name">Apellidos</label>
                                    <input placeholder="Ingrese Apellidos" id="ape" name="ape" type="text" class="valid"  value="<?php echo set_value('ape');?>">
                                    <?php echo form_error('ape', '<small class="text-muted">', '</small>'); ?>
                                </div>
                                <div class="cell-sm-12 cell-md-6 cell-lg-6 pl-5 pt-2 pr-5 pb-2">
                                    <label for="date">Telefono</label>
                                    <input placeholder="Ingrese Telefono" id="tel" name="tel" type="number" data-validate="maxlength=15"  class="valid" value="<?php echo set_value('tel');?>">
                                    <?php echo form_error('tel', '<small class="text-muted">', '</small>'); ?>
                                    <span class="invalid_feedback">No debe exceder más de 15 dígitos</span>
                                </div>
                                <div class="cell-sm-12 cell-md-6 cell-lg-6 pl-5 pt-2 pr-5 pb-2">
                                    <label for="date">Especialidad</label>
                                    <input placeholder="Ingrese Especialidad" id="esp" name="esp" type="text" class="valid"  value="<?php echo set_value('esp');?>">
                                    <?php echo form_error('esp', '<small class="text-muted">', '</small>'); ?>
                                </div>
                                <div class="cell-sm-12 cell-md-6 cell-lg-6 pl-5 pt-2 pr-5 pb-2">
                                    <label for="date">Tipo de Servicio</label>
                                    <select data-role="select"  id="tse" name="tse" >
                                        <option value="Servicio Social" <?php echo  set_select('tse', 'Servicio Social', TRUE); ?> >Servicio Social</option>
                                        <option value="Practicas Profesionales" <?php echo  set_select('tse', 'Practicas Profesionales');?> >Practicas Profesionales</option>
                                        <option value="Otro" <?php echo  set_select('tse', 'Otro'); ?> >Otro</option>

                                    </select>
                                    <?php echo form_error('tse', '<small class="text-muted">', '</small>'); ?>
                                </div>
                                <div class="cell-sm-12 cell-md-6 cell-lg-6 pl-5 pt-2 pr-5 pb-2">
                                    <label for="date">Periodo</label>
                                    <input placeholder="Ingrese Periodo" id="per" name="per" type="text"  class="valid" value="<?php echo set_value('per');?>">
                                    <?php echo form_error('per', '<small class="text-muted">', '</small>'); ?>
                                </div>
                                <div class="cell-sm-12 cell-md-6 cell-lg-6 pl-5 pt-2 pr-5 pb-2">
                                    <label for="date">Duración de Servicio</label>
                                    <input placeholder="Ingrese Duración" id="dur" name="dur" type="number" data-validate="maxlength=3" class="valid" value="<?php echo set_value('dur');?>">
                                    <?php echo form_error('dur', '<small class="text-muted">', '</small>'); ?>
                                    <span class="invalid_feedback">No debe exceder más de 3 dígitos</span>
                                </div>

                                <div class="cell-12  pl-5 pt-2 pr-5 pb-2">
                                    <button class="button success" name="submit" type="submit">Guardar Datos</button>
                                </div>

                            </div>

                            </form>
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