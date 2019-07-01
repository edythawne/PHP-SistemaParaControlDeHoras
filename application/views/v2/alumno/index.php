<?php
    $this -> load -> view('v2/init/header', array('toolbar' => 'Registros'));
?>
<body>
    <?php
        $this -> load -> view('v2/alumno/nav_slide');
        $this -> load -> view('v2/alumno/nav_bar', array('nav_params' => array('toolbar' => 'Registros', 'nav_action' => 'menu', 'nav_icon' => 'menu', 'nav_href' => '')));
    ?>

    <main class="">
        <div class="h-100 p-4">

        </div>
    </main>
</body>
<?php
    $this->load->view('v2/init/footer');
?>