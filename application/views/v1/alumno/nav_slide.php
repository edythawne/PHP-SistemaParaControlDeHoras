<ul id="slide-out" class="sidenav">
    <li>
        <div class="user-view">
            <div class="background grey darken-4">

            </div>
            <a href="#user"><img class="circle" src="<?php echo img_url('profile.png'); ?>"></a>
            <a href="#name"><span class="white-text name"><?php echo $_SESSION['nombre']; ?></span></a>
            <a href="#email"><span class="white-text email"><?php echo $_SESSION['apellidos'];?></span></a>
        </div>
    </li>
    <!--<li>
        <a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a>
    </li>
    <li>
        <a href="#!">Second Link</a>
    </li>
    <li>
        <div class="divider"></div>
    </li> -->
    <li>
        <a class="subheader">Ajustes</a>
    </li>
    <li>
        <a href="<?php echo base_url('index.php/v1/alumno/close_session'); ?>"><i class="material-icons">close</i>Cerrar Session</a>
    </li>
</ul>