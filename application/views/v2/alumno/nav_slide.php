<?php
    $versionName = $this -> config -> item('versionName');
?>

<aside class="sidebar z-2" data-role="sidebar" data-toggle="#sidebar-toggle" id="sb">
    <div style="padding-bottom: 52px;">

    </div>
    <div class="sidebar-header" data-image="<?php echo img_url('wallpaper.jpg') ?>">
        <a href="/" class="fg-white sub-action" onclick="Metro.sidebar.close('#sb'); return false;"><span class="mif-arrow-left mif-2x"></span></a>
        <div class="avatar">
            <img src="<?php echo img_url('profile.png'); ?>">
        </div>
        <span class="title fg-white"><?php echo $_SESSION['nombre']; ?></span>
        <span class="subtitle fg-white"><?php echo $_SESSION['apellidos'];?></span>
    </div>
    <ul class="sidebar-menu">
        <!--  --------------------------------------------------------------------------------- -->
        <?php  if ($uri != 'index'): ?>
            <li><a href="<?php echo base_url('index.php'); ?>"><span class="mif-home icon"></span>Home</a></li>
        <?php  endif; ?>
        <!--  --------------------------------------------------------------------------------- -->

        <!--  --------------------------------------------------------------------------------- -->
        <?php  if ($uri != 'create_day'): ?>
            <!-- -->
            <?php if ($checarRegistroHoy == 0): ?>
                <li><a href="<?php echo base_url('index.php/'.$versionName.'/alumno/create_day') ?>"><span class="mif-plus icon"></span>Agregar Registro</a></li>
            <?php elseif($checarRegistroHoyCompleto == 0): ?>
                <!-- Nothing! -->
            <?php else: ?>
                <li><a href="<?php echo base_url('index.php/'.$versionName.'/alumno/update_day') ?>"><span class="mif-redo icon"></span>Actualizar Registro</a></li>
            <?php endif; ?>
            <!-- --->
        <?php endif; ?>
        <!--  --------------------------------------------------------------------------------- -->

        <li class="divider"></li>
        <li><a href="<?php echo base_url('index.php/'.$versionName.'/alumno/close_session'); ?>"><span class="mif-cross icon"></span>Cerrar Sesión</a></li>
    </ul>
</aside>