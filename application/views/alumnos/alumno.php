<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- SideNav -->
<ul id="slide-out" class="sidenav">
    <li>
        <div class="user-view">
            <div class="background grey darken-4">

            </div>
            <a href="#user"><img class="circle" src="<?php echo img_url('profile.png'); ?>"></a>
            <a href="#name"><span class="white-text name"><?php echo $_SESSION['nombre']; ?></span></a>
            <a href="#email"><span class="white-text email"><?php echo $_SESSION['apellidos'];  ?></span></a>
        </div>
    </li>
    <li>
        <a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a>
    </li>
    <li>
        <a href="#!">Second Link</a>
    </li>
    <li>
        <div class="divider"></div>
    </li>
    <li>
        <a class="subheader">Ajustes</a>
    </li>
    <li>
        <a href="<?php echo base_url('index.php/alumno/cerrar_sesion')  ?>"><i class="material-icons">close</i>Cerrar Session</a>
    </li>
</ul>
<!-- -->

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
</main>

<!-- javascript -->
<script type="application/javascript">
    function cerrar_session() {

    }
</script>