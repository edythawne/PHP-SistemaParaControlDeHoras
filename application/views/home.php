<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<main style="margin: 20px;">
    <div>
        <div class="row">
            <div class="col s6 offset-s3">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Bienvenido</span>

                        <div class="row" style="padding-top: 10px;">

                            <?php
                                echo form_open('HomeController/login');
                            ?>


                                <div class="input-field col s12">
                                    <input placeholder="766 ..." id="user" name="user" type="text" class="validate" value="<?php echo set_value('user'); ?>">
                                    <label for="user">Usuario</label>
                                    <?php echo form_error('user', '<span class="helper-text">', '</span>'); ?>
                                </div>

                                <div class="input-field col s12">
                                    <input placeholder="* * * *" id="password" name="password" type="password" class="validate" value="<?php echo set_value('password'); ?>">
                                    <label for="password">Contraseña</label>
                                    <?php echo form_error('password', '<span class="helper-text">', '</span>'); ?>
                                </div>

                                <div class="input-field col s12 center">
                                    <button class="waves-effect waves-light btn" name="submit" type="submit"><i class="material-icons right">send</i>Iniciar Sesión</button>
                                </div>

                            <?php
                                echo "</form>";
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
