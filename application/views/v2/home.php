<?php
    $this -> load -> view('v2/init/header', array('toolbar' => 'Ford 32 - Horarios'));
?>

<nav class="navbar fixed-top navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="/bootstrap-material-design/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Bootstrap
    </a>
</nav>

<main role="main" class="container">
    <div class="jumbotron">
        <h1>Navbar example</h1>
        <p class="lead">This example is a quick exercise to illustrate how fixed to top navbar works. As you scroll, it will remain fixed to the top of your browser's viewport.</p>
        <a class="btn btn-lg btn-primary" href="../../components/navbar/" role="button">View navbar docs &raquo;</a>
    </div>
</main>


<?php
    $this -> load -> view('v2/init/footer');
?>
