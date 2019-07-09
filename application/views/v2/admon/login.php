<?php
    $this -> load -> view('v2/init/header', array('toolbar' => 'Administrador'));
?>

<style>
    .login-form {
        width: 100%;
        height: auto;
        top: 50%;
        margin-top: -160px;
    }

    @media (min-width: 576px) {
        .login-form {
            max-width: 440px;
        }
    }

    @media (min-width: 768px) {
        .login-form {
            max-width: 620px;
        }
    }

    @media (min-width: 992px) {
        .login-form {
            max-width: 860px;
        }
    }

    @media (min-width: 1200px) {
        .login-form {
            max-width: 860px;
        }
    }

    @media (min-width: 1452px) {
        .login-form {
            max-width: 860px;
        }
    }
</style>

<body class="container">

    <main class="h-vh-100">

        <div class="login-form bg-white p-6 mx-auto border bd-default z-depth-1">
            <?php  echo form_open('admon/LoginController/login'); ?>
                <span class="mif-vpn-lock mif-4x place-right" style="margin-top: -10px;"></span>
                <h4 class="text-light">Autenticación de Administrador</h4>

                <div class="row">
                    <div class="cell-sm-12 cell-md-6 cell-lg-6">
                        <label>Usuario</label>
                        <input type="text" id="user" name="user" value="<?php echo set_value('user'); ?>"/>
                        <?php echo form_error('user', '<small class="text-muted">', '</small>'); ?>
                    </div>
                    <div class="cell-sm-12 cell-md-6 cell-lg-6">
                        <label>Contraseña</label>
                        <input type="password"id="password" name="password" value="<?php echo set_value('password'); ?>"/>
                        <?php echo form_error('password', '<small class="text-muted">', '</small>'); ?>
                    </div>
                </div>


                <div class="form-group mt-10">
                    <a href="<?php echo base_url('index.php')?>" class="place-right">Acceso a Usuarios</a>
                    <button class="button" name="submit" type="submit">Iniciar Sesión</button>
                </div>
            <?php echo "</form>"; ?>
        </div>

    </main>

</body>

<?php
    $this->load->view('v2/init/footer');
?>
